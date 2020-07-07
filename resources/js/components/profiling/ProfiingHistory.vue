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

    <!-- <div class="row gap-y" v-show="displayError && !loading"> -->
    <div class="row gap-y">
      <main class="main-content">
        <section class="section">
          <div class="container">
            <div class="row gap-y">
              <div class="col-md-6 mx-auto">
                <div
                  class="card card-body shadow-3 hover-shadow-6 text-default"
                  href="#"
                >
                  <div class="media align-items-center">
                    <div class="mr-5">
                      <span class="iconbox iconbox-xxl bg-pale-primary">
                        <i class="icon-profile-male text-primary"></i>
                      </span>
                    </div>
                    <div class="media-body">
                      <h5>Profiling Usage</h5>
                      <h3 class="mb-4">
                        {{
                          subscription.plan.profiling_limit -
                            subscription.profiling_balance
                        }}
                        / {{ subscription.plan.profiling_limit }}
                      </h3>
                      <button class="btn btn-warning btn-sm">
                        Searched Profiles
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mx-auto">
                <div
                  class="card card-body shadow-3 hover-shadow-6 text-default"
                  href="#"
                >
                  <div class="media align-items-center">
                    <div class="mr-5">
                      <span class="iconbox iconbox-xxl bg-pale-info">
                        <i class="icon-genius text-info"></i>
                      </span>
                    </div>
                    <div class="media-body">
                      <h5>Reporting Usage</h5>
                      <h3 class="mb-4">
                        {{
                          subscription.plan.reporting_limit -
                            subscription.reporting_balance
                        }}
                        / {{ subscription.plan.reporting_limit }}
                      </h3>
                      <button class="btn btn-danger btn-sm">
                        Searched Hashtags
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>

    <div class="profiling row">
      <div class="col-md-6">
        <h3 id="block-2">Profiling</h3>
        <h6 id="block-2">
          Check influencers engagement level, profile their influence and
          discover their audience interest
        </h6>
      </div>
      <div @click="goToCreateCampaign" class="col-md-6">
        <button type="button" class="pull-right btn btn-round btn-warning">
          <label><i class="fa fa-plus"></i></label> New Profiling
        </button>
      </div>
      <section
        class="table-section bg-white col-md-12"
        style="box-shadow: 0 0 15px rgba(0,0,0,0.05);"
      >
        <table class="table table-hover responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Created</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <paginate
            v-if="campaigns.length !== 0"
            name="campaigns"
            :list="campaigns"
            :per="10"
            tag="tbody"
          >
            <tr
              v-for="(campaign, index) in paginated('campaigns')"
              :key="index"
            >
              <th scope="row">{{ index + 1 }}</th>
              <td>
                <strong>{{ campaign.handle }}</strong>
              </td>
              <td>{{ dateFormatter(campaign.created_at) }}</td>
              <td>{{ (campaign.description !== null) ? campaign.description : 'N/A' }}</td>
              <td>
                <button
                  @click="viewCampaign(campaign.handle)"
                  type="button"
                  class="btn btn-label btn-success"
                >
                  <label><i class="fa fa-book"></i></label> View
                </button>
                <button
                  @click="deleteCampaign(campaign.id)"
                  type="button"
                  class="btn btn-label btn-danger"
                >
                  <label><i class="fa fa-trash"></i></label> Delete
                </button>
              </td>
            </tr>
          </paginate>

          <tbody v-else>
            <td colspan="4">
              <h5>You have not created any profiling reports</h5>
            </td>
          </tbody>
        </table>
        <paginate-links
          for="campaigns"
          :classes="{
            ul: 'pagination',
            'ul.paginate-links > li.number': 'page-item',
            'ul.paginate-links > li.number > a': 'page-link'
          }"
        ></paginate-links>
      </section>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import VuePaginate from "vue-paginate";
import "vue-loading-overlay/dist/vue-loading.css";
import Swal from "sweetalert2";

import moment from "moment";

export default {
  components: { Loading },
  props: ["profilingCampaigns", "usage"],
  watch: {
    profilingCampaigns: function(campaignValue) {
      this.campaigns = campaignValue;
    },
    usage: function(usageValue) {
      this.subscription = usageValue;
      this.loading = false;
    }
  },
  data() {
    return {
      loading: true,
      displayError: false,
      paginate: ["campaigns"],
      campaigns: [],
      user: {},
      profiling: [],
      reporting: [],
      subscription: {}
    };
  },
  mounted: function() {},
  created: function() {},
  methods: {
    goToCreateCampaign() {
      window.location.href = "/create-campaign?handle=true";
    },
    getTimeDifference(created_at) {
      return moment(created_at).fromNow();
    },
    async confirmedDelete(campaignId) {
      this.loading = true;
      const URL = `/api/v1/campaign/delete/${campaignId}`;

      try {
        let response = await axios.delete(URL, {
          params: {
            handle: true
          },
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        });
        const campaignId = response.data.data;
        this.campaigns = this.campaigns.filter(campaignData => {
          this.loading = false;
          this.displayError = false;
          return campaignData.id != campaignId;
        });
      } catch (err) {
        this.displayError = true;
        this.loading = false;
        console.log(err);
      }
    },
    async deleteCampaign(campaignId) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          this.confirmedDelete(campaignId);
          Swal.fire(
            "Deleted!",
            "Your profiling report has been deleted.",
            "success"
          );
        }
      });
    },
    formatCampaignDates(dates) {
      const jsonData = JSON.parse(dates);
      return {
        from: jsonData.from,
        to: jsonData.to
      };
    },
    dateFormatter(date) {
      let formatedDate = date.split(" ");
      return formatedDate[0];
    },
    viewCampaign(query) {
      const URL = `/search/profile/${query}`;
      window.location.href = URL;
    }
  },
  computed: {}
};
</script>

<style scoped>
.table-section {
  padding: 20px;
}

th,
td {
  text-align: center;
}

th {
  font-weight: bold;
}

.profiling {
  margin-bottom: 60px;
}
</style>
