   <section class="ftco-intro" style="background-image: url({{ asset('client') }}/images/bg_1.jpg);">
       <div class="overlay"></div>
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-9 text-center">
                   <h2>{{ __('Ready to get started') }}</h2>
                   <p class="mb-4">
                       {{ __("It's been a pleasure working with you, get ready to start your work with just clicks or contact us.") }}
                   </p>
                   <p class="mb-0">
                    <a href="{{ route('client.about') }}"
                           class="btn btn-primary px-4 py-3 mr-2">{{ __('about') }}
                       </a> <a href="{{ route('client.contactGet') }}"
                           class="btn btn-white px-4 py-3">{{ __('contact') }}</a>
                   </p>
               </div>
           </div>
       </div>
   </section>
