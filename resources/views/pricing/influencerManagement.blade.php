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


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Pricing
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->


      <section class="section">
        <div class="container">
              <p class="lead-5 text-center text-dark fw-600 lh-2 mb-5">Select a pricing plan</p>

          <div class="row gap-y align-items-center">
          @include('layouts.partials.status')

          
            <div class="col-md-4">
              <div class="pricing-1">
                <p class="plan-name">Free</p>
                <br>
                <h2 class="price">0</h2>
                <p class="small">&nbsp;</p>

                <div class="text-muted">
                  <small>7 Days Report</small><br>
                  <small>100 Tweets Analysis</small><br>
                  <small>10 Reports Queries</small><br>
                  <small>5 Profiling Queries</small><br><br><br><br>
                </div>

                <br>
                <p class="text-center py-3">
                @if($user && !$user->subscription) 
                  <a class="btn btn-primary" href="{{ route('subscribe', ['plan' => 'free'])}}" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">                
                    Get Started
                   </a>
                  @endif
                </p>
              </div>
            </div>


            <div class="col-md-4">
              <div class="pricing-1 popular">
                <p class="plan-name">Premium</p>
                <br>
                <h2 class="price text-success">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="9" data-yearly="99">15k</span>
                  <span class="plan-period" data-bind-radio="pricing" data-monthly="/mo" data-yearly="/yr">/mo</span>
                </h2>
                <p class="small">&nbsp;</p>

                <div class="text-muted">
                  <small>7-14 Days Report</small><br>
                  <small>250 Tweets Analysist</small><br>
                  <small>15 Reports Queries</small><br>
                  <small>10 Profiling Queries</small><br>
                  
                </div>

                <br>
                <p class="text-center py-3">
                <a class="btn btn-success" href="{{ route('subscribe', ['plan' => 'premium'])}}" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">                
                  @if($user && $user->subscription && $user->subscription->plan->name == 'Free') 
                    Upgrade 
                  @else
                    Get Started
                  @endif
                  </a>
                </p>
              </div>
            </div>


            <div class="col-md-4">
              <div class="pricing-1">
                <p class="plan-name">Enterprise</p>
                <br>
                <h2 class="price">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">40k</span>
                  <span class="plan-period" data-bind-radio="pricing" data-monthly="/mo" data-yearly="/yr">/mo</span>
                </h2>
                <p class="small">&nbsp;</p>

                <div class="text-muted">
                  <small>7-30 Days Report</small><br>
                  <small>500 Tweets Analysis</small><br>
                  <small>25 Reports Queries</small><br>
                  <small>25 Profiling Queries</small><br>
                  <small>Excel Exports</small><br>
                  <small>24/7 Support</small><br>
                  <small>Free 250k Tweets Impressions</small><br>
                  
                </div>

                <br>
                <p class="text-center py-3">
                  <a class="btn btn-primary" href="{{ route('subscribe', ['plan' => 'enterprise'])}}" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
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
      </section>


</main>

@endsection