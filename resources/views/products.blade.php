@extends('template.app')


@section('title','المنتجات')

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

            <div class="row g-4 products">

                @foreach($products as $product)

                    <div class="col-lg-4 products-item category-{{$product->category->id}}">
                        <div class="card text-center rounded-4 border-0 shadow p-4">
                            <div class="card-body">

                                <img src="{{$product->image ? asset('storage/' . $product->image) : asset('images/Ondefoc Purple.svg')}}" alt="logo" class="object-fit-contain w-100" height="250">

                                <h3 class="card-title text-truncate">{{$product->name}}</h3>
                                <h6 class="card-subtitle mb-4 badge bg-dark">{{$product->category->name}}</h6>
                                <br>

                                <i class="bi bi-cash text-success fs-5 me-1"></i>

                                @isset($product->sale_price)
                                    <span class="text-success mb-5 fs-5 fw-bold me-2">{{ number_format($product->sale_price,2,'.','')}} د.ج </span>
                                    <del class="text-danger mb-5 fs-5 fw-bold">{{ number_format($product->price,2,'.','')}} د.ج </del>
                                @else
                                    <span class="text-success mb-5 fs-5 fw-bold">{{ number_format($product->price,2,'.','')}} د.ج </span>
                                @endisset
                                <br>
                                <br>

                                <h4 class="mb-4"><i class="bi bi-calculator me-1"></i>غير شامل الضريبة</h4>

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

