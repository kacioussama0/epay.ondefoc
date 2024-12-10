@extends('template.app')


@section('title','المنتجات')


@section('content')

    <x-page-title>المنتجات</x-page-title>

    <section class="products-content my-5">


        <div class="container">


            <div class="row">

                @foreach($products as $product)

                    <div class="col-md-4">
                        <div class="card text-center rounded-4 border-0 shadow p-4">
                            <div class="card-body">

                                <img src="https://ondefoc.dz/wp-content/uploads/2023/10/LOGO-ONDEFOC-1-1.png.webp" alt="logo" class="object-fit-contain w-100" height="250">

                                <h3 class="card-title text-truncate">{{$product->name}}</h3>
                                <h6 class="card-subtitle mb-2 badge bg-dark">{{$product->category->name}}</h6>
                                <p class="card-text">{{$product->description}}</p>
                                <span class="text-success mb-5 fs-3 fw-bold">{{$product->amount}} د.ج </span>

                                <br>
                                <br>

                                <a href="{{url('/products/' . $product->slug)}}" class="card-link btn btn-lg btn-primary w-100">
                                    <i class="bi bi-bag-fill me-2"></i>
                                    إدفع الأن
                                </a>


                            </div>
                        </div>
                    </div>

                @endforeach

            </div>


        </div>


    </section>


@endsection

