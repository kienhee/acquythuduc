<section class="mb-10">
    <div id="slider-main">
        @if (getSliders())
            @foreach (explode(',', getSliders()->images) as $key => $image)
                <div>
                    <img class="w-full h-auto object-cover" src="{{ $image }}"
                        alt="aaaa" />
                </div>
            @endforeach
        @endif
    </div>
    <div class="swiper-pagination"></div>
</section>
@section('script-slider')
    <script>
        $('#slider-main').slick({
            slidesToShow: 1, // Hiển thị số lượng slide
            slidesToScroll: 1, // Di chuyển bao nhiêu slide mỗi lần
            autoplay: true, // Tự động chạy slider
            autoplaySpeed: 3000, // Đặt tốc độ tự động chạy là 0 để chạy như marquee
            speed: 300, // Tốc độ di chuyển của slider
            infinite: true, // Chạy vô hạn
            arrows: false,
            dots: false,
        });
    </script>
@endsection
