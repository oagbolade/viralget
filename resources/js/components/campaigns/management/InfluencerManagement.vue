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
      <div class="col-md-6">
        <button
          @click="goToSubscription"
          type="button"
          class="btn btn-round btn-primary"
        >
          <label><i class="fa fa-thumbs-up"></i></label> MANAGE MORE INFLUENCERS
        </button>
      </div>

      <div class="col-md-6 align-self-center">
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
    </div>

    <div class="row" v-show="!loading && !displayError">
      <div class="row">
        <div class="col-md-6">
          <h3 id="block-2">Influencer Management</h3>
          <h6 id="block-2">
            Monitor hastag campaigns, generate reports and listen to what people
            online are saying about your brand
          </h6>
        </div>

        <section
          class="table-section bg-white col-md-12"
          style="box-shadow: 0 0 15px rgba(0,0,0,0.05);"
        >
          <table class="table table-hover responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Hashtag/Keyword</th>
                <th>Influencers</th>
                <th>Campaign Objective</th>
                <th>Plan</th>
                <th>Paid</th>
                <th>Expired</th>
                <th>Created</th>
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
                  <strong>{{ makeCamelCase(campaign.user_query) }}</strong>
                </td>
                <td>
                  <div>
                    <b-button v-b-modal.modal-1 variant="outline-success"
                      >ViewList</b-button
                    >
                  </div>
                  <b-modal id="modal-1" title="Influencer List">
                    <div class="row">
                      <div
                        v-for="(influencers, index) in JSON.parse(
                          campaign.influencers
                        )"
                        :key="index"
                      >
                        <p class="col-12">
                          @{{ influencers }}<br />
                          <button
                            @click="
                              viewStats(
                                influencers,
                                campaign.user_query,
                                campaign.influencer_management_plan.id
                              )
                            "
                            class="btn btn-success btn-sm"
                          >
                            view stats
                          </button>
                        </p>
                      </div>
                    </div>
                  </b-modal>
                </td>
                <td>
                  {{ campaign.campaign_objective }}
                </td>
                <td>
                  {{ campaign.influencer_management_plan.name }}
                </td>
                <td>
                  <button
                    class="btn"
                    :class="[
                      campaign.paid === 'false' ? 'btn-danger' : 'btn-success'
                    ]"
                  >
                    {{ campaign.paid === "false" ? "No" : "Yes" }}
                  </button>
                  <div v-if="campaign.paid === 'false'">
                    <u
                      @click="
                        goToCheckout(
                          campaign.booking_type,
                          campaign.plan_id,
                          campaign.email,
                          campaign.id
                        )
                      "
                      ><a href="#">complete payment</a></u
                    >
                  </div>
                </td>
                <td>
                  {{ campaign.expired === "false" ? "No" : "Yes" }}
                </td>
                <td>{{ campaign.created_at }}</td>
                <td>
                  <button
                    @click="
                      viewCampaign(
                        campaign.influencers,
                        campaign.user_query,
                        campaign.influencer_management_plan.id,
                        campaign.expired,
                        campaign.paid
                      )
                    "
                    type="button"
                    class="btn btn-label btn-success"
                  >
                    <label><i class="fa fa-book"></i></label>
                    CampaignSummary
                  </button>
                  <button
                    @click="deleteCampaign(campaign.id)"
                    type="button"
                    class="btn btn-label btn-danger"
                  >
                    <label><i class="fa fa-trash"></i></label>
                    Delete
                  </button>
                </td>
              </tr>
            </paginate>

            <tbody v-else>
              <td colspan="4">
                <h5>You have not created any reports</h5>
              </td>
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
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import VuePaginate from "vue-paginate";
import Swal from "sweetalert2";

import moment from "moment";

export default {
  props: ["id"],
  components: { Loading },
  data() {
    return {
      collapsed: false,
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
      displayError: false,
      windowWidth: ""
    };
  },
  mounted: function() {
    window.addEventListener("resize", () => {
      if (window.innerWidth < 1600) {
        this.collapsed = true;
      }
      
      if(window.innerWidth > 1600){
        this.collapsed = false;
      }
    });
  },
  created: function() {
    this.getUserCampaigns();
  },
  methods: {
    goToCheckout(booking_type, plan_id, email, user_plan_id) {
      const URL = `/checkout/${booking_type}/${plan_id}?email=${email}&user_plan_id=${user_plan_id}`;
      window.location = URL;
    },
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
      window.location.href = "/pricing/management";
    },
    async getUserCampaigns() {
      const URL = `/api/v1/campaign/management/view`;

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
    viewStats(username, keyword, plan_id) {
      const URL = `/management/profile?q=${username}&keyword=${keyword}&plan_id=${plan_id}`;

      window.location = URL;
    },

    viewCampaign(influencers = [], keyword, plan_id, expired, paid) {
      if (expired === "true") {
        Swal.fire(
          "Oops!",
          "It seems your trend plan has expired. Kindly checkout our pricing page" +
            " and select a plan that best suits your needs",
          "question"
        );
        return;
      }

      if (paid === "false") {
        Swal.fire(
          "Oops!",
          "It seems you haven't completed your payment," +
            " please click on the COMPLETE PAYMENT button to complete your payment",
          "question"
        );
        return;
      }

      this.getCampaignSummary(influencers, keyword, plan_id);
    },

    getCampaignSummary(influencers = [], keyword, plan_id) {
      this.loading = true;
      let $this = this;
      fetch(
        `/api/v1/management/profile/summary?influencers=${influencers}&keyword=${keyword}&plan_id=${plan_id}`,
        {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        }
      )
        .then(res => res.json())
        .then(res => {
          if (res.data) {
            let data = res.data;
            this.displayError = false;
            window.location = "/management/report/profile/summary/" + res.id;
          } else {
            this.displayError = true;
            this.loading = false;
          }
        })
        .catch(err => {
          this.displayError = true;
          this.loading = false;
        });
    },

    editCampaign(campaignId) {
      const URL = `/api/v1/campaign/delete`;
    },

    async confirmedDelete(campaignId) {
      this.loading = true;
      const URL = `/api/v1/management/campaign/delete/${campaignId}`;

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

    isEven(n) {
      return n % 2 == 0;
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
