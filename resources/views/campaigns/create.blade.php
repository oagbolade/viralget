@extends('layouts.app')


@section('content')
   <!-- Main Content -->
   <main class="main-content bg-gray">
      <div class="section">
        <div class="container" style="margin-top: 100px">

             <div id="app">
                 <create-campaign></create-campaign>
              </div>

        </div>
      </div>
    </main>


@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
