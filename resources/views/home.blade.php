<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ondefoc | Epay</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="shadow-sm position-fixed w-100 top-0 z-4">

        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://cdn.ondefoc.dz/wp-content/uploads/2023/10/Capture_d_ecran_2023-10-18_003858-removebg-preview-1-300x73.png" alt="logo-ondefoc" height="65">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">إدفع الأن</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">شروط الإسنعمال</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">إتصل بنا</a>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary rounded-pill px-5 py-2">إدفع</a>

                </div>
            </div>
        </nav>
    </header>


    <main>

        <section class="landing-page d-flex flex-column justify-content-center align-items-center position-relative z-3 vh-100 overflow-hidden">



            <div class="video-overlay position-absolute top-50 start-50 translate-middle z-n1">
                <video  src="{{asset('videos/landing.mp4')}}" class="h-100 object-fit-cover vh-100  vw-100" autoplay muted loop></video>
            </div>

            <div class="overlay z-n1"></div>


            <div class="container text-center" data-aos="fade-up">

                <h1 class="mb-5 fw-bolder text-light">الدفع الإلكتروني في <span class="text-gradient">موقع الديوان الوطني لتطوير التكوين المتواصل</span> و ترقيته متوفر</h1>
                <p class="text-light w-75 mx-auto">قم بالدفع على موقع الديوان بكل أمان بإستعمال بطاقتك البنكية أو بطاقة أحد أقاربك. هذه المنصة متوفرة 7/7 أيام و 24/24 ساعة. و الدفع من خلالها يضمن معالجة ملفكم بسرعة.</p>
            </div>

        </section>

        <section class="bg-primary-subtle py-5">
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

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
