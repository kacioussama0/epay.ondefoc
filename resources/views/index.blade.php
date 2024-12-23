@extends('template.app')


@section('title','الرئيسية')


@section('content')

    <section class="landing-page d-flex flex-column justify-content-center align-items-center position-relative z-3 vh-100 overflow-hidden">


        <div class="video-overlay position-absolute top-50 start-50 translate-middle z-n1">
            <video  src="{{asset('videos/landing.mp4')}}" class="h-100 object-fit-cover vh-100  vw-100" autoplay muted loop></video>
        </div>

        <div class="overlay z-n1"></div>


        <div class="container text-center" data-aos="fade-up">

            <h1 class="mb-4 fw-bolder text-light display-4 lh-base">الدفع الإلكتروني في <span class="text-gradient">موقع الديوان الوطني لتطوير التكوين المتواصل</span> و ترقيته متوفر</h1>
            <p class="text-light w-75 mx-auto mb-4">قم بالدفع على موقع الديوان بكل أمان بإستعمال بطاقتك البنكية أو بطاقة أحد أقاربك. هذه المنصة متوفرة 7/7 أيام و 24/24 ساعة. و الدفع من خلالها يضمن معالجة ملفكم بسرعة.</p>
            <a href="{{url('/products')}}" class="btn btn-lg btn-primary rounded-pill px-5">إدفع الأن</a>
            <div class="d-flex align-items-center justify-content-center mt-4">
                <img src="{{asset('images/cib.svg')}}" alt="CIB" width="80" class="me-4">
                <img src="{{asset('images/AlgeriePoste.svg')}}" alt="Edahabia" width="80">
            </div>
        </div>

    </section>

    <section class="features py-5">

        <div class="container py-4">

            <h3 class="display-4 fw-bold text-center mb-3" data-aos="fade-right">قم بإجراء مدفوعاتك على موقعنا بسهولة وأمان.</h3>
            <p class="fs-4 text-center fw-light mb-5" data-aos="fade-right">لا ترغب في التنقل لدفع مستحقات الدورات أو الشهادات ؟ اكتشف هنا جميع الخطوات التي يجب اتباعها لإجراء المدفوعات عبر الإنترنت باستخدام بطاقة CIB أو الذهبية لبريد الجزائر.</p>


            <div class="row">

                <div class="col-md-4" data-aos="fade-right">
                    <img src="{{asset('images/online-cart.svg')}}" alt="" class="img-fluid mb-3">
                    <div class="d-flex align-items-center justify-content-center fw-bolder">
                        <span class="rounded-circle bg-primary text-light  fs-4 d-flex align-items-center justify-content-center text-center me-2" style="width: 40px;height: 40px">1</span>
                        <h6 class="fw-bold mb-0">واجهة عبر الإنترنت</h6>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-down">
                    <img src="{{asset('images/user-card.svg')}}" alt="" class="img-fluid mb-3">
                    <div class="d-flex align-items-center justify-content-center fw-bolder">
                        <span class="rounded-circle bg-primary text-light  fs-4 d-flex align-items-center justify-content-center text-center me-2" style="width: 40px;height: 40px">2</span>
                        <h6 class="fw-bold mb-0">رمز الأمان</h6>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-left">
                    <img src="{{asset('images/recu-enline.svg')}}" alt="" class="img-fluid mb-3">
                    <div class="d-flex align-items-center justify-content-center fw-bolder">
                        <span class="rounded-circle bg-primary text-light  fs-4 d-flex align-items-center justify-content-center text-center me-2" style="width: 40px;height: 40px">3</span>
                        <h6 class="fw-bold mb-0">إيصال الدفع</h6>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="bg-primary-subtle py-5" >
        <div class="container py-4">
            <h2 class="display-4 fw-bold text-center mb-3" data-aos="fade-down">شركائنا</h2>
            <p class="fs-4 text-center fw-light mb-5" data-aos="fade-right">شركاؤنا هم أساس نجاحنا، نعمل مع الأفضل لنقدم حلولاً مبتكرة بجودة عالية تلبي تطلعات عملائنا.</p>

            <div class="row g-3 my-5" data-aos="fade-up">


                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/11-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/6-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/20-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/5-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/14-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/8-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/15-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/22.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>



                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/16-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/1-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/3-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    <div class="card rounded-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.ondefoc.dz/wp-content/uploads/2024/01/7-1.png.webp" class="img-fluid" alt="logo-saidal">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


@endsection

