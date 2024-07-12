import { ActionTree } from "vuex";
import { RootState } from "../types";
import { AuthMutation } from "./mutations-types";
import { AuthState } from "./types";
import axios from 'axios';
import { Getter } from "vuex-class";

export const actions: ActionTree<AuthState, RootState> = {
    async login({ commit }, payload) {
        try {
            return await axios
                .post('api/user/login', payload)
                .then(Response => {
                    
                    commit(AuthMutation.GET_AUTHENTICATED_USER, Response.data.user)
                    commit(AuthMutation.API_ACCESS_TOKEN, Response.data.token)
                    return Response;
                });
        }
        catch (error: any) {
            return error.response.data
        }
    },
    async register({ commit }, payload: Object) {
        try {
            return await axios
                .post("/api/user/register", payload)
                .then(Response => {
                    
                    commit(AuthMutation.GET_AUTHENTICATED_USER, Response.data.user)
                    commit(AuthMutation.API_ACCESS_TOKEN, Response.data.token)
                    return Response;
                });
        }
        catch (error: any) {
            return error.response.data
        }
    },

    async otp({ commit, state }, input) {
        
        try {
            let data = state.authenticatedUser
            let token = state.token
            return await axios
                .post("/api/user/otp", { input, data, token })
                .then(Response => {
                    return Response;
                });
        }
        catch (error: any) {
            return error.response.data
        }
    },

    logout({ commit }) {
        commit(AuthMutation.GET_AUTHENTICATED_USER, {})
        commit(AuthMutation.API_ACCESS_TOKEN, "")
    },

    async users({ commit },payload:Object) {
        try {
            return await axios.post("/api/user/getData",payload).then((Response) => {
                commit(AuthMutation.GET_ALL_USER, Response.data.user)
                return Response;
            });


        }
        catch (error: any) {
            return error.response.data
        }
    },


    async updateUser({commit},payload): Promise<Object> { // promise which return type of array of objects
        try {
          return await axios
          .put(
            "/api/user/update/" + payload.Id,
            payload.editedGroup
          ).then(res => {
            res.data['user'] = payload.editedGroup
            return res.data
          })
        } catch (error : any) {
          return error.response.data;
        }
      },
      async deleteUser({commit}, payload): Promise<void> { // promise which return type of array of objects
        try {
          return await axios
          .delete("/api/user/delete/" + payload).then(res => {
            return res.data
          })
        } catch (error : any) {
          return error.response.data;
        }
      },

    
}
