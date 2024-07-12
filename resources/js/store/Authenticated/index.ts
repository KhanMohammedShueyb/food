import { Module } from "vuex";
import { RootState } from "../types";
import { AuthState } from "./types";
import { getters } from "./getters";
import { actions } from "./actions";
import { mutations } from "./mutations";

const state : AuthState = {
    // authenticatedUser: {
    //     id: '',
    //     firstName: ''
    // },
    authenticatedUser: {},
    token:"",
    users:[],
    groupPermissions:[]
} 

export const Authenticated:Module<AuthState,RootState> = {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}