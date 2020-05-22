@extends('layouts.auth')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7 text-center">Please login to continue</h5>
        @include('layouts.partials.status')

        <div class="text-center">
          <a href="{{ route('login.twitter') }}">
            <button type="button" class="btn btn-label btn-twitter">
                <label><i class="fa fa-twitter"></i></label> Sign in with Twitter
              </button>
          </a>
        </div>

        <hr class="w-30">
        <a href="/faqs#collapse-1-1" target="_blank"><small>Why do I need to log in with my Twitter account?</small></a>

      </div>


@endsection
