@extends('layouts.app')

@section('content')

<header class="header pb-3 pt-10">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <h1 class="display-5 mb-6">Viral Get - The Influencer marketing agency.</h1>
        <p>
          VIRALGET is a Foremost Data-Driven Agency Dedicated to Influencer Marketing & Management, and Content
          Creation.
          Committing All Resources to Delivering ROI Focused Influencer Marketing Solutions for Brands.
        </p>
        <p>
          We Focus on Helping Brands Optimize Their Influencer Marketing Through Use of Data </p>
        </p>
        <p>
          <em>Influencer marketing is a strategy not a tactic, make it part of your conceptualization </em>
        </p>
      </div>
    </div>
  </div>
</header><!-- /.header -->


<main class="main-content">
  <section id="general" class="section">
    <div class="container">
      <div class="row align-items-center h-100">

        <div class="col-md-7 mx-auto">

          <div class="accordion" id="accordion-1">

            <div class="card">
              <h5 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapse-1-2">What We Do</a>
              </h5>

              <div id="collapse-1-2" class="collapse" data-parent="#accordion-1">
                <div class="card-body">
                  <p>
                    Analyze campaign hashtags/keywords, see it’s impact. Profile influencers beyond their followers
                    count. Manage hired
                    influencers all on one platform, see how their post is performing. Monitor your trends and generate
                    instant reports
                    through our SaaS platform. Influencer marketing.
                  </p>
                  <p>
                    Our platform can also serve as a listening tools for brands to hear & understand the trend, buying habits, interest,
                    current problems & affinity of their consumers; giving you perfect insights on how to reach them, providing a product
                    that solves their problem and better their experiences.
                  </p>
                </div>
              </div>
            </div>


            <div class="card">
              <h5 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapse-1-3">Our Team</a>
              </h5>

              <div id="collapse-1-3" class="collapse" data-parent="#accordion-1">
                <div class="card-body">

                  <p>
                    Our Team consist of expertise spanning across media, marketing and management industry.
                    <p>
                      <p>
                        Influencer marketing has been on the rise, and is steadily gaining a strong foothold in the
                        digital space as one of the leading ways to reach target audience quickly. But there’s being a
                        growing concern on the effectiveness and how it is been used, two things have been a major
                        concern; content and management, these are what the team has come to correct.

                      </p>


                </div>
              </div>
            </div>



          </div>
        </div>





      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">
      <header class="section-header">
        <h2>Our Services</h2>
        <hr>
        <p class="lead">Some of our services include:</p>
      </header>

      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="row gap-y">

            <div class="col-md-6 col-lg-4">
              <a class="card card-body border hover-shadow-6 text-center py-6" href="#">
                <p><i class="icon-mobile lead-6 text-muted"></i></p>
                <h6 class="mb-0">Content Creation</h6>
              </a>
            </div>


            <div class="col-md-6 col-lg-4">
              <a class="card card-body border hover-shadow-6 text-center py-6" href="#">
                <p><i class="icon-twitter lead-6 text-muted"></i></p>
                <h6 class="mb-0">Viralist Marketing (Twitter)</h6>
              </a>
            </div>


            <div class="col-md-6 col-lg-4">
              <a class="card card-body border hover-shadow-6 text-center py-6" href="#">
                <p><i class="icon-camera lead-6 text-muted"></i></p>
                <h6 class="mb-0">Instagram Influencers</h6>
              </a>
            </div>


            <div class="col-md-6 col-lg-4">
              <a class="card card-body border hover-shadow-6 text-center py-6" href="#">
                <p><i class="icon-lightbulb lead-6 text-muted"></i></p>
                <h6 class="mb-0">Celebrity Influencers</h6>
              </a>
            </div>


            <div class="col-md-6 col-lg-4">
              <a class="card card-body border hover-shadow-6 text-center py-6" href="#">
                <p><i class="icon-browser lead-6 text-muted"></i></p>
                <h6 class="mb-0">Management</h6>
              </a>
            </div>

            <div class="col-md-6 col-lg-4">
              <a class="card card-body border hover-shadow-6 text-center py-6" href="#">
                <p><i class="fa fa-line-chart lead-6 text-muted"></i></p>
                <h6 class="mb-0">Twitter Trends</h6>
              </a>
            </div>


          </div>

        </div>
      </div>

    </div>
  </section>

</main>
@endsection