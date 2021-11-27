import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

axios.defaults.withCredentials = true;

Vue.use(Vuex);

const state = {
    resources: {},
    links: {},
    isModalVisible: false,
    storeResource: true,
    pageTitle: "Articles",
    columns: ["title"],
    fillable: ["first_name", "last_name", "email", "phone_number"],
};

const mutations = {
    SET_RESOURCES(state, payload) {
        state.resources = payload;
    },
    SET_LINKS(state, payload) {
        state.links = payload;
    },
    SET_MODAL_VISIBLE(state, payload) {
        state.isModalVisible = payload;
    },
    SET_STORE_RESOURCE(state, payload) {
        state.storeResource = payload;
    },
    ADD_RESOURCE(state, payload) {
        state.resources.unshift(payload);
    },
    DESTROY_RESOURCE(state, payload) {
        const index = state.resources.findIndex((u) => u.id === payload.id);

        if (index >= 0) {
            Vue.delete(state.resources, index);
        }
    },
    UPDATE_RESOURCE(state, payload) {
        const index = state.resources.findIndex((u) => u.id === payload.id);

        if (index >= 0) {
            Vue.set(state.resources, index, payload);
        }
    },
};

const actions = {
    async loadResources({ commit }) {
        try {
            const response = await axios.get(
                "http://eldemocrata.test/api/articles"
            );
            commit("SET_RESOURCES", response.data.data);
            commit("SET_LINKS", response.data.links);
        } catch (error) {
            commit("SET_RESOURCES", {});
        }
    },
    async store({ commit }, payload) {
        try {
            const response = await axios.post(
                "http://eldemocrata.test/api/articles",
                payload
            );
            commit("ADD_RESOURCE", response.data.data);
            commit("SET_MODAL_VISIBLE", false);
        } catch (error) {
            console.log(error);
        }
    },
    async update({ commit }, payload) {
        try {
            const response = await axios.put(
                `http://eldemocrata.test/api/articles/${payload.id}`,
                payload
            );
            commit("UPDATE_RESOURCE", response.data.data);
            commit("SET_MODAL_VISIBLE", false);
        } catch (error) {
            console.log(error);
        }
    },
    async destroy({ commit }, payload) {
        try {
            axios.delete(`http://eldemocrata.test/api/articles/${payload.id}`);
            commit("DESTROY_RESOURCE", payload);
        } catch (error) {
            console.log(error);
        }
    },
    setModalVisible({ commit }, payload) {
        commit("SET_MODAL_VISIBLE", payload);
    },
    setAddResource({ commit }, payload) {
        commit("SET_STORE_RESOURCE", payload);
    },
    async loadPreviousResources({ commit, state }) {
        try {
            const response = await axios.get(state.links.prev);
            commit("SET_RESOURCES", response.data.data);
            commit("SET_LINKS", response.data.links);
        } catch (error) {
            commit("SET_RESOURCES", {});
        }
    },
    async loadNextResources({ commit, state }) {
        try {
            const response = await axios.get(state.links.next);
            commit("SET_RESOURCES", response.data.data);
            commit("SET_LINKS", response.data.links);
        } catch (error) {
            commit("SET_RESOURCES", {});
        }
    },
};

const getters = {
    columns: (state) => state.columns,
    fillable: (state) => state.fillable,
    isModalVisible: (state) => state.isModalVisible,
    pageTitle: (state) => state.pageTitle,
    resources: (state) => state.resources,
    storeResource: (state) => state.storeResource,
    links: (state) => state.links,
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters,
};
