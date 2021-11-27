import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import modules from "./modules";

axios.defaults.withCredentials = true;

Vue.use(Vuex);

export default new Vuex.Store({
    modules,
});
