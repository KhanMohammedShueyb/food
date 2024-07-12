import { ActionTree } from "vuex";
import { RootState } from "../types";
import { UserGroupState } from "./types";
import { UserGroupMutations } from './mutation-types';
import axios from 'axios';
import { GroupResponse } from "@/entities/userGroups";





export const actions: ActionTree<UserGroupState, RootState> = {
  
 
  async createGroup({commit}, payload): Promise<GroupResponse> { // promise which return type of array of objects
    try {
        
      return await axios.post("/api/Usergroup/create", payload).then(res => {
        debugger
        if(res.data.success == true){
          res.data.Usergroup['group_permission'] = payload.group_permission 
          commit(UserGroupMutations.SET_USER_GROUP,res.data.Usergroup);
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

  async updateGroup({commit},payload): Promise<GroupResponse> { // promise which return type of array of objects
    debugger
    try {
      return await axios
      .put(
        "/api/Usergroup/upd/" + payload.Id,
        payload.editedGroup
      ).then(res => {
        res.data['group_permission'] = payload.GroupPermission
        debugger
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async deleteeGroup({commit}, payload): Promise<void> { // promise which return type of array of objects
    try {
      return await axios
      .delete("/api/Usergroup/del/" + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async showGroup({commit},payload): Promise<GroupResponse> { // promise which return type of array of objects
    try {
      return await axios.get("/api/Usergroup/show",payload).then(res => {
        if(res.data.success == true){
          commit(UserGroupMutations.SET_USER_GROUP,res.data.Usergroup);
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

    async groupPermission({ commit },payload:Object) {
        try {
          debugger
            return await axios.post("/api/Usergroup/groupPermission",payload).then((Response) => {
                debugger
                commit(UserGroupMutations.GET_GROUP_PERMISSIONS, Response.data.userGroup)
                return Response;
            });
        }
        catch (error: any) {
            return error.response.data
        }
    },
}