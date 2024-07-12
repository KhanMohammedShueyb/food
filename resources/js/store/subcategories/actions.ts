import { ActionTree } from "vuex";
import { RootState } from "../types";
import { SubcategoryState } from "./types";
import { SubcategoryMutations } from './mutation-types';
import { Subcategory } from "@/entities/subcategory";
import axios from 'axios';

export const actions: ActionTree<SubcategoryState, RootState> = {
  
 
  async createSubcategory({commit}, payload): Promise<Subcategory> { // promise which return type of array of objects
    try {
        
      return await axios.post("/api/Subcategory/create", payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },

  async showSubcategory({commit}, payload): Promise<Subcategory> { // promise which return type of array of objects
    try {
      return await axios.get('/api/Subcategory/show', {
        params: payload
      }).then(res => {
        commit(SubcategoryMutations.GET_SUBCATEGORIES_INFO, res.data)
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  
  async updateSubcategory({commit}, payload): Promise<Subcategory> { // promise which return type of array of objects
    try {
      debugger
      return await axios.put('/api/Subcategory/upd/'+payload.Id, payload.editedItem).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async deleteSubcategory({commit}, payload): Promise<void> { // promise which return type of array of objects
    try {
      return await axios.delete('/api/Subcategory/del/' + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
}