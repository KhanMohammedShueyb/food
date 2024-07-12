import { GetterTree } from "vuex";
import { RootState } from "../types";
// import { AuthState, Users } from "./types";
import { AuthState } from "./types";

export const getters: GetterTree<AuthState,RootState> = {
    // authenticatedUser(state):Users{
    authenticatedUser(state):Object{
        return state.authenticatedUser
    },
    token(state):Object{
      
        return state.token
    },
    users(state):Array<Object>{
    
        return state.users
    },
  
   
}