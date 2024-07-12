import { ActionTree } from "vuex";
import { RootState } from "../types";
import { NotificationState } from './types';
import { NotificationMutations } from './mutation-types';
import axios from 'axios';

export const actions: ActionTree<NotificationState, RootState> = {
  async getNotifications({commit}): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.get('/api/notification/notifications').then(res => {
        commit(NotificationMutations.GET_NOTIFICATION_SUCCESS, res.data.notifications)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  
 
}