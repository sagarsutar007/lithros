<section id="careers" class="careers pb-70">
  <div class="container">
     <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
           <div class="heading text-center mb-50">
              <span class="heading__subtitle">Work With Us!</span>
              <h2 class="heading__title">Building Relationships With Clients All Over The World!</h2>
           </div>
        </div>
     </div>

     <div class="row">
        @foreach($openings as $opening)
        <div class="col-sm-4 col-md-4 col-lg-4 my-4">
           <div class="job-item">
              <div class="job__meta d-flex align-items-center">
                 <span class="job__type">{{ $opening->type }}</span>
                 <span class="job__location">{{ $opening->location }}</span>
              </div>
              <h4 class="job__title">{{ $opening->title }}</h4>
              <p class="job__desc">{{ $opening->about }}</p>
              <!-- Add more details as needed -->
              <a href="#" class="btn btn__secondary btn__outlined btn__custom" onclick="$('#exampleModal').modal('show'); return false;">
              <span>Apply Now</span>
              <i class="icon-arrow-right"></i>
              </a>
           </div>
        </div>
        @endforeach
     </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <nav class="pagination-area">
            <ul class="pagination justify-content-center">
                @if ($openings->onFirstPage())
                        <li class="disabled current"></li>
                    @else
                        <li><a href="{{ $openings->previousPageUrl() }}" rel="prev"><i class="fas fa-arrow-left"></i></a></li>
                    @endif

                        @foreach ($openings->getUrlRange(1, $openings->lastPage()) as $page => $url)
                            <li class="{{ $page == $openings->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                    @if ($openings->hasMorePages())
                        <li><a href="{{ $openings->nextPageUrl() }}" rel="next"</a><i class="fas fa-arrow-right"></i></li>
                    @else
                        <li class="disabled"></li>
                    @endif
            </ul>
            </nav>
        </div>
    </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Apply For Job</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form id="applicationForm" class="contact-panel__form" action="{{ route('applicants.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="full_name">Full Name:</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" required placeholder="Enter your full name" value="{{ old('full_name') }}">
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Email Address -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email Address:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required placeholder="Enter your email address" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Phone Number -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- CV -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cv">CV:</label>
                                    <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" required>
                                    @error('cv')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" id="submitForm" class="btn btn__primary"><i class="icon-arrow-right"></i>Apply Now</button>
                        </div>
                    </form>
                    
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>


<!-- Add this JavaScript code at the bottom of your Blade file -->
@section('scripts')
<script>
   $(document).ready(function () {
       $('.btn__custom').click(function () {
           $('#exampleModal').modal('show');
       });
 
      //  $('#submitForm').click(function() {
      //      var form = $('#applicationForm');
      //      $.ajax({
      //          type: form.attr('method'),
      //          url: form.attr('action'),
      //          data: form.serialize(),
      //          success: function(response) {
      //              // Handle success response
      //              if (response.success) {
      //                  // Show success message
      //                  alert('Application submitted successfully!');
      //                  // Close modal
      //                  $('#exampleModal').modal('hide');
      //                  // Optionally, you can reset the form fields
      //                  form[0].reset();
      //              } else {
      //                  // Show error message
      //                  alert('Failed to submit application. Please try again.');
      //              }
      //          },
      //          error: function() {
      //              // Handle error
      //              alert('An error occurred while submitting the form. Please try again later.');
      //          }
      //      });
      //  });
   });
 </script>
 
@endsection
