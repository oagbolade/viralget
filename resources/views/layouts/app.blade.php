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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139876714-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-139876714-1');
    </script>


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
              <p><small>VIRAL GET Is A Foremost Digital AGENCY Dedicated to Influencer Marketing and Management, Committing All Resources to Delivering ROI Focused Influencer Marketing Solutions for Brands Across Nigeria.</small></p>
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
                <a target="_blank" class="social-linkedin" href="https://www.linkedin.com/company/viral-get-ng"><i class="fa fa-linkedin"></i></a>
                <a target="_blank" class="social-twitter" href="https://twitter.com/viralget_ng"><i class="fa fa-twitter"></i></a>
                <a target="_blank" class="social-instagram" href="https://www.instagram.com/viralget_ng"><i class="fa fa-instagram"></i></a>
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
              <a target="_blank" class="social-linkedin" href="https://www.linkedin.com/company/viral-get-ng"><i class="fa fa-linkedin"></i></a>
              <a target="_blank" class="social-twitter" href="https://twitter.com/viralget_ng"><i class="fa fa-twitter"></i></a>
              <a target="_blank" class="social-instagram" href="https://www.instagram.com/viralget_ng"><i class="fa fa-instagram"></i></a>
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

    <div id="popup-cookie-3" class="popup text-white bg-dark col-10 b-0 py-4" data-position="bottom-center" data-animation="slide-up">
      <div class="row gap-y align-items-center">
        <div class="col-md">
          This website uses cookies to ensure you get the best experience on our website. <a href="{{ route('privacy') }}">Learn more</a>
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
    @yield('scripts')
  </body>
</html>
