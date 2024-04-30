@extends('web.layouts.master')

@section('meta_description', 'Discover the quality and innovation of Lithros India, the premier manufacturer of batteries for electric vehicles. With a commitment to excellence, Lithros India delivers reliable and high-performance battery solutions, powering the future of sustainable transportation. Explore our range of cutting-edge battery technologies designed to meet the evolving needs of electric vehicles worldwide.')

@section('title', 'Lithros India - Leading Li-Ion Battery Manufacturer in Odisha')

@section('content')
    @include('web.partials.page-title-layout')

    <section id="about" class="about-layout1">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
              <div class="heading__layout2 mb-60">
                <h2 class="heading__subtitle">Leading The Way In Building And Civil Construction</h2>
                <h3 class="heading__title">We Are Ready For Solar Energy, All We Need Is To Use It Well!</h3>
              </div><!-- /.heading__layout2 -->
            </div><!-- /.col-lg-7 -->
          </div><!-- /.row -->
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="post__img">
                    <a href="#">
                      <img src="{{ asset('assets/images/blog/grid/1.jpg') }}" alt="post image">
                    </a>
                  </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section>
@endsection
