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
        <h3>
          Unfortunately, we're unable to access your campaigns at the moment.
        </h3>
        <h5>Please try again in few minutes</h5>

        <button
          class="btn btn-sm btn-warning btn-round"
          @click="getUserCampaigns"
        >
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <!-- <div class="row" v-show="!loading && !displayError"> -->
    <div class="row">
      <div class="col-md-6">
        <h3 id="block-2">Campaigns</h3>
        <h6 id="block-2">You can create and monitor keywords or #hashtags</h6>
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
          <tbody v-if="campaigns.length !== 0">
            <tr v-for="(campaign, index) in campaigns" :key="index">
              <th scope="row">{{ index + 1 }}</th>
              <td>{{ campaign.keywords }}</td>
              <td>{{ dateFormatter(campaign.created_at) }}</td>
              <td>
                <button
                  @click="viewCampaign(campaign.keywords)"
                  type="button"
                  class="btn btn-label btn-success"
                >
                  <label><i class="fa fa-book"></i></label> View
                </button>
                <button
                  @click="editCampaign(campaign.id)"
                  type="button"
                  class="btn btn-label btn-primary"
                >
                  <label><i class="fa fa-pencil"></i></label> Edit
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
            <td colspan="4"><h5>You have not created any campaigns</h5></td>
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
      campaigns: [],
      loading: true,
      displayError: false
    };
  },
  mounted: function() {},
  created: function() {
    this.getUserCampaigns();
  },
  methods: {
    goToCreateCampaign() {
      window.location.href = "http://localhost:8000/create-campaign";
    },
    async getUserCampaigns() {
      const URL = `/api/v1/campaign/view`;

      try {
        let response = await axios.get(URL, {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        });

        if (response.data.status === 200) {
          this.campaigns = response.data.data;
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

    viewCampaign(keyword) {
      const URL = `/search/profiles?q=${keyword}`;
      window.location.href = URL;
    },

    editCampaign(campaignId) {
      const URL = `/api/v1/campaign/delete`;
    },

    async deleteCampaign(campaignId) {
      this.loading = true;
      const URL = `/api/v1/campaign/delete/${campaignId}`;

      try {
        let response = await axios.delete(URL, {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        });
        const campaignId = response.data.data;
        this.campaigns = this.campaigns.filter(campaignData => {
          this.loading = false;
          return campaignData.id != campaignId;
        });
      } catch (err) {
        this.displayError = true;
        this.loading = false;
        console.log(err);
      }
    },

    dateFormatter(date) {
      let formatedDate = date.split(" ");
      return formatedDate[0];
    }
  },
  computed: {}
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

