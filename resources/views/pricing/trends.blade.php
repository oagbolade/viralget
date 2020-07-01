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
                <p class="plan-name">Top 10</p>
                <br>
                {{-- <h2 class="price">N457,950</h2> --}}
                <h2 class="price">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="9" data-yearly="99">457,950</span>
                  <span class="plan-period" data-bind-radio="pricing" data-monthly="/mo" data-yearly="/yr">/mo</span>
                </h2>
                <p class="small">&nbsp;</p>

                <div class="text-muted">
                  <small>Minimum of 20 Influencers</small><br>
                  <small>Influencer Profiling</small><br>
                  <small>Content Creation/Tweetbank</small><br>
                  <small>Up to 200 Tweets</small><br>
                  <small>2/3 Hours on Trending Topics</small><br>
                  <small>Influencer Management</small><br>
                  <small>Comprehensive Report</small><br><br><br><br>
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
                <p class="plan-name">Top 5</p>
                <br>
                <h2 class="price text-success">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="9" data-yearly="99">15k</span>
                  <span class="plan-period" data-bind-radio="pricing" data-monthly="/mo" data-yearly="/yr">/mo</span>
                </h2>
                <p class="small">&nbsp;</p>

                <div class="text-muted">
                  <small>Minimum of 30 Influencers</small><br>
                  <small>Influencer Profiling</small><br>
                  <small>Content Creation/Tweetbank</small><br>
                  <small>Up to 300 Tweets</small><br>
                  <small>3 Hours on Trending Topics</small><br>
                  <small>Influencer Management</small><br>
                  <small>Comprehensive Report</small><br>
                  
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
                <p class="plan-name">Number 1</p>
                <br>
                <h2 class="price">
                  <span class="price-unit">&#8358;</span>
                  <span data-bind-radio="pricing" data-monthly="39" data-yearly="399">40k</span>
                  <span class="plan-period" data-bind-radio="pricing" data-monthly="/mo" data-yearly="/yr">/mo</span>
                </h2>
                <p class="small">&nbsp;</p>

                <div class="text-muted">
                  <small>Minimum of 40 Influencers</small><br>
                  <small>Influencer Profiling</small><br>
                  <small>Content Creation/Tweetbank</small><br>
                  <small>Up to 400 Tweets</small><br>
                  <small>3 Hours on Trending Topics</small><br>
                  <small>Influencer Management</small><br>
                  <small>Comprehensive Report</small><br>
                  
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