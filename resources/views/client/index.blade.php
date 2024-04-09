@extends('layouts.client.index')
@section('title', 'Trang chủ')
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

    <div class="px-[1rem] tablet:px-2">
        <!-- Advantages -->
        <section id="advantages-container" class="max-w-[1500px] relative mx-auto mb-[3rem] tablet:mb-7">
            <div id="advantages"
                class="rounded s-phone:grid s-phone:grid-cols-2 s-phone:h-full !border-[1px] mx-auto bg-[#ffeea4] border-[#895609] laptop:h-24 w-full h-28 flex items-center">
                <!-- Render Advantage Items by JS (/script/Advantages.js) -->
            </div>
            <div class="border-r-[1px] right-1/2 top-2/4 translate-y-[-50%] h-2/4 border-[#895609] absolute"></div>
        </section>
        <!-- Advantages -->
        <hr class="border-[#000] hidden tablet:block mb-7">
        <!-- About -->
        <section id="about-container" class="max-w-[1500px] mx-auto mb-[3rem]">
            <div class="flex gap-6 laptop:gap-4">
                <div class="w-1/2 tablet:hidden">
                    <img class="w-full h-full" src="{{ asset('test') }}/assets/images/acquyhoaphat.dd8214a9.jpg"
                        alt="">
                </div>
                <div class="w-1/2 tablet:w-full">
                    <div class="flex items-center">
                        <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
                        <p
                            class="text-[24px] s-phone:!text-xs laptop:text-sm desktop:text-lg tablet:text-sm text-[#8a4d04] text-center font-bold">
                            VỀ CHÚNG TÔI</p>
                        <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
                    </div>
                    <div>
                        {!! setting()->about !!}
                    </div>
                    <!-- <div class="text-[20px] desktop:text-lg laptop:text-base tablet:text-sm my-4">
                                    <p class="text-justify"><span class="text-[#8a4d04] font-semibold">Ắc quy Thủ Đức: </span>chuyên
                                        cung
                                        cấp các sản phẩm ắc quy nội, ngoại nhập
                                        như: <span class="text-blue-700">GS, SEBANG,
                                            DONGNAI, VARTA, AMARON, ENIMAC, ROCKET, DELKOR...</span></p>
                                    <p class="text-justify">
                                        Là một chi nhánh thuộc <span class="font-semibold text-blue-700">Công ty TNHH TM-DV ắc quy Hòa
                                            Phát</span>
                                        với 13 chi nhánh trải dài khắp tp
                                        HCM, ắc quy Thủ Đức luôn đặt mục tiêu "chất lượng hàng đầu - giá cả phải chăng - dịch vụ hoàn
                                        hảo"
                                        nhằm
                                        mang
                                        lại quyền lợi tốt nhất cho khách hàng.
                                    </p>
                                    <p>Chúng tôi tin chắc rằng bạn sẽ hài lòng khi đến vớiắc quy Thủ Đức.</p>
                                </div>
                                <div class="flex justify-center">
                                    <img class="w-4/5" src="{{ asset('test') }}/assets/images/aboutLogo.cc0c40b9.png" alt="">
                                </div> -->
                </div>
            </div>
        </section>
        <!-- About -->

        <!-- Recommend Products: Ắc quy oto -->
        <section id="car-battery-container" class="max-w-[1500px] mx-auto mb-[3rem]">
            <div class="header-recommend-product shadow-md flex items-center justify-between mb-[2rem] h-16 px-8">
                <p class="text-2xl font-bold text-white s-phone:!text-base laptop:text-xl tablet:text-xl">ẮC QUY Ô TÔ</p>
                <div class="flex items-center s-phone:!hidden">
                    <p class="text-[#895609] font-[600] laptop:text-base text-xl  tablet:text-lg mr-2">Xem tất cả</p>
                    <img src="{{ asset('test') }}/assets/images/icon-arrow.2dea5fd3.png" alt="">
                </div>
            </div>
            <div class="flex tablet:flex-col">
                <div data-ui-tablist="ui-tabs"
                    class="w-full max-w-[20.83%] tablet:mb-5 tablet:grid grid-cols-3 gap-4 tablet:object-contain tablet:max-w-full"
                    shown="category-1">
                    @foreach ($productsByPartners as $item)
                        <div data-ui-tablist-tab="{{ $item['partner_logo'] }}"
                            class="category laptop:mb-4 h-24 px-3 w-full border-[1px] cursor-pointer border-[#895609] overflow-hidden mb-7 tablet:mb-0">
                            <img class="object-fill w-full h-full laptop:object-contain tablet:object-contain"
                                src="{{ $item['partner_logo'] }}" alt="{{ $item['partner_name'] }}">
                        </div>
                    @endforeach

                </div>
                @foreach ($productsByPartners as $item)
                    <div id="{{ $item['partner_logo'] }}" class="flex-1 px-4 tablet:px-0">
                        <div
                            class="grid grid-cols-3 s-phone:!grid-cols-1 mx-auto laptop:grid-cols-2 tablet:grid tablet:grid-cols-2">
                            @foreach ($item['products'] as $children)
                                <a href="{{ route('client.product-detail', $children['slug']) }}"
                                    class="relative laptop:mb-5 tablet:mb-2 transition-all duration-150 ease-in border-[4px] mx-2 tablet:mx-1 border-opacity-100 hover:rounded hover:border-[#f93] cursor-pointer group border-[transparent] max-w-[33,33%] mb-5">
                                    <div
                                        class="transition-all duration-150 ease-in border-[1px] group-hover:border-none shadow-md border-[#895609]">
                                        <div class="p-2 h-56 border-b-[1px] overflow-hidden">
                                            <img class="w-full h-full transition-all duration-150 ease-in group-hover:scale-110"
                                                src="{{ $children['cover'] }}" alt="">
                                        </div>
                                        <div
                                            class="py-3 px-2 tablet:px-1 group-hover:bg-gradient-to-b group-hover:from-[#f25d19] group-hover:to-[#fad327] group-hover:text-[#fff] text-center text-[#8a4d04]">
                                            <p class="text-xl font-bold tablet:text-sm laptop:text-lg">
                                                {{ $children['name'] }}</p>
                                        </div>
                                        <div class="absolute"></div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

        @foreach ($productsByCategory as $item)
            <section id="car-battery-container" class="max-w-[1500px] mx-auto mb-[3rem]">
                <div class="header-recommend-product shadow-md flex items-center justify-between mb-[2rem] h-16 px-8">
                    <p class="text-2xl s-phone:!text-base font-bold text-white laptop:text-xl tablet:text-xl">
                        {{ $item['category_name'] }}</p>
                    <div class="flex items-center s-phone:!hidden">
                        <p class="text-[#895609] laptop:text-base tablet:text-lg font-[600] text-xl mr-2">Xem tất cả
                        </p>
                        <img src="{{ asset('test') }}/assets/images/icon-arrow.2dea5fd3.png" alt="">
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-1 px-4 laptop:px-0 tablet:px-0">
                        <div
                            class="grid grid-cols-4 mx-auto s-phone:!grid-cols-1 laptop:grid-cols-3 tablet:grid tablet:grid-cols-2">
                            @foreach ($item['products'] as $children)
                                <a href="{{ route('client.product-detail', $children['slug']) }}"
                                    class="relative laptop:mb-5 tablet:mb-2 transition-all duration-150 ease-in border-[4px] mx-2 tablet:mx-1 border-opacity-100 hover:rounded hover:border-[#f93] cursor-pointer group border-[transparent] max-w-[33,33%] mb-5">
                                    <div
                                        class="transition-all duration-150 ease-in border-[1px] group-hover:border-none shadow-md border-[#895609]">
                                        <div class="p-2 h-56 border-b-[1px] overflow-hidden">
                                            <img class="w-full h-full transition-all duration-150 ease-in group-hover:scale-110"
                                                src="{{ $children['cover'] }}" alt="">
                                        </div>
                                        <div
                                            class="py-3 px-2 tablet:px-1 group-hover:bg-gradient-to-b group-hover:from-[#f25d19] group-hover:to-[#fad327] group-hover:text-[#fff] text-center text-[#8a4d04]">
                                            <p class="text-xl font-bold tablet:text-sm laptop:text-lg">
                                                {{ $children['name'] }}</p>
                                        </div>
                                        <div class="absolute"></div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </section>
        @endforeach
        <!-- Hình ảnh -->
        <section class="">

            <div class="flex items-center justify-center w-3/4 gap-2 mx-auto mb-10 desktop:w-3/4 tablet:w-full">
                <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
                <p class="text-[24px] laptop:text-xl text-[#8a4d04] text-center font-bold tablet:text-lg">HÌNH ẢNH</p>
                <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
            </div>

            <div>
                <img src="{{ setting()->image }}" class="w-full" alt="">
            </div>
        </section>
        <!-- Hình ảnh -->
    </div>
    <!-- Đối tác -->
    <x-Partners />
    <!-- Đối tác -->
@endsection
