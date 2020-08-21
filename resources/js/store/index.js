import Vuex from "vuex";
import Vue from "vue";
import login from "./modules/auth/login";

// Load Vuex
Vue.use(Vuex);

// Create store
export default new Vuex.Store({
    modules: {
        login
    }
});
