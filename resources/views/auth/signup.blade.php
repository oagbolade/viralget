@extends('layouts.auth')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-600 mw-100 p-6">
        <h5 class="mb-7 text-center">Kindly update your profile to continue</h5>
        <p>All fields are required</p>
        @include('layouts.partials.status')

        <form class="input-border" method="post" action="{{ route('login.signup.post') }}">
        @csrf
              <div class="form-group">
                <input type="text" name="company_name" class="form-control form-control-lg" placeholder="Company’s name">
              </div>

              <div class="form-group">
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
              </div>
              
              <div class="form-group">
                <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
              </div>

              <div class="form-group">
                <input type="text" name="role" class="form-control form-control-lg" placeholder="Role">
              </div>

              <div class="form-group">
                  <textarea name="address" class="form-control form-control-lg" placeholder="Company Address"></textarea>
              </div>

              <div class="form-group">
                <input name="phone" type="text" class="form-control form-control-lg" placeholder="Phone Number">
              </div>

              <div class="form-group">
                <input name="city" type="text" class="form-control form-control-lg" placeholder="City">
              </div>

              <div class="form-group">
                <textarea name="objective" class="form-control form-control-lg" placeholder="Campaign Objective"></textarea>
              </div>

              <button class="btn btn-block btn-xl btn-success">Complete Signup</button>
            </form>

        <hr class="w-30">

      </div>


@endsection
