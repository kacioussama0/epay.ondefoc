<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptMail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $rows = Order::select('id','customer_name','email','phone','product_id','transaction_id','created_at', 'status')->orderBy('created_at',"DESC")->paginate(15);
        $headers = ['رقم الطلب','الإسم واللقب','البريد الإلكتروني','رقم الهاتف','المنتج','رقم المعاملة','تاريخ','حالة الطلب'];
        return view('orders.index',[
            'rows' => $rows->getCollection()->map(function($row) {
                return [
                    $row->id,
                    $row->customer_name,
                    $row->email,
                    $row->phone,
                    $row->product->name,
                    $row->transaction_id,
                    $row->created_at->format('Y-m-d H:i'),
                    $row->status,
                ];
            })->toArray(),
            'headers' => $headers,
            'pagination' => $rows,
        ]);

    }



    public function sendReceipt($orderId) {

        $order = Order::where('transaction_id',$orderId)->first();
        $qrCode = PaymentController::generateQrCode(url('/payment/check/' . $order->transaction_id));

        if(empty($order)) abort(404);

            $data = [
                'transaction_id' => $order->transaction_id,
                'order_id' => $order->orderNumber,
                'auth' => $order->authorization_number,
                'amount' => $order->amount,
                'tax_rate' => $order->product->tax_rate,
                'total_amount' => $order->amount,
                'tva' => $order->product->tax_rate,
                'sale_amount' => $order->product->sale_price ? number_format( $order->product->sale_price,2,'.','') : number_format( $order->product->price,2,'.',''),
                'name' => $order->customer_name,
                'product_sku' => $order->product->sku,
                'status' => $order->status,
                'date' => $order->created_at->format('Y-m-d H:i:s'),
                'qrCode' => $qrCode,
            ];

            $receiptUrl = $this->generateReceipt($data);

            $data['receipt_url'] = $receiptUrl;

            Mail::to($order->email)->send(new ReceiptMail($data));

            return redirect()->to('/payment/result')->with('success', 'تم إرسال الوصل إلى بريدك الإلكتروني بنجاح');

    }


    protected function cleanupOldQrCodes()
    {

        $cutoff = now()->subMinutes(10);

        $files = Storage::disk('public')->files('temp');

        foreach ($files as $file) {
            $lastModified = Storage::disk('public')->lastModified($file);

            if (!$lastModified) {
                continue;
            }

            $last = Carbon::createFromTimestamp($lastModified);

            if ($last->lt($cutoff)) {
                Storage::disk('public')->delete($file);
            }
        }
    }


    public function generateReceipt($orderId)
    {

        $this->cleanupOldQrCodes();

        $order = Order::where('transaction_id', $orderId)->first();
        if (empty($order)) abort(404);


        $qrCode = PaymentController::generateQrCode(url('/payment/check/' . $order->transaction_id));

        $qrFilePath = public_path(str_replace(asset(''), '', $qrCode));



        $data = [
            'transaction_id' => $order->transaction_id,
            'order_id' => $order->orderNumber,
            'auth' => $order->authorization_number,
            'amount' => $order->amount,
            'tax_rate' => $order->product->tax_rate,
            'total_amount' => $order->amount,
            'tva' => $order->product->tax_rate,
            'sale_amount' => $order->product->sale_price ? number_format( $order->product->sale_price,2,'.','') : number_format( $order->product->price,2,'.',''),
            'name' => $order->customer_name,
            'product_sku' => Str::upper($order->product->slug),
            'status' => $order->status,
            'date' => $order->created_at->format('Y-m-d H:i:s'),
            'qrCode' => $qrFilePath
        ];


            $path = storage_path('app/public/temp/receipt-' . $order->orderNumber . '.pdf');

            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }

            $pdf = Pdf::loadView('receipt', $data);
            $pdf->save($path);

            return url('storage/public/temp/' . $order->orderNumber . '.pdf');
    }


    public function check($orderId)
    {
        $order = Order::where('transaction_id',$orderId)->where('status','Paid')->first();

        $status = true;

        if(empty($order)) $status = false;

        return view('check',compact('order','status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
