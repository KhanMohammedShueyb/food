import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { QuestionairesState } from './types';
export const getters: GetterTree<QuestionairesState, RootState> = {
  questionaires(state): Array<object> {
    return state.questionaires
  },
  validQuestionaires(state): Array<object> {
    return state.validQuestionaires
  },

  
}