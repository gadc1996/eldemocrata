import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

axios.defaults.withCredentials = true;

Vue.use(Vuex);

const state = {
    user: {},
    userIsAuthenticated: false,
};

const mutations = {
    SET_USER(state, payload) {
        state.user = payload;
    },
    SET_USER_IS_AUTHENTICATED(state, payload) {
        state.userIsAuthenticated = payload;
    },
};

const actions = {
    async loginUser({ commit }, payload) {
        try {
            const response = await axios.post(
                "http://admin.eldemocrata.mx/api/login",
                payload
            );
            commit("SET_USER", response.data.data);
            commit("SET_USER_IS_AUTHENTICATED", true);
        } catch (error) {
            commit("SET_USER", {});
        }
    },
};

const getters = {
    user: (state) => state.user,
    userIsAuthenticated: (state) => state.userIsAuthenticated,
};

export default {
    state,
    mutations,
    actions,
    getters,
};
