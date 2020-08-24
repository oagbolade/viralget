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
        <h3>
          Unfortunately, we're unable to query your data at the moment.
        </h3>
        <h5>Please try again in few minutes</h5>

        <button class="btn btn-sm btn-warning btn-round" @onClick="getData">
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <div class="row" v-show="!loading && !displayError">
      <div class="report-data col-lg-8">
        <h6 id="block-2" class="block-number">
          {{ report_type_days }} days report for:
          <strong>{{ decodeURIComponent(handle) }}</strong>
        </h6>

        <div>
          <small
            ><span class="icon-calendar"></span> &nbsp; {{ date_from }} -
            {{ date_to }}</small
          >
        </div>

        <!-- Removed this feature -->
        <!-- <a-range-picker
          @change="onChange"
          :disabledDate="disabledDate"
          :showTime="{ defaultValue: moment('00:00:00', 'HH:mm:ss') }"
        />
        <button class="btn btn-sm btn-primary" @click="goTo">
          Filter
        </button> -->
      </div>

      <div class="report-data col-lg-4 col-sm-12">
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
        <section
          class="section text-white mt-5"
          style="background-color: #1b8bf9;"
        >
          <div class="container">
            <div class="row gap-y text-center">
              <div class="col-lg-4 col-md-12 col-sm-12">
                <h4 class="lead-6">
                  <i class="icon-linegraph text-lighter mr-3"></i>
                </h4>
                <p class="small text-uppercase ls-2">
                  Impressions
                </p>
                <p
                  class="lead-8 lh-1 fw-700 counted"
                  data-provide="countup"
                  data-from="0"
                  :data-to="number(accurate_impressions)"
                >
                  {{ number(accurate_impressions) }}
                </p>
              </div>

              <div class="col-lg-4 col-md-12 col-sm-12">
                <h4 class="lead-6">
                  <i class="icon-target text-lighter mr-3"></i>
                </h4>
                <p class="small text-uppercase ls-2">Reach</p>
                <p
                  class="lead-8 lh-1 fw-700 counted"
                  data-provide="countup"
                  data-from="0"
                  :data-to="number(potential_reach)"
                >
                  {{ number(potential_reach) }}
                </p>
              </div>

              <div class="col-lg-4 col-md-12 col-sm-12">
                <h4 class="lead-6">
                  <i class="icon-wallet text-lighter mr-3"></i>
                </h4>
                <p class="small text-uppercase ls-2">
                  Campaign Value (NGN)
                </p>
                <p class="lead-8 lh-1 fw-700 counted" data-prefix="%">
                  {{ number(parseInt(accurate_campaign_value)) }}
                </p>
              </div>
            </div>
          </div>
        </section>

        <!-- <section class="download-section">
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
        </section> -->

        <section class="section mt-2 pb-0">
          <div class="container">
            <div class="row gap-y">
              <div class="col-md-4">
                <pie-chart :chart-data="datacollection"></pie-chart>
              </div>
              <div class="col-md-7 offset-1">
                <div class="row">
                  <div class="col-md-12 mt-3">
                    <div class="shadow-3 bg-white text-center py-2">
                      <div class="row">
                        <div class="col-3">
                          <h4
                            class="lead-7 pl-2 text-right counted"
                            data-provide="countup"
                            data-from="0"
                          >
                            {{ number(totalTweets) }}
                          </h4>
                        </div>

                        <div class="col-8 text-right mr-1">
                          <p class="small text-uppercase ls-2 mb-2">
                            Total <br />Tweets
                          </p>
                          <p>
                            <i class="icon-newspaper lead-4 mb-0"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="shadow-3 bg-white text-center py-2">
                      <div class="row">
                        <div class="col-3">
                          <h4
                            class="lead-7 pl-2 text-right counted"
                            data-provide="countup"
                            data-from="0"
                          >
                            {{ number(media_count) }}
                          </h4>
                        </div>

                        <div class="col-8 text-right mr-1">
                          <p class="small text-uppercase ls-2 mb-2">
                            Media Tweets
                            <br />(Pictures/Videos)
                          </p>
                          <p>
                            <i class="icon-video lead-4 mb-0"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="shadow-3 bg-white text-center py-2">
                      <div class="row">
                        <div class="col-3">
                          <h4
                            class="lead-7 pl-2 text-right counted"
                            data-provide="countup"
                            data-from="0"
                          >
                            {{ number(text_count) }}
                          </h4>
                        </div>

                        <div class="col-8 text-right mr-1">
                          <p class="small text-uppercase ls-2 mb-2">
                            Text<br />Tweets
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

        <section class="section mt-0">
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
                      {{ number(contributors) }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      <br />Contributors <br />
                    </p>
                    <p>
                      <i class="icon-chat lead-4 mb-0"></i>
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
                      {{ number(avr_contribution) }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      Avg <br />Tweet/Contributor
                    </p>
                    <p>
                      <i class="icon-quote lead-4 mb-0"></i>
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
                      {{ number(likes.count) }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      <br />Total Likes
                    </p>
                    <p>
                      <i class="icon-quote lead-4 mb-0"></i>
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
                      {{ `${accurate_engagement_rate.toFixed(2)}%` }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      Engagement<br />Rate
                    </p>
                    <p>
                      <i class="icon-piechart lead-4 mb-0"></i>
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
                      {{ number(total_engagements) }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      Total<br />Engagements
                    </p>
                    <p>
                      <i class="icon-linechart lead-4 mb-0"></i>
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
                      {{ ad_recall.toFixed(2) }}%
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">Ad<br />Recall</p>
                    <p>
                      <i class="icon-areachart lead-4 mb-0"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="section mt-0 pt-0">
          <div class="row">
            <div class="tweet-margin col-md-6">
              <h3>Most Active</h3>
              <table class="table shadow bg-white table-hover table-striped">
                <paginate
                  name="high_impacts"
                  :list="high_impacts"
                  :per="5"
                  tag="tbody"
                >
                  <tr v-if="high_impacts.length == 0">
                    <td><h6>No data available</h6></td>
                  </tr>
                  <tr
                    v-for="(active, index) in paginated('high_impacts')"
                    :key="index"
                  >
                    <td width="70%">
                      <div class="media">
                        <div class="lead-6 line-height-1 text-danger w-50px">
                          <img
                            class="avatar avatar-sm"
                            :src="active.user.profile_image_url"
                            alt=""
                          />
                        </div>
                        <div class="media-body">
                          <strong>@{{ active.user.screen_name }}</strong
                          ><br /><small>{{ active.user.name }}</small>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <strong>{{ number(active.count) }}</strong
                      ><br /><small>Impacts</small>
                    </td>
                  </tr>
                </paginate>
              </table>
              <paginate-links
                v-if="!exceptPlans.includes(report_type)"
                for="high_impacts"
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
                  <tr v-if="high_impacts.length == 0">
                    <td><h6>No data available</h6></td>
                  </tr>
                  <tr
                    v-for="(active, index) in paginated('most_mentioned_housemates')"
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
                      <strong>{{ number(active.count) }}</strong
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

            <div class="tweet-margin col-md-12">
              <h3>
                Highest Retweeted Tweets
              </h3>
              <table class="table shadow bg-white table-hover table-striped">
                <paginate
                  name="high_retweet_tweets"
                  :list="high_retweet_tweets"
                  :per="5"
                  tag="tbody"
                >
                  <tr v-if="high_retweet_tweets.length == 0">
                    <td>
                      <h6>No data available</h6>
                    </td>
                  </tr>
                  <tr
                    v-for="(retweet, index) in paginated('high_retweet_tweets')"
                    :key="index"
                  >
                    <td class="high-tweets" width="70%">
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
                        {{ retweet.retweet_count }}
                        &nbsp;&nbsp;
                        <i class="fa fa-heart text-danger"></i>
                        {{ retweet.favorite_count }}
                      </p>
                      <!-- <hr class="my-7" /> -->
                    </td>
                  </tr>
                </paginate>
              </table>
              <paginate-links
                v-if="!exceptPlans.includes(report_type)"
                for="high_retweet_tweets"
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
        </section>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import VuePaginate from "vue-paginate";
import moment from "moment";
import LineChart from "../../charts/LineChart.js";
import PieChart from "../../charts/PieChart.js";
import Swal from "sweetalert2";

import {
  Datepicker,
  Timepicker,
  DatetimePicker,
} from "@livelybone/vue-datepicker";

const numeral = require("numeral");

export default {
  props: ["id"],
  components: { Loading, LineChart, PieChart },
  data() {
    return {
      exceptPlans: ["starter", "basic"],
      dateFormat: "YYYY-MM-DD",
      loading: true,
      tweets: [],
      averageRetweets: 0,
      averageLikes: 0,
      totalTweets: 0,
      media_meta: [],
      count: 0,
      most_active: [],
      high_retweets: [],
      high_retweet_tweets: [],
      most_mentioned_housemates: [],
      original_tweets: [],
      popular: [],
      contributors: 0,
      high_impacts: [],
      avr_contribution: 0,
      potential_reach: 0,
      potential_impact: 0,
      engagement_rate: 0,
      replies: 0,
      retweets: 0,
      likes: 0,
      text_percentage: "width 0%",
      media_percentage: "width 0%",
      text_count: 0,
      media_count: 0,
      report_type: "",
      report_type_days: "",
      handle: "",
      date_from: "",
      date_to: "",
      paginate: [
        "high_retweet_tweets",
        "high_impacts",
        "most_mentioned_housemates",
      ],
      displayError: false,
      selected_date_from: "",
      selected_date_to: "",
      datacollection: null,
      accurate_engagement_rate: 0,
      accurate_campaign_value: 0,
      accurate_reach: 0,
      accurate_impressions: 0,
      original_contributors: [],
      top_original_contributors: [],
      most_recent_tweets: [],
      most_recent_replies: [],
      total_engagements: 0,
      ad_recall: 0,
      selectedDays: "",
    };
  },
  mounted: function () {},
  created: function () {
    this.getData();
  },
  methods: {
    getDays(event) {
      const chosenDay = event.target.value;
      const oneDay = 86400000;
      const sevenDays = oneDay * 7;
      const thirtyDays = oneDay * 30;
      const timeNow = Date.now();
      let FromDate;
      let formatFromDate;
      let formatTimeNow;

      switch (chosenDay) {
        case "1":
          FromDate = timeNow - oneDay;

          formatFromDate = moment(FromDate).format("YYYYMMDDhhmm");
          formatTimeNow = moment(timeNow).format("YYYYMMDDhhmm");

          this.fetchSelectedDates(formatFromDate, formatTimeNow);
          break;
        case "7":
          FromDate = timeNow - sevenDays;

          formatFromDate = moment(FromDate).format("YYYYMMDDhhmm");
          formatTimeNow = moment(timeNow).format("YYYYMMDDhhmm");

          this.fetchSelectedDates(formatFromDate, formatTimeNow);
          break;
        case "30":
          FromDate = timeNow - thirtyDays;

          formatFromDate = moment(FromDate).format("YYYYMMDDhhmm");
          formatTimeNow = moment(timeNow).format("YYYYMMDDhhmm");

          this.fetchSelectedDates(formatFromDate, formatTimeNow);
          break;
        default:
          return timeNow;
      }
    },
    fetchSelectedDates(fromDate, toDate) {
      const URL = `/search/profiles?q=${this.handle}&fromDate=${fromDate}&toDate=${toDate}`;
      window.location.href = URL;
    },
    async downloadReport() {
      const sniffURL = window.location.href;
      const splitURL = sniffURL.split("/");
      const getIDIndex = splitURL.length - 1;
      const id = splitURL[getIDIndex];
      const type = "hashtag";
      window.location = `/download-pdf?id=${id}&type=${type}`;
    },
    moment,
    getData: function () {
      this.loading = true;
      fetch(`/api/bbn/data`, {
        headers: {
          Authorization:
            "Bearer " + $('meta[name="api-token"]').attr("content"),
        },
      })
        .then((res) => res.json())
        .then((res) => {
          console.log(res);
          if (res.status == "success" && res.data) {
            this.displayError = false;
            this.loading = false;
            let data = JSON.parse(res.data.data);

            const total_engagements = data.total_engagements;
            const potential_reach = data.potential_reach;

            const get_highest_retweeted_tweets = JSON.parse(
              res.high_tweets.highest_retweeted_tweets
            );

            this.high_retweet_tweets = get_highest_retweeted_tweets
              ? get_highest_retweeted_tweets
              : [];

            this.accurate_campaign_value = data.campaign_value;
            this.accurate_engagement_rate =
              (total_engagements / data.impressions) * 100;
            this.accurate_impressions = data.impressions;
            this.total_engagements = total_engagements;
            this.ad_recall = (total_engagements / potential_reach) * 100;

            this.totalTweets = data.count;
            this.media_meta = data.media_meta_data;
            this.contributors = data.contributors;
            this.avr_contribution = data.avr_contribution;
            this.potential_reach = potential_reach;
            this.potential_impact = data.potential_impact;
            this.most_active = data.most_active.data;
            this.popular = data.popular;
            this.high_retweets = data.high_retweets;
            this.most_mentioned_housemates = JSON.parse(res.most_mentioned_housemates);
            this.high_impacts = data.high_impacts;
            this.replies = data.replies;
            this.retweets = data.retweets;
            this.engagement_rate = data.engagement_rate;
            this.text_count = data.media_meta_data.text.count;
            this.media_count = data.media_meta_data.media.count;
            this.likes = data.high_likes;
            this.text_percentage = `width: ${data.media_meta_data.text.percentage}%`;
            this.media_percentage = `width: ${data.media_meta_data.media.percentage}%`;
            this.report_type = res.data.report_type;

            this.report_type_days = "30";
            this.handle = res.data.handle;

            this.date_from = data.date_from;
            this.date_to = data.date_to;

            this.fillData();
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
    goToSubscription() {
      window.location.href = "/pricing";
    },
    goTo() {
      if (this.report_type === "starter" || this.report_type === "basic") {
        Swal.fire(
          "Sorry!",
          "This feature is not available for your current subscription plan, please upgrade your subscription plan",
          "question"
        );
        return;
      }

      window.location = `/hashtag/${encodeURI(this.handle)}?fromDate=${
        this.selected_date_from
      }&toDate=${this.selected_date_to}`;
    },
    onChange(date, dateString) {
      this.selected_date_from = `${date[0].format("YYYYMMDDHHMM")}`;
      this.selected_date_to = `${date[1].format("YYYYMMDDHHMM")}`;
    },
    disabledDate(current) {
      return current && current > moment().endOf("day");
    },
    number(value) {
      return numeral(value).format("0,0");
    },
    fillData() {
      console.log([this.totalTweets, this.retweets.count, this.replies.count]);
      this.datacollection = {
        datasets: [
          {
            data: [
              this.totalTweets - this.retweets.count,
              this.retweets.count,
              this.replies.count,
            ],
            backgroundColor: ["#ff4954", "#3cd458", "#926dde"],
          },
        ],
        labels: ["Tweets", "Retweets", "Replies"],
      };
    },
    getRandomInt() {
      return Math.floor(Math.random() * (50 - 5 + 1)) + 5;
    },
    getHumanDate: function (date) {
      return moment(date).format("LLLL");
    },
  },
  computed: {
    replies_percentage: function () {
      return `width: ${this.replies.percentage}%`;
    },
    retweets_percentage: function () {
      return `width: ${this.retweets.percentage}%`;
    },
    likes_percentage: function () {
      return `width: ${this.likes.percentage}%`;
    },
  },
};
</script>

<style scoped>
.pagination {
  justify-content: center;
}
.pieStyle {
  height: 40px;
}

.download-section {
  margin: 10px 0;
}

.high-retweet-seperator {
  padding: 8px;
}

.btn {
  margin: 10px;
}

.high-tweets {
  height: 250px;
}

/* a:not([href]):not([tabindex]){
  color: black;
} */

.tweet-margin {
  margin: 30px 0;
}

.lead-8 {
  font-size: 20px !important;
}

.lead-7 {
  font-size: 20px !important;
}
</style>
