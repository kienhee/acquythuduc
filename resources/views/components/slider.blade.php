<section id="slider-container" class="swiper mySwiper mb-[3rem]">
    <div id="slider" class="swiper-wrapper">
        {{-- @if (getSliders())
            @foreach (explode(',', getSliders()->images) as $key => $image)
                <div class="swiper-slide">
                    <img class="w-full h-full" src="{{ $image }}" alt="aaaa" />
                </div>
            @endforeach
        @endif --}}
        <div class="swiper-slide">
            <img class="w-full h-full" src="https://www.acquythuduc.vn/_next/static/media/banner_1.c41ce791.png" alt="aaaa" />
        </div>
        <div class="swiper-slide">
            <img class="w-full h-full" src="https://www.acquythuduc.vn/_next/static/media/banner_2.b9dca191.png" alt="aaaa" />
        </div>
    </div>
    <div class="swiper-pagination"></div>
</section>
