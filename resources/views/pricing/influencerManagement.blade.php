@extends('layouts.app')

@section('content')
  @push('pricingStyles')
      <link href="{{ asset('static/assets/css/pricing.css') }}" rel="stylesheet">
  @endpush
   <!-- Header -->
   <header class="header bg-gray" style="background: #fafbfb url('/images/social.png') 800px bottom no-repeat">
      <div class="container">
        <div class="row gap-y">
          <div class="col-md-6">
            <h1 class="display-5">Choose the best plan for your business</h1>
            <p class="lead-2 mt-6">The most fair pricing plans ever. Our prices are very easy to understand. There's not any extra or hidden fee. You just pay what is listed here.</p>
          </div>
        </div>
      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">
    <p class="lead-5 text-center text-dark fw-600 lh-2 mb-5">Select a pricing plan</p>
    <section class="pricing py-5">
      <div class="container">

        <div class="row">
          <!-- Free Tier -->
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">TOP 10</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">457,950</span>
                  <span class="period">/month</span>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Minimum of 20 Influencers</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Content Creation/Tweetbank</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 200 Tweets</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>2/3 Hours on Trending Topics</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Influencer Management</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Comprehensive Report</li>
                  {{-- Negative sample --}}
                  {{-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li> --}}
                </ul>
                <p class="text-center py-3">
                  <a class="btn btn-block btn-primary text-uppercase" href="{{ route('subscribe', ['plan' => 'enterprise'])}}" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                  @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise') 
                    Upgrade 
                  @else
                    Get Started
                  @endif
                  </a>
                </p>
              </div>
            </div>
          </div>
          <!-- Plus Tier -->
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">TOP 5</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">580,500</span>
                  <span class="period">/month</span>
                </h6>            <hr>
                <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Minimum of 30 Influencers</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Content Creation/Tweetbank</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 300 Tweets</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>2/3 Hours on Trending Topics</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Influencer Management</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Comprehensive Report</li>
                </ul>
                <p class="text-center py-3">
                  <a class="btn btn-block btn-warning text-uppercase" href="{{ route('subscribe', ['plan' => 'enterprise'])}}" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                  @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise') 
                    Upgrade 
                  @else
                    Get Started
                  @endif
                  </a>
                </p>            
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">NUMBER 1</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">864,300</span>
                  <span class="period">/month</span>
                </h6>            <hr>
                <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Minimum of 40 Influencers</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Content Creation/Tweetbank</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 400 Tweets</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>3 Hours on Trending Topics</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Influencer Management</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Comprehensive Report</li>
                </ul>
                <p class="text-center py-3">
                  <a class="btn btn-block btn-success text-uppercase" href="{{ route('subscribe', ['plan' => 'enterprise'])}}" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                  @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise') 
                    Upgrade 
                  @else
                    Get Started
                  @endif
                  </a>
                </p>            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </main>

@endsection