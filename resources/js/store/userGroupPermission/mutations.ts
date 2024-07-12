import { GroupPermission } from '@/entities/userGroupPermission';
import { MutationTree } from 'vuex';
import { UserPermissionMutations } from './mutation-types';
import { UserGroupPermissionState } from './types';

export const mutations: MutationTree<UserGroupPermissionState> = {
    
  [UserPermissionMutations.SET_USER_PERMISSION](state, payload: GroupPermission) {
    debugger
    state.permission.push(payload)
  }
  
}