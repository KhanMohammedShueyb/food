import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { UserGroupState } from './types';
import { GroupResponse } from '@/entities/userGroups';
export const getters: GetterTree<UserGroupState, RootState> = {
  getGroup(state): GroupResponse[] {
    debugger
    return state.usergroups
  },
  getGroupPermissions(state):Array<Object>{
    debugger
    return state.groupPermissions
},
}