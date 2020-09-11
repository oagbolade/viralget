/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VueToastr from "vue-toastr";
import VueSweetalert2 from "vue-sweetalert2";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import store from "./store";

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

// If you don't need the styles, do not connect
import "sweetalert2/dist/sweetalert2.min.css";
import VueSidebarMenu from "vue-sidebar-menu";
import "vue-sidebar-menu/dist/vue-sidebar-menu.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(VueSidebarMenu);
Vue.use(VueSweetalert2);
Vue.use(VueToastr);

store.dispatch("attempt", localStorage.getItem("token"));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
    "user-subscription",
    require("./components/admin/Subscription.vue").default
);

Vue.component(
    "admin-login",
    require("./components/admin/auth/Login.vue").default
);

Vue.component(
    "admin-dashboard",
    require("./components/admin/Dashboard.vue").default
);

Vue.component("hashtag", require("./components/HashtagComponent.vue").default);

Vue.component(
    "hashtag-loading",
    require("./components/HashtagLoadingComponent.vue").default
);
Vue.component("profile", require("./components/ProfileComponent.vue").default);
Vue.component(
    "profile-loading",
    require("./components/ProfileLoadingComponent.vue").default
);
Vue.component(
    "search-result",
    require("./components/SearchResultComponent.vue").default
);
Vue.component(
    "search-profile",
    require("./components/SearchProfileComponent.vue").default
);
Vue.component(
    "pagination",
    require("./components/PaginationComponent.vue").default
);

// For BBN Data
Vue.component(
    "bbn-data",
    require("./components/bbn/BBNData.vue").default
);

Vue.component(
    "bbn-profiling-data",
    require("./components/bbn/BBNProfilingData.vue").default
);

// For campaign pages
Vue.component(
    "trends-campaign",
    require("./components/campaigns/management/Trends.vue").default
);
Vue.component(
    "influencer-management-campaign",
    require("./components/campaigns/management/InfluencerManagement.vue")
        .default
);
Vue.component(
    "management-hashtag-loading",
    require("./components/campaigns/management/HashtagLoadingComponent.vue")
        .default
);
Vue.component(
    "management-profile-loading",
    require("./components/campaigns/management/ProfileLoadingComponent.vue")
        .default
);
Vue.component(
    "management-hashtag",
    require("./components/campaigns/management/HashtagComponent.vue").default
);
Vue.component(
    "management-profile",
    require("./components/campaigns/management/ProfileComponent.vue").default
);
Vue.component(
    "profiling-summary",
    require("./components/campaigns/management/ProfilingSummaryComponent.vue")
        .default
);
Vue.component(
    "view-campaign",
    require("./components/campaigns/ViewCampaign.vue").default
);
Vue.component(
    "create-campaign",
    require("./components/campaigns/CreateCampaign.vue").default
);

Vue.component(
    "profiling-history",
    require("./components/profiling//ProfiingHistory.vue").default
);

// Vue.component('pagination', require('laravel-vue-pagination').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Antd from "ant-design-vue";
import "ant-design-vue/dist/antd.css";
Vue.config.productionTip = false;

Vue.use(Antd);

const app = new Vue({
    store,
    el: "#app"
});
