<template>
  <div class="container-fluid">
    <div>
      <b-row>
        <b-col lg="6" class="my-1">
          <b-form-group
            label="Filter"
            label-cols-sm="3"
            label-align-sm="right"
            label-size="sm"
            label-for="filterInput"
            class="mb-0"
          >
            <b-input-group size="sm">
              <b-form-input
                v-model="filter"
                type="search"
                id="filterInput"
                placeholder="Type to Search"
              ></b-form-input>
              <b-input-group-append>
                <b-button :disabled="!filter" @click="filter = ''"
                  >Clear</b-button
                >
              </b-input-group-append>
            </b-input-group>
          </b-form-group>
        </b-col>

        <b-col sm="5" md="6" class="my-1">
          <b-form-group
            label="Per page"
            label-cols-sm="6"
            label-cols-md="4"
            label-cols-lg="3"
            label-align-sm="right"
            label-size="sm"
            label-for="perPageSelect"
            class="mb-0"
          >
            <b-form-select
              v-model="perPage"
              id="perPageSelect"
              size="sm"
              :options="pageOptions"
            ></b-form-select>
          </b-form-group>
        </b-col>
      </b-row>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-lg-12">
          <b-table
            striped
            hover
            responsive="sm"
            :items="items"
            :fields="fields"
            :current-page="currentPage"
            :per-page="perPage"
            :filter="filter"
          >
            <template v-slot:cell(index)="data">
              {{ data.index + 1 }}
            </template>

            <template v-slot:cell(email)="data">
              {{ data.item.email }}
            </template>

            <template v-slot:cell(current_plan)="data">
              <button
                type="button"
                :class="{
                  'btn-primary': data.item.current_plan === 'basic',
                  'btn-warning': data.item.current_plan === 'premiumLite',
                  'btn-info': data.item.current_plan === 'premiumBusiness',
                  'btn-success': data.item.current_plan === 'enterprise',
                  'btn-danger': data.item.current_plan === 'starter',
                }"
                class="btn btn-sm plan-button"
              >
                {{ data.item.current_plan }}
              </button>
            </template>

            <template v-slot:cell(actions)="data">
              <button
                data-toggle="modal"
                data-target="#logoutModal"
                @click="
                  moreDetails(
                    data.item.plan_limit,
                    data.item.profiling_balance,
                    data.item.reporting_balance
                  )
                "
                type="button"
                class="btn btn-primary btn-sm"
              >
                <span class="fa fa-eye" aria-hidden="true"></span>
                More
              </button>

              <button
                @click="deleteUser(data.item.id)"
                type="button"
                class="btn btn-danger btn-sm"
              >
                <span class="fa fa-trash" aria-hidden="true"></span>
                Delete
              </button>
            </template>
          </b-table>

          <b-col sm="7" md="6" class="my-1 mx-auto">
            <b-pagination
              v-model="currentPage"
              :total-rows="totalRows"
              :per-page="perPage"
              align="fill"
              size="sm"
              class="my-0"
            ></b-pagination>
          </b-col>
        </div>
      </div>
    </div>

    <!-- Color System -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card bg-primary text-white shadow">
          <div class="card-body">
            Basic
            <div class="text-white small">{{ basicUsers }}</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card bg-success text-white shadow">
          <div class="card-body">
            Enterprise
            <div class="text-white small">{{ enterpriseUsers }}</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card bg-info text-white shadow">
          <div class="card-body">
            Premium Business
            <div class="text-white small">{{ premiumBusinessUsers }}</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card bg-warning text-white shadow">
          <div class="card-body">
            Premium Lite
            <div class="text-white small">{{ premiumLiteUsers }}</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card bg-danger text-white shadow">
          <div class="card-body">
            Starter
            <div class="text-white small">{{ starterUsers }}</div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Subscription Balance
            </h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xl-6 col-md-6 col-lg-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                        >
                          Profiling Balance
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          {{ currentUserProfilingBalance }}/{{
                            currentUserPlanLimit
                          }}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-eye fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-6 col-md-6 col-lg-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                        >
                          Reporting Balance
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          {{ currentUserReportingBalance }}/{{
                            currentUserPlanLimit
                          }}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-eye fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal">
              Ok
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import store from "../../store";

