@extends('template.app')


@section('title','خطأ '  .   $code ?? 'غير معروف' )




@section('content')


    <section class="errors py-5">

        <div class="container text-center">

            <img src="{{asset('images/errors.svg')}}" class="w-50" alt="errors-image">

            <h1 class="display-1 fw-bolder text-primary mb-0"> عذرًا، حدث خطأ ({{ $code ?? 'N/A' }})</h1>
            <p class="mb-3 fs-4">{{ $message ?? 'حدث خطأ أثناء معالجة طلبك. يرجى المحاولة مرة أخرى لاحقًا.' }}</p>
            <a href="{{ url('/') }}" class="btn btn-lg btn-dark">العودة إلى الصفحة الرئيسية</a>

        </div>

    </section>

@endsection

