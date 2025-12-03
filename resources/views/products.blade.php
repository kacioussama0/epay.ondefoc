@extends('template.app')


@section('title','خدماتنا')

@section('styles')

    <style>


        .truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .card {
            transition: .3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px 0 var(--bs-primary-bg-subtle) !important;
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


@endsection

@section('content')

    <x-page-title>المنتجات</x-page-title>

    <section class="products-content my-5">


        <div class="container">


            <div class="btn-group btn-group-lg my-3 justify-content-center d-flex mb-5" role="group" aria-label="Products Filter Categories">
                <button type="button" class="btn btn-primary"  data-filter="*">الكل</button>
                @foreach($categories as $category)
                    <button type="button" class="btn btn-outline-primary" data-filter=".category-{{$category->id}}">{{$category->name}}</button>
                @endforeach
            </div>

            <div class="row g-5 products">

                @foreach($products as $product)

                    <div class="col-md-6 col-lg-4  products-item category-{{$product->category->id}}">
                        <div class="card rounded-5 overflow-hidden shadow-sm border-primary border-1 " style="background-image: url("{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}")">
                            <div class="card-header border-primary p-0 position-relative">

                                <span class="badge text-bg-danger position-absolute end-0 top-0 rounded-pill mt-3 me-3" dir="ltr">- {{$product->reduction_rate}} %</span>

                                <img src="{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}" alt="logo" class="object-fit-cover w-100" height="250">

                            </div>
                            <div class="card-body p-4">


                                <h4 class="fw-bolder text-truncate">{{$product->name}}</h4>
                                <h6 class="card-subtitle mb-4 badge bg-dark me-auto d-inline-block">{{$product->category->name}}</h6>

                                <p class="card-text text-secondary truncate-2-lines">{{$product->description}}</p>



                                 <div class="price d-flex align-items-center justify-content-between">

                                     @isset($product->sale_price)
                                         <span class="fs-5 fw-bold me-2 text-success">{{ number_format($product->sale_price,2,'.','')}} د.ج </span>
                                         <del class="text-danger fs-5 fw-bold">{{ number_format($product->price,2,'.','')}} د.ج </del>
                                     @else
                                         <span class="fs-5 fw-bold">{{ number_format($product->price,2,'.','')}} د.ج </span>
                                     @endisset

                                 </div>


                                    {{--                                <h4 class="mb-4"><i class="bi bi-calculator me-1"></i>دون احتساب الضريبة</h4>--}}

                            </div>


                            <div class="card-footer pb-3 bg-transparent border-0 d-flex justify-content-end align-items-center">

                                <a href="{{url('/products/' . $product->slug)}}" style="width: 40px;height: 40px" class="stretched-link text-decoration-none btn rounded-circle p-2 d-inline-flex justify-content-center align-items-center btn-primary">
                                    <i class="bi bi-bag"></i>
                                </a>

                            </div>


                        </div>
                    </div>

                @endforeach

            </div>


        </div>


    </section>


@endsection

