import { MutationTree } from 'vuex';
import { ScoreMutations } from './mutation-types';
import { ScoreState } from './types';

export const mutations: MutationTree<ScoreState> = {
 
  [ScoreMutations.GET_USER_GROUP_PERMISSION_SUCCESS](state, payload: Array<object>) {
    state.user_group_permission = payload
  },
  [ScoreMutations.GET_SCORES_SUCCESS](state, payload: Array<object>) {
    state.scores = payload
  },
}