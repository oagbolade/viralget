@extends('layouts.app')


@section('content')
   <!-- Main Content -->
   <main class="main-content">
      <div class="section bg-gray">
        <div class="container" style="margin-top: 100px">
             <div id="app">
                 <view-campaign></view-campaign>
              </div>
        </div>
      </div>
    </main>


@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
