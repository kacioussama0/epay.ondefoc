@extends('template.app')


@section('title','إضافة تصنيف')




@section('content')

    <section class="products">


        <x-page-title>إضافة تصنيف جديد</x-page-title>

        <div class="container my-5">


            <div class="card">
                <div class="card-body p-4">

                    <form action="{{route('categories.store')}}" method="post">

                        @csrf

                        <x-form-input type="text" name="name" label="إسم المنتج" value="{{old('name')}}" required="true"/>
                        <x-form-input type="text" name="slug" label="الإسم اللطيف" value="{{old('slug')}}" />
                        <button type="submit" class="btn btn-lg w-100 btn-primary">إضافة</button>

                    </form>


                </div>
            </div>


        </div>

    </section>

@endsection

