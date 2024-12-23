@extends('template.app')


@section('title','إضافة منتج')




@section('content')

    <section class="products">


        <x-page-title>إضافة منتج جديد</x-page-title>

        <div class="container my-5">


            <div class="card">
                <div class="card-body p-4">

                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <x-form-input type="text" name="name" label="إسم المنتج" value="{{old('name')}}" required="true"/>
                        <x-form-input type="text" name="slug" label="الإسم اللطيف" value="{{old('slug')}}" />
                        <x-form-input type="text" name="sku" label="رمز المنتج" value="{{old('sku')}}" />
                        <x-form-input type="file" name="image" label="صورة المنتج" value="{{old('image')}}" />
                        <x-form-input type="select" name="category_id" :options="$categories" label="تصنيف المنتج" value="{{old('category_id')}}" required="true"/>
                        <x-form-input type="textarea" name="description" label="وصف المنتج" value="{{old('description')}}" />
                        <x-form-input type="number" name="price" label="سعر المنتج" value="{{old('price')}}" required="true" />
                        <x-form-input type="number" name="sale_price" label="سعر البيع" value="{{old('sale_price')}}"/>
                        <x-form-input type="number" min="0" max="100" name="tax_rate" label="نسبة الضريبة" value="{{old('tax_rate')}}"/>
                        <x-form-input type="number" name="stock" label="المخزون" value="{{old('stock')}}"/>
                        <x-form-input type="select" name="status" :options="$status" label="حالة المنتج" value="{{old('status')}}" required="true"/>
                        <button type="submit" class="btn btn-lg w-100 btn-primary">إضافة</button>

                    </form>


                </div>
            </div>


        </div>

    </section>

@endsection

