<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>لوكالو : دورة إدارة المخزون للمطاعم والكافيهات للمبتدئين</title>
        <meta name="theme-color" content="#4215ba" />
        <link rel="icon" href="{{asset('icon.png')}}" />


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">
        <link href="{{asset('styles.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


        @vite('resources/css/app.css')

    </head>
    <body class="bg-[#F3F4FF]" dir="rtl">
    <nav class="flex flex-row justify-between items-center px-10 py-4  " id="">
        <div>
            <!-- Add any additional navigation links here -->
        </div>
        <div>
            <img src="{{asset('low-logo.png')}}" width="250">
        </div>
        <div>
            <!-- Add any additional navigation links here -->
        </div>
    </nav>

    <div class="flex flex-col-reverse md:flex-row p-10">



        <div class="md:w-1/4 relative">
<h1 class="text-4xl font-bold md:mt-[350px] leading-relaxed ">دورة إدارة المخزون<br /> للمطاعم والكافيهات<br /> للمبتدئين.</h1>
            <a href="#scroll-target" class="scroll-btn mr-[250px] mt-20" onclick="smoothScroll(event)">
                <i class="fas fa-arrow-down"></i>
            </a>
        </div>

        <div class="md:w-3/4">
            <img src="{{asset('main.png')}}">
        </div>

    </div>

    <div class="p-5">
        <h1 class="text-center text-2xl md:text-4xl font-bold ">حضر الدورة موظفيين من الشركات الاتية</h1>
        <div class="flex flex-row justify-center items-center mt-10 p-10 space-x-5"> <!-- Added space-x class -->
            <div class="w-1/4 flex justify-center">
                <img width="150" src="{{asset('foodics-logo.svg')}}">
            </div>
            <div class="w-1/4 flex justify-center ">
                <img width="150"  src="{{asset('supy-logo.svg')}}">
            </div>
            <div class="w-1/4 flex justify-center">
                <img width="150" src="{{asset('bufflo-logo.png')}}">
            </div>
        </div>
    </div>

    <div class="p-5 text-center justify-center bg-[#D9D9D9] mt-10" id="scroll-target">
        <h1 class="text-center text-4xl font-bold">عن الدورة</h1>
        <p class="p-10 text-lg max-w-2xl md:max-w-4xl text-center mx-auto">
            من أهم العناصر الموجودة في أي مطعم وتعد العصب الرئيسي لنجاح المطاعم والكافيهات هي معرفة تكاليف وحركة مواد المخزون للمنتجات. من خلال عملي على تطوير العديد من المطاعم والكافيهات ومقابلتي للعديد من رواد الاعمال في هذا المجال ، عملية إدارة المخزون لاتنال الاهتمام الكافي وخاصة عمليات الهدر الحاصلة في المطعم.
        </p>

    </div>

    <div class="flex flex-col md:flex-row p-10">


        <div class="w-1/2 w-full md:p-20">
        <h1 class="font-bold text-3xl text-[#113441] mb-10">لمن هذا الدورة</h1>
            <ul class="list-disc">
                <li class="mb-3 text-lg">ملاك المطاعم والكافيهات، الصغيرة والمتوسطة الحجم.

                </li>

                <li class="mb-3 text-lg">للمدراء والموظفين في قطاع المطاعم والكافيهات.

                </li>

                <li class="mb-3 text-lg">الموظفين في شركات التقنية التي تخص قطاع المطاعم والكافيهات.
                </li>

                <li class="mb-3 text-lg">الاشخاص المهتمين في دخول مجال إدارة المطاعم والكافيهات.
                </li>

            </ul>
        </div>

        <div class="w-1/2 w-full md:p-10 ">
            <img alt="course vector" src="{{asset('app.png')}}">
        </div>
    </div>
    <div class="p-5">
        <div class="flex flex-col md:flex-row justify-center items-center mt-10 p-10">
            <div class="w-full md:w-1/4 flex flex-col items-center justify-center mb-5">
                <img width="150" alt="video-icon" class="mb-3" src="{{asset('video-icon.png')}}">
                <h2 class="text-center">فديوهات مسجلة</h2>
            </div>
            <div class="w-full md:w-1/4 flex flex-col items-center justify-center mb-5">
                <img width="150" alt="levels-icon" class="mb-3" src="{{asset('levels-icon.png')}}">
                <h2 class="text-center">كل المستويات</h2>
            </div>
            <div class="w-full md:w-1/4 flex flex-col items-center justify-center mb-5">
                <img width="150" alt="cafe-icon" class="mb-3" src="{{asset('cafe-logo.png')}}">
                <h2 class="text-center">قطاع الكافيهات والمطاعم</h2>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row justify-center items-center gap-5 p-10 text-center bg-[#4215BA] mt-10">
        <h1 class="text-center text-4xl font-bold text-white">سجل الأن واستفيد من خصم التسجيل المبكر</h1>
        <div class="w-40 h-40 border border-full rounded-full bg-white">
            <h2 class="mt-10 text-lg text-[#4215BA] line-through font-bold">1299 ر.س</h2>
            <h2 class="text-lg">الان</h2>
            <h2 class="text-lg text-[#4215BA] font-bold">299 ر.س</h2>
        </div>



    </div>

    <div class="flex flex-col md:flex-row p-10 ">
        <div class="w-full mb-3 md:w-1/2 flex justify-center md:justify-start">
            <img src="{{asset('mohammed.jpeg')}}" width="500">
        </div>
        <div class="w-full md:w-1/2 text-center md:text-right">
            <h1 class="font-bold text-3xl text-[#113441] mb-3 ">مقدم الدورة</h1>
            <h1 class="text-xl text-[#113441] mb-3">محمد الشريف</h1>
            <p>خبير في قطاع المطاعم والكافيهات وفي ادارة المخزون خبير في قطاع المطاعم والكافيهات وفي ادارة المخزون خبير في قطاع المطاعم والكافيهات وفي ادارة المخزون خبير في قطاع المطاعم والكافيهات وفي ادارة المخزون خبير في قطاع المطاعم والكافيهات وفي ادارة المخزون</p>
        </div>
    </div>

    <div class="flex justify-center items-center p-10 mt-10">
        <div class="max-w-2xl w-full bg-white rounded-lg shadow-md p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">سجل الآن واحصل على التخفيض</h1>
            <form class="flex flex-col gap-4">
                <input type="text" placeholder="الاسم" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" />
                <input type="email" placeholder="البريد الإلكتروني" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" />
                <input type="tel" placeholder="رقم الهاتف" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" />
                <button type="submit" class="w-full bg-[#4215BA] text-white py-2 rounded-md font-bold hover:bg-indigo-600 transition duration-300">تسجيل</button>
            </form>
        </div>
    </div>
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">الاسئلة الشائعة</h1>

        <div class="accordion">
            <!-- FAQ Item 1 -->
            <div class="accordion-item">
                <input type="checkbox" id="faq1" class="accordion-toggle">
                <label for="faq1" class="accordion-title">
                    متى ينتهي التخفيض ؟
                </label>
                <div class="accordion-content">
                    مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثالمثال مثال مثال مثال مثال مثال مثالمثال مثال مثال مثال مثال مثال مثال                </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="accordion-item">
                <input type="checkbox" id="faq2" class="accordion-toggle">
                <label for="faq2" class="accordion-title">
                   هل الدورة حضورية ام اون لاين ؟
                </label>
                <div class="accordion-content">
مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثالمثال مثال مثال مثال مثال مثال مثالمثال مثال مثال مثال مثال مثال مثال                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="accordion-item">
                <input type="checkbox" id="faq3" class="accordion-toggle">
                <label for="faq3" class="accordion-title">
                    ماهي وسائل الدفع ؟
                </label>
                <div class="accordion-content">
                    مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثال مثالمثال مثال مثال مثال مثال مثال مثالمثال مثال مثال مثال مثال مثال مثال                </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-[#541BF1] text-black py-6 text-center">
   <p class="text-white">كل الحقوق محفوظة © لوكالو</p>
    </footer>
    <script>
        function smoothScroll(event) {
            event.preventDefault();
            const targetId = event.currentTarget.getAttribute('href').substring(1);
            const target = document.getElementById(targetId);
            if (target) {
                window.scrollTo({
                    top: target.offsetTop,
                    behavior: 'smooth'
                });
            }
        }
    </script>
    </body>


</html>
