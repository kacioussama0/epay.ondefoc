@extends('template.app')


@section('title','التصنيفات')




@section('content')

    <section class="products">


        <x-page-title>التصنيفات</x-page-title>

        <div class="container-fluid my-5">

            <a href="{{route('categories.create')}}" class="btn btn-lg btn-primary my-3">إضافة تصنيف</a>

            <x-alert />

            <x-table :headers="$headers" :rows="$rows" :actions="$actions"/>

        </div>

    </section>

@endsection

