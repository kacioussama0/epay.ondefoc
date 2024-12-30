@extends('template.app')


@section('title','الطلبات')




@section('content')

    <section class="orders">


        <x-page-title>الطلبات</x-page-title>

        <div class="container-fluid my-5">

            <x-table :headers="$headers" :rows="$rows" />

        </div>

        <div class="pagination d-flex justify-content-center">
            {{ $pagination->links() }}
        </div>

    </section>

@endsection

