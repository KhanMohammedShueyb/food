import { ActionTree } from "vuex";
import { RootState } from "../types";
import { UserGroupPermissionState } from "./types";
import { UserPermissionMutations } from './mutation-types';
import { GroupPermission } from "@/entities/userGroupPermission";
import axios from 'axios';

export const actions: ActionTree<UserGroupPermissionState, RootState> = {
  
 
  async CreateGroupPermission({commit}, payload): Promise<GroupPermission> { // promise which return type of array of objects
    debugger
    try {
      return await axios.post("/api/permission/create", payload).then(res => {
        
        if(res.data.success == true){
          commit(UserPermissionMutations.SET_USER_PERMISSION,res.data.GroupPermission);
        }
        else{
          return res.data.error
        }
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },

  async UpdateGroupPermission({commit},payload): Promise<GroupPermission> {
    debugger // promise which return type of array of objects
    try {
      return await axios
      .put(
        "/api/permission/upd/" + payload.user_group_id,
        payload
      ).then(res => {
        debugger
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async deleteePermission({commit}, payload): Promise<void> { // promise which return type of array of objects
    try {
      return await axios
      .delete("/api/permission/del/" + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async showPermission({commit}): Promise<GroupPermission> { // promise which return type of array of objects
    try {
      return await axios.get("/api/permission/show").then(res => {
        if(res.data.success == true){
          commit(UserPermissionMutations.SET_USER_PERMISSION,res.data.permission);
        }
        else{
          return res.data.error
        }
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
}