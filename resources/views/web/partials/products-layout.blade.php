<section id="shop" class="shop-grid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
          <strong>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products</strong>
          <select style="display: none;">
            <option selected="" value="0">Sort by latest</option>
            <option value="2">Sort by highest Price </option>
            <option value="3">Sort by lowest Price </option>
          </select><div class="nice-select" tabindex="0"><span class="current">Sort by latest</span><ul class="list"><li data-value="0" class="option selected focus">Sort by latest</li><li data-value="1" class="option">Sort by Popular</li><li data-value="2" class="option">Sort by highest Price </li><li data-value="3" class="option">Sort by lowest Price </li></ul></div>
        </div>
        <div class="row">
          <!-- Product item #1 -->
          @foreach ($products as $product)

            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="product-item">
                    <div class="product__img">
                      @if ($product->images)
                          <img src="{{ asset('assets/images/products/'.$product->images->first()->filename) }}" loading="lazy">
                      @endif
                        <div class="product__action">
                          <a href="{{ route('web.products.show_by_slug', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}" class="btn btn__secondary">
                            <i class="icon-search"></i> <span>Enquire Now</span>
                        </a>                     
                        </div>
                    </div>
                    <div class="product__info">
                        <h4 class="product__title"><a href="productDetails">{{ $product->name }}</a></h4>
                        <span class="product__price">₹{{ $product->mrp }}</span>
                    </div>
                </div>
            </div>
          @endforeach

        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <nav class="pagination-area">
                  <ul class="pagination justify-content-center">
                      {{ $products->links() }}
                  </ul>
              </nav>
          </div>
      </div>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3">
        <aside class="sidebar-layout2">
          <div class="widget widget-categories widget-categories-layout2">
            <h5 class="widget__title">Categories</h5>
            <div class="widget-content">
              <ul class="list-unstyled mb-0">
                <ul class="list-unstyled mb-0">
                  @foreach ($categories as $category)
                      <li><a href="#"><span class="cat-count">{{ $category->products_count }}</span><span>{{ $category->name }}</span></a></li>
                  @endforeach
              </ul>
              </ul>
            </div>
          </div>
          {{-- <div class="widget widget-poducts">
            <h5 class="widget__title">Latest Products</h5>
            <div class="widget__content">
              <!-- product item #1 -->
              <div class="widget-product-item d-flex align-items-center">
                <div class="widget-product__img">
                  <a href="#"><img src="assets/images/products/3.jpg" alt="Product" loading="lazy"></a>
                </div><!-- /.product-product-img -->
                <div class="widget-product__content">
                  <h5 class="widget-product__title"><a href="#">Calming Herps</a></h5>
                  <span class="widget-product__price">$ 38.00</span>
                </div><!-- /.widget-product-content -->
              </div><!-- /.widget-product-item -->
              <!-- product item #2 -->
              <div class="widget-product-item d-flex align-items-center">
                <div class="widget-product__img">
                  <a href="#"><img src="assets/images/products/9.jpg" alt="Product" loading="lazy"></a>
                </div><!-- /.product-product-img -->
                <div class="widget-product__content">
                  <h5 class="widget-product__title"><a href="#">Goji Powder</a></h5>
                  <span class="widget-product__price">$ 33.00</span>
                </div><!-- /.widget-product-content -->
              </div><!-- /.widget-product-item -->
              <!-- product item #3 -->
              <div class="widget-product-item d-flex align-items-center">
                <div class="widget-product__img">
                  <a href="#"><img src="assets/images/products/4.jpg" alt="Product" loading="lazy"></a>
                </div>
                <div class="widget-product__content">
                  <h5 class="widget-product__title"><a href="#">Biotin Complex</a></h5>
                  <span class="widget-product__price">$ 18.00</span>
                </div>
              </div>
            </div>
          </div> --}}
        </aside>
      </div>
    </div>
  </div>
</section>