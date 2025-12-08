<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SatimService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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

    public function generateUniqueOrderNumber(SatimService $satim): string
    {
        do {
            // Generate order number
            $prefix = 'O';
            $year   = date('y'); // last 2 digits of the year
            $sequence = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

            $orderNumber = "{$prefix}{$year}{$sequence}";


            $test = $satim->registerPayment(
                orderNumber: $orderNumber,
                amount: 50,
                description: "CHECK_DUPLICATE",
                additionalParams: ['test' => true]
            );

            // If response has formUrl → number is free
            $isFree = isset($test['formUrl']) && isset($test['orderId']);

            // If response has ErrorCode duplicate → regenerate
            $isDuplicate = isset($test['ErrorCode']) && $test['ErrorCode'] == 1;

        } while (!$isFree || $isDuplicate);

        return $orderNumber;
    }





    public function pay(Request $request,$slug)
    {

        $product = Product::where('slug',$slug)->first();

        $url = $this->satim->registerPayment($this->generateUniqueOrderNumber($this->satim),$product->total_amount,'ONDEFOC Product',"AR",['udf1' => $product->SKU]);

        dd($url);
    }
}
