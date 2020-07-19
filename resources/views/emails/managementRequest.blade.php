@extends('layouts.email')

@section('content')
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
    <h3>Hello Whavit Rep,</h3>
    {{-- <b>{{ $data['name'] }}</b> has a request for disinfection services. Kindly find the content of the request below. --}}
</p>
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
    {{-- <h3>Name:</h3> {{ $data['name'] }} <br>
    <h3>Email:</h3> {{ $data['email'] }} <br>
    <h3>Phone:</h3> {{ $data['phone'] }} <br>
    <h3>Company Name:</h3> {{ $data['company_name'] }} <br>
    <h3>Number of Square Metres:</h3> {{ $data['square_metres'] }} <br>
    <h3>Total Amount:</h3> ₦{{ $data['square_metres_amount'] }} <br><br> --}}
</p>
@endsection