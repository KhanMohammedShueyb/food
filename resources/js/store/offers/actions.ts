import { ActionTree } from "vuex";
import { RootState } from "../types";
import { OfferState } from "./types";
import { OfferMutations } from './mutation-types';
import axios from 'axios';
import { Offers } from "@/entities/offers";





export const actions: ActionTree<OfferState, RootState> = {
  
 
  async createOffer({ commit }, payload: Object) {
    try {
        return await axios
            .post("/api/Offer/create", payload)
            .then(Response => {
                commit(OfferMutations.SET_OFFER, Response.data)
                return Response;
            });
    }
    catch (error: any) {
        return error.response.data
    }
},

async updateOffer({commit},payload): Promise<Offers> { // promise which return type of array of objects
  debugger
  try {
    return await axios
    .put(
        "/api/Offer/upd/" + payload.Id,
        payload.editedItem
    ).then(res => {
      res.data['Offer'] = payload.editedItem
      debugger
      return res.data
    })
  } catch (error : any) {
    return error.response.data;
  }
},
  async deleteOffer({commit}, payload): Promise<void> { // promise which return type of array of objects
    try {
      return await axios
      .delete("/api/Offer/del/" + payload).then(res => {
        return res.data
      })
    } catch (error : any) {
      return error.response.data;
    }
  },
  async showOffer({commit}): Promise<Offers> { // promise which return type of array of objects
    try {
      return await axios.get("/api/Offer/show").then(res => {
        if(res.data.success == true){
          commit(OfferMutations.SET_OFFER,res.data.Offer);
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