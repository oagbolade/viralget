<template>
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a
        href="#"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
        ><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a
      >
    </div>

    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                >
                  Total Unique Visits
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ allTimeVisits }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-eye fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="text-xs font-weight-bold text-success text-uppercase mb-1"
                >
                  Current Month's Visit
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ monthlyVisits }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="text-xs font-weight-bold text-success text-uppercase mb-1"
                >
                  Total Users
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ totalUsers }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                >
                  Online
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  18
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <h1 class="h3 mb-2 text-gray-800">Traffic Data</h1>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Sort by Hour</label>
          <select class="form-control form-control-sm">
            <option value="">Hour(s)</option>
            <option value="1">Last one hour</option>
            <option value="2">12 hrs</option>
            <option value="3">24 hrs</option>
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Sort by Month</label>
          <select class="form-control form-control-sm">
            <option value="">Month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Sort by Year</label>
          <select class="form-control form-control-sm">
            <option value="">Year</option>
            <option value="">2019</option>
            <option value="">2020</option>
            <option value="">2021</option>
            <option value="">2022</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
          >
            <h6 class="m-0 font-weight-bold text-primary">
              Traffic Overview
            </h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <line-chart
                v-if="loaded"
                :options="options"
                :chartData="chartData"
                :styles="styles"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
          >
            <h6 class="m-0 font-weight-bold text-primary">
              Location Data
            </h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="">
              <doughnut-chart
                v-if="loaded"
                :DoughnutChartData="DoughnutChartData"
                :styles="doughnutStyles"
              />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-8 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Conversion Rate
            </h6>
          </div>
          <div class="card-body">
            <h4 class="small font-weight-bold">
              Users
              <span class="float-right">60%</span>
            </h4>
            <div class="progress mb-4">
              <div
                class="progress-bar"
                role="progressbar"
                style="width: 60%;"
                aria-valuenow="60"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
          </div>
        </div>
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
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import store from "../../store";
import LineChart from "./Charts/LineChart";
import DoughnutChart from "./Charts/DoughnutChart";

export default {
  components: {
    LineChart,
    DoughnutChart,
  },
  data() {
    return {
      token: null,
      allTimeVisits: 0,
      monthlyVisits: 0,
      totalUsers: 0,
      DoughnutChartData: null,
      chartData: null,
      loaded: true,
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
              gridLines: {
                display: true,
              },
            },
          ],
          xAxes: [
            {
              gridLines: {
                display: false,
              },
            },
          ],
        },
        legend: {
          display: true,
        },
        responsive: true,
        maintainAspectRatio: false,
      },

      styles: {
        width: "620px",
        height: "330px",
      },
      doughnutStyles: {
        width: "320px",
        height: "300px",
      },
      filter: null,
      currentPage: 0,
      perPage: 15,
      pageOptions: [5, 10, 15, 50, 100],
      totalRows: 0,
      fields: [
        "index",
        {
          key: "ip_address",
          sortable: false,
        },
        {
          key: "country",
          sortable: true,
        },
        {
          key: "city",
          sortable: true,
        },
        {
          key: "page_visited",
          sortable: true,
        },
        {
          key: "visited_on",
          sortable: true,
        },
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

    this.getAllTrafficData();
    this.loadChartData();
  },
  created() {
    this.token = localStorage.getItem("token");
  },
  methods: {
    async getAllTrafficData() {
      const URL = `/api/adminv1/traffic/all`;

      try {
        let response = await axios.get(URL, {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        });

        if (response.status === 200) {
          const data = response.data;
          this.totalRows = data.all_time_visits.length;
          this.allTimeVisits = data.all_time_visits.length;
          this.monthlyVisits = data.monthly_visits;
          this.totalUsers = data.user_count;

          data.all_time_visits.forEach((traffic_data) => {
              console.log(traffic_data)
            this.items.push({
              id: traffic_data.id,
              ip_address: traffic_data.ip_address,
              country: traffic_data.country,
              city: traffic_data.city,
              page_visited: traffic_data.last_page_visited,
              visited_on: traffic_data.updated_at,
            });
          });
        }
      } catch (err) {
        console.log(err);
      }
    },
    async loadChartData() {
      this.chartData = {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        datasets: [
          {
            label: "Visits",
            backgroundColor: "#456AD8",
            borderColor: "#456AD8",
            borderWidth: 1,
            // fill: false,
            data: [
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
              this.getRandomInt(),
            ],
          },
        ],
      };
      return;
      const URL = `/api/adminv1/chart`;

      try {
        let response = await axios.get(URL, {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        });

        console.log(response);
      } catch (err) {}
    },
    getRandomInt() {
      return Math.floor(Math.random() * (50 - 5 + 1)) + 5;
    },
  },
};
</script>

<style scoped>
.inner h3 {
  color: white;
}

.small-box .icon {
  padding: 15px;
}
</style>
