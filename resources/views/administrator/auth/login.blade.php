@extends('administrator.layouts.auth')
@section('content')
<div id="app">
    <admin-login></admin-login>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection