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
                      <button class="btn btn-warning btn-sm">Searched Profiles</button>
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
                      <button class="btn btn-danger btn-sm">Searched Hashtags</button>
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
          Check influencers engagement level, profile their influence and discover their audience interest
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
              <th>Actions</th>
            </tr>
          </thead>
          <tbody v-if="campaigns.length !== 0">
            <tr v-for="(campaign, index) in campaigns" :key="index">
              <th scope="row">{{ index + 1 }}</th>
              <td>
                <strong>{{ campaign.handle }}</strong>
                <div>
                  <small
                    v-if="formatCampaignDates(campaign.dates).from !== null"
                  >
                    From: {{ formatCampaignDates(campaign.dates).from }}<br />
                    To: {{ formatCampaignDates(campaign.dates).to }}
                  </small>
                </div>
              </td>
              <td>{{ dateFormatter(campaign.created_at) }}</td>
              <td>
                <button
                  @click="
                    viewCampaign(
                      campaign.handle,
                      formatCampaignDates(campaign.dates).from,
                      formatCampaignDates(campaign.dates).to
                    )
                  "
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
          </tbody>
          <tbody v-else>
            <td colspan="4"><h5>You have not created any reports</h5></td>
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
import Swal from "sweetalert2";

import moment from "moment";

export default {
  components: { Loading },
  data() {
    return {
      loading: true,
      displayError: false,
      campaigns: [],
      user: {},
      profiling: [],
      reporting: [],
      subscription: {}
    };
  },
  mounted: function() {
    this.getSubscriptionUsage();
    this.getUserCampaigns();
  },
  created: function() {},
  methods: {
    goToCreateCampaign() {
      window.location.href = "/create-campaign?handle=true";
    },
    getTimeDifference(created_at) {
      return moment(created_at).fromNow();
    },
    async getUserCampaigns() {
      this.loading = true;
      const URL = `/api/v1/campaign/view`;

      try {
        let response = await axios.get(URL, {
          params: {
            handle: true
          },
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        });

        if (response.data.status === 200) {
          this.campaigns = response.data.data;
          console.log(this.campaigns);
          this.loading = false;
        }

        if (response.data.status === 204) {
          this.loading = false;
        }
      } catch (err) {
        this.displayError = true;
        this.loading = false;
        console.log(err);
      }
    },
    async getSubscriptionUsage() {
      this.loading = true;

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
          window.location.href = "/pricing";
          this.loading = false;
        }
      } catch (err) {
        this.displayError = true;
        this.loading = false;
        console.log(err);
      }
    },
    async deleteCampaign(campaignId) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: toast => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
      });

      Toast.fire({
        icon: "success",
        title: "Signed in successfully"
      });
      return;

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
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });

      return;

      let options = {
        okText: "Yes",
        cancelText: "No",
        delete: false
      };

      this.$dialog
        .confirm("Are you sure you want to delete?", options)
        .then(function(dialog) {
          console.log("here");
          options.delete = true;
          this.loading = true;
        })
        .catch(function(err) {
          console.log("Canceled", err);
          // return;
        });
      console.log(options.delete);

      if (options.delete === false) {
        return;
      }
      console.log("options", options.delete);
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
    viewCampaign(query, fromDate, toDate) {
      const URL = `/search/profiles?q=${query}`;
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

