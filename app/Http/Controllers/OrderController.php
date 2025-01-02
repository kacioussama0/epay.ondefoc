<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptMail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function generateQrCode($url)
    {
        $imagePath = "/public/images/logo-qr.png";
        $qrCode = QrCode::format('png') // Generate in PNG format
        ->size(200) // Increase the size for better appearance
        ->merge($imagePath, 0.15) // Add a logo, 20% of QR code size
        ->margin(2) // Add a smaller margin for a clean look
        ->color(109,26,61)
            ->generate($url); // The content of the QR code

        return base64_encode($qrCode);

    }

    public function sendReceipt($orderId) {

        $order = Order::where('transaction_id',$orderId)->first();
        $qrCode = $this->generateQrCode(url('payment/check/' . $order->transaction_id));

        if(empty($order)) abort(404);

        $data = [
            'transaction_id' => $order->transaction_id,
            'order_id' => $order->orderNumber,
            'name' => $order->customer_name,
            'auth' => $order->authorization_number,
            'amount' => $order->amount,
            'status' => $order->status,
            'date' => $order->created_at->format('Y-m-d H:i:s'),
            'qrCode' => $qrCode
        ];

        Mail::to($order->email)->send(new ReceiptMail($data));

        return redirect()->to('/payment/success')->with('success', 'تم إرسال الوصل إلى بريدك الإلكتروني بنجاح');


    }

    public function generateReceipt($orderId)
    {
        $order = Order::where('transaction_id',$orderId)->first();
        $qrCode = $this->generateQrCode(url('payment/check/' . $order->transaction_id));

        if(empty($order)) abort(404);

        $data = [
            'transaction_id' => $order->transaction_id,
            'order_id' => $order->orderNumber,
            'auth' => $order->authorization_number,
            'amount' => $order->amount,
            'status' => $order->status,
            'date' => $order->created_at->format('Y-m-d H:i:s'),
            'qrCode' => $qrCode
        ];

        $pdf = Pdf::loadView('receipt', $data);

        return $pdf->download('وصل الدفع.pdf');
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
