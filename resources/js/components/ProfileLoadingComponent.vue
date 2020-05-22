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

              <button class="btn btn-sm btn-warning btn-round" @click="getProfile"> <span class="icon-refresh"></span> Try again</button>
          </div>
        </div>

    </div>
</template>

<script>

import axios from 'axios';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    props: ['q'],
    components: {Loading},
    data() {
        return {
            loading: true,
            avatar: '',
            tweets: [],
            retweets: [],
            followers: 0,
            following: 0,
            averageRetweets: 0,
            averageLikes: 0,
            totalTweets: 0,
            er: 0,
            name: '',
            about: '',
            isVerified: false,
            engagementRate: 0,
            category: [],
            media_meta: [],
            displayError: false
            
        }
    },
    mounted: function() {
//        console.log(this.q)
    },
    created: function() {
      this.getProfile();
    },
    methods: {
        getProfile: function() {
          this.loading = true;
         let  $this = this;
            fetch(`/api/v1/profile?q=${this.q}`, {
                headers: {
                  Authorization: 'Bearer ' + $('meta[name="api-token"]').attr("content"),
                }
            })
            .then(res => res.json())
            .then(res => {
              if(res.data) {
                let data = res.data;
                this.displayError= false;
                window.location = '/report/profile/' + res.id;
 
              } else {
                this.displayError = true;
                this.loading = false;
                // alert('Error retrieving profile data. Please try again');
//                this.getProfile();
              }
            })
            .catch(err => {
                this.displayError = true;
                this.loading = false;
            })

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
        numberFormat: function (number) {
            var format = 0; 

          if(number > 999999999) {
            format = parseInt(number / 1000000000) + 'B+';
          } else if(number > 999999) {
              format = parseInt(number / 1000000) + 'M+';
          } else if (number > 999) {
              format = parseInt(number / 1000) + 'K+';
          } else {
              format = parseInt(number);
          }

//            console.log([number > 999, format]);
            return format;        
        }        
    },
    computed: {
      _avatar: function() {
        return this.avatar.replace('_normal', '');
      }
    }
}
</script>

