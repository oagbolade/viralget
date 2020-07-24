@extends('layouts.app')

@section('content')

   <main class="main-content" id="app">
      <div class="section bg-gray">
        <div class="container" style="margin-top: 100px; min-height: 100vh">
            @if(isset($is_hashtag))
            <management-hashtag-loading q='{{ urlencode($q) }}' plan_id='{{ $plan_id }}' user_details_id='{{ $user_details_id }}'/>
            @else
            <management-profile-loading q='{{ $q }}' keyword='{{ $keyword }}' plan_id='{{ $plan_id }}' user_details_id='{{ $user_details_id }}' reload='{{(isset($reload)) ? $reload : false}}'/>
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
