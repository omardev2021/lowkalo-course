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


<div class="max-w-md w-full  p-8 rounded mx-auto">
    <!-- Payment Success -->
    <div class="text-center flex justify-center mb-8">
        <img src="{{asset('fail.png')}}" width="300">

    </div>
    <div class="text-center  justify-center mb-8">
        <h2 class="text-xl font-semibold text-gray-800">فشلت عملية الدفع</h2>
        <p class="text-gray-600 mb-10">الرجاء التحقق من بيانات وسيلة الدفع والمحاولة مرة اخرى</p>
        <a href="{{route('home')}}"  class="w-full bg-[#4215BA]  text-white p-5 mt-10 rounded-md font-bold hover:bg-indigo-600 transition duration-300">العودة للصفحة الرئيسية</a>

    </div>
    <!-- Payment Failure -->
    <!--
    <div class="text-center mb-8">
        <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <h2 class="text-xl font-semibold text-gray-800">Payment Failed</h2>
        <p class="text-gray-600">Sorry, we were unable to process your payment.</p>
    </div>
    -->
    <!-- Common Section -->

</div>


{{--<footer class="bg-[#541BF1] text-black py-6 text-center">--}}
{{--    <p class="text-white">كل الحقوق محفوظة © لوكالو</p>--}}
{{--</footer>--}}
</body>
</html>
