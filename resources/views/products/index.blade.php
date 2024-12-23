@extends('template.app')


@section('title','المنتجات')




@section('content')

    <section class="products">


        <x-page-title>المنتجات</x-page-title>

        <div class="container-fluid my-5">

            <a href="{{route('products.create')}}" class="btn btn-lg btn-primary my-3">إضافة منتج</a>

            <x-alert />

            <x-table :headers="$headers" :rows="$rows" :actions="$actions"/>

        </div>

    </section>

@endsection

