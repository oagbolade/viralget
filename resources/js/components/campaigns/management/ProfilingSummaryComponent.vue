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
        <img src="/images/processing.gif" style="max-width: 400px" alt="" />
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
      <h6 id="block-2" class="block-number">
        24 hours report for:
        <strong>{{ decodeURIComponent(handle) }}</strong>
        <span v-show="report_type_days !== '30'">
          <a href="/pricing"> | Upgrade Plan</a></span
        >
      </h6>

      <div class="col-md-12">
        <div>
          <p>
            <small
              ><span class="icon-calendar"></span> &nbsp; {{ date_from }} -
              {{ date_to }}</small
            >
          </p>
        </div>

        <a-range-picker
          @change="onChange"
          :disabledDate="disabledDate"
          :showTime="{ defaultValue: moment('00:00:00', 'HH:mm:ss') }"
        />
        <button class="btn btn-sm btn-primary" @click="goTo">
          Filter
        </button>

        <section
          class="section text-white mt-5"
          style="background-color: #1b8bf9"
        >
          <div class="container">
            <div class="row gap-y text-center">
              <div class="col-md-4">
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
                  :data-to="number(impressions)"
                >
                  {{ number(impressions) }}
                </p>
              </div>

              <div class="col-md-4">
                <h4 class="lead-6">
                  <i class="icon-target text-lighter mr-3"></i>
                </h4>
                <p class="small text-uppercase ls-2">Reach</p>
                <p
                  class="lead-8 lh-1 fw-700 counted"
                  data-provide="countup"
                  data-from="0"
                  :data-to="number(reach)"
                >
                  {{ number(reach) }}
                </p>
              </div>

              <div class="col-md-4">
                <h4 class="lead-6">
                  <i class="icon-wallet text-lighter mr-3"></i>
                </h4>
                <p class="small text-uppercase ls-2">
                  Campaign Value (NGN)
                </p>
                <p class="lead-8 lh-1 fw-700 counted" data-prefix="%">
                  {{ number(parseInt(campaign_value)) }}
                </p>
              </div>
            </div>
          </div>
        </section>

        <!-- Removed this feature -->
        <!-- <div class="col-md-4">
          <form class="input-round">
            <div class="form-group">
              <select
                @change="getDays"
                v-model="selectedDays"
                class="form-control"
                placeholder="Select input"
              >
                <option value="">Select Days</option>
                <option value="1">24hrs</option>
                <option selected value="7">1 Week (7days)</option>
                <option value="30">30 days</option>
              </select>
            </div>
          </form>
        </div> -->

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

        <section class="section mt-0">
          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="shadow-3 bg-white text-center py-2">
                <div class="row">
                  <div class="col-3">
                    <h4
                      class="lead-7 pl-2 text-right counted"
                      data-provide="countup"
                      data-from="0"
                    >
                      {{ number(retweets) }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      Total <br />Retweets
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
                      {{ number(likes) }}
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

            <div class="col-md-6 mt-3">
              <div class="shadow-3 bg-white text-center py-2">
                <div class="row">
                  <div class="col-3">
                    <h4
                      class="lead-7 pl-2 text-right counted"
                      data-provide="countup"
                      data-from="0"
                    >
                      {{ `${engagement_rate.toFixed(2)}%` }}
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

            <div class="col-md-6 mt-3">
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

            <div class="col-md-6 mt-3">
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
import LineChart from "../../../charts/LineChart.js";
import PieChart from "../../../charts/PieChart.js";

import {
  Datepicker,
  Timepicker,
  DatetimePicker
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
      totalTweets: 0,
      reach: 0,
      impact: 0,
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
      displayError: false,
      selected_date_from: "",
      selected_date_to: "",
      datacollection: null,
      engagement_rate: 0,
      campaign_value: 0,
      reach: 0,
      impressions: 0,
      total_engagements: 0,
      ad_recall: 0,
      keyword: 0,
      selectedDays: ""
    };
  },
  mounted: function() {},
  created: function() {
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
      console.log("average ", this.most_active);

      const URL = `/api/v1/report/keyword/download`;

      const config = {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      };

      const data = {
        report_type_days: this.report_type_days,

        date_from: this.date_from,
        date_to: this.date_to,

        handle: this.handle,

        potential_impact: this.number(this.potential_impact),
        potential_reach: this.number(this.potential_reach),
        campaign_value: this.number(
          parseInt((this.potential_impact * 80) / 1000)
        ),
        totalTweets: this.totalTweets,
        text_count: this.text_count,
        media_count: this.media_count,
        contributors: this.contributors,
        avr_contribution: this.number(this.avr_contribution),
        likes: this.likes,
        engagement_rate: this.engagement_rate,

        // High tweet related data
        high_impacts: this.high_impacts,
        top_contributors: this.most_active,
        high_retweeters: this.high_retweets,
        highest_retweeted_tweets: this.high_retweet_tweets
      };

      // Add all necessary formaters
      try {
        let response = await axios.post(URL, data, config);
        console.log(response);
      } catch (err) {
        console.log(err);
      }
    },
    moment,
    getData: function() {
      this.loading = true;
      fetch(`/api/v1/management/report/profile/summary/${this.id}`, {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      })
        .then(res => res.json())
        .then(res => {
          if (res.status == "success") {
            let data = JSON.parse(res.data.data);
            console.log(res);
            this.totalTweets = data.total_tweets;
            const total_engagements = data.total_engagements;
            const reach = data.reach;
            this.impressions = data.impressions;
            this.reach = data.reach;
            this.total_engagements = total_engagements;
            this.ad_recall = (total_engagements / reach) * 100;
            this.campaign_value = 1000;
            this.engagement_rate = data.engagement_rate;
            this.likes = data.total_likes;
            this.retweets = data.total_retweets;

            this.report_type = res.data.report_type;
            console.log(this.report_type);

            this.report_type_days = res.data.report_type_days;
            this.keyword = res.data.keyword;
            this.handle = res.data.handle;
            this.loading = false;
            this.displayError = false;

            this.date_from = data.date_from;
            this.date_to = data.date_to;

            //this.fillData();
          } else {
            this.displayError = true;
            this.loading = false;
          }
        })
        .catch(err => {
          console.log(err);
          this.displayError = true;
          this.loading = false;
        });
    },
    goTo() {
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
      // console.log([
      //     this.totalTweets,
      //     this.retweets.count,
      //     this.replies.count
      // ]);
      this.datacollection = {
        datasets: [
          {
            data: [
              this.totalTweets - this.retweets.count,
              this.retweets.count,
              this.replies.count
            ],
            backgroundColor: ["#ff4954", "#3cd458", "#926dde"]
          }
        ],
        labels: ["Tweets", "Retweets", "Replies"]
      };
    },
    getRandomInt() {
      return Math.floor(Math.random() * (50 - 5 + 1)) + 5;
    },
    getHumanDate: function(date) {
      return moment(date).format("LLLL");
    }
  },
  computed: {
    replies_percentage: function() {
      return `width: ${this.replies.percentage}%`;
    },
    retweets_percentage: function() {
      return `width: ${this.retweets.percentage}%`;
    },
    likes_percentage: function() {
      return `width: ${this.likes.percentage}%`;
    }
  }
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
</style>
