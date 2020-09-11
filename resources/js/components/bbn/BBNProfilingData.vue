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
          {{ report_type_days }} Days profiling report for:
          <strong>{{ decodeURIComponent(handle) }}</strong>
        </h6>

        <div>
          <small
            ><span class="icon-calendar"></span> &nbsp; {{ date_from }} -
            {{ date_to }}</small
          >
        </div>
      </div>
      
      <div v-if="report_type !== 'enterprise'" class="report-data col-lg-4 col-sm-12">
        <button
          @click="goToSubscription"
          type="button"
          class="btn btn-round btn-primary float-right"
        >
          <label><i class="fa fa-thumbs-up"></i></label>
          Upgrade Plan
        </button>
      </div>

      <div class="col-md-12">
        <p>
          <a
            :href="`/search/profile/${handle}?reloadData=true`"
            class="btn btn-primary btn-sm"
            ><i class="icon-refresh"></i> Refresh Data</a
          >
        </p>
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

        <section class="download-section">
          <div class="row">
            <div class="offset-md-6 col-md-6">
              <button
                class="btn btn-warning float-right"
                @click="downloadReport"
              >
                Download Report
              </button>
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

              <div class="col-md-6">
                <h3>
                  Most Recent Tweets
                </h3>
                <table class="table shadow bg-white table-hover table-striped">
                  <paginate
                    name="recent_tweets"
                    :list="recent_tweets"
                    :per="5"
                    tag="tbody"
                  >
                    <tr
                      v-for="(tweet, index) in paginated('recent_tweets')"
                      :key="index"
                    >
                      <td width="70%">
                        <div class="media mb-3">
                          <div class="lead-6 line-height-1 text-danger w-50px">
                            <img
                              class="avatar avatar-sm"
                              :src="tweet.user.profile_image_url"
                              alt=""
                            />
                          </div>
                          <div class="media-body">
                            <strong>@{{ tweet.user.screen_name }}</strong
                            ><br /><small>{{ tweet.user.name }}</small>
                          </div>
                        </div>
                        <p>{{ tweet.text }}</p>
                        <p>
                          <small>
                            <strong
                              >Posted on
                              {{ getHumanDate(tweet.created_at) }}
                            </strong>
                          </small>
                        </p>
                        <p>
                          <i class="fa fa-retweet text-primary"></i>
                          {{ tweet.retweet_count }} &nbsp;&nbsp;
                          <i class="fa fa-heart text-danger"></i>
                          {{ tweet.favorite_count }}
                        </p>
                      </td>
                    </tr>
                  </paginate>
                </table>
                <paginate-links
                  v-if="!exceptPlans.includes(report_type)"
                  for="recent_tweets"
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
      paginate: ["recent_tweets", "retweets"],
      avatar: "",
      recent_tweets: [],
      retweets: [],
      followers: 0,
      following: 0,
      averageRetweets: 0,
      averageLikes: 0,
      totalTweets: 0,
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
      const splitURL = sniffURL.split('/');
      const getIDIndex = splitURL.length - 1
      const id = splitURL[getIDIndex];
      const type = 'profiling'
      window.location = `/download-pdf?id=${id}&type=${type}`;

      const URL = `/api/v1/report/profiling/download`;

      const config = {
        headers: {
          Authorization:
            "Bearer " + $('meta[name="api-token"]').attr("content"),
        },
      };

      const data = {
        report_type_days: this.report_type_days,
        date_from: this.date_from,
        date_to: this.date_to,
        handle: this.handle,

        impressions: this.numberFormat(this.impressions),
        reach: this.numberFormat(this.reach),
        followers: this.numberFormat(this.followers),
        following: this.numberFormat(this.following),
        averageRetweets: this.numberFormat(this.averageRetweets),
        averageLikes: this.numberFormat(this.averageLikes),
        totalTweets: this.numberFormat(this.totalTweets),
        total_engagements: this.numberFormat(this.total_engagements),
        engagement_rate: this.engagementRate,
        location: this.location,
        retweets: this.retweets,
        tweets: this.recent_tweets,
        about: this.about,
        name: this.name,
      };

      // Add all necessary formaters
      try {
        let response = await axios.post(URL, data, config);
      } catch (err) {
        console.log(err);
      }
    },
    getProfile: function () {
      this.loading = true;
      let $this = this;
      fetch(`/api/v1/report/profile/${this.id}`, {
        headers: {
          Authorization:
            "Bearer " + $('meta[name="api-token"]').attr("content"),
        },
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.data) {
            let data = JSON.parse(res.data.data);
            this.total_engagements = data.total_engagements;
            this.impressions = data.impressions;
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

