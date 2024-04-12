<!-- Đối tác -->
<section class="max-w-[1500px] mx-auto mb-[3rem] px-[1rem]">

    <div class="flex items-center justify-center w-3/4 s-phone:!gap-1 s-phone:!w-full gap-3 mx-auto mb-10 tablet:w-full">
        <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
        <p
            class="text-[24px] s-phone:!text-sm  laptop:text-xl tablet:text-lg text-[#8a4d04] phone:!text-base text-center font-bold">
            ĐỐI TÁC</p>
        <img class="w-2/5" src="{{ asset('test') }}/assets/images/img-title.32428066.png" alt="">
    </div>
    <div class="w-full">
        <div class="slider">
            <ul id="partners" class="slider-list">

            </ul>
        </div>
    </div>
    <div class="w-full">
        <div class="slider">
            <div id="partners" class="slide-track ">
                @if (partners())
                    @foreach (partners() as $key => $item)
                        <div class="slide border-[1px] phone:!w-[150px] mx-3 border-[#8a4d04]">
                            <img class="object-contain h-full" src="{{ $item->logo }}" width="250"
                                alt="{{ $item->name }}" />
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </div>
</section>
<!-- Đối tác -->
