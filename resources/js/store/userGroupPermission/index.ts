import { Module } from "vuex";
import { RootState } from "../types";
import { UserGroupPermissionState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: UserGroupPermissionState = {
  permission: []
}

export const groupPermission: Module<UserGroupPermissionState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}