<!-- Đối tác -->
<section class="max-w-[1500px] mx-auto mb-[3rem] px-[1rem]">

     <div class="flex items-center justify-center w-3/4 gap-2 mx-auto mb-10 desktop:w-3/4 tablet:w-full">
            <img class="w-2/5" src="{{ asset('client') }}/assets/images/img-title.32428066.png" alt="">
            <p class="text-[24px] s-phone:!text-xs laptop:text-sm desktop:text-lg tablet:text-sm text-[#8a4d04] text-center font-bold">ĐỐI TÁC</p>
            <img class="w-2/5" src="{{ asset('client') }}/assets/images/img-title.32428066.png" alt="">
        </div>
    <div class="w-full">
        <div class="slider">
            <div id="partners" class="slide-track ">
                @if (partners())
                    @foreach (partners() as $key => $item)
                        <div class="slide border-[1px] phone:!w-[150px] mx-3 border-[#8a4d04]">
                            <img class=" w-full h-24 object-contain" src="{{ $item->logo }}"
                                alt="{{ $item->name }}" />
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </div>
</section>
<!-- Đối tác -->
