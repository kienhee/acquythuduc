<div class="rounded border-[1px] w-full shadow-md tablet:mb-10">
    <div class="text-[#8a4d04] bg-[#ffeea4] font-semibold border-b-[1px] px-4 py-3 text-center">
        <p class="text-xl laptop:text-lg tablet:text-lg">SẢN PHẨM MỚI NHẤT</p>
    </div>
    <div>
        @foreach (newProducts() as $item)
            <a href="{{route('client.product-detail',$item->slug)}}"
                class="flex items-center w-full gap-4 p-3 duration-150 bg-white border-b border-solid cursor-pointer hover:bg-gray-200">
                <div class="w-1/3 tablet:flex-none tablet:w-1/3">
                    <img class="border-[1px]" src="{{ $item->cover }}" alt="">
                </div>
                <div class="text-[#8a4d04]">
                    <p class="">{{ $item->name }}</p>

                </div>
            </a>
        @endforeach


    </div>
</div>
