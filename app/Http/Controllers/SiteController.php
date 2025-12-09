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


   public function home()
   {
       $banks = [

           [
               "url" => asset('images/poste.png'),
               "title" => "",
               "alt" => "Logos_banques_Poste",
           ],

           [
               "url" => "https://epay.esaa.dz/Logos_banques_CPA.png",
               "title" => "",
               "alt" => "Logos_banques_CPA",
           ],


           [
               "url" => "https://epay.esaa.dz/Logos_banques_Trust.png",
               "title" => "",
               "alt" => "Logos_banques_Trust",

           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_Natixis.png",
               "title" => "",
               "alt" => "Logos_banques_Natixis",
           ],

           [
               "url" => "https://epay.esaa.dz/Logos_banques_BDL.png",
               "title" => "",
               "alt" => "Logos_banques_BDL",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_BEA.png",
               "title" => "",
               "alt" => "Logos_banques_BEA",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_BNA.png",
               "title" => "",
               "alt" => "Logos_banques_BNA",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_BNP.png",
               "title" => "",
               "alt" => "Logos_banques_BNP",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_CNEP.png",
               "title" => "",
               "alt" => "Logos_banques_CNEP",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_elbaraka.png",
               "title" => "",
               "alt" => "Logos_banques_elbaraka",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_fransaBank.png",
               "title" => "",
               "alt" => "Logos_banques_fransaBank",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_housing-Bank.png",
               "title" => "",
               "alt" => "Logos_banques_housing-Bank",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_HSBC.png",
               "title" => "",
               "alt" => "Logos_banques_HSBC",
           ],
           [
               "url" => "https://epay.esaa.dz/Logos_banques_SGA.png",
               "title" => "",
               "alt" => "Logos_banques_SGA",
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








    public function products()
   {
       $products = Product::where('status', 'published')
           ->orderByRaw('
        CASE
            WHEN stock = 0 THEN 3        -- out of stock → دائماً في الأخير
            WHEN stock IS NULL THEN 2    -- null → يأتي بعد القيم >0
            ELSE 1                       -- stock > 0 → في الأعلى
        END
    ')
           ->orderBy('stock', 'DESC')
           ->orderBy('created_at', 'DESC')
           ->get();

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
