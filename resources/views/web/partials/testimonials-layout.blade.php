<section class="pt-0">
      <div class="container">
        <div class="row testimonials-layout2">
          <div class="col-12">
            <div class="testimonials-wrapper">
              <div class="slick-carousel gutter-20"
                data-slick='{"slidesToShow": 2, "arrows": false, "dots": true, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                <!-- Testimonial #1 -->
                @foreach($feedbacks as $feedback)
                  <div class="testimonial-item d-flex">
                      <div class="testimonial__thumb">
                          <img src="{{ asset('assets/uploads/' . $feedback->profile_img) }}" alt="thumb">
                      </div><!-- /.testimonial__thumb -->
                      <div>
                          <div class="testimonial__rating d-flex align-items-center">
                              <div class="mr-20">
                                  @for($i = 1; $i <= 5; $i++)
                                      @if($i <= $feedback->rating)
                                          <i class="fas fa-star"></i>
                                      @else
                                          <i class="far fa-star"></i>
                                      @endif
                                  @endfor
                              </div>
                          </div><!-- /.testimonial__rating -->
                          <h4 class="testimonial__desc">{{ $feedback->description }}</h4>
                          <div class="testimonial__meta">
                              <h4 class="testimonial__meta-title">{{ $feedback->name }}</h4>
                              <p class="testimonial__meta-desc">{{ $feedback->designation }}</p>
                          </div><!-- /.testimonial-meta -->
                      </div>
                  </div>
                @endforeach

              </div><!-- /.carousel -->
            </div>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Text Content -->