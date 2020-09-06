@extends('administrator.layouts.app')

@section('content')
<div id="app">
    <admin-dashboard></admin-dashboard>
</div>
@endsection

@section('scripts')
<script src="{{ asset('administrator/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('administrator/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('administrator/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('administrator/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('administrator/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('administrator/js/demo/chart-pie-demo.js') }}"></script>
@endsection