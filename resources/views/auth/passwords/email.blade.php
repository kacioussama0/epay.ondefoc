@extends('template.app')


@section('title','إستعادة كلمة المرور')


@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center my-5" style="height: calc(100vh - 91px - 400px )">

            <div class="col-md-8">
                <div class="card border-0 shadow">

                    <div class="card-header text-bg-primary">إستعادة كلمة المرور</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row g-0 align-items-center">

                            <div class="col-md-5">
                                <img src="{{asset('images/login.svg')}}" alt="login" class="img-fluid">

                            </div>

                            <div class="col-md-7">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <x-form-input type="text" name="email" label="البريد الإلكتروني" value="{{old('email')}}" required="true"/>

                                    <button type="submit" class="btn btn-primary w-100">
                                        إرسال
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

