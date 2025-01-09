<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#6D1A3D" />

    <link rel="icon" type="image/png" href="{{asset('/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('/favicon.svg')}}" />
    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/apple-touch-icon.png')}}" />
    <meta name="apple-mobile-web-app-title" content="Epay" />
    <link rel="manifest" href="{{asset('/site.webmanifest')}}" />

    <title>@yield('title') | {{config('app.name')}}</title>
    <meta name="description" content="استفد من منصة الدفع الإلكتروني المتوفرة على موقع الديوان الوطني للتكوين المتواصل. ادفع بأمان باستخدام بطاقتك البنكية أو بطاقة أحد أقاربك، مع خدمة متاحة على مدار الساعة لضمان معالجة سريعة لملفك.">
    <meta name="keywords" content="Ondefoc, VCAE, Epay,Epaiment,الدفع الإلكتروني,الديوان الوطني لتطوير التكوين المتواصل وترقيته">
    <meta name="author" content="Ondefoc">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url('/')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @if(!Request::is('products/*'))
    <meta property="og:title" content="@yield('title') | {{config('app.name')}}">
    <meta property="og:description" content="استفد من منصة الدفع الإلكتروني المتوفرة على موقع الديوان الوطني للتكوين المتواصل. ادفع بأمان باستخدام بطاقتك البنكية أو بطاقة أحد أقاربك، مع خدمة متاحة على مدار الساعة لضمان معالجة سريعة لملفك.">
    <meta property="og:image" content="{{asset('images/logo-colored.png')}}">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') | {{config('app.name')}}">
    <meta name="twitter:description" content="استفد من منصة الدفع الإلكتروني المتوفرة على موقع الديوان الوطني للتكوين المتواصل. ادفع بأمان باستخدام بطاقتك البنكية أو بطاقة أحد أقاربك، مع خدمة متاحة على مدار الساعة لضمان معالجة سريعة لملفك.">
    <meta name="twitter:image" content="{{asset('images/logo-colored.png')}}">
    @endif
    @include('template.styles')
    @yield('meta')
    @yield('styles')

</head>
<body>

    @if(!Request::is('payment/*'))
        <x-loader/>
    @endif

    @include('template.header')

    <main>

        @yield('content')

    </main>


    @include('template.footer')

    @include('template.scripts')

    @yield('scripts')
</body>
</html>
