@extends('layouts/layoutMaster')

@section('title', 'Blank layout - Layouts')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-validation.js')}}"></script>
@endsection
@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Forms /</span> Validation
</h4>
<div class="row mb-4">
<!-- Bootstrap Validation -->
<div class="col-md">
    <div class="card">
      <h5 class="card-header">Bootstrap Validation</h5>
      <div class="card-body">
        <form class="needs-validation" novalidate>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-name">Name</label>
            <input type="text" class="form-control" id="bs-validation-name" placeholder="John Doe" required />
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please enter your name. </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-email">Email</label>
            <input type="email" id="bs-validation-email" class="form-control" placeholder="john.doe" aria-label="john.doe" required />
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please enter a valid email </div>
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="bs-validation-password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="bs-validation-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
              <span class="input-group-text cursor-pointer" id="basic-default-password4"><i class="ti ti-eye-off"></i></span>
            </div>
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please enter your password. </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-country">Country</label>
            <select class="form-select" id="bs-validation-country" required>
              <option value="">Select Country</option>
              <option value="usa">USA</option>
              <option value="uk">UK</option>
              <option value="france">France</option>
              <option value="australia">Australia</option>
              <option value="spain">Spain</option>
            </select>
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please select your country </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-dob">DOB</label>
            <input type="text" class="form-control flatpickr-validation" id="bs-validation-dob" required />
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please Enter Your DOB </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-upload-file">Profile pic</label>
            <input type="file" class="form-control" id="bs-validation-upload-file" required />
          </div>
          <div class="mb-3">
            <label class="d-block form-label">Gender</label>
            <div class="form-check mb-2">
              <input type="radio" id="bs-validation-radio-male" name="bs-validation-radio" class="form-check-input" required checked/>
              <label class="form-check-label" for="bs-validation-radio-male">Male</label>
            </div>
            <div class="form-check">
              <input type="radio" id="bs-validation-radio-female" name="bs-validation-radio" class="form-check-input" required />
              <label class="form-check-label" for="bs-validation-radio-female">Female</label>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-bio">Bio</label>
            <textarea class="form-control" id="bs-validation-bio" name="bs-validation-bio" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="bs-validation-checkbox" required />
              <label class="form-check-label" for="bs-validation-checkbox">Agree to our terms and conditions</label>
              <div class="invalid-feedback"> You must agree before submitting. </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="switch switch-primary">
              <input type="checkbox" class="switch-input" required />
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label">Send me related emails</span>
            </label>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Bootstrap Validation -->
</div>
<div></div>
</div>
