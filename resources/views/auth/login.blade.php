@extends('template.app')


@section('title','تسجيل الدخول')


@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center my-5" style="height: calc(100vh - 91px - 400px )">

        <div class="col-md-8">
            <div class="card border-0 shadow">

                <div class="card-header text-bg-primary">تسجيل الدخول</div>

                <div class="card-body">

                   <div class="row g-0 align-items-center">

                       <div class="col-md-5">
                           <img src="{{asset('images/login.svg')}}" alt="login" class="img-fluid">

                       </div>

                       <div class="col-md-7">
                           <form method="POST" action="{{ route('login') }}">
                               @csrf

                               <x-form-input type="text" name="email" label="البريد الإلكتروني" value="{{old('email')}}" required="true"/>
                               <x-form-input type="password" name="password" label="كلمة السر" value="{{old('password')}}" required="true"/>

                               <button type="submit" class="btn btn-primary w-100">
                                   دخول
                               </button>


                               @if (Route::has('password.request'))
                                   <a class="btn btn-link" href="{{ route('password.request') }}">
                                       هل نسيت كلمة السر ?
                                   </a>
                               @endif


                           </form>

                       </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
