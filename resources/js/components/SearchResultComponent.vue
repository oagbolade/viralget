<template>
  <div class="row">
    <div class="col-md-4 col-xl-3">
      <div class="sidebar px-4 py-md-0">
        <h6 class="sidebar-title">Filter Result</h6>
        <form action="#" v-on:submit.prevent="filterResults" method="GET">
          <div class="text-center">
            <h5 class="divider" style="margin: 5px 0">Category</h5>
          </div>
          <div class="form-group">
            <select
              class="form-control"
              v-model="form.category"
              name="category"
            >
              <option value="">Select Category</option>
              <option value="">All</option>
              <option
                v-for="(category, index) in categories"
                :key="index"
                :value="category.id"
                >{{ category.name }}</option
              >
            </select>
          </div>

          <div class="text-center">
            <h5 class="divider" style="margin: 5px 0">Followers</h5>
          </div>
          <div class="form-group">
            <select
              class="form-control"
              v-model="form.followers"
              name="followers"
            >
              <option value="">Select Option</option>
              <option value="low">5000 - 10000</option>
              <option value="middle">10000 - 20000</option>
              <option value="influencer">Greater than 20000</option>
            </select>
          </div>

          <div class="text-center">
            <h5 class="divider" style="margin: 5px 0">Engagement Rate</h5>
          </div>
          <div class="form-group">
            <select
              class="form-control"
              v-model="form.engagement_rate"
              name="engagement_rate"
            >
              <option value="">Select Option</option>
              <option value="low">Low</option>
              <option value="good">Good</option>
              <option value="high">High</option>
              <option value="very high">Very High</option>
            </select>
          </div>

          <div class="text-center">
            <h5 class="divider" style="margin: 5px 0">Location</h5>
          </div>
          <div class="form-group">
            <select
              class="form-control"
              v-model="form.location"
              name="location"
            >
              <option value="">Select a Location</option>
              <option value="Africa">Africa</option>
              <option value="Nigeria">Nigeria</option>
              <option value="Lagos">Lagos</option>
              <option value="Abuja">Abuja</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Ogun">Ogun</option>
              <option value="Ibadan">Ibadan</option>
            </select>
          </div>

          <!-- <div class="text-center">
                      <h5 class="divider" style="margin: 5px 0">Gender</h5>
                    </div>
                    <div class="form-group">
                      <div class="custom-controls-stacked">
                        <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" name="radio1">
                          <label class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" name="radio1" checked>
                          <label class="custom-control-label">Female</label>
                        </div>
                      </div>
                    </div> -->

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

        <hr />
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
                <search-profile
                  v-for="(user, index) in profiles"
                  :key="index"
                  :profileData="user"
                ></search-profile>
              </div>
              <pagination
                :pagination="pagination"
                @paginate="(!isSearchbar) ? getTopInfluencers() : ''"
                :offset="(!isSearchbar) ? 5 : ''"
              >
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
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import VuePaginate from "vue-paginate";

const numeral = require("numeral");

export default {
  props: ["q", "category"],
  components: { Loading },
  data() {
    return {
      loading: true,
      isSearchbar: false,
      paginate: ["q"],
      pagination: {
        current_page: 1
      },
      profiles: [],
      categories: [],
      states: [],
      form: {
        handle: "",
        keyword: "",
        category: "",
        followers: "",
        location: "",
        engagement_rate: ""
      }
    };
  },
  mounted: function() {},
  created: function() {
    this.checkSearchBar();
    this.getStates();
    this.getCategories();
  },
  methods: {
    checkSearchBar() {
      const url_string = window.location.href;
      const url = new URL(url_string);
      const searchbar = url.searchParams.get("isSearchbar");

      if (searchbar !== null) {
        this.isSearchbar = true;
        this.getSearchbarResults(this.q);
      } else {
        this.getTopInfluencers();
      }
    },
    getSearchbarResults(handle) {
      handle = handle.replace('@', '');
      this.profiles = [
        {
          handle,
          category: { color: "success" }
        }
      ];
      this.loading = false;
    },
    getTopInfluencers() {
      const URL = `/api/v1/influencers/${this.category}?page=${this.pagination.current_page}`;
      axios
        .get(URL, {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        })
        .then(res => {
          console.log(res.data.data.data);
          this.profiles = res.data.data.data;
          this.pagination = res.data.data;
          this.loading = false;
        })
        .catch(err => {
          console.log(["error", err]);
          this.loading = false;
        });
    },
    fetchProfiles(
      handle = "",
      keyword = "",
      category = this.category,
      followers = "",
      location = "",
      engagement_rate = ""
    ) {
      this.profiles = [];
      this.loading = true;
      axios
        .get(
          `/api/v1/list/filter?q=${handle}&category=${category}&keyword=${keyword}&location=${location}&er=${engagement_rate}&followers=${followers}&page=${this.pagination.current_page}`,
          {
            headers: {
              Authorization:
                "Bearer " + $('meta[name="api-token"]').attr("content")
            }
          }
        )
        .then(res => {
          console.log(res.data.data.data);
          if (res.data.status === "success") {
            this.profiles = res.data.data.data;
            this.pagination = res.data.data.data;
            this.loading = false;
          } else {
            this.loading = false;
          }
          $("html, body").scrollTop(0);
        })
        .catch(err => {
          console.log(["error", err]);
          this.loading = false;
        });
    },
    filterResults(e) {
      if (
        this.form.handle.trim() === "" &&
        this.form.keyword.trim() === "" &&
        this.form.category.toString().trim() === "" &&
        this.form.location.trim() === "" &&
        this.form.followers.trim() === "" &&
        this.form.engagement_rate.trim() === ""
      ) {
        return;
      }

      this.fetchProfiles(
        this.form.handle,
        this.form.keyword,
        this.form.category,
        this.form.followers,
        this.form.location,
        this.form.engagement_rate
      );
    },
    getStates() {
      axios
        .get(`/api/v1/misc/states`, {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        })
        .then(res => {
          this.states = res.data;
        })
        .catch(err => {
          console.log(["error", err]);
        });
    },
    getCategories() {
      axios
        .get(`/api/v1/misc/categories`, {
          headers: {
            Authorization:
              "Bearer " + $('meta[name="api-token"]').attr("content")
          }
        })
        .then(res => {
          this.categories = res.data;
        })
        .catch(err => {
          console.log(["error", err]);
        });
    },
    number(value) {
      return numeral(value).format("0,0");
    }
  },
  computed: {}
};
</script>

<style>
.pagination {
  justify-content: center;
}
</style>
