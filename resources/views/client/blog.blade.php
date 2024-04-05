@extends('layouts.client.index')
@section('title', 'Tin tức')
@section('content')
    <!-- Slider -->
    <x-slider />
    <!-- Slider -->

    <div class="flex tablet:block px-[1rem] tablet:px-2 max-w-[1500px] mx-auto gap-9 laptop:mb-10">
        <div class="flex-1">
            <!-- Recommend Products: Ắc quy oto -->
            <section id="car-battery-container" class="max-w-[1500px] mx-auto mb-[3rem]">
                <div class="header-recommend-product shadow-md flex items-center justify-between mb-[2rem] h-16 px-8">
                    <p class="text-2xl font-bold text-white s-phone:!text-base laptop:text-xl tablet:text-xl">TIN TỨC
                    </p>

                </div>
                <div class="flex">
                    <div class="flex-1 px-4 laptop:px-0 tablet:px-0">
                        <div class="grid grid-cols-1 mx-auto">
                            @forelse ($blogs as $item)
                                <article
                                    class="flex gap-8 p-4 laptop:gap-5 tablet:gap-5 rounded shadow-xl cursor-pointer border-[2px] border-[transparent] mb-4 hover:border-[#f93]">
                                    <a href="{{ route('client.blog-detail', $item->slug) }}"
                                        class="p-2 border-[1px] phone:hidden border-[#895609] w-1/3  rounded">
                                        <img class="object-cover object-center w-full h-[250px]" src="{{ $item->cover }}"
                                            alt="{{ $item->title }}">
                                    </a>
                                    <div class="flex-1">
                                        <a href="{{ route('client.blog-detail', $item->slug) }}"
                                            class="text-xl tablet:text-base laptop:text-base font-bold text-[#895609] uppercase mb-2">
                                            {{ $item->title }}</a>
                                        <div class="flex gap-2 mb-4 text-blue-500 laptop:text-sm tablet:text-sm">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-user"></i>
                                                <p class="">Admin</p>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="fa-regular fa-clock"></i>
                                                <p class="">{{ $item->created_at->format('d/m/Y') }}</p>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-eye"></i>
                                                <p class="">{{ $item->views }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('client.blog-detail', $item->slug) }}"
                                                class="font-semibold tablet:text-sm laptop:text-sm strict-text">
                                                {{ $item->description }}</a>
                                        </div>
                                    </div>
                                    </ả>
                                @empty
                                    <h3 class="text-center text-slate-500">Chưa có bài viết nào</h3>
                            @endforelse


                        </div>
                    </div>
                </div>
            </section>
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



    <!-- Đối tác -->
    <x-Partners />
    <!-- Đối tác -->
@endsection
