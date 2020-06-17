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
        <h3>Unfortunately, we're unable to query your data at the moment.</h3>
        <h5>Please try again in few minutes</h5>

        <button class="btn btn-sm btn-warning btn-round" @onClick="getData">
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <div class="row" v-show="!loading && !displayError">
      <h6 id="block-2" class="block-number">
        {{ report_type_days }} Days report for:
        <strong>{{ decodeURIComponent(handle) }}</strong>
        <span v-show="report_type_days !== '30'">
          <a href="/pricing"> | Upgrade Plan</a></span
        >
      </h6>

      <div class="col-md-12">
        <div>
          <div class="dropdown open-on-hover pull-right">
            <span class="dropdown-toggle" data-toggle="dropdown"
              >Try out another Plan</span
            >
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Select a plan</h6>
              <a
                class="dropdown-item"
                :href="`/hashtag/${encodeURIComponent(handle)}?plan=free`"
                >Free</a
              >
              <a
                class="dropdown-item"
                :href="`/hashtag/${encodeURIComponent(handle)}?plan=premium`"
                >Premium</a
              >
              <a
                class="dropdown-item"
                :href="`/hashtag/${encodeURIComponent(handle)}?plan=enterprise`"
                >Enterprise</a
              >
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/pricing">View all pricing</a>
            </div>
          </div>
        </div>

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
        <button class="btn btn-sm btn-primary" @click="goTo">Filter</button>

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
                <p class="small text-uppercase ls-2">Impressions</p>
                <p
                  class="lead-8 lh-1 fw-700 counted"
                  data-provide="countup"
                  data-from="0"
                  :data-to="number(accurate_impressions)"
                >
                  {{ number(accurate_impressions) }}
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
                  :data-to="number(potential_reach)"
                >
                  {{ number(potential_reach) }}
                </p>
              </div>

              <div class="col-md-4">
                <h4 class="lead-6">
                  <i class="icon-wallet text-lighter mr-3"></i>
                </h4>
                <p class="small text-uppercase ls-2">Campaign Value (NGN)</p>
                <p class="lead-8 lh-1 fw-700 counted" data-prefix="%">
                  {{ number(parseInt(accurate_campaign_value)) }}
                </p>
                <!-- <p class="lead-8 lh-1 fw-700 counted" data-provide="countup" data-from="0" data-to="100" data-prefix="%">{{number(parseInt((potential_impact * 80)/1000) * engagement_rate)}}</p> -->
              </div>
            </div>
          </div>
        </section>

        <section class="download-section">
          <div class="row">
            <div class="col-md-4">
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
            </div>

            <div class="offset-md-2 col-md-6">
              <div class="pull-right">
                <button class="btn btn-warning" @click="downloadReport">
                  Download Report
                </button>
              </div>
            </div>
          </div>
        </section>

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
                          <p><i class="icon-newspaper lead-4 mb-0"></i></p>
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
                            Media Tweets <br />(Pictures/Videos)
                          </p>
                          <p><i class="icon-video lead-4 mb-0"></i></p>
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
                          <p><i class="icon-edit lead-4 mb-0"></i></p>
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
                    <p><i class="icon-chat lead-4 mb-0"></i></p>
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
                    <p><i class="icon-quote lead-4 mb-0"></i></p>
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
                    <p><i class="icon-quote lead-4 mb-0"></i></p>
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
                      {{ `${accurate_engagement_rate.toFixed(3)}%` }}
                    </h4>
                  </div>

                  <div class="col-8 text-right mr-1">
                    <p class="small text-uppercase ls-2 mb-2">
                      Engagement<br />Rate
                    </p>
                    <p><i class="icon-piechart lead-4 mb-0"></i></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- <section class="section bg-white mt-2" style="box-shadow: 0 0 15px rgba(0,0,0,0.05);">
                <div class="container">

                  <div class="row gap-y">

                    </div>
                <div class="container">
                  <hr/>
                  <div class="row gap-y">
                    <div class="col-md-2 text-center">
                      <span class="iconbox iconbox-xxl">
                        <i class="icon-globe"></i>
                      </span>
                      <p>
                          <span class="text-primary"><strong>{{ number(potential_impact) }}</strong></span><br/>
                          <small><strong>Impressions</strong></small>
                      </p>
                    </div>
                    <div class="col text-center">
                      <span class="iconbox iconbox-xxl">
                        <i class="icon-refresh "></i>
                      </span>
                      <p>
                          <span class="text-primary"><strong>{{ number(potential_reach) }}</strong></span><br/>
                          <small><strong>Reach</strong></small>
                      </p>
                    </div>
                    <div class="col text-center">
                      <span class="iconbox iconbox-xxl">
                        <i class="fa fa-users"></i>
                      </span>
                      <p>
                          <span class="text-primary"><strong>{{ number(contributors) }}</strong></span><br/>
                          <small><strong>Contributors</strong></small>
                      </p>
                    </div>
                    <div class="col text-center">
                      <span class="iconbox iconbox-xxl">
                        <i class="icon-quote "></i>
                      </span>
                      <p>
                          <span class="text-primary"><strong>{{ avr_contribution }}</strong></span><br/>
                          <small><strong>Avg Tweet/Contributor</strong></small>
                      </p>
                    </div>

                    <div class="col text-center">
                      <span class="iconbox iconbox-xxl">
                        <i class="icon-piechart"></i>
                      </span>
                      <p>
                          <span class="text-primary"><strong>{{ `${engagement_rate}%` }}</strong></span><br/>
                          <small><strong>Engagement Rate</strong></small>
                      </p>
                    </div>
                  </div>

                  </div>

                </div>
              </section> -->

        <section class="section mt-0 pt-0">
          <div class="row">
            <div class="col-md-4">
              <h3>Top Contributors</h3>
              <table class="table bg-white shadow table-hover table-striped">
                <paginate
                  name="most_active"
                  :list="most_active"
                  :per="5"
                  tag="tbody"
                >
                  <tr
                    v-for="(active, index) in paginated('most_active')"
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
                      ><br /><small>Tweets</small>
                    </td>
                  </tr>
                </paginate>
              </table>
              <paginate-links
                for="most_active"
                :classes="{
                  ul: 'pagination',
                  'ul.paginate-links > li.number': 'page-item',
                  'ul.paginate-links > li.number > a': 'page-link'
                }"
              ></paginate-links>
            </div>
            <div class="col-md-4">
              <h3>Retweeters</h3>
              <table class="table bg-white shadow table-hover table-striped">
                <paginate
                  name="high_retweets"
                  :list="high_retweets"
                  :per="5"
                  tag="tbody"
                >
                  <tr
                    v-for="(active, index) in paginated('high_retweets')"
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
                      ><br /><small>Retweets</small>
                    </td>
                  </tr>
                </paginate>
              </table>
              <paginate-links
                for="high_retweets"
                :classes="{
                  ul: 'pagination',
                  'ul.paginate-links > li.number': 'page-item',
                  'ul.paginate-links > li.number > a': 'page-link'
                }"
              ></paginate-links>
            </div>
            <div class="col-md-4">
              <h3>Highest Impacts</h3>
              <table class="table shadow bg-white table-hover table-striped">
                <paginate
                  name="high_impacts"
                  :list="high_impacts"
                  :per="5"
                  tag="tbody"
                >
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
                for="high_impacts"
                :classes="{
                  ul: 'pagination',
                  'ul.paginate-links > li.number': 'page-item',
                  'ul.paginate-links > li.number > a': 'page-link'
                }"
              ></paginate-links>
            </div>
            <div class="col-md-6">
              <h3>Highest Retweeted Tweets</h3>
              <div class="card">
                <div class="card-body">
                  <p v-if="high_retweet_tweets.length == 0">No data yet</p>
                  <div
                    v-else
                    v-for="(retweet, index) in high_retweet_tweets.slice(0, 5)"
                    :key="index"
                  >
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
                      <small
                        ><strong
                          >Posted on
                          {{ getHumanDate(retweet.created_at) }}</strong
                        ></small
                      >
                    </p>
                    <p>
                      <i class="fa fa-retweet text-primary"></i>
                      {{ retweet.retweet_count }} &nbsp;&nbsp;
                      <i class="fa fa-heart text-danger"></i>
                      {{ retweet.favorite_count }}
                    </p>
                    <hr class="my-7" />
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-4">
                       <table class="table table-hover table-striped">
                          <thead class="bg-primary">
                            <tr>
                              <th class="text-white">Most Popular</th>
                              <th class="text-white"><small>Followers</small></th>
                            </tr>
                          </thead>
                          <paginate
                            name="popular"
                            :list="popular"
                            :per="5"
                            tag="tbody"
                          >
                            <tr v-for="(active, index) in paginated('popular')" :key="index">
                              <td width="70%">
                                <div class="media">
                                  <div class="lead-6 line-height-1 text-danger w-50px">
                                    <img class="avatar avatar-sm" :src="active.user.profile_image_url" alt="">
                                  </div>
                                  <div class="media-body">
                                    <strong>@{{ active.user.screen_name }}</strong><br/><small>{{ active.user.name }}</small>
                                  </div>
                                </div>
                              </td>
                              <td class="text-center"><strong>{{ number(active.count) }}</strong></td>
                            </tr>
                          </paginate>
                        </table>
                        <paginate-links
                              for="popular"
                              :classes="{
                                'ul': 'pagination',
                                'ul.paginate-links > li.number' : 'page-item',
                                'ul.paginate-links > li.number > a' : 'page-link',
                              }"
                        ></paginate-links>
                    </div> -->
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
import LineChart from "../charts/LineChart.js";
import PieChart from "../charts/PieChart.js";

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
      paginate: ["most_active", "high_retweets", "high_impacts", "popular"],
      displayError: false,
      selected_date_from: "",
      selected_date_to: "",
      datacollection: null,
      accurate_engagement_rate: 0,
      accurate_campaign_value: 0,
      accurate_reach: 0,
      accurate_impressions: 0,
      total_engagements: 0,
      selectedDays: ""
    };
  },
  mounted: function() {
    console.log(moment(Date.now()).format("YYYYMMDDhmm"));
  },
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

      const URL = `/api/v1/report/download`;

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

        // potential_impact: this.potential_impact,
        // potential_reach: this.potential_reach,
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
      fetch(`/api/v1/report/hashtag/${this.id}`, {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      })
        .then(res => res.json())
        .then(res => {
          if (res.status == "success") {
            // console.log(res, res.status);

            let data = JSON.parse(res.data.data);

            this.accurate_campaign_value = data.campaign_value;
            this.accurate_engagement_rate = data.accurate_engagement_rate;
            this.accurate_impressions = data.impressions;
            this.total_engagements = data.total_engagements;

            this.totalTweets = data.count;
            this.loading = false;
            this.media_meta = data.media_meta_data;
            this.contributors = data.contributors;
            this.avr_contribution = data.avr_contribution;
            this.potential_reach = data.potential_reach;
            this.potential_impact = data.potential_impact;
            this.most_active = data.most_active.data;
            this.popular = data.popular;
            this.high_retweets = data.high_retweets.data;
            this.high_retweet_tweets = data.high_retweet_tweets
              ? data.high_retweet_tweets
              : [];
            this.high_impacts = data.high_impacts;
            this.replies = data.replies;
            this.retweets = data.retweets;
            this.contributors = data.contributors;
            this.engagement_rate = data.engagement_rate;
            this.text_count = data.media_meta_data.text.count;
            this.media_count = data.media_meta_data.media.count;
            this.likes = data.high_likes;
            this.text_percentage = `width: ${data.media_meta_data.text.percentage}%`;
            this.media_percentage = `width: ${data.media_meta_data.media.percentage}%`;
            this.report_type = res.data.report_type;
            this.report_type_days = res.data.report_type_days;
            this.handle = res.data.handle;
            this.displayError = false;
            this.date_from = data.date_from;
            this.date_to = data.date_to;

            this.fillData();
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
      console.log([this.totalTweets, this.retweets.count, this.replies.count]);
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

<style>
.pagination {
  justify-content: center;
}
.pieStyle {
  height: 40px;
}

.download-section {
  margin: 10px 0;
}
</style>
