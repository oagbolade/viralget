<template>
  <div class="container">
    <loading
      :active.sync="loading"
      :is-full-page="true"
      :opacity="0.5"
      :width="128"
      :height="128"
      loader="dots"
      color="#007bff"
      backgroundColor="#fff"
    />

    <div class="row gap-y" v-show="loading">
      <div class="col-md-10 mx-auto text-center">
        <h1>We're almost done...</h1>
        <h3>Just a few seconds. Kindly exercise some patience...</h3>
        <img src="/images/processing.gif" style="max-width: 400px;" alt="" />
      </div>
    </div>

    <div class="row gap-y" v-show="displayError && !loading">
      <div class="col-md-10 mx-auto text-center">
        <span class="icon-sad lg-error-icon"></span>
        <h1>Oops!</h1>
        <h3>Unfortunately, we're unable to query your data at the moment.</h3>
        <h5>Please try again in few minutes</h5>

        <button class="btn btn-sm btn-warning btn-round" @click="getProfile">
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <div class="row" v-show="!loading && !displayError">
      <div class="report-data col-lg-8">
        <h6 id="block-2" class="block-number">
          Profiling report for:
          <strong>{{ decodeURIComponent(handle) }}</strong>
          with the hashtag #BBNaija
        </h6>

        <div>
          <small
            ><span class="icon-calendar"></span> &nbsp; {{ date_from }} -
            {{ date_to }}</small
          >
        </div>
      </div>

      <div class="col-md-12">
        <section
          class="section bg-white"
          style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);"
        >
          <div class="container">
            <div class="row gap-y">
              <div class="col-md-6 text-center">
                <img
                  class="rounded-circle"
                  width="200px"
                  :src="_avatar"
                  :alt="name"
                />
                <br />
                <div class="row">
                  <div class="col-md-8 mx-md-auto">
                    <h5>About {{ name }}</h5>
                    <h6>@{{ handle }}</h6>
                    <p>{{ about }}</p>
                    <p><i class="icon-scope"></i> {{ location }}</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mx-md-auto">
                <div class="row gap-y text-center">
                  <div class="col-6 col-lg-4">
                    <p>Engagement Rate</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="engagementRate"
                      data-suffix="%"
                      class="counted"
                    >
                      {{ engagementRate }}%
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Reach</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="averageLikes"
                      class="counted"
                    >
                      {{ numberFormat(reach) }}
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Total Engagements</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="averageRetweets"
                      class="counted"
                    >
                      {{ numberFormat(total_engagements) }}
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Total Posts</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="parseInt(numberFormat(totalTweets))"
                      class="counted"
                    >
                      {{ numberFormat(totalTweets) }}
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Avg Likes</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="averageLikes"
                      class="counted"
                    >
                      {{ numberFormat(averageLikes) }}
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Avg Retweets</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="averageRetweets"
                      class="counted"
                    >
                      {{ numberFormat(averageRetweets) }}
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Followers</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="parseInt(numberFormat(followers))"
                      data-duration="10"
                      data-use-easing="false"
                      class="counted"
                    >
                      {{ numberFormat(followers) }}
                    </h2>
                  </div>

                  <div class="col-6 col-lg-4">
                    <p>Following</p>
                    <h2
                      data-provide="countup"
                      data-from="0"
                      :data-to="parseInt(numberFormat(following))"
                      class="counted"
                    >
                      {{ numberFormat(following) }}
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4 mt-3">
                    <div class="shadow-3 bg-white text-center py-2">
                      <div class="row">
                        <div class="col-3">
                          <h4
                            class="lead-7 pl-2 text-right counted"
                            data-provide="countup"
                            data-from="0"
                          >
                            {{ numberFormat(replies) }}
                          </h4>
                        </div>

                        <div class="col-8 text-right mr-1">
                          <p class="small text-uppercase ls-2 mb-2">
                            Total <br />Replies
                          </p>
                          <p>
                            <i class="icon-newspaper lead-4 mb-0"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mt-3">
                    <div class="shadow-3 bg-white text-center py-2">
                      <div class="row">
                        <div class="col-3">
                          <h4
                            class="lead-7 pl-2 text-right counted"
                            data-provide="countup"
                            data-from="0"
                          >
                            {{ numberFormat(impressions) }}
                          </h4>
                        </div>

                        <div class="col-8 text-right mr-1">
                          <p class="small text-uppercase ls-2 mb-2">
                            Impressions
                          </p>
                          <p>
                            <i class="icon-video lead-4 mb-0"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mt-3">
                    <div class="shadow-3 bg-white text-center py-2">
                      <div class="row">
                        <div class="col-3">
                          <h4
                            class="lead-7 pl-2 text-right counted"
                            data-provide="countup"
                            data-from="0"
                          >
                            {{ numberFormat(campaign_value) }}
                          </h4>
                        </div>

                        <div class="col-8 text-right mr-1">
                          <p class="small text-uppercase ls-2 mb-2">
                            Campaign Value
                          </p>
                          <p>
                            <i class="icon-edit lead-4 mb-0"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="section bg-gray" style="width: 100%;">
          <div class="container">
            <div class="row gap-y">
              <div class="col-md-6">
                <h3>
                  Most Retweeted Tweets
                </h3>
                <table class="table shadow bg-white table-hover table-striped">
                  <paginate
                    name="retweets"
                    :list="retweets"
                    :per="5"
                    tag="tbody"
                  >
                    <tr
                      v-for="(retweet, index) in paginated('retweets')"
                      :key="index"
                    >
                      <td width="70%">
                        <div class="media mb-3">
                          <div class="lead-6 line-height-1 text-danger w-50px">
                            <img
                              class="avatar avatar-sm"
                              :src="retweet.user.profile_image_url"
                              alt=""
                            />
                          </div>
                          <div class="media-body">
                            <strong>@{{ retweet.user.screen_name }}</strong
                            ><br /><small>{{ retweet.user.name }}</small>
                          </div>
                        </div>
                        <p>{{ retweet.text }}</p>
                        <p>
                          <small>
                            <strong
                              >Posted on
                              {{ getHumanDate(retweet.created_at) }}
                            </strong>
                          </small>
                        </p>
                        <p>
                          <i class="fa fa-retweet text-primary"></i>
                          {{ retweet.retweet_count }} &nbsp;&nbsp;
                          <i class="fa fa-heart text-danger"></i>
                          {{ retweet.favorite_count }}
                        </p>
                      </td>
                    </tr>
                  </paginate>
                </table>
                <paginate-links
                  v-if="!exceptPlans.includes(report_type)"
                  for="retweets"
                  :show-step-links="true"
                  :limit="5"
                  :step-links="{
                    next: 'NEXT',
                    prev: 'PREV',
                  }"
                  :classes="{
                    ul: 'pagination',
                    'ul.paginate-links > li.number': 'page-item',
                    'ul.paginate-links > li.number > a': 'page-link',
                  }"
                ></paginate-links>
              </div>

              <div class="tweet-margin col-md-6">
                <h3>Most Mentioned Housemates</h3>
                <table class="table shadow bg-white table-hover table-striped">
                  <paginate
                    name="most_mentioned_housemates"
                    :list="most_mentioned_housemates"
                    :per="5"
                    tag="tbody"
                  >
                    <tr v-if="most_mentioned_housemates.length == 0">
                      <td><h6>No data available</h6></td>
                    </tr>
                    <tr
                      v-for="(active, index) in paginated(
                        'most_mentioned_housemates'
                      )"
                      :key="index"
                    >
                      <td width="70%">
                        <div class="media">
                          <div class="media-body">
                            <strong>@{{ active.name }}</strong
                            ><br /><small>{{ active.name }}</small>
                          </div>
                        </div>
                      </td>
                      <td class="text-center">
                        <strong>{{ numberFormat(active.count) }}</strong
                        ><br /><small>Mentions</small>
                      </td>
                    </tr>
                  </paginate>
                </table>
                <paginate-links
                  v-if="!exceptPlans.includes(report_type)"
                  for="most_mentioned_housemates"
                  :show-step-links="true"
                  :limit="5"
                  :step-links="{
                    next: 'NEXT',
                    prev: 'PREV',
                  }"
                  :classes="{
                    ul: 'pagination',
                    'ul.paginate-links > li.number': 'page-item',
                    'ul.paginate-links > li.number > a': 'page-link',
                  }"
                ></paginate-links>
              </div>
            </div>

            <div class="row gap-y">
              <div
                class="col-md-12 bg-white"
                style="
                  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
                  height: fit-content;
                "
              >
                <h5 class="fw-500 my-4">Need Extra Data?</h5>
                <hr class="my-7" />
                <div class="row gap-y">
                  <div class="col-md-4 text-center">
                    <span class="iconbox iconbox-xxl">
                      <i class="icon-scope"></i>
                    </span>
                    <p>
                      <small><strong>Followers Interest</strong></small>
                    </p>
                  </div>
                  <div class="col-md-4 text-center">
                    <span class="iconbox iconbox-xxl">
                      <i class="icon-profile-male"></i>
                    </span>
                    <p>
                      <small><strong>Followers Demography</strong></small>
                    </p>
                  </div>
                  <div class="col-md-4 text-center">
                    <span class="iconbox iconbox-xxl">
                      <i class="icon-map"></i>
                    </span>
                    <p>
                      <small><strong>Followers Location</strong></small>
                    </p>
                  </div>
                </div>
                <div class="text-center">
                  <a href="/contact" class="btn btn-warning mt-5 mb-7"
                    >Contact Us</a
                  >
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import VuePaginate from "vue-paginate";
import "vue-loading-overlay/dist/vue-loading.css";

