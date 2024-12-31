@extends('template.app')


@section('title','صفحة الدفع')



@section('content')

    <x-page-title>صفحة الدفع</x-page-title>
    <section class="payment-content">

        <div class="container">


                <div class="row g-5">

                    <div class="col-lg-6  d-flex justify-content-center align-items-center  py-5 ">
                        <img src="{{asset('images/Cartes_paiments.png')}}" alt="illustration payment" class="img-fluid">
                    </div>

                    <div class="col-lg-6 py-5">


                        <div class="card border-0 shadow">

                            <div class="card-body p-4">

                                <div class="d-flex align-items-center justify-content-between border-bottom pb-4 border-1 border-opacity-25 border-secondary mb-5">
                                    <span class="fs-3 fw-bold">{{$product->name}}</span>
                                    <span class="text-primary fs-2 fw-bold">{{number_format($product->price,2,'.','')}} دج </span>
                                </div>

                                <p class="my-3">{{$product->description}}</p>

                                <h3 class="mb-5">
                                    تفاصيل الزبون
                                </h3>

                                <form action="{{route('payment',$product->slug)}}" method="POST">
                                    @csrf
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label for="full_name">الإسم واللقب</label>
                                            <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}">
                                            @error('customer_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="full_name">الشركة (إختياري)</label>
                                            <input type="text" class="form-control"  name="customer_enterprise" value="{{old('customer_enterprise')}}">
                                            @error('customer_enterprise')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6">
                                            <label for="email">البريد الإلكتروني</label>
                                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6">

                                            <label for="full_name">رقم الهاتف</label>
                                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>


                                        <div class="col-md-12">
                                            <input type="checkbox" name="agreed" id="agreed" class="form-check-input" value="1" @checked(old("agreed"))>
                                            <label for="agreed" class="ms-1"> لقد قرأتُ <a href="{{url('/conditions')}}">الشروط والأحكام</a> وأوافق عليها لهذا الموقع <span class="text-danger">*</span></label>
                                            @error('agreed')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>


                                        <div class="g-recaptcha mt-3" data-sitekey="6LeyrZMqAAAAAHxqDz3uhMH7KNcR1LItx4uFXehB"></div>
                                        @error('g-recaptcha-response')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror


                                        <button type="submit" class="btn btn-primary">
                                            <img src="{{asset('images/cib.svg')}}" alt="CIB" width="30" class="ms-1">
                                            <img src="{{asset('images/AlgeriePoste.svg')}}" alt="Edahabia" width="30" class="me-3">
                                            تأكيد الدفع
                                        </button>

                                    </div>
                                </form>
                            </div>


                            <div class="card-footer bg-transparent">
                                <div class="satim d-flex flex-column align-items-center">
                                    <h5 class="fw-bold mb-3">في حال واجهتم مشكلة في الدفع SATIM</h5>
                                    <img src="{{asset('images/numero-vert-satim.png')}}" class="w-50" alt="satim-green-number">
                                </div>
                            </div>
                        </div>




                    </div>

                </div>


            </div>


    </section>

@endsection

