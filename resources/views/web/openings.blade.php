@extends('web.layouts.master')

@section('meta_description', 'Discover the quality and innovation of Lithros India, the premier manufacturer of batteries for electric vehicles. With a commitment to excellence, Lithros India delivers reliable and high-performance battery solutions, powering the future of sustainable transportation. Explore our range of cutting-edge battery technologies designed to meet the evolving needs of electric vehicles worldwide.')

@section('title', 'Lithros India - Leading Li-Ion Battery Manufacturer in Odisha')

@section('content')
<section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
    <div class="bg-img"><img src="{{ asset('assets/images/page-titles/1.jpg') }}" alt="background"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="pagetitle__heading mb-0">Openings</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Openings</li>
            </ol>
          </nav>
          <a href="#about" class="scroll-down">
            <i class="icon-arrow-down"></i>
          </a>
        </div><!-- /.col-xl-6 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
</section>
@include('web.partials.openings-layout')



@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the Apply Now buttons
        var applyButtons = document.querySelectorAll('.apply-button');

        // Add click event listeners to all the Apply Now buttons
        applyButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                // Get the modal
                var modal = document.getElementById('myModal');

                // Show the modal
                modal.style.display = 'block';
            });
        });
    });
</script>

@endsection
