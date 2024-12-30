@extends('template.app')


@section('title','تغيير كلمة المرور')


@section('content')

<div class="container">
        <div class="row justify-content-center align-items-center my-5" style="height: calc(100vh - 91px - 400px )">

            <div class="col-md-8">
                <div class="card border-0 shadow">

                    <div class="card-header text-bg-primary">تغيير كلمة المرور</div>

                    <div class="card-body">


                        <div class="row g-0 align-items-center">

                            <div class="col-md-5">
                                <img src="{{asset('images/login.svg')}}" alt="login" class="img-fluid">

                            </div>

                            <div class="col-md-7">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <span class="d-none">
                                         <x-form-input type="text" name="email" label="البريد الإلكتروني" value="{{old('email',$email)}}" required="true"/>
                                    </span>
                                    <x-form-input type="password" name="password" label="كلمة السر" value="{{old('password')}}" required="true"/>
                                    <x-form-input type="password" name="password_confirmation" label="تأكيد كلمة السر" value="{{old('password_confirmation')}}" required="true"/>
                                    <button type="submit" class="btn btn-primary w-100">
                                        تغيير
                                    </button>


                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
