@php
    $menu = [
        [
            'name' => 'Trang chủ',
            'route' => 'client.index',
            'children' => [],
        ],
        [
            'name' => 'Sản phẩm',
            'route' => 'client.products',
            'children' => [],
        ],
        [
            'name' => 'Tin tức',
            'route' => 'client.blog',
            'children' => [],
        ],
        [
            'name' => 'Liên hệ',
            'route' => 'client.contactGet',
            'children' => [],
        ],
    ];

@endphp
<!-- Header -->
<header
    class="transition-all duration-200 ease-in relative top-0 right-0 left-0 w-full max-h-[116px] tablet:max-h-full z-[9999]"
    id="header">
    <div class="absolute top-0 z-10 w-full h-full bg-white tablet:hidden"></div>
    <div
        class="relative z-20 w-full tablet:!bg-gradient-to-b tablet:!from-[#f25d19] tablet:!to-[#fad327] header-container">
        <div
            class="max-w-[1500px] tablet:block w-full mx-auto header-flex layout-container py-1 px-[1rem] laptop:px-[1rem] h-full flex items-start">

            <div id="logo" onclick="goHome()"
                class="logo w-2/5 max-[700px]:w-[45%] tablet:w-full pt-[0.5rem] cursor-pointer">
                <img class=" tablet:hidden logo-img laptop:h-[3.8rem] h-[4rem] w-[100%]" width="1070" height="144"
                    src="{{ asset('test') }}/assets/images/logo.98b96fdb.png" alt="">
                <img class="tablet:h-16 s-phone:!px-1 s-phone:!w-full hidden tablet:block tablet:mx-auto tablet:w-[80%] object-contain"
                    src="{{ asset('test') }}/assets/images/logo-footer.4cc7d107 (1).png" alt="">
            </div>
            <div class="flex-1 w-3/5 pl-20 tablet:pl-0 desktop:pl-16 laptop:pl-16 tablet:w-full">
                <div
                    class="flex s-phone:!flex-col s-phone:!gap-2 items-center gap-4 pt-2 laptop:gap-2 tablet:gap-8 tablet:pt-3 tablet:pb-3 header-info">
                    <div id="hotline" class="flex items-center gap-2 tablet:gap-1 laptop:gap-1 ">
                        <svg class="w-6 h-6 s-phone:w-4 s-phone:h-4 laptop:w-5 laptop:h-5 s-laptop:w-5 s-laptop:h-5"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"
                            fill="none">
                            <path
                                d="M15.9998 2.66663C8.64784 2.66663 2.6665 8.64796 2.6665 16V21.524C2.6665 22.8893 3.8625 24 5.33317 24H6.6665C7.02013 24 7.35926 23.8595 7.60931 23.6094C7.85936 23.3594 7.99984 23.0202 7.99984 22.6666V15.8093C7.99984 15.4557 7.85936 15.1165 7.60931 14.8665C7.35926 14.6164 7.02013 14.476 6.6665 14.476H5.45584C6.19717 9.31596 10.6372 5.33329 15.9998 5.33329C21.3625 5.33329 25.8025 9.31596 26.5438 14.476H25.3332C24.9795 14.476 24.6404 14.6164 24.3904 14.8665C24.1403 15.1165 23.9998 15.4557 23.9998 15.8093V24C23.9998 25.4706 22.8038 26.6666 21.3332 26.6666H18.6665V25.3333H13.3332V29.3333H21.3332C24.2745 29.3333 26.6665 26.9413 26.6665 24C28.1372 24 29.3332 22.8893 29.3332 21.524V16C29.3332 8.64796 23.3518 2.66663 15.9998 2.66663Z"
                                fill="white" />
                        </svg>
                        <p
                            class="text-2xl font-semibold tracking-wider text-white laptop:text-base desktop:text-xl phone tablet:text-sm num-hotline">
                            HOTLINE: 0796 39 58 68 </p>

                    </div>
                    <form action="{{ route('client.search') }}"
                        class="bg-white flex-1 flex items-center w-full rounded px-[11px] py-1">
                        <span class="flex items-center w-5 h-5">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 25 25" fill="none">
                                <g clip-path="url(#clip0_42_1419)">
                                    <path
                                        d="M24.6849 23.2094L17.512 16.0314C18.9261 14.3355 19.7766 12.1683 19.7766 9.80122C19.7766 4.40107 15.3448 0.0102539 9.89343 0.0102539C4.44205 0.0102539 0 4.4062 0 9.80634C0 15.2065 4.43181 19.5973 9.88318 19.5973C12.199 19.5973 14.3304 18.8032 16.0211 17.4762L23.2196 24.6747C23.6397 25.0948 24.2648 25.0948 24.6849 24.6747C25.105 24.2545 25.105 23.6295 24.6849 23.2094ZM2.10063 9.80634C2.10063 5.5641 5.59484 2.116 9.88318 2.116C14.1715 2.116 17.6657 5.5641 17.6657 9.80634C17.6657 14.0486 14.1715 17.4967 9.88318 17.4967C5.59484 17.4967 2.10063 14.0435 2.10063 9.80634Z"
                                        fill="#8A4D04" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_42_1419">
                                        <rect width="25" height="25" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>

                        <input class="w-full tablet:leading-3 text-[14px] outline-none leading-[1.57]"
                            placeholder="Tìm kiếm" name="keyword" value="{{ request()->keyword }}" type="text">
                    </form>
                </div>
                <div class="nav-pages">
                    <ul id="routers"
                        class="flex mx-auto tablet:pt-[0.5rem] pt-4 w-11/12 laptop:w-full pb-[0.75rem] items-center justify-between">
                        @foreach ($menu as $item)
                            @if (url()->current() == route($item['route']))
                                <li
                                    class="page relative s-phone:!text-[12px] tablet:text-sm desktop:text-lg nav-item group cursor-pointer laptop:text-sm s-laptop:text-sm text-xl font-semibold text-[#895609] mx-0 m-0 duration-200 nav-normal">

                                    <a class="block" href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
                                </li>
                            @else
                                <li
                                    class="page s-phone:!text-[12px] relative tablet:text-sm desktop:text-lg nav-item group cursor-pointer s-laptop:text-sm laptop:text-sm text-xl font-semibold text-white mx-0 m-0 duration-200 nav-normal">
                                    <a class="block" href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
                                    <div
                                        class="w-0 group-hover:w-[80%] h-[3px] absolute bottom-0 transform left-1/2 -translate-x-1/2 bg-white ease-in-out duration-150 -mb-1">
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Header -->
