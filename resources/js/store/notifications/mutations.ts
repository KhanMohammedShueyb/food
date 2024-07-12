import { MutationTree } from 'vuex';
import { NotificationMutations } from './mutation-types';
import { NotificationState } from './types';

export const mutations: MutationTree<NotificationState> = {
  [NotificationMutations.GET_NOTIFICATION_SUCCESS](state, payload: Array<object>) {
      debugger
    state.all_notification = payload
  }
  
}