export default {
  data() {
    return {
      currentUserPlanLimit: "",
      currentUserProfilingBalance: "",
      currentUserReportingBalance: "",
      token: "",
      premiumLiteUsers: 0,
      premiumBusinessUsers: 0,
      enterpriseUsers: 0,
      basicUsers: 0,
      starterUsers: 0,
      filter: null,
      currentPage: 0,
      perPage: 15,
      pageOptions: [5, 10, 15, 50, 100],
      totalRows: 0,
      fields: [
        "index",
        {
          key: "name",
          sortable: true,
        },
        {
          key: "company_name",
          sortable: false,
        },
        {
          key: "email",
          sortable: true,
        },
        {
          key: "phone",
          sortable: true,
        },
        {
          key: "current_plan",
          sortable: true,
        },
        {
          key: "created_at",
          sortable: true,
        },
        "actions",
      ],
      items: [],
    };
  },
  computed: mapGetters(["getUser", "isAuthenticated"]),
  mounted() {},
  created() {
    if (localStorage.getItem("token") === null) {
      const RedirectURL = `/admin/login`;
      window.location = RedirectURL;
    }

    this.token = localStorage.getItem("token");
    this.getUsers();
  },
  methods: {
    async getUsers() {
      const URL = `/api/adminv1/user/subscription`;

      try {
        let response = await axios.get(URL, {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        });

        if (response.status === 200) {
          const starters = response.data.starter_users;
          this.totalRows = response.data.data.length + starters.length;

          response.data.data.forEach((data) => {
            if (data.plan.name === "starter" || data.users === null) {
              this.starterUsers++;
            }

            if (data.plan.name === "basic") {
              this.basicUsers++;
            }

            if (data.plan.name === "premiumLite") {
              this.premiumLiteUsers++;
            }

            if (data.plan.name === "premiumBusiness") {
              this.premiumBusinessUsers++;
            }

            if (data.plan.name === "enterprise") {
              this.enterpriseUsers++;
            }

            if (data.users !== null) {
              this.items.push({
                id: data.users.id,
                name: data.users.name,
                company_name: data.users.company_name,
                email: data.users.email,
                phone: data.users.phone,
                plan_limit: data.plan.profiling_limit,
                profiling_balance: data.profiling_balance,
                reporting_balance: data.reporting_balance,
                current_plan: data.plan.name,
                created_at: data.users.created_at,
              });
            }
          });

          starters.forEach((data) => {
            this.items.push({
              id: data.initial_users.id,
              name: data.initial_users.name,
              company_name: data.initial_users.company_name,
              email: data.initial_users.email,
              phone: data.initial_users.phone,
              plan_limit: data.plan.profiling_limit,
              profiling_balance: data.profiling_balance,
              reporting_balance: data.reporting_balance,
              current_plan: data.plan.name,
              created_at: data.initial_users.created_at,
            });
          });
        }
      } catch (err) {
        this.displayError = true;
        this.loading = false;
        console.log(err);
      }
    },
    deleteUser(id) {
      alert("Deleted Successfully!");
    },
    moreDetails(planLimit, profilingBalance, reportingBalance) {
      this.currentUserPlanLimit = planLimit;
      this.currentUserProfilingBalance = profilingBalance;
      this.currentUserReportingBalance = reportingBalance;
    },
    numberFormatter(num) {
      let num_parts = num.toString().split(".");
      num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return num_parts.join(".");
    },
  },
};
</script>

<style scoped>
.plan-button {
  color: white;
  font-weight: bold;
}
</style>
