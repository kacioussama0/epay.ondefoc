@extends('template.app')


@section('title','فشل الدفع')


@section('content')

    <section class="payment-success">

        <div class="container my-5 py-5">

            <x-failed-mark/>

            <h1 class="fw-bolder text-danger my-5 display-3 text-center">{{$order->description}}</h1>


            <div class="satim d-flex flex-column align-items-center my-5">

                <h5 class="fw-bold mb-3">في حال واجهتم مشكلة في الدفع SATIM</h5>
                <img src="{{asset('images/numero-vert-satim.png')}}" class="w-25" alt="satim-green-number">

            </div>


        </div>




    </section>

@endsection

