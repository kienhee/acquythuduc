<!-- Footer -->
@php
    $setting = setting();

@endphp
<footer class="px-[2rem] pt-[2.5rem] pb-[1.5rem] tablet:px-[1rem] phone:px-[0.5rem]" id="footer">
    <div class="max-w-[1500px] mx-auto">
        <div class="flex items-start w-full gap-4 tablet:mb-5 phone:block">
            <div class="max-w-[30%] tablet:max-w-[60%] phone:!max-w-full">
                <div class="">
                    <img class="mb-4" src="{{ asset('client') }}/assets/images/logo-footer.4cc7d107.png" alt="">
                </div>
                <div id="contacts">
                    <div class="flex items-start mt-2">
                        <span
                            class="w-[2.5rem] laptop:w-[0.75rem] laptop-[0.74rem] mr-1 desktop:w-[1rem] desktop:mt-2 desktop:h-[1rem] tablet:mt-2 tablet:mr-2 h-[2rem] tablet:w-[0.75rem] tablet:h-[0.75rem] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 21 34"
                                fill="none">
                                <g clip-path="url(#clip0_88_2023)">
                                    <path
                                        d="M16.0417 0.958252H4.375C1.95417 0.958252 0 2.91242 0 5.33325V28.6666C0 31.0874 1.95417 33.0416 4.375 33.0416H16.0417C18.4625 33.0416 20.4167 31.0874 20.4167 28.6666V5.33325C20.4167 2.91242 18.4625 0.958252 16.0417 0.958252ZM13.125 30.1249H7.29167V28.6666H13.125V30.1249ZM17.8646 25.7499H2.55208V5.33325H17.8646V25.7499Z"
                                        fill="#F2F2F2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_88_2023">
                                        <rect width="21" height="34" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <p
                            class="text-[20px] laptop:text-base inline flex-1 desktop:text-[16px] tablet:text-sm text-white pt-1">

                            Email : {{ $setting->email }}
                        </p>
                    </div>
                    <div class="flex items-start mt-2">
                        <span
                            class="w-[2.5rem] laptop:w-[0.75rem] laptop-[0.74rem] mr-1 desktop:w-[1rem] desktop:mt-2 desktop:h-[1rem] tablet:mt-2 tablet:mr-2 h-[2rem] tablet:w-[0.75rem] tablet:h-[0.75rem] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 27 22"
                                fill="none">
                                <g clip-path="url(#clip0_88_2025)">
                                    <path
                                        d="M25.3125 0.6875H0.9375C0.418945 0.6875 0 1.10645 0 1.625V20.375C0 20.8936 0.418945 21.3125 0.9375 21.3125H25.3125C25.8311 21.3125 26.25 20.8936 26.25 20.375V1.625C26.25 1.10645 25.8311 0.6875 25.3125 0.6875ZM24.1406 3.93359V19.2031H2.10938V3.93359L1.30078 3.30371L2.45215 1.82422L3.70605 2.7998H22.5469L23.8008 1.82422L24.9521 3.30371L24.1406 3.93359ZM22.5469 2.79688L13.125 10.1211L3.70312 2.79688L2.44922 1.82129L1.29785 3.30078L2.10645 3.93066L12.1143 11.7119C12.4021 11.9355 12.7561 12.0569 13.1206 12.0569C13.4851 12.0569 13.8391 11.9355 14.127 11.7119L24.1406 3.93359L24.9492 3.30371L23.7979 1.82422L22.5469 2.79688Z"
                                        fill="#F2F2F2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_88_2025">
                                        <rect width="27" height="22" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <p
                            class="text-[20px] laptop:text-base inline flex-1 desktop:text-[16px] tablet:text-sm text-white pt-1">

                            Hotline : {{ $setting->phone }}
                        </p>
                    </div>

                    <div class="flex items-start mt-2">
                        <span
                            class="w-[2.5rem] laptop:w-[0.75rem] laptop-[0.74rem] mr-1 desktop:w-[1rem] desktop:mt-2 desktop:h-[1rem] tablet:mt-2 tablet:mr-2 h-[2rem] tablet:w-[0.75rem] tablet:h-[0.75rem] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 26 32"
                                fill="none">
                                <g clip-path="url(#clip0_88_2027)">
                                    <path
                                        d="M12.9998 19.1667C16.4927 19.1667 19.3332 16.3262 19.3332 12.8333C19.3332 9.3405 16.4927 6.5 12.9998 6.5C9.507 6.5 6.6665 9.3405 6.6665 12.8333C6.6665 16.3262 9.507 19.1667 12.9998 19.1667ZM12.9998 9.66667C14.7463 9.66667 16.1665 11.0869 16.1665 12.8333C16.1665 14.5798 14.7463 16 12.9998 16C11.2534 16 9.83317 14.5798 9.83317 12.8333C9.83317 11.0869 11.2534 9.66667 12.9998 9.66667Z"
                                        fill="#F2F2F2" />
                                    <path
                                        d="M11.7485 31.5389C12.0164 31.7303 12.3375 31.8332 12.6668 31.8332C12.9961 31.8332 13.3172 31.7303 13.5851 31.5389C14.0665 31.1985 25.3794 23.0301 25.3335 12.8334C25.3335 5.84933 19.6509 0.166748 12.6668 0.166748C5.68272 0.166748 0.000139393 5.84933 0.000139393 12.8255C-0.0457773 23.0301 11.2671 31.1985 11.7485 31.5389ZM12.6668 3.33341C17.9061 3.33341 22.1668 7.59416 22.1668 12.8413C22.2001 19.8682 15.2191 26.1777 12.6668 28.2472C10.1161 26.1762 3.13356 19.865 3.16681 12.8334C3.16681 7.59416 7.42756 3.33341 12.6668 3.33341Z"
                                        fill="#F2F2F2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_88_2027">
                                        <rect width="26" height="32" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <p
                            class="text-[20px] laptop:text-base inline flex-1 desktop:text-[16px] tablet:text-sm text-white pt-1">

                            Địa chỉ : {{ $setting->address }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="max-w-[25%] flex-[0_0_25%] s-phone:hidden laptop:flex-1 laptop:max-w-full phone:hidden tablet:flex-1 mb-10 tablet:max-w-full">
                <div class="w-4/5 mx-auto">
                    <h3
                        class="mb-4 text-[20px] desktop:text-lg text-xl laptop:text-lg tablet:text-sm text-white font-bold">
                        DANH MỤC SẢN PHẨM
                    </h3>
                    <div id="categories">
                        @foreach (getChildrenCategories() as $item)
                            <a href="{{ route('client.products', ['category' => $item->slug]) }}"
                                class="text-white block text-left desktop:text-lg laptop:text-base text-[20px] tablet:text-sm mb-2">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tablet:hidden laptop:hidden">
                <h3 class="mb-4 text-[20px] desktop:text-lg text-white font-bold">BẢN ĐỒ</h3>
                <div class="flex flex-row wrap">
                    <div class="flex h-56 ant-col ant-col-xs-10 ant-col-sm-10 ant-col-md-10 ant-col-lg-8 css-txh9fw">
                        <img class="object-cover w-full h-full"
                            src="{{ asset('client') }}/assets/images/imgHouse.bcd13c8f.jpg" alt="">
                    </div>
                    <div class="ant-col ant-col-xs-14 ant-col-sm-14 ant-col-md-14 ant-col-lg-16 css-txh9fw">
                         {!! $setting->map !!} 
                    </div>
                </div>
            </div>

        </div>
        <div class="hidden laptop:mt-3 tablet:block laptop:block">
            <h3 class="mb-4 text-[20px] desktop:text-lg tablet:text-sm laptop:text-lg text-white font-bold">BẢN ĐỒ</h3>
            <div class="flex s-phone:!block flex-row wrap">
                <div class="flex w-full h-56 ant-col ant-col-xs-10 ant-col-sm-10 ant-col-md-10 ant-col-lg-8 css-txh9fw">
                    <img class="flex-1 object-cover w-full h-full laptop:object-fill"
                        src="{{ asset('client') }}/assets/images/imgHouse.bcd13c8f.jpg" alt="">
                </div>
                <div class="w-full ant-col ant-col-xs-14 ant-col-sm-14 ant-col-md-14 ant-col-lg-16 css-txh9fw">
                    {!! $setting->map !!}
                </div>
            </div>
        </div>
        <div class="w-full pt-4 font-medium text-center text-white footer-copy-right layout-container mt-7">Bản quyền ©
            2023 .<h2 class="inline-block">CỬA HÀNG ẮC QUY THỦ ĐỨC</h2>
        </div>
    </div>
</footer>
<!-- Footer -->
