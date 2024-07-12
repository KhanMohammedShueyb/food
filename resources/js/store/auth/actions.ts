import { ActionTree } from "vuex";
import { RootState } from "../types";
import { AuthState } from './types';
import { AuthMutations } from './mutation-types';
import axios from 'axios';

export const actions: ActionTree<AuthState, RootState> = {
  async login({ commit, dispatch }, payload: object): Promise<object> {
    try {
      return await axios.post('/api/auth/login', Object.assign(payload, {password_confirmation: payload['password']})).then(res => {
        commit(AuthMutations.GET_AUTHENTICATED_USER_SUCCESS, (res.data.user)?res.data.user : {})
        commit(AuthMutations.API_ACCESS_TOKEN, res.data.token)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async logout({ commit }, payload: object): Promise<object> {
    try {
      return await axios.post('/api/auth/logout').then(res => {
        commit(AuthMutations.API_ACCESS_TOKEN, '')
        commit(AuthMutations.GET_AUTHENTICATED_USER_SUCCESS, {})
        commit(AuthMutations.GET_USER_SUCCESS, [])
        return res
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async registerUser({ commit }, payload: object): Promise<Array<object>> {
    try {
      return await axios.post('/api/auth/register', payload).then(res => {
        // commit(AuthMutations.GET_AUTHENTICATED_USER_SUCCESS, (res && res.data && res.data.user)?res.data.user : {})
        // commit(AuthMutations.API_ACCESS_TOKEN, res && res.data && res.data.token ? res.data.token : null)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async confirmPass({ commit }, payload: object): Promise<Array<object>> {
      try {
      
        return await axios.post('/api/auth/resetpassword', payload).then(res => {
          return res.data
        })
      } catch (error : any) {
        return error.response.data;
      }
    },
  async getUsers({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.get('/api/user/users',{
        params:payload
      }).then(res => {
        commit(AuthMutations.GET_USER_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async deleteUser({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.delete('/api/user/users/' + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async updateUser({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
    
      return await axios.patch(`/api/user/users/${payload.id}`, payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async updatePassword({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      
      return await axios.patch(`/api/user/users/${payload.id}`, payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  setForm({ commit }, formState) {
   
    commit("SET_FORM_STATE", formState);
  },
}