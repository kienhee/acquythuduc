<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('client') }}/assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
    <link rel="stylesheet" href="{{ asset('client') }}/assets/css/main.css">
    <!-- <link rel="preload" href="https://maps.gstatic.com/maps-api-v3/embed/js/56/4/intl/vi_ALL/init_embed.js" -->
    <!-- nonce="p63S8D8MTBW__TbE7-z6-Q" as="script" /> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                },
                screens: {
                    'phone': {
                        'min': '375px',
                        'max': '570px'
                    },
                    's-phone': {
                        'max': '450px'
                    },
                    'tablet': {
                        'max': '690px'
                    },
                    // => @media (min-width: 640px) { ... }

                    'laptop': {
                        'min': '690px',
                        'max': '990px'
                    },
                    // => @media (min-width: 1024px) { ... }

                    'desktop': {
                        'min': '990px',
                        'max': '1280px '
                    },
                    // => @media (min-width: 1280px) { ... }
                },
            }
        }
    </script>
</head>

<body>
    <div id="root">

        @include('layouts.client.header')
        <div id="container">
            @yield('content')
        </div>
        @include('layouts.client.footer')
    </div>
    <!-- social -->
    <div id="social" class="fixed right-[10px] z-[99999] bottom-[10%]">

        <div id="socials"
            class="  bottom-[120%]  h-[200px] transition-all duration-200 ease-in overflow-hidden flex flex-col justify-between w-14 rounded-[500px] px-2 py-4">
            <div
                class="cursor-pointer border-[1px] border-transparent hover:border-[#ccc] rounded-[100%] overflow-hidden">
                <img class="block" src="{{ asset('client') }}/assets/images/Icon_of_Zalo.svg.png" alt="">
            </div>
            <div
                class="cursor-pointer border-[1px] border-transparent hover:border-[#ccc] rounded-[100%] overflow-hidden">
                <img class="block" src="{{ asset('client') }}/assets/images/messenger.jpeg" alt="">
            </div>
            <div
                class="cursor-pointer border-[1px] border-transparent hover:border-[#ccc] rounded-[100%] overflow-hidden">
                <img src="{{ asset('client') }}/assets/images/phone-icon.png" alt="">
            </div>
        </div>
    </div>
    <!-- social -->
    <script type="module" src="{{ asset('client') }}/script/Header.js"></script>
    <script type="module" src="{{ asset('client') }}/script/infiniteSlider.js"></script>
    <script type="module" src="{{ asset('client') }}/script/tabs.js"></script>
    <script src="{{ asset('client') }}/script/product.js"></script>
    <script type="module" src="{{ asset('client') }}/script/collapse.js"></script>
    <!-- <script type="text/tailwindcss" src="tailwind.config.js"></script> -->

    <script>
        function goHome() {
            window.location.href = "/"
        }
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + ' inline-block">' + "</span>";
                },
            },
        });
        const advantages = [{
                title: "CAM KẾT CHÍNH HÃNG",
                img: "{{ asset('client') }}/assets/images/genuine.ae38b4c3.png"
            },
            {
                title: "HỖ TRỢ MỌI LÚC",
                img: "{{ asset('client') }}/assets/images/support.55d5b76d.png"
            },
            {
                title: "TƯ VẤN MIỄN PHÍ",
                img: "{{ asset('client') }}/assets/images/free.95b59d71.png"
            },
            {
                title: "CHÍNH SÁCH ĐỔI TRẢ",
                img: "{{ asset('client') }}/assets/images/change.a2e701f2.png"
            }
        ]

        const renderAdvantage = (advantage, index) => {
            const isLast = index === advantages.length - 1;
            return `<div class="flex s-phone:w-full s-phone:border-none s-phone:p-2 tablet:flex-col tablet:px-2 px-3 ${isLast ? "" : "border-r-[2px]"} border-[#895609] h-[75%] items-center justify-center w-[25%]">
  <img class="mr-2 laptop:w-12 tablet:w-9 tablet:h-9 tablet:mb-2" src="${advantage.img}" alt="">
  <p class="font-[500] tablet:text-xs desktop:text-lg laptop:text-sm text-center text-[1.25rem] text-[#8a4d04]">${advantage.title}</p>
</div>`
        }

        const renderAdvantages = () => {
            let render = '';
            advantages.forEach((advantage, index) => {
                render += renderAdvantage(advantage, index);
            })
            let advantagesId = document.getElementById('advantages');
            advantagesId.innerHTML = render;
        }

        renderAdvantages();
    </script>

</body>

</html>
