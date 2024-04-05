@extends('layouts.client.index')
@section('title', $post->title)
@section('content')
    <!-- Slider -->
    <x-slider />
    <!-- Slider -->

    <div class="flex tablet:block px-[1rem] tablet:px-2 max-w-[1500px] mx-auto gap-9 laptop:mb-10">
        <div class="flex-1">
            <section id="car-battery-container" class="max-w-[1500px] mx-auto mb-[3rem] ">
                {{-- <img src="{{ $post->cover }}" class="w-full object-cover mb-7" alt="{{ $post->title }}"> --}}
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('client.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ route('client.blog') }}"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Tin
                                    tức</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $post->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-2xl font-bold mb-3 text-[#8a4d04]">{{ $post->title }}</h1>
                <div class="flex gap-2 mb-4 text-slate-500 laptop:text-sm tablet:text-sm">
                    <div class="flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-user"></i>
                        <p class="">Admin</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="fa-regular fa-clock"></i>
                        <p class="">{{ $post->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-eye"></i>
                        <p class="">{{ $post->views }}</p>
                    </div>
                </div>
                <hr class=" mb-10 ">
                <div>{!! $post->content !!}</div>
            </section>
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


@endsection
