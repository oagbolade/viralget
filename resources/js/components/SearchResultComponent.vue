<template>
      <div class="row">


            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <h6 class="sidebar-title">Filter Result</h6>
                <form action="#" v-on:submit.prevent="filterResults" method="GET">

                    <div class="text-center">
                      <h5 class="divider" style="margin:  5px 0">By Twitter Handle</h5>
                    </div>
                    <div class="form-group">
                      <input type="text" v-model="form.handle" name="handle" id="" class="form-control" placeholder="@username">
                    </div>
                    <div class="text-center">
                      <h5 class="divider" style="margin:  5px 0">By Keyword</h5>
                    </div>
                    <div class="form-group">
                      <input type="text" v-model="form.keyword" name="keyword" id="" class="form-control" placeholder="Enter keyword">
                    </div>
                    <div class="text-center">
                      <h5 class="divider" style="margin: 5px 0">Category</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control" v-model="form.category" name="category">
                          <option value="">Select Category</option>
                          <option value="">All</option>
                          <option  v-for="(category, index) in categories" :key="index" :value="category.slug">{{ category.name }}</option>
                        </select>
                    </div>
                    <div class="text-center">
                      <h5 class="divider" style="margin: 5px 0">Sort By Engagement Rate</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control" v-model="form.er" name="er">
                          <option value="">Select Option</option>
                          <option value="high">Highest to Lowest</option>
                          <option value="low">Lowest to Highest</option>
                        </select>
                    </div>
                    <!-- <div class="text-center">
                      <h5 class="divider" style="margin: 5px 0">Location</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control" v-model="form.location" name="location">
                          <option value="">Location</option>
                          <option value="">Anywhere</option>
                          <option v-for="(state, index) in states" :key="index" :value="state.name">{{ state.name }}</option>
                        </select>
                    </div> -->
                    <button class="btn btn-warning btn-block">Filter Result</button>
                </form>

                <hr>


              </div>
            </div>

            <div class="col-md-8 col-xl-9">
              <div class="container">

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

                  <div class="row" v-show="!loading">
                    <div class="col-md-12">
                      <div v-if="profiles.length > 0">
                        <div class="row">
                          <search-profile v-for="(user, index) in profiles" :key="index" :profileData="user"></search-profile>
                        </div>
                        <pagination
                              :pagination="pagination"
                              @paginate="fetchProfiles()"
                              :offset="5">
                        </pagination>
                      </div>
                      <div v-else>
                        <h4>Oops, No result found.</h4>
                      </div>
                    </div>

                  </div>
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
    props: ['q', 'category'],
    components: {Loading},
    data() {
        return {
            loading: true,
            paginate: ['q'],
            pagination: {
              current_page: 1,
            },
            profiles: [],
            categories: [],
            states: [],
            form: {
              category: '',
              location: '',
              keyword: '',
              handle: '',
              er: '',
            }

        }
    },
    mounted: function() {
        console.log([this.q, this.category])
    },
    created: function() {
       this.fetchProfiles(this.q, this.category);
       this.getStates();
       this.getCategories();
    },
    updated: function() {
//      console.log(this.profiles);
    },
    methods: {
        fetchProfiles(handle='', category = this.category, keyword='', location='', er = '') {
            console.log(category);

          this.profiles = [];
          this.loading = true;
            axios.get(`/api/v1/list?q=${handle}&category=${category}&keyword=${keyword}&location=${location}&er=${er}&page=${this.pagination.current_page}`, {
                headers: {
                  Authorization: 'Bearer ' + $('meta[name="api-token"]').attr("content"),
                }
            })
              .then(res => {
                  if(res.data.status === 'success') {
                    this.profiles = res.data.data.data;
                    this.pagination = res.data.data;
                    this.loading = false;
//                    console.log(this.profiles.length);
                  } else {
//                    alert('Error retrieving hashtag data. Please try again');
                    this.loading = false;
                  }
                  $("html, body").scrollTop(0);
                })
                .catch(err => {
                    console.log(['error', err])
//                    alert('Error retrieving hashtag data.');
                    this.loading = false;
                })
        },
        filterResults(e) {
        //   console.log(e);
           this.fetchProfiles(this.form.handle, this.form.category, this.form.keyword, this.form.location, this.form.er);
        },
        getStates() {
              axios.get(`/api/v1/misc/states`, {
                  headers: {
                    Authorization: 'Bearer ' + $('meta[name="api-token"]').attr("content"),
                  }
              })
              .then(res => {
                  this.states = res.data
                })
                .catch(err => {
                    console.log(['error', err])
                })
        },
        getCategories() {
              axios.get(`/api/v1/misc/categories`, {
                  headers: {
                    Authorization: 'Bearer ' + $('meta[name="api-token"]').attr("content"),
                  }
              })
              .then(res => {
                  this.categories = res.data
                })
                .catch(err => {
                    console.log(['error', err])
                })
        },
        number(value) {
          return numeral(value).format('0,0');
        }
    },
    computed: {
    //   replies_percentage: function() {
    //     return `width: ${this.replies.percentage}%`;
    //   },
    //   retweets_percentage: function() {
    //     return `width: ${this.retweets.percentage}%`;
    //   },
    },
}
</script>

<style>
.pagination {
  justify-content: center;
}
</style>
