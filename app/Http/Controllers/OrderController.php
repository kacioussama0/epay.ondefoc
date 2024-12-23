<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptMail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select('id','customer_name','email','phone','product_id','transaction_id','created_at', 'status')->orderBy('created_at',"DESC")->get()->toArray();

        return view('orders.index',compact('orders'));

    }



    public function sendReceipt($orderId) {

        $order = Order::where('transaction_id',$orderId)->first();

        if(empty($order)) abort(404);

        $data = [
            'orderId' => $order->transaction_id,
            'name' => $order->customer_name,
            'createdAt' => $order->created_at->format('Y-m-d H:i:s'),
        ];

        Mail::to($order->email)->send(new ReceiptMail($data));

        return redirect()->to('/payment/success')->with('success', 'تم إرسال الوصل إلى بريدك الإلكتروني بنجاح');



    }

    public function generateReceipt($orderId)
    {
        $order = Order::where('transaction_id',$orderId)->first();

        if(empty($order)) abort(404);


        $data = [
            'orderId' => $order->transaction_id,
            'createdAt' => $order->created_at->format('Y-m-d H:i:s'),
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