import moment from "moment";

export default {
  props: ["id"],
  components: { Loading },
  data() {
    return {
      exceptPlans: ["starter", "basic"],
      loading: true,
      paginate: ["recent_tweets", "retweets", "most_mentioned_housemates"],
      avatar: "",
      recent_tweets: [],
      retweets: [],
      followers: 0,
      following: 0,
      averageRetweets: 0,
      averageLikes: 0,
      totalTweets: 0,
      replies: 0,
      campaign_value: 0,
      er: 0,
      name: "",
      about: "",
      isVerified: false,
      engagementRate: 0,
      category: [],
      media_meta: [],
      handle: "",
      location: "",
      date_from: "",
      date_to: "",
      report_type: "",
      report_type_days: "",
      displayError: false,
      total_engagements: 0,
      impressions: 0,
      reach: 0,
      most_mentioned_housemates: [],
    };
  },
  mounted: function () {},
  created: function () {
    this.getProfile();
  },
  methods: {
    goToSubscription() {
      window.location.href = "/pricing";
    },
    dynamicLimit(plan) {
      if (plan === "starter" || plan === "basic") {
        return 1;
      }

      return 1;
    },
    async downloadReport() {
      const sniffURL = window.location.href;
      const splitURL = sniffURL.split("/");
      const getIDIndex = splitURL.length - 1;
      const id = splitURL[getIDIndex];
      const type = "profiling";
      window.location = `/download-pdf?id=${id}&type=${type}`;
    },
    getProfile: function () {
      this.loading = true;
      let $this = this;

      // Get handle from URL
      const sniffURL = window.location.href;
      const splitURL = sniffURL.split("/");
      const getIDIndex = splitURL.length - 1;
      const handle = splitURL[getIDIndex];

      const URL = `/api/bbn/influencerdata/${handle}`;

      fetch(URL)
        .then((res) => res.json())
        .then((res) => {
          if (res.data) {
            console.log("response", res.data);
            let data = JSON.parse(res.data);
            // let data = res.data;
            this.most_mentioned_housemates = JSON.parse(
              res.most_mentioned_housemates
            );
            this.total_engagements = data.total_engagements;
            this.impressions = data.impressions;
            this.replies = data.replies;
            this.campaign_value = data.campaign_value;
            this.reach = data.reach;
            this.followers = data.profile.followers_count;
            this.following = data.profile.friends_count;
            this.totalTweets = data.total_posts;
            this.about = data.profile.description;
            this.isVerified = data.profile.verified;
            this.name = data.profile.name;
            this.avatar = data.profile.profile_image_url;
            this.loading = false;
            this.handle = data.profile.screen_name;
            this.recent_tweets = data.recent_tweets;
            this.retweets = data.retweets;
            this.media_meta = data.media_meta_data;
            this.engagementRate = data.engagement_rate;
            this.averageRetweets = data.avr_retweets;
            this.averageLikes = data.avr_likes;
            this.location = data.profile_location;
            this.date_from = data.date_from;
            this.date_to = data.date_to;
            this.report_type = res.data.report_type;
            this.report_type_days = res.data.report_type_days;

            this.displayError = false;
          } else {
            this.displayError = true;
            this.loading = false;
          }
        })
        .catch((err) => {
          console.log(err);
          this.displayError = true;
          this.loading = false;
        });
    },
    numberFormat: function (number) {
      var format = 0;

      if (number > 999999999) {
        format = parseInt(number / 1000000000) + "B+";
      } else if (number > 999999) {
        format = parseInt(number / 1000000) + "M+";
      } else if (number > 999) {
        format = parseInt(number / 1000) + "K+";
      } else {
        format = parseInt(number);
      }
      return format;
    },
    getHumanDate: function (date) {
      return moment(date).format("LLLL");
    },
  },
  computed: {
    _avatar: function () {
      return this.avatar.replace("_normal", "");
    },
  },
};
</script>

<style>
.download-section {
  margin: 10px 0;
}
</style>

