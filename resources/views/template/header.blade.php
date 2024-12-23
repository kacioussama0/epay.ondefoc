<header class="shadow-sm position-{{Request::url() == url('/') ? 'fixed' : 'sticky'}}  w-100 top-0 z-4">

    <nav class="navbar navbar-expand-lg {{Request::url() == url('/') ? "navbar-dark bg-transparent" : ""}}">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">

                @if(Request::url() == url('/'))
                    <img src="https://cdn.ondefoc.dz/wp-content/uploads/2023/10/Capture_d_ecran_2023-10-18_003858-removebg-preview-1-300x73.png" alt="logo-ondefoc" height="65">
                @else
                    <img src="https://ondefoc.dz/wp-content/uploads/2023/10/LOGO-ONDEFOC-1-1.png.webp" alt="logo-ondefoc" height="65">
                @endif

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{Request::url() == url('/') ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::url() == url('/products') ? 'active' : ''}}" href="{{url('products')}}">منتجاتنا</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::url() == url('/conditions') ? 'active' : ''}}" href="{{url('/conditions')}}">شروط الإستعمال</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::url() == url('/') ? '/contact-us' : ''}}" href="#">إتصل بنا</a>
                    </li>

                </ul>


                @auth
                    <form action="{{url('/logout')}}" method="post" onsubmit="return confirm('هل أنت متأكد ?')">
                        @csrf
                        <input type="submit" value="خروج" class="btn btn-primary rounded-pill px-5 py-2">
                    </form>
                @else
                    <a href="{{url('/login')}}" class="btn btn-primary rounded-pill px-5 py-2">دخول</a>
                @endif

            </div>
        </div>
    </nav>
</header>
