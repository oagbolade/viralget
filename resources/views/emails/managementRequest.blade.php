@extends('layouts.email')

@section('content')
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
    <h3>Hello Viralget Rep,</h3>
    <b>{{ $user_details->company_name }}</b> just paid for the <b>{{ $plan_name }}</b> plan. Kindly find more information about their plan below.
</p>
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
    <h3>Name:</h3> {{ $user_details->name }} <br>
    <h3>Company Name:</h3> {{ $user_details->company_name }} <br>
    <h3>Agency Type:</h3> {{ $user_details->agency_type }} <br>
    <h3>Brand Name:</h3> {{ $user_details->company_name }} <br>
    <h3>Brand Industry:</h3> {{ $user_details->brand_industry }} <br>
    <h3>Email:</h3> {{ $user_details->email}} <br>
    <h3>Phone:</h3> {{ $user_details->phone }} <br>
    <h3>Plan Type:</h3> {{ $user_details->booking_type }} <br>
    <h3>Plan Name:</h3> {{ $plan_name }} <br>
    <h3>Amount:</h3> ₦{{ $amount }} <br>
    <h3>Hashtag/Keyword:</h3> {{ $user_details->user_query }} <br>
    <h3>Date & Time:</h3> {{ $user_details->date }} {{ $user_details->time }} <br>
    <h3>Influencers:</h3> {{ ($user_details->influencers != null) ? $user_details->influencers : 'N/A' }} <br><br>
</p>
@endsection