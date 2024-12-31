<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class   SiteController extends Controller
{


    public function failed(Request $request) {

        $orderId = $request->session()->get('tId');

        if(!empty($orderId)) {
            $order = Order::where('transaction_id',$orderId)->where('status',"Canceled")->first();
            if(empty($order)) abort(404);
            return view('failed',compact('order'));
        }
        return redirect()->to("/");

    }


    public function generateQrCode($url)
    {
        
            $qrCode = QrCode::format('png')
                ->size(300)
                ->color(109, 26, 61)
                ->backgroundColor(255, 255, 255)
                ->generate($url);

            return base64_encode($qrCode);




    }

    public function success(Request $request)
    {
        $orderId = $request->session()->get('tId');


        $qrCode = $this->generateQrCode("http://localhost:8000/payment/success");

        if(!empty($orderId)) {
            $order = Order::where('transaction_id',$orderId)->where('status',"Paid")->first();
            if(empty($order)) abort(404);
            return view('success',compact('order','qrCode'));
        }

        return redirect()->to("/");

    }

   public function home()
   {
       return view('index');
   }

   public function conditions()
   {
       return view('conditions');
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

   public function order(Request $request,$slug)
   {


       $lastRecord = Order::latest('id')->select('id')->first()->id;

       $lastId = $lastRecord ? $lastRecord + 1 : 1;

       $userIP = $_SERVER['REMOTE_ADDR'];

       $product = Product::where('slug',$slug)->first();

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


       $satimInfo = [
           "username" => config('app.satim.username'),
           "password" => config('app.satim.password'),
           "currency" => "012",
           "amount" => $product->price * 100,
           "language" => "AR",
           "return_url" => url('/payment/callback'),
       ];

       $orderId = "VCAE" . str_pad($lastId, 6, "0", STR_PAD_LEFT);


       $jsonParams = [
           'force_terminal_id' => config('app.satim.terminal_id'),
           'udf1' => $orderId
       ];

       $satimInfo["jsonParams"] = json_encode($jsonParams);


       $response = Http::get("https://test.satim.dz/payment/rest/register.do",[
           "userName" => $satimInfo['username'],
           "password" => $satimInfo['password'],
           "orderNumber" => $orderId,
           "amount" => $satimInfo['amount'],
           "currency" => $satimInfo['currency'],
           "returnUrl" => $satimInfo['return_url'],
           "failUrl" => $satimInfo['return_url'],
           "language" => $satimInfo['language'],
           "jsonParams" => $satimInfo['jsonParams']
       ]);

       if ($response->successful()) {
           $validatedData['transaction_id'] = str_replace('mdOrder=','',parse_url($response->json()['formUrl'], PHP_URL_QUERY));
           $validatedData['orderNumber'] = $orderId;
           $validatedData['product_id'] = $product->id;

           if(Order::create($validatedData)) {
               return redirect()->to($response->json()['formUrl']);
           }

       }else{
           abort(500);
       }

   }


    public function callback(Request $request)
    {
        $orderId = $request->query('orderId');
        $this->confirmOrder($request,$orderId);
    }


    public function confirmOrder(Request $request,$orderId)
    {
        $userIP = $_SERVER['REMOTE_ADDR'];

        $response = Http::get('https://test.satim.dz/payment/rest/confirmOrder.do', [
            'orderId' => $orderId,
            'userName'=> config('app.satim.username'),
            'password'=> config('app.satim.password'),
            'language' => 'AR'
        ]);

        if($response->successful()) {

            $result = $response->json();
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
                        return redirect()->to('/payment/success')->send();
                    }

                }

                elseif(($result['ErrorCode'] == 0) && ($result['OrderStatus'] == 3) && ($result['params']['respCode'] == 00)) {

                    $order->status = 'Canceled';
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
                    return redirect()->to('/payment/failed')->send();
                }

            }

        }

        abort(500);

    }


    public function products()
   {
       $products = Product::where('status','published')->orderBy('created_at','DESC')->get();

       return  view('products',compact('products'));

   }

   public function product($slug)
   {
        $product = Product::where('slug',$slug)->where('status','published')->first();
        if(empty($product)) abort(404);

       return view('payment',compact('product'));
   }


}
