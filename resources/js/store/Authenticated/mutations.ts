import { find } from "lodash";
import { isEmpty } from "lodash";
import { MutationTree } from "vuex";
import { AuthMutation } from "./mutations-types";
import { AuthState } from "./types";
var result: Boolean
var x: any = []
export const mutations: MutationTree<AuthState> = {
    
[AuthMutation.GET_AUTHENTICATED_USER 
](state, payload) {
        state.authenticatedUser = payload
    },
[AuthMutation.API_ACCESS_TOKEN 
](state, payload) {
        state.token = payload
    },
[AuthMutation.GET_ALL_USER](state,payload){
    
    state.users = payload
},

}