import { GroupResponse } from '@/entities/userGroups';
import { MutationTree } from 'vuex';
import { UserGroupMutations } from './mutation-types';
import {UserGroupState } from './types';



export const mutations: MutationTree<UserGroupState> = {
    
  [UserGroupMutations.SET_USER_GROUP](state, payload: GroupResponse) {
    debugger
    state.usergroups.push(payload);
  },
  [UserGroupMutations.GET_GROUP_PERMISSIONS](state,payload){
    state.groupPermissions = payload
}

  
}