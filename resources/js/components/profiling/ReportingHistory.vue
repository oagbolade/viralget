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

    <div class="row gap-y">
    <!-- <div class="row gap-y" v-show="displayError && !loading"> -->
      <main class="main-content">
      <section class="section">
        <div class="container">
          <div class="row gap-y">
            <div class="col-md-6 mx-auto">
              <div class="card card-body shadow-3 hover-shadow-6 text-default" href="#">
                <div class="media align-items-center">
                  <div class="mr-5">
                    <span class="iconbox iconbox-xxl bg-pale-primary">
                      <i class="icon-profile-male text-primary"></i>
                    </span>
                  </div>
                  <div class="media-body">
                    <h5>Profiling Usage</h5>
                    <h3 class="mb-4">{{ subscription.plan.profiling_limit - subscription.profiling_balance }} / {{ subscription.plan.profiling_limit }}</h3>
                    <a class="btn btn-warning btn-sm" :href="'/search/profiles'">Search Profiles</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mx-auto">
              <div class="card card-body shadow-3 hover-shadow-6 text-default" href="#">
                <div class="media align-items-center">
                  <div class="mr-5">
                    <span class="iconbox iconbox-xxl bg-pale-info">
                      <i class="icon-genius text-info"></i>
                    </span>
                  </div>
                  <div class="media-body">
                    <h5>Reporting Usage</h5>
                    <h3 class="mb-4">{{ subscription.plan.reporting_limit - subscription.reporting_balance}} / {{ subscription.plan.reporting_limit }}</h3>
                    <a class="btn btn-danger btn-sm" :href="'/search'">Search Hashtags</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <h5>Profiling History <small>[<a :href="'/history/profiles'">See all]</a></small></h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User handle</th>
                    <th>Package</th>
                    <th>Report Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="profiling.length === 0">
                    <th colspan="4">No data recorded yet</th>
                  </tr>
                  <tr v-else v-for="(profile, index) in profiling" :key="index">
                    <th scope="row">{{ index + 1 }}</th>
                    <td><a target="_blank" :href="`/report/profile/${profile.id}`">{{ `@${profile.handle}` }}</a></td>
                    <td><strong>{{ (profile.plan.name) ? profile.plan.name : '-' }}</strong></td>
                    <!-- <td>{{ $profile->created_at->diffInHours() > 24 ? $profile->created_at->toDayDateTimeString() : $profile->created_at->diffForHumans() }}</td> -->
                    <td><a target="_blank" :href="`/report/profile/${profile.id}`" class="btn btn-sm btn-warning">View Report</a></td>
                  </tr>
                </tbody>
              </table>                    
            </div>

            <div class="col-md-12">
              <h5>Reports History <small><a href="`/history/reports`">See all]</a></small></h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Keyword</th>
                    <th>Package</th>
                    <th>Report Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="reporting.length === 0">
                    <th colspan="4">No data recorded yet</th>
                  </tr>
                  <tr v-else v-for="(report, index) in reporting" :key="index">
                    <th scope="row">{{ index + 1 }}</th>
                    <td><a target="_blank" :href="`/report/hashtag/${report.id}`">{{ report.query }}</a> </td>
                    <td><strong>{{ (report.plan.name) ? report.plan.name : '-' }}</strong></td>
                    <!-- <td>{{ $report->created_at->diffInHours() > 24 ? $report->created_at->toDayDateTimeString() : $report->created_at->diffForHumans() }}</td> -->
                    <td><a target="_blank" :href="`/report/hashtag/${report.id}`" class="btn btn-sm btn-warning">View Report</a></td>
                  </tr>
                </tbody>
              </table>                    
            </div>
          </div>        
        </div>

      </section>
    </main>
    </div>
      
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

import moment from "moment";

export default {
  components: { Loading },
  data() {
    return {
      loading: true,
      displayError: false,
      user: {},
      profiling: [],
      reporting: [],
      subscription: {},
    };
  },
  mounted: function() {
    this.getReportingHistory();
  },
  created: function() {
  },
  methods: {
    async getReportingHistory() {
      const URL = `/api/v1/history`;

      try {
        let response = await axios.get(URL, {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        });

        if (response.data.status === 200) {
          let data = response.data.data;
          this.user = data.user;
          this.subscription = data.subscription[0];
          this.reporting = data.reporting;
          this.profiling = data.profiling;
          this.loading = false;
        }

        if (response.data.status === 204) {
          this.loading = false;
        }
        
        if (response.data.status === 403) {
          window.location.href = '/pricing';
          this.loading = false;
        }

      } catch (err) {
        this.displayError = true;
        this.loading = false;
        console.log(err);
      }
    },
  },
  computed: {

  }
};
</script>

<style scoped>

</style>

