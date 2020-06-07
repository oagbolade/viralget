<template>
  <div class="container">
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
          <form class="input-round">
            <div class="form-group">
              <input
                class="form-control"
                type="text"
                v-model="form.keywords"
                placeholder="e.g viralget, viral get, #viralget"
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
      loading: true,
      displayError: false,
      form: {
        Keywords: "",
        description: ""
      }
    };
  },
  mounted: function() {},
  created: function() {},
  methods: {
    goToCreateCampaign() {
      window.location.href = "http://localhost:8000/create-campaign";
    },

    async createCampaign() {
      const config = {
        headers: {
          Authorization: "Bearer " + $('meta[name="api-token"]').attr("content")
        }
      };

      const data = {
        keywords: this.form.keywords,
        description: this.form.description
      };

      const URL = `/api/v1/campaign/create`;

      try {
        let response = await axios.post(URL, data, config);
      } catch (err) {
        console.log(err);
      }
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

