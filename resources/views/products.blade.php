@extends('template.app')


@section('title','خدماتنا')

@section('styles')

    <style>


        .truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .card:not(.categories) {
            transition: .3s ease-in-out;
        }

        .card:hover:not(.categories) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px 0 var(--bs-primary-bg-subtle) !important;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            height: 50px;
            border-radius: 30px;
            padding-left: 35px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #888;
        }

    </style>

@endsection

@section('scripts')

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Isotope
            let grid = document.querySelector('.products');
            let iso = new Isotope(grid, {
                itemSelector: '.products-item',
                layoutMode: 'fitRows',
                originLeft: false
            });

            // Filter items on button click
            let filterButtons = document.querySelectorAll('.btn-group button');

            filterButtons.forEach(button => {
                button.addEventListener('click', function (event) {

                    filterButtons.forEach(value => {
                        value.classList.add('btn-outline-primary');
                        value.classList.remove('btn-primary');
                    })

                    event.target.classList.remove('btn-outline-primary');
                    event.target.classList.add('btn-primary');

                    let filterValue = this.getAttribute('data-filter');

                    iso.arrange({ filter: filterValue });
                });
            });
        });

    </script>

    <script>

        // const searchInput = document.querySelector('.search-input');
        // const productContainer = document.querySelector('.products');
        // const products = document.querySelectorAll('.products-item');
        //
        //
        // function filterProductByName(productName,searched) {
        //     return productName.includes(searched);
        // }
        //
        //
        // searchInput.oninput = function (e) {
        //
        //     iso.destroy()
        //
        //     let textValue = e.target.value;
        //
        //     const filtred = [];
        //
        //     products.forEach((product) => {
        //         const title = product.querySelector('h4').textContent;
        //         if(filterProductByName(title,textValue)) {
        //             const prod = product
        //             prod.style = null
        //             filtred.push(prod.outerHTML)
        //         }
        //     })
        //
        //
        //     productContainer.innerHTML = filtred
        //
        //
        //
        // }

    </script>


@endsection

@section('content')

    <x-page-title>الدفع الإلكتروني</x-page-title>

    <section class="products-content my-5">


        <div class="container">


            <div class="card rounded-5 overflow-hidden shadow-sm border-primary border-1 my-3 categories">


                <div class="card-header px-4">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="search-container">
                                <input type="text" class="form-control search-input" placeholder="البحث عن منتج أو خدمة">
                                <i class="bi bi-search search-icon"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <div class="btn-group btn-group-lg my-3 justify-content-center d-flex mb-5" role="group" aria-label="Products Filter Categories">
                        <button type="button" class="btn btn-primary"  data-filter="*">الكل</button>
                        @foreach($categories as $category)
                            <button type="button" class="btn btn-outline-primary" data-filter=".category-{{$category->id}}">{{$category->name}}</button>
                        @endforeach
                    </div>

                </div>

            </div>




            <div class="row gy-5 g-md-5 products">

                @foreach($products as $product)

                    <div class="col-md-6 col-xl-4  products-item category-{{$product->category->id}}">
                        <div class="card rounded-5 overflow-hidden shadow-sm border-primary border-1 ">
                            <div class="card-header border-primary p-0 position-relative">


                                @if($product->sale_price and ($product->reduction_rate < 100 and $product->reduction_rate > 0))
                                    <span class="badge text-bg-danger position-absolute end-0 top-0 rounded-pill mt-3 me-3 z-3" dir="ltr">- {{$product->reduction_rate}} %</span>
                                @endif
                                <img src="{{$product->image ? asset('storage/' . $product->image) : asset('images/logo-colored.svg')}}" alt="logo" class="object-fit-cover w-100 bg-primary-subtle" height="250" style="filter: grayscale({{isset($product->stock) && $product->stock == 0 ? 1 : 0}})">

                            </div>
                            <div class="card-body p-4">


                                <h4 class="fw-bolder text-truncate">{{$product->name}}</h4>
                                <h6 class="card-subtitle mb-2 badge bg-primary me-auto d-inline-block">{{$product->category->name}}</h6>

                                <p class="card-text text-secondary truncate-2-lines" style="min-height: 48px">{{$product->description}}</p>

                                <div class="price d-flex align-items-center justify-content-between">

                                     @isset($product->sale_price)
                                         <span class="fs-5 fw-bold me-2 text-success">{{ number_format($product->total_amount,2,'.','')}} د.ج </span>
                                         <del class="text-danger fs-5 fw-bold">{{ number_format($product->price,2,'.','')}} د.ج </del>
                                     @else
                                         <span class="fs-5 fw-bold">{{ number_format($product->total_amount,2,'.','')}} د.ج </span>
                                     @endisset
                                 </div>
                            </div>


                            <div class="card-footer pb-3 bg-transparent border-0 d-flex justify-content-between align-items-center">

                                @if(isset($product->stock) && $product->stock == 0)
                                    <a href="#" style="width: 40px;height: 40px" class="stretched-link text-decoration-none btn rounded-circle p-2 d-inline-flex justify-content-center align-items-center btn-dark">
                                        <i class="bi bi-bag"></i>
                                    </a>

                                @else


                                    <a href="{{url('/products/' . $product->slug)}}" style="width: 40px;height: 40px" class="stretched-link text-decoration-none btn rounded-circle p-2 d-inline-flex justify-content-center align-items-center btn-primary">
                                        <i class="bi bi-bag"></i>
                                    </a>

                                @endif

                                @if(!isset($product->stock))
                                    <span class="text-bg-success rounded-5 p-2 f fw-bolder">
                                        <i class="bi bi-bookmark-check-fill me-1"></i>
                                        متاح
                                    </span>
                                @elseif(isset($product->stock) and $product->stock > 0)


                                    <span class="text-bg-warning rounded-5 p-2 fw-bolder">
                                          <i class="bi bi-person-arms-up me-1"></i>
                                          {{$product->stock}}
                                          مقعد
                                    </span>



                                @else


                                    <span class="text-bg-danger rounded-5 p-2  fw-bolder">
                                        <i class="bi bi-x-octagon-fill me-1"></i>
                                        غير متاح
                                    </span>

                                @endif

                            </div>


                        </div>
                    </div>

                @endforeach

            </div>


        </div>


    </section>


@endsection

