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

    <div class="row gap-y" v-show="displayError && !loading">
      <div class="col-md-10 mx-auto text-center">
        <span class="icon-sad lg-error-icon"></span>
        <h1>Oops!</h1>
        <h3>
          {{ errorMessage }}
        </h3>
        <h5>Please try again in few minutes</h5>

        <button
          class="btn btn-sm btn-warning btn-round"
          @click="createCampaign"
        >
          <span class="icon-refresh"></span> Try again
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h3 id="block-2">
          Enter {{ isHandle === true ? "User Handle" : "Keyword" }}
        </h3>
        <h6 v-if="isHandle" id="block-2">Enter a profile to monitor</h6>
        <h6 v-else id="block-2">
          Enter brand, competitor or #hashtag to monitor
        </h6>
      </div>

      <section
        class="table-section bg-white col-md-12"
        style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);"
      >
        <div>
          <form v-on:submit.prevent class="input-round">
            <div v-if="isHandle" class="form-group">
              <input
                class="form-control"
                type="text"
                v-on:blur="handleBlur(form.handle, true)"
                v-model="form.handle"
                placeholder="e.g @viralget"
              />
            </div>

            <div v-else class="form-group">
              <input
                class="form-control"
                type="text"
                v-model="form.keywords"
                v-on:blur="handleBlur(form.keywords)"
                placeholder="e.g viralget, viral get, #viralget"
              />
            </div>

            <div v-if="!isHandle" class="row text-center">
              <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <h6>Filter campaign data by date</h6>
                <a-range-picker
                  @change="onChange"
                  size="large"
                  format="YYYY-MM-DD"
                  :disabledDate="disabledDate"
                  :showTime="{ defaultValue: moment('00:00:00', 'HH:mm:ss') }"
                />
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <h6>Filter Location</h6>
                <div class="form-group">
                  <select
                    v-model="form.location"
                    class="form-control form-control-md"
                  >
                    <option value="">Select Location</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Kenya">Kenya</option>
                    <option value="South Africa">South Africa</option>
                  </select>
                </div>
                <p class="alert alert-warning" role="alert">
                  Note: This will only return tweets that are tagged with a location
                </p>
              </div>
            </div>

            <div class="form-group">
              <textarea
                class="form-control"
                rows="4"
                v-model="form.description"
                placeholder="Description"
              ></textarea>
            </div>
            <div>
              <button
                @click="createCampaign"
                type="button"
                class="btn btn-round btn-success"
              >
                {{ isHandle ? "Create User Profiling" : "Create Campaign" }}
              </button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import Swal from "sweetalert2";
import "vue-loading-overlay/dist/vue-loading.css";

import moment from "moment";

export default {
  props: ["id"],
  components: { Loading },
  data() {
    return {
      dateError: false,
      errorMessage:
        "Unfortunately, we're unable to create your campaign at the moment.",
      loading: false,
      displayError: false,
      isHandle: false,
      Toast: null,
      form: {
        keywords: "",
        handle: "",
        description: "",
        location: "",
        dates: {
          from: "",
          to: "",
        },
      },
    };
  },
  mounted: function () {
    this.Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });
  },
  created: function () {
    this.checkCampaignType();
  },
  methods: {
    createCampaign() {
      if (this.isHandle === true) {
        this.createProfilingCampaign();
      } else {
        this.createHashtagCampaign();
      }
    },

    checkCampaignType() {
      const url_string = window.location.href;
      const url = new URL(url_string);
      const handle = url.searchParams.get("handle");

      if (handle !== null) {
        this.isHandle = true;
      }
    },

    async createHashtagCampaign() {
      if (this.form.keywords.trim() === "") {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });

        Toast.fire({
          icon: "error",
          title: "Please enter a keyword or hashtag",
        });
        return;
      }

      if (this.dateError === true) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });

        Toast.fire({
          icon: "error",
          title: "You cannot pick the same start and end date",
        });
        return;
      }

      const stripHastag = this.form.keywords.replace("#", "");

      this.loading = true;
      const config = {
        headers: {
          Authorization:
            "Bearer " + $('meta[name="api-token"]').attr("content"),
        },
      };

      const data = {
        keywords: stripHastag,
        dates: {
          from: this.form.dates.from,
          to: this.form.dates.to,
        },
        description: this.form.description,
        location: this.form.location,
      };

      const URL = `/api/v1/campaign/create`;

      try {
        let response = await axios.post(URL, data, config);
        if (response.data.status === 200) {
          window.location.href = `/campaigns`;
        }
      } catch (err) {
        this.loading = false;
        this.displayError = true;
        console.log(err);
      }
    },

    async createProfilingCampaign() {
      if (this.form.handle.trim() === "") {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });

        Toast.fire({
          icon: "error",
          title: "Please enter a user handle",
        });
        return;
      }
      this.loading = true;
      const config = {
        headers: {
          Authorization:
            "Bearer " + $('meta[name="api-token"]').attr("content"),
        },
      };

      const removeSymbol = this.form.handle.replace("@", "");

      const data = {
        handle: removeSymbol,
        dates: {
          from: this.form.dates.from,
          to: this.form.dates.to,
        },
        description: this.form.description,
      };

      const URL = `/api/v1/campaign/create`;

      try {
        let response = await axios.post(URL, data, config);
        if (response.data.status === 200) {
          window.location.href = `/campaigns`;
        }
      } catch (err) {
        this.loading = false;
        this.displayError = true;
        console.log(err);
      }
    },
    moment,
    onChange(date, dateString) {
      let fromDate = date[0].format("YYYY-MM-DD-HH:MM");
      let toDate = date[1].format("YYYY-MM-DD-HH:MM");

      if (fromDate === toDate) {
        this.dateError = true;
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });

        Toast.fire({
          icon: "error",
          title: "You cannot pick the same start and end date",
        });
        return;
      }

      this.dateError = false;
      this.form.dates.from = `${date[0].format("YYYY-MM-DD-HH:MM")}`;
      this.form.dates.to = `${date[1]
        .subtract(1.5, "hours")
        .format("YYYY-MM-DD-HH:MM")}`;
    },
    handleBlur(search, handle = false) {
      console.log(search);
      if (handle === true) {
        const getSymbol = search.trim().split("")[0];

        if (getSymbol === "@") {
          this.Toast.fire({
            icon: "success",
            title: "Looks good!",
          });
        }
        return;
      }

      if (search.trim() !== "") {
        this.Toast.fire({
          icon: "success",
          title: "Looks good!",
        });
        return;
      }
    },
    disabledDate(current) {
      return current && current > moment().endOf("day");
    },
  },
  computed: {},
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

