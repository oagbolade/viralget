@extends('layouts.app')


@section('content')
   <!-- Main Content -->
   <main class="main-content">
      <div class="section bg-gray">
        <div class="container" style="margin-top: 100px">
          <div>
            @if(session('success'))
            <div class="alert alert-success" role="alert">
              <h3>{{session('success')}}</h3>
            </div>
            @endif
          </div>
          
          <div id="app">
              <trends-campaign></trends-campaign>
          </div>
        </div>
      </div>
    </main>


@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
