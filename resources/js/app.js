/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VueToastr from "vue-toastr";
import VuejsDialog from "vuejs-dialog";
import VueSweetalert2 from "vue-sweetalert2";


Vue.use(VueSweetalert2);

import VuejsDialogMixin from "vuejs-dialog/dist/vuejs-dialog-mixin.min.js"; // only needed in custom components

// If you don't need the styles, do not connect
import "sweetalert2/dist/sweetalert2.min.css";

// include the default style
import "vuejs-dialog/dist/vuejs-dialog.min.css";

Vue.use(VuejsDialog);
Vue.use(VueToastr);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
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

// For search page
Vue.component(
    "search-page-result",
    require("./components/search/SearchResultComponent.vue").default
);
Vue.component(
    "search-page-profile",
    require("./components/search/SearchProfileComponent.vue").default
);

// For campaign pages
Vue.component(
    "view-campaign",
    require("./components/campaigns/ViewCampaign.vue").default
);
Vue.component(
    "create-campaign",
    require("./components/campaigns/CreateCampaign.vue").default
);


Vue.component(
    "reporting-history",
    require("./components/profiling/ReportingHistory.vue").default
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
    el: "#app"
});
