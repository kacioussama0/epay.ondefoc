@extends('template.app')


@section('title','التحقق من الدفع')




@section('content')

    <section class="payment-check">

        <div class="container my-5 py-5">

                        <div class="card rounded-5 overflow-hidden shadow-sm border-primary border-1 my-5 py-5" >

                            <div class="card-header bg-transparent border-0">

                                @if($status)
                                    <x-success-mark/>
                                @else
                                    <x-failed-mark/>
                                @endif

                                <h1 class="fw-bolder @if($status) text-success  @else text-danger @endif my-5 display-3 text-center d-flex justify-content-center align-items-center">{{$status ? 'المعاملة صالحة' : 'عذرًا، الدفع غير صالح'}}</h1>

                            </div>

                            @if($status)

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">

                                        <tr>
                                            <td>الإسم الكامل</td>
                                            <td>{{$order->customer_name}}</td>
                                        </tr>

                                        <tr>
                                            <td>الشركة</td>
                                            <td>{{$order->customer_enterprise ?? '/'}}</td>
                                        </tr>

                                        <tr>
                                            <td>البريد الإلكتروني</td>
                                            <td>{{$order->email}}</td>
                                        </tr>


                                        <tr>
                                            <td>رقم الهاتف</td>
                                            <td>{{$order->phone}}</td>
                                        </tr>


                                        <tr>
                                            <td>المنتج</td>
                                            <td>{{$order->product->name}}</td>
                                        </tr>

                                        <tr>
                                            <td>معرّف المعاملة</td>
                                            <td>{{$order->transaction_id}}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم الطلب</td>
                                            <td>{{$order->orderNumber}}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم التفويض</td>
                                            <td>{{$order->authorization_number}}</td>
                                        </tr>
                                        <tr>
                                            <td>التاريخ</td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>IP</td>
                                            <td>{{$order->ip}}</td>
                                        </tr>
                                        <tr>
                                            <td>الإجمالي</td>
                                            <td>{{number_format($order->amount,2,'.','')}} د.ج </td>
                                        </tr>
                                        <tr>
                                            <td>الحالة</td>
                                            <td>{!! $order->status !!}</td>
                                        </tr>
                                        <tr>
                                            <td>وسيلة الدفع</td>
                                            <td>CIB/EDAHABIA</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            @endif
                        </div>


        </div>




    </section>

@endsection

