@extends('administrator.layouts.app')
@include('administrator.layouts.menu')
@include('administrator.layouts.sidebar')

@section('content')
<div class="content-wrapper">
    <div id="app">
        <admin-dashboard></admin-dashboard>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection