<header class="{{Request::url() == url('/') ? 'shadow-sm ' : ''}} position-{{Request::url() == url('/') ? 'fixed' : 'sticky'}}  w-100 top-0 z-4">

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm  py-2 {{Request::url() == url('/') ? " bg-transparent" : "bg-primary"}}">
        <div class="container">
            <a class="navbar-brand text-sm-center" href="{{url('/')}}">
                <img src="{{asset('images/logo-white.svg')}}" alt="" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-three-dots-vertical"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{Request::is('/') ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::is('products/*') ? 'active' : ''}}" href="{{url('products')}}">منتجاتنا</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::is('conditions') ? 'active' : ''}}" href="{{url('/conditions')}}">شروط الإستعمال</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::is('contact-us') == url('/') ? 'active' : ''}}" href="#">إتصل بنا</a>
                    </li>

                </ul>


                @auth

                    <div class="dropdown nav-item">
                        <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            لوحة التحكم
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('categories.index')}}">التصنيفات <i class="bi bi-bookmarks-fill"></i></a></li>
                            <li><a class="dropdown-item" href="{{route('products.index')}}">المنتجات</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('orders.index')}}">الطلبات</a></li>
                        </ul>
                    </div>

                    <form action="{{url('/logout')}}" method="post" onsubmit="return confirm('هل أنت متأكد ?')">
                        @csrf
                        <input type="submit" value="خروج" class="btn btn-light ms-3 rounded-pill px-5 py-2">
                    </form>
                @else
                    <a href="{{url('/login')}}" class="btn btn-primary  rounded-pill px-5 py-2">دخول</a>
                @endif

            </div>
        </div>
    </nav>
</header>
