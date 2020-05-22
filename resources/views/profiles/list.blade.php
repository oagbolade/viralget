@extends('layouts.app')


@section('content')
   <!-- Main Content -->
   <main class="main-content">
      <div class="section bg-gray">
        <div class="container" style="margin-top: 100px">

             <div id="app">
                 <search-result q='{{ $q }}' category='{{ $category  }}' keyword='{{ $keyword }}' er='{{ $er }}'></search-result>
              </div>

        </div>
      </div>
    </main>


@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
