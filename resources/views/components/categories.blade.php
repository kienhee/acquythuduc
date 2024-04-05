  <div class="rounded border-[1px] w-full shadow-md mb-7">
                <div class="text-[#8a4d04] bg-[#ffeea4] font-semibold border-b-[1px] px-4 py-3 text-center">
                    <p class="text-xl laptop:text-lg tablet:text-lg">DANH MỤC SẢN PHẨM</p>
                </div>
                <div>
                    @foreach (categoryMegaMenu() as $item)
                        <button data-ui-toggle="collapse-{{ $item['id'] }}"
                            class="flex justify-between tablet:text-sm laptop:text-sm items-center w-full p-3 border-b-[1px] text-[#8a4d04] uppercase font-semibold">
                            {{ $item['parent'] }}
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                        <div data-ui-collapse data-ui-transition-name="collapse" id="collapse-{{ $item['id'] }}" shown>
                            <div class="collapse-content tablet:text-sm laptop:text-sm p-4 border-b-[1px]">
                                @foreach ($item['children'] as $child)
                                    <p class="p-2 cursor-pointer hover:bg-[#E5E7EB] rounded uppercase">{{ $child['name'] }}
                                    </p>
                                @endforeach

                            </div>
                        </div>
                    @endforeach



                </div>
            </div>