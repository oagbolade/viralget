@extends('layouts.app')

@section('content')
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
    @push('pricingStyles')
      <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">
    @endpush

    <p class="lead-5 text-center text-dark fw-600 lh-2 mb-5">Select a pricing plan</p>
    <section class="pricing py-5">
      <div class="container">

        <div class="row">
          <!-- Free Tier -->
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">STARTERS - FREE</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">0</span>
                  <span class="period">/month</span>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Access to Influencer Database</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Advance Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Economic Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>2 Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>2 Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span> Last 7 Days</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 100 Tweets per Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Reports</li>
                  {{-- Negative sample --}}
                  {{-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li> --}}
                </ul><br><br>
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
                <h5 class="card-title text-muted text-uppercase text-center">BASIC </h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">9,999</span>
                  <span class="period">/month</span>
                </h6>            <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Access to Influencer Database</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Advance Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Economic Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>5 Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>5 Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span> Last 14 Days</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 500 Tweets per Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Reports</li>
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
                <h5 class="card-title text-muted text-uppercase text-center">PREMIUM LITE</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">45,999</span>
                  <span class="period">/month</span>
                </h6>            <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Access to Influencer Database</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Advance Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Economic Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>10 Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>10 Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Last 30 Days</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 2000 Tweets per Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Email Support</li>
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
        
        <div class="justify-content-center row">
          <!-- 2nd Free Tier -->
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">PREMIUM BUSINESS</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">85,999</span>
                  <span class="period">/month</span>
                </h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Access to Influencer Database</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Advance Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Economic Stats</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>20 Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>20 Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Last 30 Days</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 2500 Tweets per Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Twitter Historic Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>24/7 Email Support</li>
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
                <h5 class="card-title text-muted text-uppercase text-center">ENTERPRISE</h5>
                <h6 class="card-price text-center">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">199,999</span>
                  <span class="period">/month</span>
                </h6>            <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Access to Influencer Database</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>25 Influencer Profiling</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>25 Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Last 30 Days</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 4500 Tweets per Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Reports</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Twitter Live Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Twitter Historic Report</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Support: Dedicated Agent</li>
                </ul><br>
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
        </div>
      </div>
    </section>
    </main>
<style>
  .card{
    min-height: 800px;
  }
</style>
@endsection