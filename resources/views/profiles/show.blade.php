@extends('layouts.app')

@section('content')

   <main class="main-content" id="app">
      <div class="section bg-gray">
        <div class="container" style="margin-top: 100px; min-height: 100vh">
            @if(isset($is_hashtag))
            <hashtag-loading q='{{ urlencode($q) }}' plan='{{ $plan }}' from='{{ request()->fromDate }}' to='{{ request()->toDate }}' location='{{ $location }}'/>
            @else
            <profile-loading q='{{ $q }}' reload='{{(isset($reload)) ? $reload : false}}'/>
            @endif
        </div>
      </div>

     </main><!-- /.main-content -->

@endsection

@section('scripts')
<script>
    const query = "{{ $q }}";
</script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
