@extends('layouts.client.index')
@section('title', 'Tất cả sản phẩm của chúng tôi')
@section('content')
    <!-- Slider -->
    <x-slider />
    <!-- Slider -->

    <div class="px-[1rem] tablet:px-2">
        <div class="flex tablet:block tablet:px-2 max-w-[1500px] laptop:gap-5 mx-auto gap-9">
            <div class="flex-1">
                <!-- Recommend Products: Ắc quy oto -->
                @forelse ($productsByCategory as $item)
                    <section id="car-battery-container" class="max-w-[1500px] mx-auto mb-[3rem]">

                        @if (request()->category ||request()->type)
                            <div class="text-[#895609] text-xl font font-semibold pb-3">Sản phẩm / {{ request()->category ?? "Ắc quy ô tô" }}
                            </div>
                            <hr class="mb-5 border-t-2">
                        @elseif (request()->search)
                            <div class="text-[#895609] text-xl font font-semibold pb-3">Tìm kiếm: "{{ request()->search }}"
                            </div>
                            <hr class="mb-5 border-t-2">
                        @else
                            <div
                                class="header-recommend-product shadow-md flex items-center justify-between mb-[2rem] h-16 px-8">
                                <p class="text-2xl s-phone:!text-base font-bold text-white laptop:text-xl tablet:text-xl">
                                    {{ $item['category_name'] }}</p>
                                <div class="flex items-center s-phone:!hidden">
                                    <a href="{{ route('client.products', ['category' => $item['slug']]) }}"
                                        class="text-[#895609] laptop:text-base tablet:text-lg font-[600] text-xl mr-2">Xem
                                        tất cả
                                    </a>
                                    <img src="{{ asset('client') }}/assets/images/icon-arrow.2dea5fd3.png" alt="">
                                </div>
                            </div>
                        @endif


                        <div class="flex">
                            <div class="flex-1 px-4 laptop:px-0 tablet:px-0">
                                <div
                                    class="grid s-phone:!grid-cols-1 grid-cols-3 mx-auto laptop:grid-cols-2 tablet:grid-cols-2">
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
                @empty
                    <h3 class="text-[#895609] text-center text-2xl">Hiện sản phẩm chưa được cập nhật.

                        Qúy khách xin liên hệ <strong>{{ setting()->phone }}</strong> để được nhân viên hỗ trợ nhanh chóng
                        và kịp thời.
                        Xin chân thành cảm ơn!</h3>
                @endforelse

                <!-- Recommend Products: Ắc quy oto -->

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
    </div>

    <!-- Đối tác -->
    <x-Partners />
    <!-- Đối tác -->


@endsection
