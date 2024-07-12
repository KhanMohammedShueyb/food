import Vue from 'vue'
import Component from 'vue-class-component'
import moment from 'moment'

// You can declare mixins as the same style as components.
@Component
export class DateFormatter extends Vue {
  formatDate(date: any, format_type: string){
    return moment(date).format(format_type)
  }
}