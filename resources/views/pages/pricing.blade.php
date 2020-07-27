@extends('layouts.app')

@section('content')
<!-- Header -->
<header class="header bg-gray" style="background: #fafbfb url('/images/social.png') 800px bottom no-repeat">
  <div class="container">
    <div class="row gap-y">
      <div class="col-md-6">
        <h1 class="display-5">Choose the best plan for your business</h1>
        <p class="lead-2 mt-6">The most fair pricing plans ever. Our prices are very easy to understand. There's not any
          extra or hidden fee. You just pay what is listed here.</p>
      </div>
    </div>
  </div>
</header><!-- /.header -->


<!-- Main Content -->
<main class="main-content">
  @push('pricingStyles')
  <link href="{{ asset('static/assets/css/pricing.css') }}" rel="stylesheet">
  @endpush
  @push('subscriptionPricingStyles')
  <link href="{{ asset('static/assets/css/subscriptionPricing.css') }}" rel="stylesheet">
  @endpush
  <div>
    @if(session('errors'))
    <div class="alert alert-danger text-center" role="alert">
      <h3>{{session('errors')->first('error')}}</h3>
    </div>
    @endif
  </div>
  <p class="lead-5 text-center text-dark fw-600 lh-2 mb-5">Select a pricing plan</p>

  <!-- DIRTY Responsive pricing table HTML -->

  <article>

    <ul>
      <li class="bg-purple active top-li">
        <button class="pricing-button">STARTERS</button>
      </li>
      <li class="bg-blue top-li">
        <button class="pricing-button">BASIC</button>
      </li>
      <li class="bg-blue top-li">
        <button class="pricing-button">PREMIUM LITE</button>
      </li>
      <li class="bg-blue top-li">
        <button class="pricing-button">PREMIUM BUSINESS</button>
      </li>
      <li class="bg-blue top-li">
        <button class="pricing-button">ENTERPRISE</button>
      </li>
    </ul>

    <table>
      <thead>
        <tr>
          <th class="hide"></th>
          <th class="bg-purple default">STARTERS</th>
          <th class="bg-blue">BASIC</th>
          <th class="bg-blue">PREMIUM LITE</th>
          <th class="bg-blue">PREMIUM BUSINESS</th>
          <th class="bg-blue">ENTERPRISE</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Monthly price</td>
          <td class="default"><span class="txt-top"></span><span class="txt-l">Free</span></td>
          <td><span class="txt-top">&#8358;</span><span class="txt-l">9,999</span></td>
          <td><span class="txt-top">&#8358;</span><span class="txt-l">45,999</span></td>
          <td><span class="txt-top">&#8358;</span><span class="txt-l">85,999</span></td>
          <td><span class="txt-top">&#8358;</span><span class="txt-l">199,999</span></td>
        </tr>
        <tr>
          <td>Unlimited Access to Influencer Database</td>
          <td class="default"><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
        </tr>
        <tr>
          <td>Advanced Stats</td>
          <td class="default"><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
        </tr>
        <tr>
          <td>Economic Stats</td>
          <td class="default"><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
        </tr>
        <tr>
          <td>Influencer Profiling</td>
          <td class="default"><span class="tick">&#10004;</span>2</td>
          <td><span class="tick">&#10004;</span>5</td>
          <td><span class="tick">&#10004;</span>10</td>
          <td><span class="tick">&#10004;</span>20</td>
          <td><span class="tick">&#10004;</span>25</td>
        </tr>
        <tr>
          <td>Reports</td>
          <td class="default"><span class="tick">&#10004;</span>2</td>
          <td><span class="tick">&#10004;</span>5</td>
          <td><span class="tick">&#10004;</span>10</td>
          <td><span class="tick">&#10004;</span>20</td>
          <td><span class="tick">&#10004;</span>25</td>
        </tr>
        <tr>
          <td>Up to 30 Days Worth of Tweets</td>
          <td class="default"><span class="tick">&#10004;</span>7</td>
          <td><span class="tick">&#10004;</span>14</td>
          <td><span class="tick">&#10004;</span>30</td>
          <td><span class="tick">&#10004;</span>30</td>
          <td><span class="tick">&#10004;</span>30</td>
        </tr>
        <tr>
          <td>Up to 4500 Tweets per Report</td>
          <td class="default"><span class="tick">&#10004;</span>100</td>
          <td><span class="tick">&#10004;</span>500</td>
          <td><span class="tick">&#10004;</span>2000</td>
          <td><span class="tick">&#10004;</span>2500</td>
          <td><span class="tick">&#10004;</span>4500</td>
        </tr>
        <tr>
          <td>Generate PDF Reports</td>
          <td class="default"><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
        </tr>
        {{-- <tr>
          <td>Twitter Live Report</td>
          <td class="default"><span class="cancel">x</span></td>
          <td><span class="cancel">x</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
          <td><span class="tick">&#10004;</span></td>
        </tr> --}}
        <tr>
          <td>Twitter Historic Report</td>
          <td class="default"><span class="cancel">x</span></td>
          <td><span class="cancel">x</span></td>
          <td><span class="cancel">x</span></td>
          <td><span class="cancel">x</span></td>
          <td><span class="tick">&#10004;</span></td>
        </tr>
        <tr>
          <td>Support</td>
          <td class="default"><span class="cancel">x</span></td>
          <td><span class="cancel">x</span></td>
          <td><span class="tick">&#10004;</span>Email</td>
          <td><span class="tick">&#10004;</span>24/7</td>
          <td><span class="tick">&#10004;</span>Dedicated agent</td>
        </tr>
        <tr>
          <td class="hide"></td>
          <td class="default">
            <p class="text-center py-3">
              @if($user && !$user->subscription)
              <a class="btn btn-danger" href="{{ route('subscribe', ['plan' => 'starter'])}}" data-bind-href="pricing"
                data-monthly="#monthly" data-yearly="#yearly">
                Get Started
              </a>
              @endif
              </a>
            </p>
          </td>
          <td>
            <p class="text-center py-3">
              <a class="btn btn-primary" href="{{ route('subscribe', ['plan' => 'basic'])}}" data-bind-href="pricing"
                data-monthly="#monthly" data-yearly="#yearly">
                @if($user && $user->subscription && $user->subscription->plan->name == 'starter')
                Upgrade
                @else
                Get Started
                @endif
              </a>
            </p>
          </td>
          <td>
            <p class="text-center py-3">
              <a class="btn btn-warning" href="{{ route('subscribe', ['plan' => 'premiumLite'])}}"
                data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                @if($user && $user->subscription && $user->subscription->plan->name != 'premiumLite' &&
                $user->subscription->plan->name != 'premiumBusiness' && $user->subscription->plan->name != 'enterprise')
                Upgrade
                @else
                Get Started
                @endif
              </a>
            </p>
          </td>
          <td>
            <p class="text-center py-3">
              <a class="btn btn-info" href="{{ route('subscribe', ['plan' => 'premiumBusiness'])}}"
                data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                @if($user && $user->subscription && $user->subscription->plan->name != 'premiumBusiness' &&
                $user->subscription->plan->name != 'enterprise')
                Upgrade
                @else
                Get Started
                @endif
              </a>
            </p>
          </td>
          <td>
            <p class="text-center py-3">
              <a class="btn btn-success" href="{{ route('subscribe', ['plan' => 'enterprise'])}}"
                data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise')
                Upgrade
                @else
                Get Started
                @endif
              </a>
            </p>
          </td>
        </tr>
      </tbody>
    </table>

  </article>

</main>
@push('dirtyTable')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<script>
  // DIRTY Responsive pricing table JS
        $(document).ready(function() {
          $( "ul" ).on( "click", "li", function() {
            var pos = $(this).index()+2;
            $("tr").find('td:not(:eq(0))').hide();
            $('td:nth-child('+pos+')').css('display','table-cell');
            $("tr").find('th:not(:eq(0))').hide();
            $('li').removeClass('active');
            $(this).addClass('active');
          });

          // Initialize the media query
          var mediaQuery = window.matchMedia('(min-width: 640px)');
          
          // Add a listen event
          mediaQuery.addListener(doSomething);
          
          // Function to do something with the media query
          function doSomething(mediaQuery) {    
            if (mediaQuery.matches) {
              $('.sep').attr('colspan',5);
            } else {
              $('.sep').attr('colspan',8);
            }
          }
          
          // On load
          doSomething(mediaQuery);
        });
</script>
@endpush


<style>
  .card {
    min-height: 800px;
  }
</style>
@endsection