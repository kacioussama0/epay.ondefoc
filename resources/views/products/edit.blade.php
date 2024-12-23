@extends('template.app')


@section('title','تعديل منتج')




@section('content')

    <section class="products">


        <x-page-title>تعديل منتج</x-page-title>

        <div class="container my-5">


            <div class="card">
                <div class="card-body p-4">

                    <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <x-form-input type="text" name="name" label="إسم المنتج" value="{{old('name',$product->name)}}" required="true"/>
                        <x-form-input type="text" name="slug" label="الإسم اللطيف" value="{{old('slug',$product->slug)}}" />
                        <x-form-input type="text" name="sku" label="رمز المنتج" value="{{old('sku',$product->sku)}}" />
                        <x-form-input type="file" name="image" label="صورة المنتج" value="{{old('image',$product->image)}}" />
                        <img src="{{asset('storage/' . $product->image)}}" alt="image-product-{{$product->slug}}" width="150" class="mb-3">
                        <x-form-input type="select" name="category_id" :options="$categories" label="تصنيف المنتج" value="{{old('category_id',$product->category_id)}}" required="true"/>
                        <x-form-input type="textarea" name="description" label="وصف المنتج" value="{{old('description',$product->description)}}" />
                        <x-form-input type="number" name="price" label="سعر المنتج" value="{{old('price',$product->price)}}" required="true" />
                        <x-form-input type="number" name="sale_price" label="سعر البيع" value="{{old('sale_price',$product->sale_price)}}"/>
                        <x-form-input type="number" min="0" max="100" name="tax_rate" label="نسبة الضريبة" value="{{old('tax_rate',$product->tax_rate)}}"/>
                        <x-form-input type="number" name="stock" label="المخزون" value="{{old('stock',$product->stock)}}"/>
                        <x-form-input type="select" name="status" :options="$status" label="حالة المنتج" value="{{old('status',$product->status)}}" required="true"/>
                        <button type="submit" class="btn btn-lg w-100 btn-primary">تعديل</button>

                    </form>


                </div>
            </div>


        </div>

    </section>

@endsection

