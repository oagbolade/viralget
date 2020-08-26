@extends('administrator.layouts.auth')
@section('content')
<div id="app">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <admin-login></admin-login>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection