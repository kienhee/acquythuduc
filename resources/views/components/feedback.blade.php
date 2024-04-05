 <section class="ftco-section testimony-section bg-light">
     <div class="container">
         <div class="row justify-content-center pb-5 mb-3">
             <div class="col-md-7 heading-section text-center ftco-animate">
                 {{-- <h2>Happy Clients &amp; Feedbacks</h2> --}}
                 <h2>{{ __('Happy Clients & Feedbacks') }}</h2>
             </div>
         </div>
         <div class="row ftco-animate">
             <div class="col-md-12">
                 <div class="carousel-testimony owl-carousel">
                     @foreach (getAllFeedbacks() as $item)
                         <div class="item">
                             <div class="testimony-wrap d-flex">
                                 <div class="user-img" style="background-image: url({{ $item->avatar }})">
                                 </div>
                                 <div class="text pl-4">
                                     <span class="quote d-flex align-items-center justify-content-center">
                                         <i class="fa fa-quote-left"></i>
                                     </span>
                                     <strong class="name fw-bolder">{{ $item->name }}</strong>
                                     {{-- <span class="position">{{ $item->career }}</span> --}}
                                     <p>{{ App::currentLocale() == 'vi' ? $item->feedback : $item->feedback_en }}</p>
                                 </div>
                             </div>
                         </div>
                     @endforeach


                 </div>
             </div>
         </div>
     </div>
 </section>
