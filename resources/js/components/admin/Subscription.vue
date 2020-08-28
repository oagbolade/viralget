<template>
  <div>
    <section class="content-header">
      <h1>
        Subscriptions
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#"><i class="fa fa-dashboard"></i> Subscriptions</a>
        </li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Subscribed Users</h3>

              <div class="box-tools pull-right">
                <button
                  type="button"
                  class="btn btn-box-tool"
                  data-widget="collapse"
                >
                  <i class="fa fa-minus"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-box-tool"
                  data-widget="remove"
                >
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>

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

                    <template v-slot:cell(current_plan)="data">
                      <button
                        type="button"
                        :class="{
                          'btn-primary': data.item.current_plan === 'basic',
                          'btn-warning':
                            data.item.current_plan === 'premiumLite',
                          'btn-info':
                            data.item.current_plan === 'premiumBusiness',
                          'btn-success':
                            data.item.current_plan === 'enterprise',
                          'btn-danger': data.item.current_plan === 'starter',
                        }"
                        class="btn btn-sm plan-button"
                      >
                        {{ data.item.current_plan }}
                      </button>
                    </template>

                    <template v-slot:cell(actions)="data">
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
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                  <div class="description-block border-right">
                    <h5 class="description-header">{{ totalRows }}</h5>
                    <span class="description-text">TOTAL USERS</span>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-primary"
                      ><i class="fa fa-circle"></i
                    ></span>
                    <h5 class="description-header">{{ numberFormatter(basicUsers) }}</h5>
                    <span class="description-text">BASIC PLAN</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-warning"
                      ><i class="fa fa-circle"></i
                    ></span>
                    <h5 class="description-header">
                      {{ numberFormatter(premiumLiteUsers) }}
                    </h5>
                    <span class="description-text">PREMIUM LITE</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-info"
                      ><i class="fa fa-circle"></i
                    ></span>
                    <h5 class="description-header">{{ numberFormatter(premiumBusinessUsers) }}</h5>
                    <span class="description-text">PREMIUM BUSINESS</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-success"
                      ><i class="fa fa-circle"></i
                    ></span>
                    <h5 class="description-header">{{ numberFormatter(enterpriseUsers) }}</h5>
                    <span class="description-text">ENTERPRISE</span>
                  </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12">
                  <div class="description-block border-right">
                    <span class="description-percentage text-danger"
                      ><i class="fa fa-circle"></i
                    ></span>
                    <h5 class="description-header">{{ numberFormatter(starterUsers) }}</h5>
                    <span class="description-text">Starter Plan</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import store from "../../store";
// import "../../../../public/css/bootstrap.css";
// import "bootstrap/dist/css/bootstrap.css";

export default {
  data() {
    return {
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
  mounted() {
    if (!store.getters.isAuthenticated) {
      const RedirectURL = `/admin/login`;
      window.location = RedirectURL;
    }
  },
  created() {
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
          this.totalRows = response.data.data.length;

          response.data.data.forEach((data) => {
            if (data.plan.name === "starter") {
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

            this.items.push({
              id: data.users.id,
              name: data.users.name,
              company_name: data.users.company_name,
              phone: data.users.phone,
              current_plan: data.plan.name,
              created_at: data.users.created_at,
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
