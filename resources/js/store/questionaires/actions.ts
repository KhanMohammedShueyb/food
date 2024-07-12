import { ActionTree } from "vuex";
import { RootState } from "../types";
import { QuestionairesState } from "./types";
import { QuestionairesMutations } from './mutation-types';
import axios from 'axios';

export const actions: ActionTree<QuestionairesState, RootState> = {
  
  async createQuestionaires({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.post('/api/question/questionaires', payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async updateQuestionaires({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      
      return await axios.patch('/api/question/questionaires/'+payload.id, payload).then(res => {
     
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async deleteQuestionaires({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      return await axios.delete('/api/question/questionaires/' + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  
  async getQuestionaires({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
      
       return await axios.get('/api/question/questionaires'
       ,{
        params: payload
      }
      ).then(res => {
        commit(QuestionairesMutations.GET_QUESTIONAIRES_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async getValidQuestionaires({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    try {
       return await axios.get('/api/question/questionaires/' + payload 
      ).then(res => {
        commit(QuestionairesMutations.GET_VALIDQUESTIONAIRES_SUCCESS, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  }

}