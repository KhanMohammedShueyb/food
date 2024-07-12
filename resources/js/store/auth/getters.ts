import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { AuthState } from './types';
import _ from 'lodash'
import { State } from 'vuex-class';
export const getters: GetterTree<AuthState, RootState> = {
  getUser(state): object {
    return state.user
  },
  authenticatedUser(state): object {
    return state.authenticated_user
  },
  apiAccessToken(state): string {
    return state.api_access_token
  },
  allUsers(state): Array<object> {
    return state.all_users
  },
  getForm(state): number {
    return state.formState
  },
}