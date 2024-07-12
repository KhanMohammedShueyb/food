import { Module } from "vuex";
import { RootState } from "../types";
import { NotificationState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: NotificationState = {
 
  all_notification: []
}

export const notifications: Module<NotificationState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}