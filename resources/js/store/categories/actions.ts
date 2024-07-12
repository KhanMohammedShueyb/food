import { ActionTree } from "vuex";
import { RootState } from "../types";
import { CategoriesState } from "./types";
import { CategoriesMutations } from './mutation-types';
import { Category } from "@/entities/category";
import axios from 'axios';

export const actions: ActionTree<CategoriesState, RootState> = {
  
 
  async createCategory({commit}, payload): Promise<Category> { // promise which return type of array of objects
    try {
        
      return await axios.post("/api/category/create", payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },

  async showCategory({commit}, payload): Promise<Category> { // promise which return type of array of objects
    try {
      return await axios.get('/api/category/show', {
        params: payload
      }).then(res => {
        commit(CategoriesMutations.GET_CATEGORIES_INFO, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  
  async updateCategory({commit}, payload): Promise<Category> { // promise which return type of array of objects
    try {
      debugger
      return await axios.put('/api/category/upd/'+payload.Id, payload.editedItem).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async deleteCategory({commit}, payload): Promise<void> { // promise which return type of array of objects
    try {
      return await axios.delete('/api/category/del/' + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
}