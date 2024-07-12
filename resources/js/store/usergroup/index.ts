import { Module } from "vuex";
import { RootState } from "../types";
import { UserGroupState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: UserGroupState = {
  usergroups: [],
  groupPermissions:[]
}

export const usergroup: Module<UserGroupState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}