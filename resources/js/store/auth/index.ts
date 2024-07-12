import { Module } from "vuex";
import { RootState } from "../types";
import { AuthState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: AuthState = {
  api_access_token: '',
  username: 'aaa',
  email: '',
  password: '',
  authenticated_user: {},
  user: {
    username: '',
    email: '',
    password: '',
    user_role: '',
  },
  all_users: [],
  formState:1,
}

export const auth: Module<AuthState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}