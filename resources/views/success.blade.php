@extends('template.app')


@section('title','نجاح الدفع')


@section('styles')

    <style>

        .success-checkmark {
            width: 80px;
            height: 115px;
            margin: 0 auto;

            .check-icon {
                width: 80px;
                height: 80px;
                position: relative;
                border-radius: 50%;
                box-sizing: content-box;
                border: 4px solid #4CAF50;

                &::before {
                    top: 3px;
                    left: -2px;
                    width: 30px;
                    transform-origin: 100% 50%;
                    border-radius: 100px 0 0 100px;
                }

                &::after {
                    top: 0;
                    left: 30px;
                    width: 60px;
                    transform-origin: 0 50%;
                    border-radius: 0 100px 100px 0;
                    animation: rotate-circle 4.25s ease-in;
                }

                &::before, &::after {
                    content: '';
                    height: 100px;
                    position: absolute;
                    background: #FFFFFF;
                    transform: rotate(-45deg);
                }

                .icon-line {
                    height: 5px;
                    background-color: #4CAF50;
                    display: block;
                    border-radius: 2px;
                    position: absolute;
                    z-index: 10;

                    &.line-tip {
                        top: 46px;
                        left: 14px;
                        width: 25px;
                        transform: rotate(45deg);
                        animation: icon-line-tip 0.75s;
                    }

                    &.line-long {
                        top: 38px;
                        right: 8px;
                        width: 47px;
                        transform: rotate(-45deg);
                        animation: icon-line-long 0.75s;
                    }
                }

                .icon-circle {
                    top: -4px;
                    left: -4px;
                    z-index: 10;
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    position: absolute;
                    box-sizing: content-box;
                    border: 4px solid rgba(76, 175, 80, .5);
                }

                .icon-fix {
                    top: 8px;
                    width: 5px;
                    left: 26px;
                    z-index: 1;
                    height: 85px;
                    position: absolute;
                    transform: rotate(-45deg);
                    background-color: #FFFFFF;
                }
            }
        }

        @keyframes rotate-circle {
            0% {
                transform: rotate(-45deg);
            }
            5% {
                transform: rotate(-45deg);
            }
            12% {
                transform: rotate(-405deg);
            }
            100% {
                transform: rotate(-405deg);
            }
        }

        @keyframes icon-line-tip {
            0% {
                width: 0;
                left: 1px;
                top: 19px;
            }
            54% {
                width: 0;
                left: 1px;
                top: 19px;
            }
            70% {
                width: 50px;
                left: -8px;
                top: 37px;
            }
            84% {
                width: 17px;
                left: 21px;
                top: 48px;
            }
            100% {
                width: 25px;
                left: 14px;
                top: 45px;
            }
        }

        @keyframes icon-line-long {
            0% {
                width: 0;
                right: 46px;
                top: 54px;
            }
            65% {
                width: 0;
                right: 46px;
                top: 54px;
            }
            84% {
                width: 55px;
                right: 0px;
                top: 35px;
            }
            100% {
                width: 47px;
                right: 8px;
                top: 38px;
            }
        }

        @media print {

            .success-checkmark,button,header,footer,.btn-group {
                display: none !important;
            }

            #logo-print {
                display: block !important;
            }

            .shadow {
                box-shadow: none !important;
            }


        }



    </style>

@endsection

@section('content')

    <section class="payment-success">

        <div class="container my-5 py-5">


            <img src="{{asset('images/Ondefoc Purple.svg')}}" id="logo-print" class="d-none mx-auto mb-5" alt="logo-ondefoc" height="100">




                        <div class="card shadow border-0 my-5 p-3">

                            <div class="card-header bg-transparent border-0">
                                <div class="success-checkmark">
                                    <div class="check-icon">
                                        <span class="icon-line line-tip"></span>
                                        <span class="icon-line line-long"></span>
                                        <div class="icon-circle"></div>
                                        <div class="icon-fix"></div>
                                    </div>
                                </div>

                                <h1 class="fw-bolder text-success mb-5 display-2 d-flex justify-content-center align-items-center">{{$order->description}}</h1>
                            </div>

                            <div class="card-body">

                                <x-alert/>


                                <table class="table table-bordered">

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

                                    <a href="{{url('/receipt/' . $order->transaction_id)}}" class="btn btn-danger">
                                        <i class="bi bi-file-pdf-fill ms-2"></i> PDF
                                    </a>

                                    <button type="button" class="btn btn-success" onclick="window.print()" >
                                        <i class="bi bi-printer-fill ms-2"></i> طباعة
                                    </button>

                                    <a href="{{url('/receipt/' . $order->transaction_id . '/email')}}" class="btn btn-warning">
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

