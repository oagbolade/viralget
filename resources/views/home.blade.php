@extends('layouts.app')

@section('content')

<!-- Header -->
<!-- <header class="header text-white h-fullscreen overflow-hidden" style="background-image: linear-gradient(135deg, #fea063 0%, #e41f4d 100%);"> -->
<!-- Header linear-gradient(135deg, #f9f7ff 0%, #fff 50%, #f6f3ff 100%)   -webkit-linear-gradient(top,#8066dc 0%, #5040a0 100%)-->
<header class="header h-fullscreen" style="min-height: 100vh; overflow: hidden">
  <div class="video-overlay">
    <video autoplay muted loop id="myVideo">
      <source src="{{ asset('./static/assets/videos/videobg.mp4') }}" type="video/mp4">
      <source src="{{ asset('./static/assets/videos/videobg.webm') }}" type="video/webm">
      <source src="{{ asset('./static/assets/videos/videobg.ogv') }}" type="video/ogv">
      Your browser does not support HTML5 video.
    </video>
  </div>
  <div class="container position-static">

    <div class="row align-items-center h-100 mt-4">

      <div class="col-lg-7 homepage-title">
        <h1>Find. <br />Connect. <br /><span class="text-warning">Track.</span></h1>
        <p>
          Grow your business with intelligent influencer marketing.
          The time for performance-driven influencer marketing is here.
          ViralGet is an easy-to-use tool that helps you Analyze campaign hashtags/keywords, see it’s impact. Profile
          influencers
          beyond their followers count. Manage hired influencers all on one platform, see how their post is performing.
          Monitor
          your trends and generate instant reports.
        </p>
        <!-- , helps develop creative content and synchronization on every campaign.
              Find Influencers > Reach out > Sit back and watch us manage them while you campaign goes viral.</p> -->
        {{-- profiles --}}
        <a class="btn btn-xl btn-round btn-warning w-350 mr-3 px-6 d-md-inline-block home-btn"
          href="{{ route('search') }}">Get started <span class="ti-arrow-right"></span></a>
      </div>

      <div class="col-lg-5 d-none d-lg-block">
      </div>

    </div>
  </div>
</header><!-- /.header -->


<!-- Main Content -->
<main class="main-content">
  <section class="section">
    <div class="container">
      <div class="row gap-y align-items-center">
        <div class="col-md-6 text-center text-md-left mobile-show">
          <h2>Do you need some help managing influencers?</h2>
          <p class="lead mb-6">
            Cut out the stress of manually managing influencers,
            with our software, it's now easier to manage your
            influencers and see their performance
          </p>
          <p><a class="btn btn-lg btn-round btn-info" href="{{ route('pricing.management') }}">Find out More</a></p>
        </div>

        <div class="col-md-6 text-center">
          <img src="https://res.cloudinary.com/viralget/image/upload/v1596728900/profiling_x1kzlo.png" alt="...">
        </div>

        <div class="col-md-6 text-center text-md-left full-screen-show">
          <h2>Do you need some help managing influencers?</h2>
          <p class="lead mb-6">
            Cut out the stress of manually managing influencers,
            with our software, it's now easier to manage your
            influencers and see their performance
          </p>
          <p><a class="btn btn-lg btn-round btn-info" href="{{ route('pricing.management') }}">Find out More</a></p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row gap-y align-items-center">

        <div class="col-md-6 text-center text-md-left">
          <h2>
            Find out what people are saying about your brand's campaign
          </h2>
          <p class="lead mb-6">
            Trending on twitter isn't the best judge of how your campaign performed,
            it's how people react and engage with it. See how your campaign is performing
          </p>
          <p><a class="btn btn-lg btn-round btn-info" href="{{ route('pricing.trends') }}">Find out More</a></p>
        </div>

        <div class="col-md-6 text-center">
          <img src="https://res.cloudinary.com/viralget/image/upload/v1596728901/reporting_w63fxy.png" alt="...">
        </div>
      </div>
    </div>
  </section>

  <section class="section py-7 bg-info">
    <div class="container">
      <div class="row gap-y align-items-center">
        <div class="col-md-12 text-center text-center">
          <h2 class="text-white">Analyse your hashtags/keywords or profile an influencer</h2>

          <div class="col-md-8 offset-md-2">
            <form class="rounded p-5 mt-7" action="{{ route('profiles') }}"
              style="background-color: rgba(64, 60, 53, 0.2);">
              <!-- @csrf -->
              <div class="row">
                <div class="col">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ti-search mt-1"></i></span>
                    </div>
                    <input type="text" class="form-control" name="q" placeholder="@username or keyword or #hashtag">
                    <input type="hidden" name="isSearchbar" value="true">
                  </div>
                </div>

                <div class="col-auto">
                  <button class="btn btn-lg btn-success" type="submit">Search</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="section bg-white ">
    <div class="container">
      <header class="section-header">
        <h1>Find Influencers Of Your Choice</h1>
        <hr>
        <p class="lead">
          Choose influencers from our database of influencers across different categories. Profile influencers, viewing
          Data stats
          such as Reach, Engagement Rate, Most Retweeted Tweets, Total Engagement as well as the Demography and Interest
          of their
          followers
        </p>
      </header>
      <div class="row gap-y align-items-center">

        <div class="col-sm-6 col-md-6 col-xl-3">
          <!-- offset-xl-1" -->
          <a href="{{ route('profiles.category', ['category' => 'celebrities']) }}">
            <div class="card card-body shadow-3 text-center bg-warning text-white">
              <p class="my-5"><i class="icon-profile-male lead-6"></i></p>
              <h5 class="mb-5 fw-500">Celebrities</h5>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-md-6 col-xl-3">
          <a href="{{ route('profiles.category', ['category' => 'professionals']) }}" class="text-dark">
            <div class="card card-body shadow-3 bg-success  text-center">
              <p class="my-5"><i class="icon-mobile  text-white lead-6"></i></p>
              <h5 class="mb-5 fw-500 text-white">Professionals</h5>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-md-6 col-xl-3">
          <a href="{{ route('profiles.category', ['category' => 'lifestyle']) }}">
            <div class="card card-body shadow-3 text-center bg-danger text-white">
              <p class="my-5"><i class="icon-lightbulb lead-6"></i></p>
              <h5 class="mb-5 fw-500">Lifestyle</h5>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-md-6 col-xl-3">
          <a href="{{ route('profiles.category', ['category' => 'viralists']) }}" class="text-dark">
            <div class="card card-body shadow-3 bg-info text-center">
              <p class="my-5"><i class="icon-megaphone text-white lead-6"></i></p>
              <h5 class="mb-5 fw-500 text-white">Viralists</h5>
            </div>
          </a>
        </div>

        <!-- <div class="col-sm-6 col-md-6 col-xl-2">
              <div class="card card-body shadow-3 text-center bg-success text-white">
                <p class="my-5"><i class="icon-linegraph lead-6"></i></p>
                <h5 class="mb-5 fw-500"><a href="#">Nano</a></h5>
              </div>
            </div> -->

      </div>

    </div>
  </section>


  <section class="section text-white overflow-hidden" style="background-color: #333239;">
    <div class="container">
      <div class="row gap-y align-items-center">

        <div class="col-lg-6 mx-auto">
          <h2>What We Do - Our Services</h2>
          <p class="mb-7">We serve as the bridge between brands and influencers, by finding the perfect Influencer for
            your campaigns through audience insight. This way you’re not just influencing, you’re INTELLIFLUENCING. </p>

          <div class="row">
            <div class="col-md-6">
              <p><i class="fa fa-caret-right text-lightest mr-2"></i> Content Creation</p>
              <p><i class="fa fa-caret-right text-lightest mr-2"></i> Viralist Marketing</p>
              <p><i class="fa fa-caret-right text-lightest mr-2"></i> Instagram Influencers</p>
            </div>

            <div class="col-md-6">
              <p><i class="fa fa-caret-right text-lightest mr-2"></i> Celebrity Influencers</p>
              <p><i class="fa fa-caret-right text-lightest mr-2"></i> Management</p>
              <p><i class="fa fa-caret-right text-lightest mr-2"></i> Twitter Trends</p>
            </div>
          </div>

          <p class="mt-6">
            <a class="text-uppercase fw-600 ls-2 small-2" href="{{ route('about') }}">Learn More <i
                class="ti-arrow-right fs-10 ml-1"></i></a>
          </p>
        </div>

        <div class="col-lg-5 align-self-center order-md-first">
          <img src="{{ asset('static/assets/img/connections.png') }}" alt="...">
        </div>

      </div>
    </div>
  </section>

  <section class="section text-white pb-0 overflow-hidden homepage-tabs" style="background-color: #f64d62">
    <div class="container">

      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="find-tab" data-toggle="tab" href="#find" role="tab" aria-controls="find"
            aria-selected="true">
            <p class="lead-5"><i class="icon-search"></i></p>
            <h2>Find</h2>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="hire-tab" data-toggle="tab" href="#hire" role="tab" aria-controls="hire"
            aria-selected="false">
            <p class="lead-5"><i class="icon-toolbox"></i></p>
            <h2>Hire</h2>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content"
            aria-selected="false">
            <p class="lead-5"><i class="fa fa-file-o"></i></p>
            <h2>Content</h2>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="manage-tab" data-toggle="tab" href="#manage" role="tab" aria-controls="manage"
            aria-selected="false">
            <p class="lead-5"><i class="fa fa-laptop"></i></p>
            <h2>Manage</h2>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report"
            aria-selected="false">
            <p class="lead-5"><i class="icon-linegraph"></i></p>
            <h2>Report</h2>
          </a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="find-tab">

          <div class="row">
            <div class="col-md-6 pb-8">
              <!-- <h2>Find</h2> -->
              <p>Don't just get Influencers, find the perfect Influencers for your campaign through our platform, by
                getting profile and audience insight. This way you’re not just influencing, you’re INTELLIFLUENCING.</p>
            </div>

            <div class="col-md-6 align-self-center text-center">
              <i class="icon-search aos-init aos-animate hide-mobile" data-aos="fade-up"
                style="font-size: 150px;  margin-top: -97px;"></i>
            </div>
          </div>


        </div>
        <div class="tab-pane fade" id="hire" role="tabpanel" aria-labelledby="hire-tab">

          <div class="row">
            <div class="col-md-6 pb-8">
              <!-- <h2>Hire</h2> -->
              <p>Now that you’ve found the perfect Influencers, or maybe not; we’ll gladly do the finding for you. Reach
                out to us to help you hire them, it’s our turf we understand it better.</p>
            </div>

            <div class="col-md-6 align-self-center text-center">
              <i class="icon-toolbox aos-init aos-animate hide-mobile" data-aos="fade-up"
                style="font-size: 150px;  margin-top: -97px;"></i>
            </div>
          </div>


        </div>
        <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">

          <div class="row">
            <div class="col-md-6 pb-8">
              <!-- <h2>Content Development</h2> -->
              <p>For us, content is key and the life to every influencing marketing campaigns. We take keen interest in
                ensuring all contents resonates with the brands campaign objectives, and in a creative way.</p>
            </div>

            <div class="col-md-6 align-self-center text-center">
              <i class="fa fa-file-o aos-init aos-animate hide-mobile" data-aos="fade-up"
                style="font-size: 150px;  margin-top: -97px;"></i>
            </div>
          </div>


        </div>
        <div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="manage-tab">

          <div class="row">
            <div class="col-md-6 pb-8">
              <!-- <h2>Manage</h2> -->
              <p>Someone’s gotta ensure these guys are not deviating and are timely with delivery, Ooh yeah, that’s our
                job. We’ll manage them.</p>
            </div>

            <div class="col-md-6 align-self-center text-center">
              <i class="fa fa-laptop aos-init aos-animate hide-mobile" data-aos="fade-up"
                style="font-size: 150px;  margin-top: -97px;"></i>
            </div>
          </div>


        </div>
        <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
          <div class="row">
            <div class="col-md-6 pb-8">
              <!-- <h2>Campaign Report</h2> -->
              <p>You can track your campaign and see how it’s performing,
                through a detailed report.
                Click <u><a href="{{ route('campaigns.view') }}">here</a></u> to get started.</p>
            </div>

            <div class="col-md-6 align-self-center text-center">
              <i class="icon-linegraph aos-init aos-animate hide-mobile" data-aos="fade-up"
                style="font-size: 150px;  margin-top: -97px;"></i>
              <!-- <img src="{{ asset('./static/assets/img/analytics.jpg') }}" alt="" data-aos="fade-up" class="aos-init aos-animate"> -->
            </div>
          </div>


        </div>
      </div>

    </div>
  </section>

  <section class="section text-white" style="background-color: #24292e">
    <canvas class="constellation" data-color="rgba(255,255,255,0.3)" width="1366" height="625"></canvas>
    <div class="container">
      <div class="col-md-8 offset-md-2">
        <div class="slider-dots-fill text-white text-center" data-autoplay="true" data-provide="slider"
          data-dots="false">
          <div>
            <blockquote class="blockquote">
              <h3>3 Things are key to a successful Influencer marketing; Content, Story Telling and Consumer Experience.
              </h3>
            </blockquote>
          </div>
          <div>
            <blockquote class="blockquote">
              <h3>Don't just use Influencers, have them coordinated on your marketing campaign</h3>
            </blockquote>
          </div>
          <div>
            <blockquote class="blockquote">
              <h3> We ensure influencers don’t work as a single entity, we collaborate as ONE for your brands objective
              </h3>
            </blockquote>
          </div>
          <div>
            <blockquote class="blockquote">
              <h3> We ensure influencers don’t work as a single entity, we collaborate as ONE for your brands objective
              </h3>
            </blockquote>
          </div>
          <div>
            <blockquote class="blockquote">
              <h3> Don't just go viral, be intelligent about your VIRALIZATION. It’s not that difficult, we can help.
              </h3>
            </blockquote>
          </div>
          <div>
            <blockquote class="blockquote">
              <h3> Biggest mistake with utilizing Influencers is when you activate the individual. The power of
                Influencers is in their collectiveness.</h3>
            </blockquote>
          </div>
        </div>
        <p class="text-center"><a class="btn btn-lg btn-round btn-warning" href="{{ route('marketing') }}">Learn about
            Influencer Marketing <span class="ti-arrow-right"></span> </a></p>
      </div>



      <!-- <div class="col-md-6 text-center">
              <img src="{{ asset('./static/assets/img/13.png') }}" alt="...">
            </div>

            <div class="col-md-6 text-center text-md-left">
              <h2>Let’s Tell You A Little About Influencer Marketing</h2>
              <p>
              Influencer marketing rose to the spot light in the Nigerian advertising space in the year 2015 and ever since, it’s being on a steady increase. Gradually gaining marketing share in terms of brands advertising budget, as brands and the general public are starting to recognize influencer marketing as the future of digital. </p>
              <p class="mb-6">
              Initially, only few celebrities who were very popular online were regarded as influencers, limiting it’s use due to increasing demand and less supply, thereby making it extravagant for brands to utilize.
              </p>
              <p><a class="btn btn-lg btn-round btn-warning" href="{{ route('marketing') }}">Read More <span class="ti-arrow-right"></span> </a></p>
            </div>
          </div> -->
    </div>
  </section>

  <!--
      <section class="section py-7" style="background-color: #110065">
        <div class="container">


        </div>
      </section> -->



  <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | CTA
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->

  <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Partners
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
  <section class="section py-9">
    {{-- <div class="container"> --}}

    <header class="section-header">
      <h2>Our Clientele</h2>
      <hr>
    </header>

    <div class="row">
      <div class="col-md-12">
        <div class="image-container">
          <div class="p-2"><img class="logo-image" src="{{ asset('./static/assets/img/portfolio/lasg.png') }}"
              alt="LASG"></div>
          <div class="p-2"><img class="logo-image" src="{{ asset('./static/assets/img/portfolio/gtb.png') }}" alt="GTB">
          </div>
          <div class="p-2"><img class="logo-image" src="{{ asset('./static/assets/img/portfolio/pwc.png') }}" alt="PWC">
          </div>
          <div class="p-2"><img class="logo-image" src="{{ asset('./static/assets/img/portfolio/shoprite.png') }}"
              alt="SHOP"></div>
          <div class="p-2"><img class="dstv-logo" src="{{ asset('./static/assets/img/portfolio/dstvLogo.jpg') }}"
              alt="DSTV"></div>
        </div>
      </div>
    </div>
    {{-- </div> --}}
  </section>

  <section class="section py-9 bg-primary">
    <div class="container text-center">

      <header class="section-header">
        <h2 class="text-white">Trending Twitter Topics</h2>
      </header>

      <div id="trendsList"><i class="fa fa-spinner fa-spin text-white" style="font-size: 30px"></i></div>
    </div>
    </div>
  </section>

</main>

<style>
  .dstv-logo {
    height: 200px;
    max-width: 200px;
  }

  .image-container {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    align-items: end;
    justify-items: center;
  }

  .mobile-show {
    display: none;
  }

  @media only screen and (max-width: 1200px) {
    .image-container {
      grid-template-columns: repeat(1, 1fr);
    }
  }

  @media only screen and (max-width: 768px) {
    .mobile-show {
      display: block;
    }

    .full-screen-show {
      display: none;
    }
  }
</style>
@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $.ajax({
      url: '/api/v1/trends',
      dataType: 'json',
    }).done(function(data) {
      if(data.status === 'success') {
        let a = '';
        data.data.map((trend, index) => {
          a += `<a href="/hashtag/${trend.query}"><span class="badge badge-pill badge-secondary">${trend.name }</span></a>`;
        })
        $('#trendsList').html(a);
      } else {
        $('#trendsList').html(`<p class="text-white"><small><em>${data.message}</em></small></p>`);
      }
      console.log(data)
    })
  });
  
  window.navigator.geolocation
  .getCurrentPosition(success, canceled);

  function success(data){
    console.log('success', data);
  }
  
  function canceled(){
    console.log('location disallowed');
  }
</script>
@endsection