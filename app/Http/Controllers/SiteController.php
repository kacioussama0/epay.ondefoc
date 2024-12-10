<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

   public function order(Request $request)
   {

       $validatedData =  $request->validate([
          'customer_name' => 'required|max:128',
          'customer_enterprise' => 'nullable|max:128',
          'email' => 'required|email',
          'phone' => 'required|min:10|numeric'
       ]);

       dd($validatedData);


       return view('payment');

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
           "return_url" => url('/'),
       ];

       $jsonParams = [
           'force_terminal_id' => 'E010901344',
       ];



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
       $satimInfo["jsonParams"] = json_encode($jsonParams);


       $params = '?userName=' . $satimInfo['username'] . '&password=' . $satimInfo['password'] . '&orderNumber=' . $orderId . '&amount='
           . $satimInfo['amount'] . '&currency=' . $satimInfo['currency'] . "&returnUrl="
           . $satimInfo['return_url'] . "&language=" . $satimInfo['language'] . '&jsonParams=' . $satimInfo["jsonParams"];

       $ch = curl_init($satimInfo['order_url'] . $params);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

       $response = curl_exec($ch);
       curl_close($ch);

       $responseData = json_decode($response, true);

       if($responseData && isset($responseData['formUrl'])) {
           header("Location: " . $responseData['formUrl']);
           exit;
       }else {
           echo "Problem";
       }

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
