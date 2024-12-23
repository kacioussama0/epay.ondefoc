@extends('template.app')


@section('title','فشل الدفع')


@section('styles')

    <style>
        .failed-checkmark {
            width: 80px;
            height: 80px;
            margin: 0 auto;
        }

        .cross-icon {
            width: 80px;
            height: 80px;
            position: relative;
            border-radius: 50%;
            border: 4px solid #F44336;
            box-sizing: content-box;
        }

        .icon-line {
            height: 5px;
            background-color: #F44336;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 10;

            &.line-left {
                top: 38px;
                left: 18px;
                width: 45px;
                transform: rotate(45deg);
                animation: icon-line-left 0.75s;
            }

            &.line-right {
                top: 38px;
                left: 18px;
                width: 45px;
                transform: rotate(-45deg);
                animation: icon-line-right 0.75s;
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
            border: 4px solid rgba(244, 67, 54, 0.5);
        }

        @keyframes icon-line-left {
            0% {
                width: 0;
                left: 40px;
                top: 40px;
            }
            50% {
                width: 0;
                left: 40px;
                top: 40px;
            }
            100% {
                width: 45px;
                left: 18px;
                top: 38px;
            }
        }

        @keyframes icon-line-right {
            0% {
                width: 0;
                left: 40px;
                top: 40px;
            }
            50% {
                width: 0;
                left: 40px;
                top: 40px;
            }
            100% {
                width: 45px;
                left: 18px;
                top: 38px;
            }
        }
    </style>


@endsection

@section('content')

    <section class="payment-success">

        <div class="container my-5 py-5">

            <div class="failed-checkmark">
                <div class="cross-icon">
                    <span class="icon-line line-left"></span>
                    <span class="icon-line line-right"></span>
                    <div class="icon-circle"></div>
                </div>
            </div>

            <h1 class="fw-bolder text-danger my-5 display-3 text-center">{{$order->description}}</h1>


            <div class="satim d-flex flex-column align-items-center my-5">

                <h5 class="fw-bold mb-3">في حال واجهتم مشكلة في الدفع SATIM</h5>
                <img src="{{asset('images/numero-vert-satim.png')}}" class="w-25" alt="satim-green-number">

            </div>


        </div>




    </section>

@endsection

