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
        <h1>We are processing your request.</h1>
        <h3>Please wait as this could take a few minutes...</h3>
        <img src="/images/processing.gif" style="max-width: 400px;" alt="" />
      </div>
    </div>

    <div class="row gap-y" v-show="displayError && !loading && !planExpired">
      <div class="col-md-10 mx-auto text-center">
        <span class="icon-sad lg-error-icon"></span>
        <h1>Oops!</h1>
        <h3>
          Unfortunately, we're unable to process your request at the moment.
        </h3>
        <h5>Please try again in few minutes</h5>

        <button class="btn btn-sm btn-warning btn-round" @click="getProfile">
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <div class="row gap-y" v-show="displayError && !loading && planExpired">
      <div class="col-md-10 mx-auto text-center">
        <span class="icon-sad lg-error-icon"></span>
        <h1>Oops!</h1>
        <h3>
          Your plan has expired
        </h3>
        <h5>You can purchase one of our plans to profile more influencers</h5>

        <button class="btn btn-sm btn-warning btn-round" @click="goToPricing">
          <span class="icon-refresh"></span> Profile More Influencers
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
  props: ["q", "keyword", "plan_id", "reload", "user_details_id"],
  components: { Loading },
  data() {
    return {
      planExpired: false,
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
      displayError: false
    };
  },
  mounted: function() {
    //        console.log(this.q)
  },
  created: function() {
    this.getProfile();
  },
  methods: {
    goToPricing(){
      window.location = "/pricing/management";
    },
    getProfile: function() {
      this.loading = true;
      let $this = this;
      fetch(`/api/v1/management/profile?q=${this.q}&keyword=${this.keyword}&plan_id=${this.plan_id}&user_details_id=${this.user_details_id}&reload=${this.reload}`, {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      })
        .then(res => res.json())
        .then(res => {
          if(res.status === 410){
            this.planExpired = true;
            this.displayError = true;
            this.loading = false;
          }

          if (res.data) {
            let data = res.data;
            this.displayError = false;
            window.location = "/management/report/profile/" + res.id;
          } else {
            this.displayError = true;
            this.loading = false;
          }
        })
        .catch(err => {
          console.log(err)
          this.displayError = true;
          this.loading = false;
        });
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
    }
  },
  computed: {
    _avatar: function() {
      return this.avatar.replace("_normal", "");
    }
  }
};
</script>

