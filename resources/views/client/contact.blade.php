@php
    $setting = setting();
@endphp
@extends('layouts.client.index')
@section('seo')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ getEnv('APP_NAME') }} - Sản xuất sàn nhựa giả vân gỗ bóc dán." />
    <meta name="description"
        content="Chúng tôi cam kết mang đến cho khách hàng những sản phẩm sàn nhựa giả vân gỗ bóc dán với chất lượng vượt trội, giúp không gian sống trở nên đẳng cấp và thoải mái." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ getEnv('APP_URL') }}" />
    <meta property="og:title" content="{{ getEnv('APP_NAME') }} - Sản xuất sàn nhựa giả vân gỗ bóc dán." />
    <meta property="og:description"
        content="Chúng tôi cam kết mang đến cho khách hàng những sản phẩm sàn nhựa giả vân gỗ bóc dán với chất lượng vượt trội, giúp không gian sống trở nên đẳng cấp và thoải mái." />
    <meta property="og:image" content="{{ getEnv('APP_URL') }}/client/images/seo/image.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ getEnv('APP_URL') }}" />
    <meta property="twitter:title" content="{{ getEnv('APP_NAME') }} - Sản xuất sàn nhựa giả vân gỗ bóc dán." />
    <meta property="twitter:description"
        content="Chúng tôi cam kết mang đến cho khách hàng những sản phẩm sàn nhựa giả vân gỗ bóc dán với chất lượng vượt trội, giúp không gian sống trở nên đẳng cấp và thoải mái." />
    <meta property="twitter:image" content="{{ getEnv('APP_URL') }}/client/images/seo/image.jpg" />

    <!-- Meta Tags Generated with https://metatags.io -->
@endsection
@section('content')
    <!-- Slider -->
    <x-slider />
    <!-- Slider -->
    <div class="px-[1rem]">
        <div class="max-w-[1500px] mx-auto mt-12">
            <div class="text-center">
                <h1 class="text-[#8a4d04] laptop:text-3xl desktop:text-4xl tablet:text-3xl font-bold text-5xl">ẮC QUY THỦ
                    ĐỨC</h1>
                <div class="mt-4 text-2xl laptop:text-xl tablet:text-xl tablet:px-4">
                    <p class="laptop:mb-1 laptop:px-10 desktop:px-10 text-center">Mọi thắc mắc xin vui lòng liên
                        hệ <span class="text-[#8a4d04]">{{ $setting->phone }}
                        </span> để được giải đáp. Hoặc quý khách hàng có thể liên hệ với 1 trong các chi nhánh bên
                        dưới của
                        chúng tôi để được hỗ trợ nhanh chóng và kịp thời.</p>
                    <p>Xin chân thành cảm ơn!</p>
                </div>

            </div>

        </div>
        <!-- Bản đồ -->
        <section class="max-w-[1500px] mx-auto mb-[3rem] mt-8">
            <div
                class="flex items-center justify-center w-1/2 gap-3 mx-auto mb-10 s-phone:gap-1 laptop:w-3/4 tablet:w-full">
                <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
                <p class="text-[24px] s-phone:!text-sm laptop:text-xl text-[#8a4d04] tablet:text-lg text-center font-bold">
                    BẢN ĐỒ</p>
                <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
            </div>

            <div class="flex w-full s-phone:block">
                <div class="h-[30rem] s-phone:w-full w-2/3">
                    <img class="object-cover w-full h-full"
                        src="{{ asset('test') }}/assets/images/imgHouse-full.2d84caa5.jpg" alt="">
                </div>
                <div class="w-full">
                    {!! $setting->map !!}
                </div>
            </div>
        </section>
        <!-- Bản đồ -->

        <!-- Đại lý -->
        <x-agencies />
        <!-- Đại lý -->
    </div>


    <!-- Đối tác -->
    <x-Partners />
    <!-- Đối tác -->
@endsection
