@extends('template.app')


@section('title','نجاح الدفع')




@section('content')

    <section class="payment-success">

        <div class="container my-5 py-5">


            <img src="https://ondefoc.dz/wp-content/uploads/2023/10/LOGO-ONDEFOC-1-1.png.webp" id="logo-print" class="d-none mx-auto mb-5" alt="logo-ondefoc" height="100">




                        <div class="card rounded-5 overflow-hidden shadow-sm border-primary border-1 py-4">

                            <div class="card-header bg-transparent border-0">

                                <x-success-mark/>

                                <h1 class="fw-bolder text-success mb-5 d-flex justify-content-center align-items-center">{{$order->description}}</h1>
                            </div>

                            <div class="card-body">

                                <x-alert/>


                                <table class="table table-bordered table-primary">

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
                                        <td>الإجمالي</td>
                                        <td>{{number_format($order->amount,2,'.','')}} د.ج </td>
                                    </tr>
                                    <tr>
                                        <td>وسيلة الدفع</td>
                                        <td>CIB/EDAHABIA</td>
                                    </tr>
                                </table>


                            </div>

                            <div class="card-footer border-0 bg-transparent">

                                <div class="btn-group d-flex justify-content-center align-items-center" role="group" aria-label="reciept-send-methods">

                                    <a href="{{url('/receipt/' . $order->transaction_id)}}" class="btn btn-primary  border-start border-light">
                                        <i class="bi bi-file-pdf-fill ms-2"></i> PDF
                                    </a>

                                    <button type="button" class="btn btn-primary  border-end border-light" onclick="window.print()" >
                                        <i class="bi bi-printer-fill ms-2"></i> طباعة
                                    </button>

                                    <a href="{{url('/receipt/' . $order->transaction_id . '/email')}}" class="btn btn-primary border-start ">
                                        <i class="bi bi-envelope-fill ms-2"></i> بريد
                                    </a>


                                </div>

                            </div>

                        </div>





            <div class="satim d-flex flex-column align-items-center my-5">

                    <h5 class="fw-bold mb-3">في حال واجهتم مشكلة في الدفع SATIM</h5>
                    <img src="{{asset('images/numero-vert-satim.png')}}" class="w-25" alt="satim-green-number">

            </div>

        </div>




    </section>

@endsection

