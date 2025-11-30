@extends('template.app')


@section('title','الدفع الإلكتروني')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>

        .swiper-image {
            height: 250px;
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

    </style>
@endsection

@section('content')


    <section class="landing-page d-flex flex-column justify-content-center align-items-center position-relative z-3 vh-100 overflow-hidden">


        <div class="video-overlay position-absolute top-50 start-50 translate-middle z-n1">
            <video  src="{{asset('videos/landing.mp4')}}" class="h-100 object-fit-cover vh-100  vw-100" autoplay muted loop></video>
        </div>

        <div class="overlay z-n1"></div>


        <div class="container text-center" data-aos="fade-up">

            <h1 class="mb-4 fw-bolder text-light display-4 lh-base">الدفع الإلكتروني في <span class="text-gradient">موقع الديوان</span> متوفر</h1>
            <p class="text-light w-75 mx-auto mb-4">قم بالدفع على موقع الديوان بكل أمان بإستعمال بطاقتك البنكية أو بطاقة أحد أقاربك. هذه المنصة متوفرة 7/7 أيام و 24/24 ساعة. و الدفع من خلالها يضمن معالجة ملفكم بسرعة.</p>
            <a href="{{url('/products')}}" class="btn btn-lg btn-primary rounded-pill px-5">إدفع الآن</a>
            <div class="d-flex align-items-center justify-content-center mt-4">
                <img src="{{asset('images/cib.svg')}}" alt="CIB" width="80" class="me-4">
                <img src="{{asset('images/AlgeriePoste.svg')}}" alt="Edahabia" width="80">
            </div>
        </div>

    </section>

    <section class="features py-5">

        <div class="container py-4">

            <h3 class="display-4 fw-bold text-center mb-3" >قم بإجراء مدفوعاتك على موقعنا بسهولة وأمان.</h3>
            <p class="fs-4 text-center fw-light mb-5" >لا ترغب في التنقل لدفع مستحقات الدورات أو الشهادات ؟ اكتشف هنا جميع الخطوات التي يجب اتباعها لإجراء المدفوعات عبر الإنترنت باستخدام بطاقة CIB أو الذهبية لبريد الجزائر.</p>


            <div class="row">

                @foreach($features as $key => $feature)
                    <div class="col-md-4" >
                        <img src="{{$feature['image']}}" alt="" class="img-fluid mb-3">
                        <div class="d-flex align-items-center justify-content-center fw-bolder">
                            <span class="rounded-circle bg-primary text-light  fs-4 d-flex align-items-center justify-content-center text-center me-2" style="width: 40px;height: 40px">{{$key + 1}}</span>
                            <h6 class="fw-bold mb-0">{{$feature['title']}}</h6>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section>

    <section class="bg-primary-subtle py-5" >
        <div class="container py-4">
            <h2 class="display-4 fw-bold text-center mb-3" data-aos="fade-down">الشبكة البنكية للدفع الإلكتروني</h2>
            <p class="fs-4 text-center fw-light mb-5" data-aos="fade-up">تدعم منصتنا الدفع الإلكتروني عبر شبكة البنوك المتصلة، مما يضمن تنفيذ المعاملات بسرعة وأمان، مع توفير خدمات التحويل والدفع عبر الإنترنت بشكل موثوق ومباشر.</p>

            <!-- Swiper -->
            <div class="swiper banks py-3 my-5" data-aos="fade-up">
                <div class="swiper-wrapper">

                    @foreach($banks as $bank)
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <img src="{{$bank['url']}}" alt="" height="100" class="object-fit-contain text-center">
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
    </section>



@endsection


@section('scripts')


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".banks", {


            loop: true,
            centeredSlides: true,

            autoplay: {
                delay: 1500,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 150,
                },
                530: {
                    slidesPerView: 'auto',
                }
            }
        });
    </script>


    <script>

        const navBar = document.querySelector('nav');
        const navBarBtn = document.querySelector('nav .btn');

        window.onscroll = ()=> {

            if(this.scrollY >= 1290) {
                navBar.classList.add('text-bg-primary');
                navBarBtn.classList.add('btn-light');
                navBarBtn.classList.remove('btn-primary');
                navBar.classList.remove('bg-transparent');
            }else {
                navBar.classList.add('bg-transparent');
                navBar.classList.remove('text-bg-primary');
                navBarBtn.classList.remove('btn-light');
                navBarBtn.classList.add('btn-primary');
            }
        }

    </script>

@endsection
