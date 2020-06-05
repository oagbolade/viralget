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

        <button class="btn btn-sm btn-warning btn-round" @click="getProfile">
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <!-- <div class="row" v-show="!loading && !displayError"> -->
    <div class="row">
      <div class="col-md-6">
        <h3 id="block-2">Campaigns</h3>
        <h6 id="block-2">You can create and monitor keywords and #hashtags</h6>
      </div>

      <div @click="goToCreateCampaign" class="col-md-6">
        <button type="button" class="pull-right btn btn-round btn-warning">
          <label><i class="fa fa-plus"></i></label> New Campaign
        </button>
      </div>

      <section
        class="table-section bg-white col-md-12"
        style="box-shadow: 0 0 15px rgba(0,0,0,0.05);"
      >
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Campaign Name</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>
                <button type="button" class="btn btn-label btn-success">
                  <label><i class="fa fa-book"></i></label> View
                </button>
                <button type="button" class="btn btn-label btn-primary">
                  <label><i class="fa fa-pencil"></i></label> Edit
                </button>
                <button type="button" class="btn btn-label btn-danger">
                  <label><i class="fa fa-trash"></i></label> Delete
                </button>
              </td>
            </tr>

            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>
                <button type="button" class="btn btn-label btn-success">
                  <label><i class="fa fa-book"></i></label> View
                </button>
                <button type="button" class="btn btn-label btn-primary">
                  <label><i class="fa fa-pencil"></i></label> Edit
                </button>
                <button type="button" class="btn btn-label btn-danger">
                  <label><i class="fa fa-trash"></i></label> Delete
                </button>
              </td>
            </tr>

            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>
                <button type="button" class="btn btn-label btn-success">
                  <label><i class="fa fa-book"></i></label> View
                </button>
                <button type="button" class="btn btn-label btn-primary">
                  <label><i class="fa fa-pencil"></i></label> Edit
                </button>
                <button type="button" class="btn btn-label btn-danger">
                  <label><i class="fa fa-trash"></i></label> Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

import moment from "moment";

export default {
  props: ["id"],
  components: { Loading },
  data() {
    return {
      loading: true,
      avatar: "",
      tweets: [],
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
      displayError: false
    };
  },
  mounted: function() {},
  created: function() {
    this.getProfile();
  },
  methods: {
    goToCreateCampaign() {
      window.location.href = "http://localhost:8000/create-campaign";
    },
    getProfile: function() {
      this.loading = true;
      let $this = this;
      fetch(`/api/v1/report/profile/${this.id}`, {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      })
        .then(res => res.json())
        .then(res => {
          if (res.data) {
            let data = JSON.parse(res.data.data);

            this.followers = data.profile.followers_count;
            this.following = data.profile.friends_count;
            this.totalTweets = data.profile.statuses_count;
            this.about = data.profile.description;
            this.isVerified = data.profile.verified;
            this.name = data.profile.name;
            this.avatar = data.profile.profile_image_url;
            this.loading = false;
            this.handle = data.profile.screen_name;
            this.tweets = data.tweets;
            this.retweets = data.retweets;
            this.media_meta = data.media_meta_data;
            this.engagementRate = data.engagement_rate;
            this.averageRetweets = data.avr_retweets;
            this.averageLikes = data.avr_likes;
            this.location = data.profile_location;
            this.tweets = data.tweets;
            this.date_from = data.date_from;
            this.date_to = data.date_to;
            this.report_type = res.data.report_type;
            this.report_type_days = res.data.report_type_days;

            this.displayError = false;

            //              console.log('data');
          } else {
            this.displayError = true;
            this.loading = false;

            //                alert('Error retrieving profile data. Please try again');
            //                this.getProfile();
          }
        })
        .catch(err => {
          this.displayError = true;
          this.loading = false;
        });

      // axios.get(`/api/v1/profile?q=${this.q}`)
      //     .then((res) => {
      //         let data = res.data.data;
      //         this.followers = data.profile.followers_count;
      //         this.following = data.profile.friends_count;
      //         this.totalTweets = data.profile.statuses_count;
      //         this.about = data.profile.description;
      //         this.isVerified = data.profile.verified;
      //         this.name = data.profile.name;
      //         this.avatar = data.profile.profile_image_url;
      //         this.loading = false;
      //         this.tweets = data.tweets;
      //         this.media_meta = data.media_meta_data;
      //         this.engagement_rate = data.engagement_rate;
      //         this.averageRetweets = data.avr_retweets;
      //         this.averageLikes = data.avr_likes;
      //         this.category = {
      //             color: data.category.color,
      //             name: data.category.name
      //         }
      //     })
      //     .catch((err) => {
      //         console.log(err)
      //         this.loading = false;
      //     })
    },
    numberFormat: function(number) {
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

      //            console.log([number > 999, format]);
      return format;
    },
    getHumanDate: function(date) {
      return moment(date).format("LLLL");
    }
  },
  computed: {
    _avatar: function() {
      return this.avatar.replace("_normal", "");
    }
  }
};
</script>

<style scoped>
.table-section {
  padding: 20px;
}

.btn {
  margin: 10px;
}

th,
td {
  text-align: center;
}

th {
  font-weight: bold;
}
</style>

