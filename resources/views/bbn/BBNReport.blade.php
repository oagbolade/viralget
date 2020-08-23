@extends('layouts.app')

@section('content')

<main class="main-content" id="app">
    <div class="section bg-gray">
        <div class="container" style="margin-top: 100px; min-height: 100vh">
            @include('layouts.partials.status')
            <bbn-data />
        </div>
    </div>

</main><!-- /.main-content -->

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection