import { MutationTree } from 'vuex';
import { QuestionairesMutations } from './mutation-types';
import { QuestionairesState } from './types';

export const mutations: MutationTree<QuestionairesState> = {
 
  [QuestionairesMutations.GET_QUESTIONAIRES_SUCCESS](state, payload: Array<object>) {
    state.questionaires = payload
  },
  [QuestionairesMutations.GET_VALIDQUESTIONAIRES_SUCCESS](state, payload: Array<object>) {
    state.validQuestionaires = payload
  },
  
 
}