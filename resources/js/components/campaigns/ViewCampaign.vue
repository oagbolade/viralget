<template>
  <div class="container">
    <!-- <sidebar-menu theme="white-theme" :menu="menu"/> -->
    <sidebar-menu
      :collapsed="collapsed"
      :menu="menu"
      theme="white-theme"
      :show-one-child="true"
    ></sidebar-menu>
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

    <div class="row">
      <div v-if="planName !== 'enterprise'" class="col-md-6">
        <button
          @click="goToSubscription"
          type="button"
          class="btn btn-round btn-primary"
        >
          <label><i class="fa fa-thumbs-up"></i></label> UPGRADE PLAN
        </button>
      </div>

      <div :class="planName !== 'enterprise' ? 'col-md-6' : 'col-md-12'" class="align-self-center">
        <h5 class="float-right">
          <button
            type="button"
            :class="planColor"
            class="plan-dynamic btn btn-round"
          >
            {{ planSchema[planName] }}
          </button>
        </h5>
      </div>
      <ProfilingHistory
        :usage="subscription"
        :profilingCampaigns="profilingCampaigns"
      />
    </div>

    <!-- <div class="row" v-show="!loading && !displayError"> -->
    <div class="row">
      <div class="col-md-6">
        <h3 id="block-2">Reports</h3>
        <h6 id="block-2">
          Monitor hastag campaigns, generate reports and listen to what people
          online are saying about your brand
        </h6>
      </div>
      <div @click="goToCreateCampaign" class="col-md-6">
        <button type="button" class="pull-right btn btn-round btn-warning">
          <label><i class="fa fa-plus"></i></label> New Report
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
                <strong>{{ makeCamelCase(campaign.query) }}</strong>
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
                {{
                  campaign.description !== null ? campaign.description : "N/A"
                }}
              </td>
              <td>
                <button
                  @click="
                    viewCampaign(
                      campaign.query,
                      campaign.location_set,
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
          </paginate>

          <tbody v-else>
            <td colspan="4"><h5>You have not created any reports</h5></td>
          </tbody>
        </table>
        <paginate-links
          :show-step-links="true"
          :step-links="{
            next: 'NEXT',
            prev: 'PREV'
          }"
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
import "vue-loading-overlay/dist/vue-loading.css";
import VuePaginate from "vue-paginate";
import ProfilingHistory from "./../profiling/ProfiingHistory";
import Swal from "sweetalert2";

import moment from "moment";

export default {
  props: ["id"],
  components: { Loading, ProfilingHistory },
  data() {
    return {
      collapsed: true,
      menu: [
        {
          header: true,
          title: "Main Navigation",
          hiddenOnCollapse: true
        },
        {
          href: "/campaigns",
          title: "Profiling & Reports",
          icon: "fa fa-dashboard"
        },
        {
          href: "/campaigns/influencermanagement",
          title: "Influencer Management",
          icon: "fa fa-user"
        },
        {
          href: "/campaigns/trends",
          title: "Trends",
          icon: "fa fa-line-chart"
        }
      ],
      paginate: ["campaigns"],
      planSchema: {
        starter: "Starter",
        basic: "Basic",
        premiumLite: "Premium Lite",
        premiumBusiness: "Premium Business",
        enterprise: "Enterprise"
      },
      campaigns: [],
      planName: "",
      planColor: "",
      profilingCampaigns: [],
      subscription: {},
      loading: true,
      displayError: false
    };
  },
  mounted: function() {
    if (window.innerWidth < 1600) {
      this.collapsed = true;
    }

    if (window.innerWidth > 1600) {
      this.collapsed = false;
    }
  },
  created: function() {
    this.getUserCampaigns();
  },
  methods: {
    formatCampaignDates(dates) {
      const jsonData = JSON.parse(dates);
      return {
        from: jsonData.from,
        to: jsonData.to
      };
    },
    formatCampaignDatesForTwitter(date) {
      if (date.trim() === "") {
        return;
      }
      const removeHyphen = date.replace(/-/g, "");
      const formattedDate = removeHyphen.replace(":", "");
      return formattedDate;
    },
    goToCreateCampaign() {
      window.location.href = "/create-campaign";
    },
    goToSubscription() {
      window.location.href = "/pricing";
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
          this.planName = response.data.subscription[0].plan.name;
          this.planColor = response.data.subscription[0].plan.color;
          this.profilingCampaigns = response.data.profiling_data;
          this.subscription = response.data.subscription[0];
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

    viewCampaign(keyword, location, fromDate, toDate) {
      if (fromDate === null) {
        fromDate = "";
      }

      if (toDate === null) {
        toDate = "";
      }

      const formattedFromDate = this.formatCampaignDatesForTwitter(fromDate);
      const formattedToDate = this.formatCampaignDatesForTwitter(toDate);

      const URL = `/search/profiles?q=${encodeURIComponent(keyword)}&fromDate=${
        formattedFromDate !== undefined ? formattedFromDate : ""
      }&toDate=${formattedToDate !== undefined ? formattedToDate : ""}&location=${location}`;
      window.location.href = URL;
    },

    editCampaign(campaignId) {
      const URL = `/api/v1/campaign/delete`;
    },

    async confirmedDelete(campaignId) {
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
          Swal.fire("Deleted!", "Your report has been deleted.", "success");
        }
      });
    },

    makeCamelCase(str) {
      return str
        .replace(/\s(.)/g, function(a) {
          return a.toUpperCase();
        })
        .replace(/^(.)/, function(b) {
          return b.toUpperCase();
        });
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

.plan-dynamic {
  color: white;
}

/* //Sidebar CSS */
.vsm--item,
.v-sidebar-menu {
  padding-top: 50px;
}

.v-sidebar-menu{
  width: 250px;
}
</style>

