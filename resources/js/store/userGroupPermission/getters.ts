import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { UserGroupPermissionState } from './types';
import { GroupPermission } from '@/entities/userGroupPermission';
export const getters: GetterTree<UserGroupPermissionState, RootState> = {
  getPermission(state): GroupPermission[] {
    debugger
    return state.permission
  },
}