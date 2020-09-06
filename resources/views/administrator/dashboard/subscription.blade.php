@extends('administrator.layouts.app')

@section('content')
<div id="app">
    <user-subscription></user-subscription>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('static/assets/administrator/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('static/assets/administrator/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('static/assets/administrator/js/demo/chart-pie-demo.js') }}"></script>
@endsection