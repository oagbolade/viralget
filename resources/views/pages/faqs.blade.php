@extends('layouts.app')

@section('content')
<header class="header">
    <div class="container">
    <div class="row align-items-center h-100">

        <div class="col-md-7 mx-auto">
        <h1>Frequently asked questions</h1>

    </div>
    </div>
</header>

  <!-- Main Content -->
  <main class="main-content">


<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Variations
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<section id="general" class="section">
  <div class="container">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Default accordion
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="accordion" id="accordion-1">
          <div class="card">
            <h5 class="card-title">
              <a data-toggle="collapse" href="#collapse-1-1">Why do I have to authorize ViralGet to access my Twitter account?</a>
            </h5>

            <div id="collapse-1-1" class="collapse show" data-parent="#accordion-1">
              <div class="card-body">
              <p>We need to access your Twitter account so we can make requests to Twitter API in your behalf. It is mandatory for us to ask you for access, it is not something that we like but something we must do. We use this to get the tweets matching your request and build the analytics for you. We will never post any tweet or make any modification to your account without your explicit approval. We do not do &quot;not good&quot; stuff, we do not force you to follow us, we do not tweet in your behalf, we do not send you DMs... we just want you to enjoy. </p>              </div>
            </div>
          </div>


          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-2">What kind of Twitter statistics can I obtain with a Viral Get report?</a>
            </h5>

            <div id="collapse-1-2" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              <p>You will be able to collect maximum of tweets 500 latest tweets that your hashtag or keyword received. In addition, you can see the total number of text tweets, image tweets, number of responses and retweets.</p>

<p>Another Twitter statistical that you can obtain is the economic value of your hashtag or keyword, this is a metric owned and developed by Viral Get. It will let you know the amount of money your hashtag is worth in the market.</p>

<p>Viral Get reports hold a 100% professional visual aspect that you can use in any meeting. In addition, you can see at a glance all the Twitter statistics you need to help you make decisions.</p>              </div>
            </div>
          </div>

          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-3">How are impressions and reach calculated in Viral Get?</a>
            </h5>

            <div id="collapse-1-3" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              <p>The potential impression stands for the potential number of times somebody could have seen the hashtag. Whereas the reach stands for the potential number of unique users that could have seen the hashtag.</p>

            <p>The impression is calculated by Summation of all the impacts of people's tweet. The reach is calculated by adding the number of followers every account in the report has.</p>

            <p>These calculations are limited to just 500 tweets. </p>
              </div>
            </div>
          </div>

          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-4">How to analyze Twitter with Viral Get?</a>
            </h5>

            <div id="collapse-1-4" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              Viral Get Twitter analytics reports can be easily created. You just need to go to the home page and type the term, hashtag or keyword you need to track. We have a wide range of Twitter impact reports: free report (it gives up to 100 tweets from the last 7 days), 14-days report (it gives up to 250 tweets from the last 14 days), 30-days reports (it gives up to 500 tweets from the last 30 days).
              </div>
            </div>
          </div>



          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-5">How to analyze Twitter trending topics with Viral Get?
</a>
            </h5>

            <div id="collapse-1-5" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              The best way to analyze a trending topic is by going to the bottom part of our homepage. If you are launching a campaign that has to trend and you are sure is going to have huge repercussion, simple keep a close eye on the trend part of our home. This provides live reports of all that’s trending on twitter at each given moment.  

              </div>
            </div>
          </div>




          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-6">Can I analyze Twitter hashtags with Viral Get?
</a>
            </h5>

            <div id="collapse-1-6" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              Of course! Viral Get happens to be not just the perfect Twitter tool to monitor hashtags but also the first of its kind in West Africa. After logging in on the main page, include your hashtag in the search box. After a few seconds, you will get a complete hashtag report. In addition to Viral Get allows you to download the analyzed information in Excel format. Anything that is in Twitter can be analyzed with Viral Get.
              </div>
            </div>
          </div>

          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-7">Are the stats in Free plan live updates?
</a>
            </h5>

            <div id="collapse-1-7" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              <p>Yes! </p>

<p>We understand that a few lots might be skeptical or want to try out our service first and see if it&rsquo;s worth paying for (which we can beat our chest that it is). So every thing you can do in the paid plan is exactly what you can in the free plan, just limited to some access and features.</p>

<p>But it is the same live updates you have in the paid plan; you also have in the free plan.</p>

<p>You really should just upgrade to the paid plan to get to enjoy the full functionality of our platform, </p>            </div>
          </div>


          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-8">How is Engagement Rate calculated on Viral Get?
</a>
            </h5>

            <div id="collapse-1-8" class="collapse" data-parent="#accordion-1">
              <div class="card-body">

              <p>That’s pretty simple. We pull engagements (likes, retweets & replies) a user has gained in the space of 30 days or their last 500 tweets (if they happen to have more than 500 tweets within the space of 30 days), sum up these engagements and divide by the user’s followers count.</p>

              <p>However, do note that engagement rate for a particular user may vary at different times as the engagement rate is calculated based on live engagement. </p>

              <p>This basically tells what a user’s engagement is in relation to the number of followers they have.</p>

            </div>
            </div>
          </div>



          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-9">What is the economic value I see in my Viral Get report?

</a>
            </h5>

            <div id="collapse-1-9" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              <p>The economic value shows the amount you would have had to spend on your campaign if you had to pay for it based on CPM like on Facebook, Instagram and even Twitter. This tells you how much the campaign is worth should you have to include it in your media plan or negotiate with viralists. 
</p>

<p>To get to the hashtag economic value, first we need to analyze each one of the users in the report. Several factors are taken into account such as the number of followers, how many of their followers must have seen the campaign tweet and the engagement rate. This is a metric that can help you to have a better understanding of how you campaign has evolved on Twitter. You can even compare it with the real economic inversion you have done for your campaign.
</p>            
</div>
          </div>

       </div>




       <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-10">Can I download my report as an Excel?
</a>
            </h5>

            <div id="collapse-1-10" class="collapse" data-parent="#accordion-1">
              <div class="card-body">

              Yes, Viral Get ENTERPRISE PLAN allows their users to export the analyzed data to an Excel sheet. This way, it is easier to work with the stats. Everything you need to analyze the data and make decisions in consequence.
            </div>
            </div>
          </div>





          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-11">What are Contributors shown in my Viral Get Report?

</a>
            </h5>

            <div id="collapse-1-11" class="collapse" data-parent="#accordion-1">
              <div class="card-body">

              Contributors are users who have contributed in one way or the other to a campaign on Twitter, either by tweeting with the said hashtag or retweeting a tweet with the hashtag or replying to a tweet tweeted with the hash tag.

            </div>
            </div>
          </div>






          <div class="card">
            <h5 class="card-title">
              <a class="collapsed" data-toggle="collapse" href="#collapse-1-12">What is the average engagement rate?
</a>
            </h5>

            <div id="collapse-1-12" class="collapse" data-parent="#accordion-1">
              <div class="card-body">
              <p>Engagement rate on Viral get varies at each given time, based on the data that is pulled, so this is quite difficult to tell. Live data is being used to calculate the engagement rate of each users, you could check for a user’s engagement rate now and a couple of tweets later, the engagement rate wouldn’t be the same.</p>

                <p>But we can say based on our calculation, an average engagement rate would be in the range of 0.5-1</p>

            </div>
            </div>
          </div>



    </div>
    </div>
  </section>
</main>
@endsection