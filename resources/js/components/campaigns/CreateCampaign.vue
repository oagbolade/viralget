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
          Unfortunately, we're unable to create your campaign at the moment.
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
        <h3 id="block-2">Enter Keyword</h3>
        <h6 id="block-2">Enter brand, competitor or #hashtag to monitor</h6>
      </div>

      <section
        class="table-section bg-white col-md-12"
        style="box-shadow: 0 0 15px rgba(0,0,0,0.05);"
      >
        <div>
          <form v-on:submit.prevent class="input-round">
            <div class="form-group">
              <input
                class="form-control"
                type="text"
                v-model="form.keywords"
                placeholder="e.g viralget, viral get, #viralget"
              />
            </div>

            <div class="form-group text-center">
              <h6>Filter campaign data by date</h6>
              <a-range-picker
                @change="onChange"
                size="large"
                format="YYYY-MM-DD"
                :disabledDate="disabledDate"
                :showTime="{ defaultValue: moment('00:00:00', 'HH:mm:ss') }"
              />
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
                Create Campaign
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
import "vue-loading-overlay/dist/vue-loading.css";

import moment from "moment";

export default {
  props: ["id"],
  components: { Loading },
  data() {
    return {
      loading: false,
      displayError: false,
      form: {
        Keywords: "",
        description: "",
        dates: {
          from: '',
          to: ''
        },
      }
    };
  },
  mounted: function() {},
  created: function() {},
  methods: {
    async createCampaign() {
      this.loading = true;
      const config = {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      };

      const data = {
        keywords: this.form.keywords,
        dates: {
          from: this.form.dates.from,
          to: this.form.dates.to,
        },
        description: this.form.description
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
      this.form.dates.from = `${date[0].format("YYYY-MM-DD-HH:MM")}`;
      this.form.dates.to = `${date[1].format("YYYY-MM-DD-HH:MM")}`;
    },
    disabledDate(current) {
      return current && current > moment().endOf("day");
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

