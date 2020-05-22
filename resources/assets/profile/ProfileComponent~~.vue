<template>
    <div>

        <loading 
            :active.sync="loading" 
            :is-full-page="true" 
            :opacity="0.5"
            :width="128"
            :height="128"
            loader="bars" 
            color="#007bff" 
            backgroundColor="#fff"
        />

        <div v-show="!loading">

            <header class="header text-center pb-0">
                <div class="container">
                    <h1 class="display-4">
                        <img class="avatar avatar-sm" :src=avatar alt="avatar">
                        {{ profileHandle }}</h1>
                        <p>({{ name }})</p>
                    <div class="col-md-6 mx-auto">
                        <div class="row gap-y text-center">
                            <div class="col-sm-4">
                                <p class="small-1 text-uppercase">Followers</p>
                                <p>{{ followers }}</p>
                            </div>
        
                            <div class="col-sm-4">
                                <p class="small-1 text-uppercase">Following</p>
                                <p>{{ following }}</p>
                            </div>
        
                            <div class="col-sm-4">
                                <p class="small-1 text-uppercase">ER</p>
                                <p>{{ engagementRate }}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </header>


            <section class="section bb-1">
                <div class="container">

                <div class="row">

                    <div class="col-md-4">
                    <h5>About {{ name }}</h5>

                    <p>{{ about }}</p>

                    <ul class="project-detail mt-7">
                        <li>
                        <strong>Total Tweets:</strong>
                        <span>{{ totalTweets }}</span>
                        </li>

                        <li>
                        <strong>Average Tweets</strong>
                        <span>{{ averageTweets }}</span>
                        </li>

                        <li>
                        <strong>Average Likes</strong>
                        <span>{{ averageLikes }}</span>
                        </li>

                    </ul>
                    </div>

                    <div class="col-md-8 mb-6 mb-md-0">
                    </div>
                    
                </div>

                </div>
            </section>

        </div>

    </div>
</template>

<script>

import axios from 'axios';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    components: {Loading},
    data() {
        return {
            loading: true,
            avatar: [],
            tweets: [],
            followers: 0,
            following: 0,
            averageTweets: 0,
            averageLikes: 0,
            totalTweets: 0,
            name: '',
            about: '',
            isVerified: false,
            profileHandle: profileHandle,
            engagementRate: 0,
        }
    },
    mounted: function() {
        console.log(this.profileHandle)
    },
    created: function() {
        this.getProfile();
        this.getTweets();
    },
    methods: {
        getProfile: function() {
            axios.get(`/api/v1/profile?q=${this.profileHandle}`)
                .then((res) => {
                    let data = res.data.data;
                    this.followers = data.followers_count;
                    this.following = data.friends_count;
                    this.totalTweets = data.statuses_count;
                    this.about = data.description;
                    this.isVerified = data.verified;
                    this.name = data.name;
                    this.avatar = data.profile_image_url;
                    this.loading = false;
                })
                .catch((err) => {
                    console.log(err)
                    this.loading = false;
                })
        },
        getTweets: function() {
            axios.get(`/api/v1/profile/tweets?q=${this.profileHandle}`)
                .then((res) => {
                    let data = res.data.data;
                    this.tweets = data;

                    console.log(data);

                    let totalLikes = data.reduce((acc, val) => {
                                        return acc + parseInt(val.favorite_count);
                                     }, 0);
                    this.averageLikes = totalLikes/data.length;

                })
                .catch((err) => {
                    console.log(err)
                })
        }
    }
}
</script>

