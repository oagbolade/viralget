@extends('layouts.auth')

@section('content')
<!-- Main Content -->
<main class="main-content">
  <link href="{{ asset('static/assets/css/select2.min.css') }}" rel="stylesheet" />
  <div class="bg-white rounded shadow-7 w-600 mw-100 p-6">
    <h5 class="mb-7 text-center">Kindly give us details about your campaign</h5>
    <p>All fields are required</p>
    @include('layouts.partials.status')
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
      <div class="error">{{ $errors->first('name') }}</div>
      <div class="error">{{ $errors->first('agency_type') }}</div>
      <div class="error">{{ $errors->first('bookingType') }}</div>
      <div class="error">{{ $errors->first('position') }}</div>
      <div class="error">{{ $errors->first('agency_type') }}</div>
      <div class="error">{{ $errors->first('email') }}</div>
      <div class="error">{{ $errors->first('phone') }}</div>
      <div class="error">{{ $errors->first('user_query') }}</div>
      <div class="error">{{ $errors->first('date') }}</div>
      <div class="error">{{ $errors->first('brand_name') }}</div>
      <div class="error">{{ $errors->first('brand_industry') }}</div>
      <div class="error">{{ $errors->first('campaign_objective') }}</div>
      <div class="error">{{ $errors->first('errors') }}</div>
    </div>
    @endif

    <form class="input-border" method="post"
      action="{{ route('signup.post.managements', ['bookingType' => $bookingType, 'plan' => request()->plan]) }}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Name</label>
          <input type="text" name="name" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-6">
          <label>Company's Name</label>
          <input type="text" name="company_name" class="form-control form-control-lg">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Agency Type</label>
          <select class="form-control form-control-lg" name="agency_type">
            <option value="">Select Agency Type</option>
            <option value="agency">Agency</option>
            <option value="brand">Brand</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Position</label>
          <input type="text" name="position" class="form-control form-control-lg">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Email</label>
          <input name="email" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-6">
          <label>Phone Number</label>
          <input name="phone" type="text" class="form-control form-control-lg">
        </div>
      </div>

      <div class="form-row">
        @if($bookingType === 'influencer_management')
        <div class="form-group col-md-6">
          <label>Influencer Username</label>
          <select class="form-control js-tokenizer form-control-lg" name="influencers[]" multiple="multiple">
            <option value="">@username Seperate with a space or comma</option>
          </select>
        </div>
        @endif

        <div class="form-group col-md-6">
          <label>Keyword/Hashtag to trend</label>
          <input name="user_query" type="text" class="form-control">
        </div>
      </div>

      @if($bookingType === 'trends')
      <div class="alert alert-primary" role="alert">
        Note: You can only select a date 48hrs onwards from when you are filling this form
      </div>
      <div class="form-row">
        <h6>When do you want your keyword/hashtag to trend?</h6>
        <div class="form-group col-md-6">
          <input type="text" name="date" class="date-trends form-control date form-control-lg text-center" />
        </div>
        <div class="form-group col-md-6">
          <select class="form-control form-control-lg" name="time">
            <option value="">Select Time</option>
            <option value="morning">Morning 8:00-11:59am</option>
            <option value="afternoon">Afternoon 12:00-3:59pm</option>
            <option value="evening">Evening 4:00-10:00pm</option>
          </select>
        </div>
      </div>
      @endif
      
      @if($bookingType === 'influencer_management')
      {{-- <div class="alert alert-primary" role="alert">
        Note: You can only select a date 48hrs onwards from when you are filling this form
      </div> --}}
      <div class="form-row">
        <label>Date</label>
        {{-- <h6 class="text-center">Pick a date</h6> --}}
        <div class="form-group col-md-12">
          <input type="text" name="date" class="date-influencer form-control date form-control-lg text-center" />
        </div>
      </div>
      @endif

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Brand Name</label>
          <input name="brand_name" type="text" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-6">
          <label>Brand Industry</label>
          <input name="brand_industry" type="text" class="form-control form-control-lg">
        </div>
      </div>

      <div class="form-group">
        <label>Campaign Objective</label>
        <textarea name="campaign_objective" class="form-control form-control-lg"></textarea>
      </div>

      <button class="btn btn-block btn-xl btn-success">Submit</button>
    </form>
    <hr class="w-30">
  </div>


  @endsection
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

  <script>
    $(function() {
    $('.date-trends').daterangepicker({
      opens: 'center',
      autoApply: true,
      singleDatePicker: true,
      showDropdowns: true,
      minDate: moment().add(2, 'days'),
      minYear: moment().year(),
      locale: {
      format: 'YYYY-MM-DD',
      "separator": " - ",
      }
    }, function(start, end, label) {
      console.log('start', start.format('YYYY-MM-DD'))
    });
  });
    
  $(function() {
    $('.date-influencer').daterangepicker({
      opens: 'center',
      autoApply: true,
      singleDatePicker: true,
      showDropdowns: true,
      // minDate: moment().add(2, 'days'),
      minYear: moment().year(),
      locale: {
      format: 'YYYY-MM-DD',
      "separator": " - ",
      }
    }, function(start, end, label) {
      console.log('start', start.format('YYYY-MM-DD'))
    });
  });

  $(document).ready(function() {
    $(".js-tokenizer").select2({
    tags: true,
    // maximumSelectionLength: 2,
    placeholder: 'Seperate with a space or comma',
    tokenSeparators: [',', ' ']
    });
  });
  </script>