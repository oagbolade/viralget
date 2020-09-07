<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="VI5Ib1Od-k2zuqf06xOTy0IoYocKHLg672v7JivYgKE" />
  @if(Auth()->user())
  <meta name="api-token" content="{{ Auth()->user()->api_token }}">
  @endif
  <title>ViralGet</title>
  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,800i,900" rel="stylesheet">
  <link href="{{ asset('static/assets/css/page.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/assets/css/bootstrap-social.css') }}" rel="stylesheet">
  @stack('pricingStyles')
  @stack('subscriptionPricingStyles')
  @stack('dirtyTable')
  <link href="{{ asset('static/assets/css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{ asset('static/assets/img/favicon.png') }}">
  <link rel="icon" href="{{ asset('static/assets/img/favicon.png') }}">

  <!-- Open Graph Tags
    <meta property="og:title" content="TheSaaS">
    <meta property="og:description" content="A responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4.">
    <meta property="og:image" content="http://thetheme.io/thesaas/assets/img/og-img.jpg">
    <meta property="og:url" content="http://thetheme.io/thesaas/">
    <meta name="twitter:card" content="summary_large_image"> -->
  <style>
    #particles-js {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: transparent;
    }
  </style>

  <!-- Global site tag (gtag.js) - Google Ads: 668034109 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-668034109"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-668034109');
  </script>

  <!-- Start of Async Drift Code -->
  <script>
    "use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('peppmpypneiu');
  </script>
  <!-- End of Async Drift Code -->
</head>

<body>


  @include('layouts.menu')
  @yield('content')


  @if(request()->route()->getName() == 'home')

  <footer id="footer" class="footer py-9 text-white" style="background-color: #24292e">
    <div class="container">
      <div class="row gap-y">

        <div class="col-md-6 col-xl-4">
          <p><a href="#"><img src="{{ asset('static/assets/img/logo-light.png') }}" alt="logo"></a></p>
          <p>
            <small>
              VIRALGET is a Foremost Data-Driven Agency Dedicated to Influencer Marketing & Management, and Content
              Creation.
              Committing All Resources to Delivering ROI Focused Influencer Marketing Solutions for Brands.
            </small>
          </p>
        </div>

        <div class="col-6 col-md-3 col-xl-2">
          <h6 class="mb-4 mt-1"><strong>Company</strong></h6>
          <div class="nav flex-column">
            <a class="nav-link" href="{{ route('about') }}">About Us</a>
            <a class="nav-link" href="/about#collapse-1-2">What We Do</a>
            <a class="nav-link" href="/about#collapse-1-3">Services</a>
          </div>
        </div>

        <div class="col-6 col-md-3 col-xl-2">
          <h6 class="mb-4 mt-1"><strong>Product</strong></h6>
          <div class="nav flex-column">
            <a class="nav-link" href="#">Pricing</a>
            <a class="nav-link" href="{{ route('terms') }}">Terms of Use</a>
            <a class="nav-link" href="{{ route('privacy') }}">Privacy Policy</a>
          </div>
        </div>

        <div class="col-6 col-md-6 col-xl-2">
          <h6 class="mb-4 mt-1"><strong>Support</strong></h6>
          <div class="nav flex-column">
            <a class="nav-link" href="{{ route('faqs') }}">FAQs</a>
            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
          </div>
        </div>

        <div class="col-6 col-md-6 col-xl-2 text-center">
          <p><a class="btn btn-block btn-round btn-warning" href="{{ route('profiles') }}">Get Started</a></p>
          <br>
          <div class="social social-bordered">
            <a target="_blank" class="social-linkedin" href="https://www.linkedin.com/company/viral-get-ng"><i
                class="fa fa-linkedin"></i></a>
            <a target="_blank" class="social-twitter" href="https://twitter.com/viralget_ng"><i
                class="fa fa-twitter"></i></a>
            <a target="_blank" class="social-instagram" href="https://www.instagram.com/viralget_ng"><i
                class="fa fa-instagram"></i></a>
          </div>
        </div>

      </div>
    </div>
    <div class="mt-5 gap-y text-center">
      <small class="opacity-70">© 2019 Viralget.com.ng. All rights reserved.</small>
    </div>
  </footer>

  @else
  <footer class="footer">
    <div class="container">
      <div class="row gap-y align-items-center">


        <div class="col-6 text-right order-lg-last">
          <div class="social">
            <a target="_blank" class="social-linkedin" href="https://www.linkedin.com/company/viral-get-ng"><i
                class="fa fa-linkedin"></i></a>
            <a target="_blank" class="social-twitter" href="https://twitter.com/viralget_ng"><i
                class="fa fa-twitter"></i></a>
            <a target="_blank" class="social-instagram" href="https://www.instagram.com/viralget_ng"><i
                class="fa fa-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-6">
          <a href="{{ route('home') }}"><img src="{{ asset('static/assets/img/logo-dark.png') }}" alt="logo"></a>
        </div>

      </div>
    </div>
  </footer>
  @endif
  <!-- /.footer -->

  <div id="popup-cookie-3" class="popup text-white bg-dark col-10 b-0 py-4" data-position="bottom-center"
    data-animation="slide-up">
    <div class="row gap-y align-items-center">
      <div class="col-md">
        This website uses cookies to ensure you get the best experience on our website. <a
          href="{{ route('privacy') }}">Learn more</a>
      </div>

      <div class="col-md-auto">
        <button class="btn btn-sm btn-outline-light accept-cookie" data-dismiss="popup">Got it</button>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="{{ asset('static/assets/js/page.min.js') }}"></script>
  <script src="{{ asset('static/assets/js/script.js') }}"></script>
  <!-- <script src="{{ asset('static/assets/js/particles.js') }} "></script> -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="{{ asset('static/assets/js/traffic_data.js') }}"></script>
  <script>    
    if (checkCookie() && getCookie("ip_address") !== "") {
      console.log(getCookie('ip_address'))
    }else{
      getUserData();
      function getUserData() {
        fetch(`https://ipinfo.io?token={{ env('IP_TOKEN') }}`)
        .then(response => response.json())
        .then(response => {
          setCookie("ip_address", response.ip, 1);
          const ip_address = response.ip;
          const city = response.city;
          const country = response.country;
          const timezone = response.timezone;
          const last_page_visited = window.location.href;
          
          const data = {
            ip_address,
            city,
            country,
            timezone,
            last_page_visited
          }
          
          saveUserData(data);
        })
        .catch((err)=>{
          console.log(err)
        })
      }
  
      function saveUserData(data = {}){
        const URL = `/api/trafficdata`;
  
        $.post( URL, data).done(()=>{
          console.log('traffic data saved')
        }).fail(()=>{
          console.log('An error occured while saving traffic data')
        });
      }
      
      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }
      
    }
    
    function getCookie(cname = "ip_address") {
      var name = cname + "=";
      var ca = document.cookie.split(";");

      for (var i = 0; i < ca.length; i++) {
          var c=ca[i]; 
          
          while (c.charAt(0)==" " ) {
          c=c.substring(1); 
          } 

          if(c.indexOf(name)==0) { 
            return c.substring(name.length, c.length); 
          } 
      } 
  
      return "" ; 
    } 
    
    function checkCookie() {
        var user=getCookie("ip_address"); 
        
        if (user != "" ) {
          return true; 
        } 
        
        return false; 
    } 
    
    function deleteCookie(cookieName="ip_address" ) { 
      document.cookie="location=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;" ;
    }
  </script>
  @yield('scripts')
</body>

</html>