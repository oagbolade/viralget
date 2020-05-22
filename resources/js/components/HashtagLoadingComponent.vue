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
              <img src="/images/processing.gif" style="max-width: 400px"  alt=""/>
          </div>
        </div>

        <div class="row gap-y" v-show="displayError && !loading">
          <div class="col-md-10 mx-auto text-center">
              <span class="icon-sad lg-error-icon"></span>
              <h1>Oops!</h1>
              <h3>Unfortunately, we're unable to process your request at the moment.</h3>
              <h5>Please try again in few minutes</h5>

              <button class="btn btn-sm btn-warning btn-round" @click="getData"> <span class="icon-refresh"></span> Try again</button>
          </div>
        </div>


    </div>
</template>

<script>

import axios from 'axios';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import VuePaginate from 'vue-paginate'


const numeral = require('numeral');

export default {
    props: ['q', 'plan', 'from', 'to'],
    components: {Loading},
    data() {
        return {
            loading: true,
            tweets: [],
            averageRetweets: 0,
            averageLikes: 0,
            totalTweets: 0,
            media_meta: [],
            count: 0,
            most_active: [],
            high_retweets: [],
            original_tweets: [],
            popular: [],
            contributors: 0,
            high_impacts: [],
            avr_contribution: 0,
            potential_reach: 0,
            potential_impact: 0,
            replies: 0,
            retweets: 0,
            text_percentage: 'width 0%',
            media_percentage: 'width 0%',
            text_count: 0,
            media_count: 0,
            report_type: '',
            paginate: ['most_active', 'high_retweets', 'high_impacts', 'popular'],
            displayError: true,
        }
    },
    mounted: function() {
//        console.log(this.q)
    },
    created: function() {
       this.getData();
    },
    methods: {
        getData: function() {
                      // axios.get(`/api/v1/hashtag?q=${this.q}`)
              this.loading = true;
            fetch(`/api/v1/hashtag?q=${this.q}&plan=${this.plan}&fromDate=${this.from}&toDate=${this.to}`, {
                headers: {
                  Authorization: 'Bearer ' + $('meta[name="api-token"]').attr("content"),
                }
            })
              .then(res => res.json())
              .then((res) => {
                  if(res.status === 'success') {
                    this.displayError= false;
                    window.location = `/report/hashtag/${res.id}`;

                  } else {
                    this.loading = false;
                    this.displayError = true;

 //                   alert('Error retrieving hashtag data. Please try again');
                  }
                })
                .catch((err) => {
 //                   console.log(err)
//                    alert('Error retrieving hashtag data.');
                    this.displayError = true;
                    this.loading = false;
                })
        },
        number(value) {
          return numeral(value).format('0,0');
        }
    },
    computed: {
      replies_percentage: function() {
        return `width: ${this.replies.percentage}%`;
      },
      retweets_percentage: function() {
        return `width: ${this.retweets.percentage}%`;
      },
    }
}
</script>

<style>
.pagination {
  justify-content: center;
}
</style>
