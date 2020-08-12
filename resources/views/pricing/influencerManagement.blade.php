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
        <h1 class="display-5">Choose the best influencer management plan for your campaign</h1>
        <p class="lead-2 mt-6">it's difficult to manually manage influencers working with you on a campaign,
          with our influencer management software, it not only helps you manage them but also shows you the
          live performance of each influencer and an overall performance of your campaign.
        </p>
      </div>
    </div>
  </div>
</header><!-- /.header -->

<!-- Main Content -->
<main class="main-content">
  <div>
    @if(session('errors'))
    <div class="alert alert-danger text-center" role="alert">
      <h3>{{session('errors')->first('error')}}</h3>
    </div>
    @endif
  </div>
  <p class="lead-5 text-center text-dark fw-600 lh-2 mb-5">Select a pricing plan</p>
  <section class="pricing py-5">
    <div class="container">

      <div class="row">
        <!-- Free Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">PREMIUM</h5>
              <h6 class="card-price text-center">
                <span class="price-unit">&#8358;</span>
                <span data-bind-radio="pricing" class="price-value" data-monthly="39" data-yearly="399">181,250</span>
                <span class="period">/trend</span>
              </h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span>7 Days Campaign</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>5 Influencers</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 500 Tweets</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic Stats</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Report</li>
                <li class="space-hack"><span class="fa-li"><i class="space-hack"></i></span></li>
                {{-- Negative sample --}}
                {{-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li> --}}
              </ul>
              <p class="text-center py-3">
                <a class="btn btn-block btn-primary text-uppercase"
                  href="{{ route('managements.signup', ['bookingType' => 'influencer_management', 'plan' => 1])}}"
                  data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                  @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise')
                  Get Started
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
              <h5 class="card-title text-muted text-uppercase text-center">BUSINESS</h5>
              <h6 class="card-price text-center">
                <span class="price-unit">&#8358;</span>
                <span data-bind-radio="pricing" class="price-value" data-monthly="39" data-yearly="399">276,000</span>
                <span class="period">/trend</span>
              </h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span>14 Days Campaign</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>15 Influencers</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 1000 Tweets</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Advanced Stats</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Report</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Comprehensive Report</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>24/7 Support</li>
                <br>
              </ul>
              <p class="text-center py-3">
                <a class="btn btn-block btn-warning text-uppercase"
                  href="{{ route('managements.signup', ['bookingType' => 'influencer_management', 'plan' => 2])}}"
                  data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                  @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise')
                  Get Started
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
              <h5 class="card-title text-muted text-uppercase text-center">ENTERPRISE</h5>
              <h6 class="card-price text-center">
                <span class="price-unit">&#8358;</span>
                <span data-bind-radio="pricing" class="price-value" data-monthly="39" data-yearly="399">410,000</span>
                <span class="period">/trend</span>
              </h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span>30 Days Campaign</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>25 Influencers</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Up to 2000 Tweets</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Advanced Stats</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Generate PDF Report</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Comprehensive Report</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Dedicated Agent</li>
              </ul>
              <p class="text-center py-3">
                <a class="btn btn-block btn-success text-uppercase"
                  href="{{ route('managements.signup', ['bookingType' => 'influencer_management', 'plan' => 3])}}"
                  data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">
                  @if($user && $user->subscription && $user->subscription->plan->name != 'enterprise')
                  Get Started
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
<script>
  // Check storage
  // Check location
  // Get exchange rate
</script>
@section('scripts')
<script>
  let exchangeRate = 0;

    if(checkCookie() && getCookie('location') !== 'NG'){
        getEchangeRates();
    }
    
    if(!checkCookie()){
        if(!isNigeria()){
          getEchangeRates();
        }
    }
    
    function getEchangeRates(){
      const proxy = `https://cors-anywhere.herokuapp.com/`;
      const options = {
        method: 'GET',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
        'Content-Type': 'application/json'
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
      };
      const URL = `${proxy}http://data.fixer.io/api/latest?access_key={{ env('EXCHANGE_RATE_ACCESS') }}&format=1`
      fetch(URL, options)
      .then(res => res.json())
      .then(response => {
        exchangeRate = response.rates.NGN.toFixed(2) / response.rates.USD.toFixed(2);
        setDollarValue();
      });
    }

    function isNigeria(){
        $.get("https://ipinfo.io?token={{ env('IP_TOKEN') }}", function (response) {
            setCookie('location', response.country, 1);
            console.log(response.country);
            if(response.country === 'NG'){
                return true
            }

            return false;
        }, "jsonp");
    }

    function setDollarValue(){
      var items = document.getElementsByClassName('price-value');
      var priceunit = document.getElementsByClassName('price-unit');
      for (var i = 0; i < items.length; i++){
        let convertPrice = parseInt(items[i].innerHTML.replace(",", "" ), 10) / exchangeRate;
        items[i].innerHTML = convertPrice.toFixed();
      }
        
      for (var i = 0; i < priceunit.length; i++){
        priceunit[i].innerHTML = '$'; 
      }
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    
    function getCookie(cname = 'location') {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c=ca[i]; while (c.charAt(0)==' ' ) {
                c=c.substring(1); 
            } 

            if(c.indexOf(name)==0) { 
                return c.substring(name.length, c.length); 
            } 
        } 
        
        return "" ; 
    }

    function checkCookie() {
        var user=getCookie("location");
        if (user !="" ) {
            return true;
        } 
        return false;
    }

    function deleteCookie(cookieName = 'location'){
        document.cookie = "location=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
</script>
@endsection