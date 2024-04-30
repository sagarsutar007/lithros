<section class="shop pt-40 pt-5 my-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row product-item-single">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                @if ($product->images)
                <img src="{{ asset('assets/images/products/'.$product->images->first()->filename) }}" class="img-fluid" loading="lazy">
                @endif
            </div>
            <div class="col-sm-6">
              <h1 class="product__title">{{ $product->name }}</h1>
              <div class="product__meta-review mb-20">
                <span class="product__rating">
                  <i class="fa fa-star active"></i>
                  <i class="fa fa-star active"></i>
                  <i class="fa fa-star active"></i>
                  <i class="fa fa-star active"></i>
                  <i class="fa fa-star"></i>
                </span>
                <span>4 Review(s)</span>
                <a href="#">Add Review</a>
              </div><!-- /.product-meta-review -->
              <span class="product__price mb-20">₹{{ $product->mrp??'Not Available' }}</span>
              <div class="product__desc">
                <p>{{ $product->description }}</p>
              </div>
              <div class="product__meta-details">
                <ul class="list-unstyled mb-30">
                    @foreach ($product->specifications as $spec)
                        <li><span>{{ $spec->key }}:</span> <span>{{ $spec->value }}</span></li>
                    @endforeach
                </ul>
            </div>
          </div><!-- /.row -->
          <div class="product__details mt-100">
            <nav class="nav nav-tabs">
              <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
              <a class="nav__link" data-toggle="tab" href="#Details">Details</a>
              <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
            </nav>
            <div class="tab-content mb-50" id="nav-tabContent">
              <div class="tab-pane fade active show" id="Description">
                <p>It doesn’t contain as much as coffee, but enough to produce a response without causing the jittery
                  effects associated with taking in too much caffeine. Caffeine affects the brain by blocking an
                  inhibitory neurotransmitter called adenosine. This way, it increases the firing of neurons and the
                  concentration of neurotransmitters like dopamine and norepinephrine (4Trusted Source, 5). Research
                  has consistently shown that caffeine can improve various aspects of brain function, including mood,
                  vigilance, reaction time, and memory (6).</p>
              </div>
              <div class="tab-pane fade" id="Details">
                <p>Yorks is not just about graphic design; it's more than that. We offer integral communication
                  services, and we're responsible for our process and results. We thank each of our clients and their
                  portfolios; thanks to them we have grown and built what we are today! After all</p>
                <p>as described in Web
                  Design Trends 2015 &amp; 2016, vision dominates a lot of our subconscious interpretation of the world
                  around us. On top of that, pleasing images create a better user experience.
                  At League Agency, we shows only the best websites and portfolios built completely with passion,
                  simplicity &amp; creativity !</p>
              </div>
              <div class="tab-pane fade" id="Reviews">
                <form class="reviews__form">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                      </div>
                    <div class="col-12">
                      <div class="form-group">
                        <textarea class="form-control" placeholder="Review"></textarea>
                      </div>
                      <button type="submit" class="btn btn__primary btn__rounded">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>