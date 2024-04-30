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
          @foreach($careers as $career)
          <div class="col-sm-4 col-md-4 col-lg-4 my-4">
             <div class="job-item">
                <div class="job__meta d-flex align-items-center">
                   <span class="job__type">{{ $career->job_type }}</span>
                   <span class="job__location">{{ $career->job_location }}</span>
                </div>
                <h4 class="job__title">{{ $career->job_title }}</h4>
                <p class="job__desc">{{ $career->job_description }}</p>
                <!-- Add more details as needed -->
                <a href="#" class="btn btn__secondary btn__outlined btn__custom" onclick="$('#exampleModal').modal('show'); return false;">
                <span>Apply Now</span>
                <i class="icon-arrow-right"></i>
                </a>
             </div>
          </div>
          @endforeach
       </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Apply For Job</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form class="contact-panel__form" action="{{ route('applicants.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="full_name">Full Name:</label>
                                      <input type="text" class="form-control" id="full_name" name="full_name" required placeholder="Enter your full name">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="email">Email Address:</label>
                                      <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="phone">Phone Number:</label>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="address">Address:</label>
                                      <input type="text" class="form-control" id="address" name="address" required placeholder="Enter your address">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="position">Position Applied For:</label>
                                      <input type="text" class="form-control" id="position" name="position" required placeholder="Enter the position you're applying for">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="start_date">Start Date:</label>
                                      <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter joining date">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="salary_expectations">Salary Expectations:</label>
                                      <input type="text" class="form-control" id="salary_expectations" name="salary_expectations" placeholder="Enter your salary expectations">
                                   </div>
                                </div>
                                <!-- Education Background -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="education">Highest Level of Education:</label>
                                      <input type="text" class="form-control" id="education" name="education" required placeholder="Enter your highest level of education">
                                   </div>
                                </div>
                                <!-- Work Experience -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="work_experience">Work Experience:</label>
                                      <textarea class="form-control" id="work_experience" name="work_experience" rows="4" placeholder="Enter your work experience"></textarea>
                                   </div>
                                </div>
                                <!-- Skills and Qualifications -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="skills">Relevant Skills:</label>
                                      <textarea class="form-control" id="skills" name="skills" rows="4" placeholder="Enter your relevant skills"></textarea>
                                   </div>
                                </div>
                                <!-- References -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="references">References:</label>
                                      <textarea class="form-control" id="references" name="references" rows="4" placeholder="Enter your references"></textarea>
                                   </div>
                                </div>
                                <!-- Cover Letter (Optional) -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="cover_letter">Cover Letter:</label>
                                      <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4" placeholder="Write Something Interesting"></textarea>
                                   </div>
                                </div>
                                <!-- Resume/CV (Optional) -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="resume">Resume/CV:</label>
                                      <div class="input-group">
                                         <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="resume">
                                            <label class="custom-file-label" for="resume">Choose file</label>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <!-- Additional Information -->
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label for="additional_info">Additional Information:</label>
                                      <textarea class="form-control" id="additional_info" name="additional_info" rows="4" placeholder="Any additional information"></textarea>
                                   </div>
                                </div>
                                <!-- Consent and Agreement -->
                                <div class="col-sm-6 mb-4">
                                   <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                                      <label class="form-check-label" for="consent">
                                      I consent to background checks and agree to the terms and conditions.
                                      </label>
                                   </div>
                                </div>
                            </div>
                         </form>


                     </div>
                 </div>
                 <div class="modal-footer justify-content-end">
                     <button type="submit" class="btn btn__primary"><i class="icon-arrow-right"></i>Apply Now</button>
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
    });
 </script>
 @endsection
