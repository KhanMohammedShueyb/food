import { ActionTree } from "vuex";
import { RootState } from "../types";
import { ScoreState } from "./types";
import { ScoreMutations } from './mutation-types';
import axios from 'axios';

export const actions: ActionTree<ScoreState, RootState> = {
  async initPlatform({
      dispatch,
      rootGetters
    }){
    let token = rootGetters['auth/apiAccessToken']
    let user = rootGetters['auth/authenticatedUser']
    if(!(token == "" && window.location.pathname == "/") && user.user_group_permission_id){
      // dispatch('getUserGroupPermission', user.user_group_permission_id)
    }
  },
  async getScores({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.get('/api/score/scores', {
        params: payload
      }).then(res => {
        commit(ScoreMutations.GET_SCORES_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async allScores({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.get('/api/score/scores', {
        params: payload
      }).then(res => {
        commit(ScoreMutations.GET_SCORES_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async createScore({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      debugger
      return await axios.post('/api/score/scores', payload).then(res => {
        commit(ScoreMutations.GET_SCORES_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async updateScore({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      debugger
      return await axios.patch('/api/score/scores/'+payload.id, payload).then(res => {
        commit(ScoreMutations.GET_SCORES_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
}