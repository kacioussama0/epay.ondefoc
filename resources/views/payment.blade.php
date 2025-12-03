@extends('template.app')


@section('title','صفحة الدفع')

@section('meta')

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{$product->name}}">
    <meta property="og:description" content="{{$product->description}}">
    <meta property="og:url" content="{{url('/products/' . $product->slug)}}">
    <meta property="og:image" content="{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}">
    <meta property="og:site_name" content="{{config('app.title')}}">
    <meta property="og:locale" content="{{config('app.locale')}}">

    <!-- Optional Open Graph Product Tags -->
    <meta property="product:price:amount" content="{{$product->sale_price ? number_format($product->sale_price,2,'.','') : number_format($product->price,2,'.','')}}">
    <meta property="product:price:currency" content="DZD">
    <meta property="product:availability" content="in stock"> <!-- Use "in stock", "out of stock", or "preorder" -->
    <meta property="product:brand" content="Ondefoc">
    <meta property="product:category" content="{{$product->category->name}}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$product->name}}">
    <meta name="twitter:description" content="{{$product->description}}">
    <meta name="twitter:image" content="{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}">

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "{{$product->name}}",
            "image": [
                "{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}"
            ],
            "description": "{{$product->description}}",
            "brand": {
                "@type": "Brand",
                "name": "Ondefoc"
            },
            "offers": {
                "@type": "Offer",
                "url": "{{url('/products/' . $product->slug)}}",
                "priceCurrency": "DZD",
                "price": "{{$product->sale_price ? number_format($product->sale_price,2,'.','') : number_format($product->price,2,'.','')}}",
                "availability": "https://schema.org/InStock"
            }
        }
    </script>

@endsection

@section('content')


    <section class="product-details">

        <div class="container">

            <div class="row my-5 g-md-5 gy-5 align-items-center text-md-start text-center">


                <div class="col-md-6">
                    <h2 class="mb-5 fw-bolder">{{$product->name}}</h2>
                    <p>{!!  nl2br($product->description)!!}</p>
                </div>

                <div class="col-md-6">
                    <img src="{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}" alt="product-{{$product->slug}}" class="object-fit-contain rounded-5 w-100">
                </div>


            </div>

        </div>

    </section>

    <hr>

    <section class="payment-content">

        <div class="container">


                <div class="row g-md-5 justify-content-center align-items-center">

                    <div class="col-lg-6   order-lg-0 order-1 text-center">
                        <img src="{{asset('images/Cartes_paiments.png')}}" alt="illustration payment" class="img-fluid">
                    </div>

                    <div class="col-lg-6 py-5">


                        <div class="card border-0 rounded-4 shadow">

                            <div class="card-header p-4 bg-transparent">

                                <h3 class="mb-4 fw-bold text-primary">
                                    تفاصيل الدفع
                                </h3>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->sale_price ? number_format($product->sale_price,2,'.','') : number_format($product->price,2,'.','')}} د.ج </td>
                                        </tr>


                                        <tr>
                                            <td>قيمة الضريبة TVA</td>
                                            <td>{{$product->tax_rate ?? 0}}%</td>
                                        </tr>

                                        <tr class="table-primary fs-5 fw-bold">
                                            <th>السعر الإجمالي</th>
                                            <td>{{$product->total_amount}} د.ج </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>


                            <div class="card-body p-4">


                                <h3 class="mb-4 fw-bold  text-primary">
                                    تفاصيل الزبون
                                </h3>

                                <form action="{{route('payment',$product->slug)}}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <x-form-input type="text" name="customer_name" label="الإسم واللقب" value="{{old('customer_name')}}" required="true"/>
                                        </div>

                                        <div class="col-md-6">
                                            <x-form-input type="text" name="customer_enterprise" label="الشركة (إختياري)" value="{{old('customer_enterprise')}}"/>
                                        </div>

                                        <div class="col-md-6">
                                            <x-form-input type="email" name="email" label="البريد الإلكتروني" value="{{old('email')}}"  required="true"/>
                                        </div>


                                        <div class="col-md-6">
                                            <x-form-input type="text" name="phone" label="رقم الهاتف" value="{{old('phone')}}"  required="true"/>
                                        </div>


                                        <div class="col-md-12">
                                            <input type="checkbox" name="agreed" id="agreed" class="form-check-input" value="1" @checked(old("agreed"))>
                                            <label for="agreed" class="ms-1"> لقد قرأتُ <a href="{{url('/conditions')}}">الشروط والأحكام</a> وأوافق عليها لهذا الموقع <span class="text-danger">*</span></label>
                                            @error('agreed')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>


                                        <div class="g-recaptcha my-3" data-sitekey="6LeyrZMqAAAAAHxqDz3uhMH7KNcR1LItx4uFXehB"></div>
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


            <script>



            </script>

    </section>

@endsection

