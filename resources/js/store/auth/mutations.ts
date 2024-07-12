import { MutationTree } from 'vuex';
import { AuthMutations } from './mutation-types';
import { AuthState } from './types';

export const mutations: MutationTree<AuthState> = {
  [AuthMutations.SET_USER_INFO](state, payload: object) {
    state.user = payload
  },

  [AuthMutations.GET_AUTHENTICATED_USER_SUCCESS](state, payload: object) {
    state.authenticated_user = payload
  },

  [AuthMutations.API_ACCESS_TOKEN](state, payload: string) {
    state.api_access_token = payload
  },

  [AuthMutations.GET_USER_SUCCESS](state, payload: Array<object>) {
    state.all_users = payload
  },
  [AuthMutations.SET_FORM_STATE](state, formState: number) {
    state.formState = formState
  },
  
}