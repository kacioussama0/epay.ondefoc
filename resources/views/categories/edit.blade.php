@extends('template.app')


@section('title','تعديل تصنيف')




@section('content')

    <section class="products">


        <x-page-title>تعديل تصنيف</x-page-title>

        <div class="container my-5">


            <div class="card">
                <div class="card-body p-4">

                    <form action="{{route('categories.update',$category)}}" method="post">

                        @csrf
                        @method('PUT')

                        <x-form-input type="text" name="name" label="إسم المنتج" value="{{old('name',$category->name)}}" required="true"/>
                        <x-form-input type="text" name="slug" label="الإسم اللطيف" value="{{old('slug',$category->slug)}}" />
                        <button type="submit" class="btn btn-lg w-100 btn-primary">تعديل</button>

                    </form>


                </div>
            </div>


        </div>

    </section>

@endsection

