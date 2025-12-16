<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Services\SatimService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentController extends Controller
{
    protected SatimService $satim;


    public function __construct(SatimService $satim) {
        $this->satim = $satim;
    }



    function verifyRecaptcha($responseKey, $userIP)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $secretKey = config('app.recaptcha_key');

        $data = [
            'secret' => $secretKey,
            'response' => $responseKey,
            'remoteip' => $userIP,
        ];

        $response = Http::asForm()->post($url, $data);

        $result = $response->json();

        if (isset($result['success']) && $result['success']) {
            return true;
        }

        return false;
    }

    function generateOrderNumber()
    {
        $prefix = 'O';

        $year  = date('y'); // 2 chars
        $month = date('m'); // 2 chars
        $day   = date('d'); // 2 chars

        $hour36 = strtoupper(base_convert(date('G'), 10, 36));

        $base60 = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        $minuteValue = intval(date('i'));
        $minute60 = $base60[$minuteValue];

        $secondValue = intval(date('s'));
        $second60 = $base60[$secondValue];

        return $prefix . $year . $month . $day . $hour36 . $minute60 . $second60;
    }

    public function pay(Request $request,$slug)
    {

        $product = Product::where('slug',$slug)->first();

        $userIP = $_SERVER['REMOTE_ADDR'];

        if(empty($product)) abort(404);

        $validatedData =  $request->validate([
            'customer_name' => 'required|max:128',
            'customer_enterprise' => 'nullable|max:128',
            'email' => 'required|email',
            'phone' => 'required|min:10|numeric',
            'agreed' => 'required',
            'g-recaptcha-response' => [
                function ($attribute, $value, $fail) use ($userIP) {
                    if (!$this->verifyRecaptcha($value, $userIP))  {
                        $fail('فشل التحقق من reCAPTCHA.');
                    }
                }
            ]
        ]);

        $orderNumber = $this->generateOrderNumber();


        $register = $this->satim->registerPayment($orderNumber,$product->total_amount,$product->name,"AR",['udf1' => $product->SKU]);


        if($register['errorCode'] == 0){

            $validatedData['transaction_id'] = str_replace('mdOrder=','',parse_url($register['formUrl'], PHP_URL_QUERY));
            $validatedData['transaction_id'] = explode('&',$validatedData['transaction_id'])[0];
            $validatedData['orderNumber'] = $orderNumber;
            $validatedData['product_id'] = $product->id;
            $validatedData['ip'] = $userIP;


            $createOrder = Order::create($validatedData);

            if(!empty($createOrder)) {


                if($register['formUrl']) {
                    $createOrder->update(['status' => 'Processing']);
                    return redirect()->away($register['formUrl']);
                }

            }


            $createOrder->update(['status' => 'Failed']);

        }

        abort(500,'فشل الدفع');



    }


    public function confirmOrder(Request $request,$orderId)
    {
        $userIP = $_SERVER['REMOTE_ADDR'];

        $result = $this->satim->confirmOrder($orderId);


        if(!empty($result)) {


            $order = Order::where('transaction_id',$orderId)->first();

            $request->session()->put('tId', $orderId);

            if(isset($order)) {

                if(($result['ErrorCode'] == 0) && ($result['OrderStatus'] == 2) && ($result['params']['respCode'] == 00)) {

                    $order->status = 'Paid';
                    $order->orderNumber = $result['OrderNumber'];
                    $order->amount = $result['Amount'] / 100;
                    $order->ip = $result['Ip'];
                    $order->authorization_number = $result['approvalCode'];
                    $order->description = $result['params']['respCode_desc'];

                    if($order->save()) {
                        return redirect()->to('/payment/result')->send();
                    }

                }

                elseif(($result['ErrorCode'] == 0) && ($result['OrderStatus'] == 3) && ($result['params']['respCode'] == 00)) {

                    $order->status = 'Rejected';
                    $order->orderNumber = $result['OrderNumber'];
                    $order->ip = $userIP;
                    $order->description = "تم رفض معاملتك";


                }else {
                    $order->status = 'Canceled';
                    $order->orderNumber = $result['OrderNumber'];
                    $order->ip = $userIP;
                    $order->description = $result['params']['respCode_desc'] ?? $result['actionCodeDescription'];

                }

                if($order->save()) {
                    return redirect()->to('/payment/result')->send();
                }

            }

        }


        abort(500);

    }


    public function callback(Request $request)
    {
        $orderId = $request->query('orderId');

        $this->confirmOrder($request,$orderId);
    }


    public function result(Request $request) {

        $orderId = $request->session()->get('tId');

        if(empty($orderId)) abort(404);

        $order = Order::where('transaction_id',$orderId)->first();


        if($order->status != 'Canceled') {
            $qrCode = $this->generateQrCode(\url('/payment/check/' . $orderId));
            return view('success',compact('order','qrCode'));
        }

        return view('failed',compact('order'));


    }


    public function generateQrCode($url)
    {
        $imagePath = "/public/images/logo-qr.png";
        $qrCode = QrCode::format('png') // Generate in PNG format
        ->size(300) // Increase the size for better appearance
        ->merge($imagePath, 0.15) // Add a logo, 20% of QR code size
        ->margin(2) // Add a smaller margin for a clean look
        ->color(109,26,61)
            ->generate($url); // The content of the QR code

        return base64_encode($qrCode);

    }






}
