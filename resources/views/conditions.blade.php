@extends('template.app')


@section('title','شروط الإستعمال')


@section('content')

    <x-page-title>شروط الإستعمال</x-page-title>

    <section class="conditions-content my-5">


        <div class="container">


            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{asset('images/conditions.svg')}}" alt="illustration-conditions" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <p class="mb-5 fs-2 lh-lg text-lg-start text-center">تعد هذه الشروط العامة لدفع رسوم التسجيل و/أو الرسوم الدراسية و/أو رسوم التدريب هي الشروط الأدنى التي تطلبها البنك من التاجر الإلكتروني إدراجها على موقعه والتي يجب على المستخدم الاطلاع عليها والاعتراف بها وقبولها. ولن يتمكن المستخدم من إتمام عملية الدفع إلا إذا وافق على هذه الشروط.</p>
                </div>
            </div>

            <div class="accordion" id="accordionConditions">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            مقدمة
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            تنظم الشروط العامة للدفع عبر الإنترنت جميع المعاملات الإلكترونية التي تتم على موقع www.ondofoc.dz. أي دفع يتم على هذا الموقع يستلزم قبول المستخدم غير المشروط وغير القابل للإلغاء لهذه الشروط.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            الهدف
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            هذا العقد هو عقد عن بُعد يهدف إلى تحديد حقوق وواجبات الأطراف في إطار الدفع عبر الإنترنت لمؤسسة Ondefoc عبر موقعها الإلكتروني www.ondofoc.dz.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            التعريفات
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            فيما يلي تعريفات المصطلحات التي يتم استخدامها في العقد:

                            <ol>
                                <li>الطلب: هو الفعل الذي يلتزم بموجبه المشتري الإلكتروني بشراء المنتجات و/أو الخدمات التي تقدمها Ondefoc.</li>
                                <li>طلبية: هو المستند الذي يحتوي على ملخص للمنتجات التي طلبها المشتري الإلكتروني ويجب توقيعه من قبله عبر "نقرة مزدوجة" للالتزام بالشراء والدفع.</li>
                                <li>عقد عن بُعد: هو أي عقد يتضمن منتجات أو خدمات بين Ondefoc والمشتري الإلكتروني في إطار نظام بيع أو تقديم خدمات عن بُعد من خلال الإنترنت.</li>
                                <li>إيصال الدفع: هو الإيصال الإلكتروني الذي يثبت عملية الدفع التي تمت.</li>
                                <li>المشتري الإلكتروني: هو العميل الذي يستخدم بطاقة الدفع CIB أو EDAHABIA لدفع الرسوم أو شراء خدمة أو منتج عبر الإنترنت.</li>
                                <li>التاجر الإلكتروني: Ondefoc الذي يستخدم خدمة الدفع الآمن عبر الإنترنت.</li>
                            </ol>

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            طريقة الدفع
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            يضمن المشتري الإلكتروني أن بطاقة CIB أو EDAHABIA تحتوي على رصيد كافٍ لتغطية الدفع. من أجل الحد من مخاطر الاحتيال وحماية مصالح المشتري الإلكتروني، قد يقوم التاجر الإلكتروني بالتحقق من صحة عمليات الدفع باستخدام بطاقة CIB أو EDAHABIA على الموقع. بناءً على هذا التحقق، يحق للتاجر قبول أو رفض الطلب.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            السعر/المبلغ
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            تتم المعاملات المالية بالدينار الجزائري (DZD).
                        </div>
                    </div>
                </div>



                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            إلغاء الطلب المدفوع عبر بطاقة CIB أو EDAHABIA
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            يمكن إلغاء الطلب في أي وقت قبل تأكيده من قبل المشتري الإلكتروني.
                        </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            الاسترداد
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            لا يتم استرداد رسوم التقديم تحت أي ظرف من الظروف، سواء تم قبول الطلب أو رفضه.
                            بمجرد إصدار القبول، يجب دفع الدفعة الأولى من الرسوم الدراسية لصالح Ondefoc قبل بدء الدروس. هذا الدفع يؤكد التسجيل.</div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            سرية البيانات وحماية المشتري الإلكتروني
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            البيانات المطلوبة من المشتري الإلكتروني ضرورية لمعالجة الدفع وتتم معالجتها بسرية تامة.
                            تظل جميع البيانات المتعلقة بالمشتري الإلكتروني ومعاملاته على الموقع الإلكتروني سرية تمامًا.
                        </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            الشروط العامة
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            <ul>
                                <li>يجب على المستخدم أن يؤكد أنه يبلغ من العمر 18 عامًا على الأقل لاستخدام الخدمة</li>
                                <li>يجب على المستخدم أن يكون صاحب الحق في استخدام بطاقة CIB أو EDAHABIA التي يقدمها على موقع Ondefoc</li>
                                <li>يجب على المستخدم تقديم جميع البيانات المطلوبة قبل تأكيد الطلب</li>
                                <li>يجب على المستخدم تقديم الوثائق التي تثبت عملية الشراء (إيصال الدفع الإلكتروني، كشف الحساب البنكي أو CCP) عند طلب Ondefoc</li>
                                <li>يمكن للمستخدم إلغاء الطلب في أي وقت قبل تأكيده النهائي.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            مدة الشروط العامة
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            تدخل الشروط العامة حيز التنفيذ عند قبول المشتري الإلكتروني لها وتظل سارية حتى قبول المشتري للبضاعة أو الخدمة.
                        </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseTen">
                            القانون المعمول به
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionConditions">
                        <div class="accordion-body">
                            تخضع هذه الشروط العامة للقانون الجزائري.
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </section>


@endsection

