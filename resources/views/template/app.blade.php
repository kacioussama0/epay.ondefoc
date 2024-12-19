<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileImage" content="https://ondefoc.dz/wp-content/uploads/2023/12/cropped-LOGO-ONDEFOC-2-270x270.png">
    <title>@yield('title') | {{config('app.name')}}</title>
    <link rel="icon" href="https://ondefoc.dz/wp-content/uploads/2023/12/cropped-LOGO-ONDEFOC-2-32x32.png" sizes="32x32">
    <link rel="icon" href="https://ondefoc.dz/wp-content/uploads/2023/12/cropped-LOGO-ONDEFOC-2-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="https://ondefoc.dz/wp-content/uploads/2023/12/cropped-LOGO-ONDEFOC-2-180x180.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @include('template.styles')
    @yield('meta')
    @yield('styles')
</head>
<body>

    @include('template.header')

    <main>

        @yield('content')

    </main>


    @include('template.footer')

    @include('template.scripts')

</body>
</html>
