import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { NotificationState } from './types';
import _ from 'lodash'
export const getters: GetterTree<NotificationState, RootState> = {
  
  allnotifications(state): Array<object> {
    return state.all_notification
  }
}