  
   <section id="slider-container" class="swiper mySwiper mb-[3rem]">
       <div id="slider" class="swiper-wrapper">
           @if (getSliders())
               @foreach (explode(',', getSliders()->images) as $key => $image)
                   <div class="swiper-slide">
                       <img class="w-full h-full" src="{{ $image }}" alt="aaaa" />
                   </div>
               @endforeach
           @endif

       </div>
       <div class="swiper-pagination"></div>
   </section>
