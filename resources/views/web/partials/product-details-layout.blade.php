<section class="shop pt-40 pt-5 my-5">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="row product-item-single">
                  <div class="col-sm-6">
                      <div class="product__img">
                          <img src="{{ asset('assets/images/products/'.$product->image) }}" class="zoomin" alt="{{ $product->name }}" loading="lazy">
                      </div><!-- /.product-img -->
                  </div>
                  <div class="col-sm-6">
                      <h1 class="product__title">{{ $product->name }}</h1>
                      <div class="product__meta-review mb-20">
                          <span class="product__rating">
                              <!-- Add your rating icons here -->
                          </span>
                          <span>{{ $product->reviews_count }} Review(s)</span> <!-- Assuming you have a reviews_count attribute -->
                          <a href="#">Add Review</a>
                      </div><!-- /.product-meta-review -->
                      <span class="product__price mb-20">${{ $product->mrp }}</span>
                      <div class="product__desc">
                          <p>{{ $product->description }}</p>
                      </div>
                      <div class="product__meta-details">
                          <ul class="list-unstyled mb-30">
                              <li><span>Battery Pack Energy :</span> <span>{{ $product->battery_pack_energy }}</span></li>
                              <!-- Add other product details here -->
                          </ul>
                      </div>
                  </div>
              </div><!-- /.row -->
              <div class="product__details mt-100">
                  <nav class="nav nav-tabs">
                      <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                      <a class="nav__link" data-toggle="tab" href="#Details">Details</a>
                      <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews ({{ $product->reviews_count }})</a> <!-- Assuming you have a reviews_count attribute -->
                  </nav>
                  <div class="tab-content mb-50" id="nav-tabContent">
                      <div class="tab-pane fade active show" id="Description">
                          <p>{{ $product->description }}</p>
                      </div>
                      <div class="tab-pane fade" id="Details">
                          <p>{{ $product->details }}</p>
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
