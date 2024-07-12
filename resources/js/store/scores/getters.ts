import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { ScoreState } from './types';
export const getters: GetterTree<ScoreState, RootState> = {
  userGroupPermission(state): object {
    return state.user_group_permission
  },
  getScores(state): Array<object> {
    debugger
    return state.scores
  },
  // allScores(state):Array<object>{
  //   debugger
  //   return state.scores
  // }
}