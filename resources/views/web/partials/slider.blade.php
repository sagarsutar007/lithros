    <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
      <div class="slick-carousel carousel-arrows-light carousel-dots-light m-slides-0"
        data-slick='{"slidesToShow": 1, "arrows": true, "dots": true, "speed": 300,"fade": true,"cssEase": "linear"}'>
        @foreach ($sliders as $slider)
          <div class="slide-item align-v-h bg-overlay bg-overlay-2">
            <div class="bg-img">
              @if ($slider->slider_img)
                  <img src="{{ asset('assets/images/sliders/'.$slider->slider_img) }}" loading="lazy" alt="{{ $slider->title }}">
              @endif
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                  <div class="slide__body">
                    <h2 class="slide__title">{{ $slider->title }}</h2>
                    <p class="slide__desc">{{ $slider->description }}</p>
                    <ul class="slide__icons list-unstyled mb-0 d-flex flex-wrap">
                      <li class="slide__icon"><i class="icon-eco-house"></i></li>
                      <li class="slide__icon"><i class="icon-energy"></i></li>
                      <li class="slide__icon"><i class="icon-green-energy3"></i></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach 
      </div>
    </section>

    <script type="text/javascript">
      $(document).ready(function(){
          $('.slick-carousel').slick({
              slidesToShow: 1,
              arrows: true,
              dots: true,
              speed: 300,
              fade: true,
              cssEase: 'linear'
          });
      });
      </script>