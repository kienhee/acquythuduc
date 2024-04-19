@extends('layouts.client.index')
@section('title', $product->name)
@section('seo')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $product->name }}" />
    <meta name="description" content="{{ $product->description }}" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ getEnv('APP_URL') }}" />
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:description" content="{{ $product->description }}" />
    <meta property="og:image" content="{{ getEnv('APP_URL') }}{{ $product->image }}" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ getEnv('APP_URL') }}" />
    <meta property="twitter:title" content="{{ $product->name }}" />
    <meta property="twitter:description" content="{{ $product->description }}" />
    <meta property="twitter:image" content="{{ getEnv('APP_URL') }}{{ $product->image }}" />
    <!-- Meta Tags Generated with https://metatags.io -->
@endsection
@section('content')
    <!-- Slider -->
    <x-slider />
    <!-- Slider -->

    <div class="flex tablet:block px-[1rem] max-w-[1500px] mx-auto gap-9 mb-[3rem] tablet:px-2">
        <div class="flex-1">
            <div
                class="text-[#8a4d04] tablet:text-lg text-2xl flex items-center border-b-[1px] border-b-[#8a4d04] pb-4 mb-10 tablet:mb-5">
                <p class=""><span class="text-xl laptop:text-lg tablet:text-lg">SẢN PHẨM</span> <span
                        class="px-2">/</span> <span class="font-semibold laptop:text-lg">{{ $product->name }}</span></p>
            </div>
            <div class="flex gap-10 mb-20 laptop:block tablet:block">
                <div
                    class="w-1/2 transition-all duration-150 ease-in cursor-pointer laptop:mb-5 laptop:w-full tablet:mb-5 tablet:w-full hover:opacity-75">
                    <img src="{{ $product->cover }}" alt="">
                </div>
                <div class="flex-1 w-full">
                    <div class="mb-10">
                        <div
                            class="px-6 py-3 phone:text-base laptop:text-lg tablet:text-lg bg-[#fff1b1] text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Mã sản phẩm:</p>
                            <p>{{ $product->code }}</p>
                        </div>
                        <div class="px-6 py-3 phone:text-base laptop:text-lg tablet:text-lg text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Hãng sản xuất:</p>
                            <p>{{ $product->partner->alias }}</p>
                        </div>
                        <div
                            class="px-6 py-3 phone:text-base laptop:text-lg tablet:text-lg bg-[#fff1b1] text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Tình trạng hàng:</p>
                            <p>{{ $product->status }}</p>
                        </div>
                        <div class="px-6 py-3 phone:text-base laptop:text-lg tablet:text-lg text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Xuất xứ:</p>
                            <p>{{ $product->Origin }}</p>
                        </div>
                        <div
                            class="px-6 py-3 phone:text-base laptop:text-lg tablet:text-lg bg-[#fff1b1] text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Bảo hành:</p>
                            <p>{{ $product->warranty }}</p>
                        </div>
                        <div class="px-6 py-3 phone:text-base laptop:text-lg tablet:text-lg text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Kích thước:</p>
                            <p>{{ $product->size }}</p>
                        </div>
                        <div class="px-6 py-3 phone:text-base tablet:text-lg bg-[#fff1b1] text-[#8a4d04] text-xl flex">
                            <p class="w-5/12">Liên hệ:</p>
                            <p>0796 39 58 68 (Mr. Đồng)</p>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('client.contactGet') }}"
                            class="py-3 laptop:text-lg text-xl tablet:text-lg rounded text-[#fff] px-16 bg-gradient-to-b from-[#f25d19] to-[#fad327]">LIÊN
                            HỆ</a>
                    </div>

                </div>

            </div>
            <div>
                <div data-ui-tablist="ui-tabs" class="tabs px-14 border-b-[1px] s-phone:px-2 border-[#8a4d04]">
                    <button data-ui-tablist-tab="log-in"
                        class="tabs-tab laptop:text-lg s-phone:!px-4 phone:text-base tablet:text-lg text-xl text-[#8a4d04] px-8 py-3 ">Mô
                        tả sản phẩm</button>
                    <button data-ui-tablist-tab="sign-up"
                        class="tabs-tab laptop:text-lg s-phone:!px-4 phone:text-base tablet:text-lg text-xl text-[#8a4d04] px-8 py-3 ">Hình
                        ảnh/Video</button>
                </div>
                <div id="log-in" class="p-4 tabs-tabpanel auth-form">
                    <div class="mb-5 text-base text-justify">
                        {!! $product->content !!}
                    </div>
                </div>
                <div id="sign-up" class="tabs-tabpanel auth-form" hidden>
                    <img src="{{ $product->cover }}" alt="">
                </div>
            </div>
        </div>

        <div class="w-1/4 tablet:w-full max-w-1/4 laptop:w-1/3 laptop:max-w-1/3">
            <!-- Category -->
            <x-Categories />
            <!-- Category -->

            <!-- New Product -->
            <x-new-product />
            <!-- New Product -->
        </div>
    </div>



    <!-- Đối tác -->
    <x-Partners />
    <!-- Đối tác -->
@endsection
