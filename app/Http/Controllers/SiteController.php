<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

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
            $imagePath = "/public/images/logo-qr.png";
            $qrCode = QrCode::format('png') // Generate in PNG format
            ->size(300) // Increase the size for better appearance
            ->merge($imagePath, 0.15) // Add a logo, 20% of QR code size
            ->margin(2) // Add a smaller margin for a clean look
            ->color(109,26,61)
            ->generate($url); // The content of the QR code

            return base64_encode($qrCode);

    }

    public function success(Request $request)
    {
        $orderId = $request->session()->get('tId');


        $qrCode = $this->generateQrCode(\url('/payment/check/' . $orderId));

        if(!empty($orderId)) {
            $order = Order::where('transaction_id',$orderId)->where('status',"Paid")->first();
            if(empty($order)) abort(404);
            return view('success',compact('order','qrCode'));
        }

        return redirect()->to("/");

    }

   public function home()
   {
       $prefix = 'images/banks/';
       $banks = [
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_Trust.png",
               "title" => "",
               "alt" => "Logos_banques_Trust",
               "image" => asset($prefix . 'Logos_banques_Trust.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2021/04/Logos_banques_Natixis.png",
               "title" => "",
               "alt" => "Logos_banques_Natixis",
               "image" => asset($prefix . 'Logos_banques_Natixis.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/sala2-1.png",
               "title" => "",
               "alt" => "sala2",
               "image" => asset($prefix . 'sala2-1.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_AGB.png",
               "title" => "",
               "alt" => "Logos_banques_AGB",
               "image" => asset($prefix . 'Logos_banques_AGB.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_arab-bank.png",
               "title" => "",
               "alt" => "Logos_banques_arab-bank",
               "image" => asset($prefix . 'Logos_banques_arab-bank.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_badr.png",
               "title" => "",
               "alt" => "Logos_banques_badr",
               "image" => asset($prefix . 'Logos_banques_badr.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_BDL.png",
               "title" => "",
               "alt" => "Logos_banques_BDL",
               "image" => asset($prefix . 'Logos_banques_BDL.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_BEA.png",
               "title" => "",
               "alt" => "Logos_banques_BEA",
               "image" => asset($prefix . 'Logos_banques_BEA.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_BNA.png",
               "title" => "",
               "alt" => "Logos_banques_BNA",
               "image" => asset($prefix . 'Logos_banques_BNA.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_BNP.png",
               "title" => "",
               "alt" => "Logos_banques_BNP",
               "image" => asset($prefix . 'Logos_banques_BNP.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_CNEP.png",
               "title" => "",
               "alt" => "Logos_banques_CNEP",
               "image" => asset($prefix . 'Logos_banques_CNEP.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_CPA.png",
               "title" => "",
               "alt" => "Logos_banques_CPA",
               "image" => asset($prefix . 'Logos_banques_CPA.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_elbaraka.png",
               "title" => "",
               "alt" => "Logos_banques_elbaraka",
               "image" => asset($prefix . 'Logos_banques_elbaraka.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_fransaBank.png",
               "title" => "",
               "alt" => "Logos_banques_fransaBank",
               "image" => asset($prefix . 'Logos_banques_fransaBank.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_housing-Bank.png",
               "title" => "",
               "alt" => "Logos_banques_housing-Bank",
               "image" => asset($prefix . 'Logos_banques_housing-Bank.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_HSBC.png",
               "title" => "",
               "alt" => "Logos_banques_HSBC",
               "image" => asset($prefix . 'Logos_banques_HSBC.png')
           ],
           [
               "url" => "https://epay.esaa.dz/wp-content/uploads/2022/01/Logos_banques_SGA.png",
               "title" => "",
               "alt" => "Logos_banques_SGA",
               "image" => asset($prefix . 'Logos_banques_SGA.png')
           ]


       ];

       $features = [
           [
               "title" => "إختر منتجك",
               "alt" => "online-cart",
               "image" => asset('images/online-cart.svg')
           ],
           [
               "title" => "أدخل بطاقتك",
               "alt" => "user-card",
               "image" => asset('images/user-card.svg')
           ],
           [
               "title" => "حمل وصلك",
               "alt" => "recu-online",
               "image" => asset('images/recu-enline.svg')
           ],
       ];

       return view('index',compact('banks','features'));
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

    function generateOrderNumber($productSKU)
    {

        $sku = strtoupper(substr($productSKU, 0, 4));

        $timestamp = base_convert(time(), 10, 36);

        $random = Str::random(10 - strlen($sku . $timestamp));

        return substr(strtoupper($sku . $timestamp . $random), 0, 10);
    }

    public function order(Request $request,$slug)
   {



       $lastRecord = Order::latest('id')->select('id')->first();


       $lastRecord = (isset($lastRecord)) ? $lastRecord->id : 1;

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
           "amount" => $product->total_amount * 100,
           "language" => "AR",
           "return_url" => url('/payment/callback'),
       ];

       $orderId = $this->generateOrderNumber($product->sku);

       dd($orderId);

       $jsonParams = [
           'force_terminal_id' => config('app.satim.terminal_id'),
           'udf1' => $orderId
       ];

       $satimInfo["jsonParams"] = json_encode($jsonParams);

       $response = Http::get("https://cib.satim.dz/payment/rest/register.do",[
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

        $response = Http::get('https://cib.satim.dz/payment/rest/confirmOrder.do', [
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
       $categories = Category::all();
       return  view('products',compact('products','categories'));

   }

   public function product($slug)
   {
        $product = Product::where('slug',$slug)->where('status','published')->first();
        if(empty($product)) abort(404);

       return view('payment',compact('product'));
   }


}
