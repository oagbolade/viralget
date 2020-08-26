import axios from "axios";

const state = {
    token: null,
    user: null
};

const getters = {
    isAuthenticated: (state) => {
        if (state.token) {
            return true
        }

        return false
    },
    getUser: state => state.user,
    getToken: state => state.token
};

const actions = {
    async handleLogin({ dispatch }, data) {
        const URL = `/api/adminv1/admin/login`;

        try {
            const response = await axios.post(URL, data);

            if (response.status === 200) {
                const token = response.data.access_token;
                dispatch("attempt", token);

                if (state.token) {
                    return {
                        status: 200,
                        message: "successfull"
                    };
                }
            }
        } catch (err) {
            return {
                status: err.response.status,
                message: "error",
                error: err
            };
        }
    },

    async attempt({ commit }, token) {
        if (token) {
            commit("SET_TOKEN", token);
        }

        if (!state.token) {
            return;
        }

        const URL = `/api/adminv1/admin/user`;

        try {
            const response = await axios.get(URL);

            if (response.status === 200) {
                const user = response.data;
                commit("SET_USER", user);
            }
        } catch (err) {
            commit("SET_TOKEN", null);
            commit("SET_USER", null);
        }
    }
};

const mutations = {
    SET_TOKEN: (state, token) => (state.token = token),
    SET_USER: (state, user) => (state.user = user)
};

export default {
    state,
    getters,
    actions,
    mutations
};
