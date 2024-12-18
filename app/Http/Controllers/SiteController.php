<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class   SiteController extends Controller
{
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
        $secretKey = "6LeyrZMqAAAAAE2TjPtcZ_6qlAzhcaosd0c44NCZ";

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

   public function order(Request $request)
   {
       $userIP = $_SERVER['REMOTE_ADDR'];

       $validatedData =  $request->validate([
           'customer_name' => 'required|max:128',
           'customer_enterprise' => 'nullable|max:128',
           'email' => 'required|email',
           'phone' => 'required|min:10|numeric',
           'agreed' => 'required',
           'g-recaptcha-response' => [
               function ($attribute, $value, $fail) use ($userIP) {
                   if (!$this->verifyRecaptcha($value, $userIP))  {
                       $fail('reCAPTCHA verification failed.');
                   }
               }
           ]
       ]);



       $satimInfo = [
           "id" => "E010901344",
           "username" => "SAT241126025",
           "password" => "satim120",
           "order_url" => "https://test.satim.dz/payment/rest/register.do",
           "confirm_url" => "https://test.satim.dz/payment/rest/confirmOrder.do",
           "refund_url" => "	https://test.satim.dz/payment/rest/refund.do",
           "currency" => "012",
           "amount" => "139139",
           "language" => "AR",
           "return_url" => url('/payment/callback'),
       ];

       $jsonParams = [
           'force_terminal_id' => 'E010901344',
       ];


       $satimInfo["jsonParams"] = json_encode($jsonParams);


       $errorCode = [
           0 =>	"لقد تمك قبول طلبك",
           1 =>	"رقم الطلب غير معروف",
           2 =>	"تم قبول الطلب بالفعل",
           3 =>	"تم رفض المعاملة",
           5 =>	"تم رفض المعاملة",
           6 =>	"رقم الطلب غير معروف",
           7 =>	"حصل مشكل ما"
       ];


       $orderId = hexdec(uniqid());


       $params = '?userName=' . $satimInfo['username'] . '&password=' . $satimInfo['password'] . '&orderNumber=' . $orderId . '&amount='
           . $satimInfo['amount'] . '&currency=' . $satimInfo['currency'] . "&returnUrl="
           . $satimInfo['return_url'] . "&language=" . $satimInfo['language'] . '&jsonParams=' . $satimInfo["jsonParams"];


       $response = Http::get($satimInfo['order_url'],[
           "userName" => $satimInfo['username'],
           "password" => $satimInfo['password'],
           "orderNumber" => $orderId,
           "amount" => $satimInfo['amount'],
           "currency" => $satimInfo['currency'],
           "returnUrl" => $satimInfo['return_url'],
           "language" => $satimInfo['language'],
           "jsonParams" => $satimInfo['jsonParams']
       ]);

       if ($response->successful()) {
           $validatedData['transaction_id'] = str_replace('mdOrder=','',parse_url($response->json()['formUrl'], PHP_URL_QUERY));
           $validatedData['orderNumber'] = $orderId;
           $validatedData['product_id'] = 1;

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

        return $this->confirmOrder($orderId);
    }


    public function confirmOrder($orderId)
    {
        $response = Http::get('https://test.satim.dz/payment/rest/confirmOrder.do', [
            'orderId' => $orderId,
            'userName'=> "SAT241126025",
            'password'=> "satim120",
            'language' => 'AR'
        ]);

        if($response->successful()) {

            $result = $response->json();


            if($result['ErrorCode'] == 0) {
                $order = Order::where('transaction_id',$orderId)->first();

                if($order->exists()) {
                    $order->status = 'Paid';
                    $order->save();
                }else {
                    abort(404);
                }

            }

            dd($result);
        }

        abort(500);

    }


    public function products()
   {
       $products = Product::all();

       return  view('products',compact('products'));

   }

   public function product($slug)
   {
        $product = Product::where('slug',$slug)->first();
        if(!$product->exists()) abort(404);

       return view('payment',compact('product'));
   }


}
