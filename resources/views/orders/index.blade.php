@extends('template.app')


@section('title','الطلبات')




@section('content')

    <section class="orders">


        <x-page-title>الطلبات</x-page-title>

        <div class="container-fluid my-5">

            <x-table :headers="['رقم الطلب','الإسم واللقب','البريد الإلكتروني','رقم الهاتف','المنتج','رقم المعاملة','تاريخ','حالة الطلب']" :rows="$orders" />

        </div>

    </section>

@endsection

