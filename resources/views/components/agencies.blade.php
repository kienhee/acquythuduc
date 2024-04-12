             @if (agencies()->count() > 0)
                 <section class="max-w-[1500px] mx-auto mb-[3rem] mt-8">
                     <div
                         class="flex items-center justify-center w-1/2 gap-3 mx-auto mb-10 s-phone:gap-1 laptop:w-3/4 tablet:w-full">
                         <img class="w-2/5" src="{{ asset('client') }}/assets/images/img-title.32428066.png"
                             alt="">
                         <p
                             class="text-[24px] laptop:text-xl tablet:text-lg s-phone:!text-sm text-[#8a4d04] text-center font-bold">
                             ĐẠI LÝ</p>
                         <img class="w-2/5" src="{{ asset('client') }}/assets/images/img-title.32428066.png"
                             alt="">
                     </div>

                     <div class="w-full">
                         <div
                             class="grid w-full grid-cols-4 laptop:grid-cols-3 s-phone:!grid-cols-1 tablet:grid-cols-2 gap-7">

                             @foreach (agencies() as $item)
                                 <div class="">
                                     <div class="h-64">
                                         <img class="h-full" src="{{ $item->cover }}" alt="">
                                     </div>
                                     <div>
                                         <p class="text-[#8a4d04] mb-2">{{ $item->name }}</p>
                                         <div class="mb-1">
                                             <img class="inline-block mb-1"
                                                 src="{{ asset('client') }}/assets/images/telephone.0e7087b5.png"
                                                 alt="">
                                             <p class="inline-block tablet:text-sm">{{ $item->phone }}</p>
                                         </div>
                                         <div class="mb-1">
                                             <img class="inline -mt-1"
                                                 src="{{ asset('client') }}/assets/images/home.b317b103.png"
                                                 alt="">
                                             <p class="inline tablet:text-sm">{{ $item->address }}
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach




                         </div>
                     </div>
                 </section>
             @endif
