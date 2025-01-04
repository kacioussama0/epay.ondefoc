@extends('template.app')


@section('title','المنتجات')

@section('scripts')

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script>

        const elem = document.querySelector('.products');
        const iso = new Isotope( elem, {
            // options
            itemSelector: '.products-item',
            layoutMode: 'fitRows'
        });

        // element argument can be a selector string
        //   for an individual element
        const iso = new Isotope( '.grid', {
            // options
        });

    </script>


@endsection

@section('content')

    <x-page-title>المنتجات</x-page-title>

    <section class="products-content my-5">


        <div class="container">


            <div class="btn-group btn-group-lg my-3" role="group" aria-label="Products Filter Categories">
                <button type="button" class="btn btn-primary">الكل</button>
                @foreach($categories as $category)
                    <button type="button" class="btn btn-outline-primary">{{$category->name}}</button>
                @endforeach

            </div>

            <div class="row g-4 products">

                @foreach($products as $product)

                    <div class="col-lg-4 products-item">
                        <div class="card text-center rounded-4 border-0 shadow p-4">
                            <div class="card-body">

                                <img src="{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}" alt="logo" class="object-fit-contain w-100" height="250">

                                <h3 class="card-title text-truncate">{{$product->name}}</h3>
                                <h6 class="card-subtitle mb-4 badge bg-dark">{{$product->category->name}}</h6>
                                <br>

                                @isset($product->sale_price)
                                    <span class="text-success mb-5 fs-4 fw-bold me-2">{{ number_format($product->sale_price,2,'.','')}}د.ج </span>
                                    <del class="text-danger mb-5 fs-4 fw-bold">{{ number_format($product->price,2,'.','')}}د.ج </del>
                                @else
                                    <span class="text-success mb-5 fs-4 fw-bold">{{ number_format($product->price,2,'.','')}} د.ج </span>
                                @endisset
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

