@extends('template.app')


@section('title','خطأ '  .   $code ?? 'غير معروف' )

@section('styles')

    <style>

        .errors {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-overlay {
            margin: 100px 0;
            width: 100%;
            height: 100vh;
            position: absolute;
            left: 50%;
            top:50%;
            transform: translate(-50%,-50%);
            z-index: -1;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center center;
            opacity: .4;
        }

    </style>

@endsection


@section('content')


    <section class="errors py-5">

        <div class="container text-center">

            <div class="img-overlay"   style="background-image: url('{{asset('images/errors.svg')}}')">

            </div>

            <h1 class="display-1 fw-bolder text-primary mb-0">{{ $code ?? 'N/A' }}</h1>
            <p class="mb-5 fs-2 text-secondary">{{ $message ?? 'حدث خطأ أثناء معالجة طلبك. يرجى المحاولة مرة أخرى لاحقًا.' }}</p>
            <a href="{{ url('/') }}" class="btn btn-lg btn-dark">العودة إلى الصفحة الرئيسية</a>

        </div>

    </section>

@endsection

