import Vue from 'vue'
import Component from 'vue-class-component'

// You can declare mixins as the same style as components.
@Component
export class QualityMarks extends Vue {
  qualitymark = [
    'Scrap Gold 24k',
    'Scrap Gold 22k',
    'Scrap Gold 18k',
    'Scrap Gold 14k',
    'Scrap Gold 10k',
    'Scrap Gold 9k',
    'Scrap Gold 8k',
    'Scrap Gold',
    'Scrap Silver 925',
    'Scrap Silver 800',
    'Scrap Silver 900',
    'Scrap Silver 950',
    'Scrap Silver',
    'Scrap Platinum 950',
    'Scrap Platinum',
    'Scrap Palladium 950',
    'Scrap Palladium 900',
    'Scrap Palladium',
    'Scrap Rhodium',
    'Scrap Other',
  ]

  qualitymark_gold = [
    '',
    '24k',
    '22k',
    '18k',
    '14k',
    '10k',
    '9k',
    '8k',
    'Other'
  ]

  qualitymark_silver = [
    '',
    '925',
    '800',
    '900',
    '950',
    'Other'
  ]

  qualitymark_platinum = [
    '',
    '950',
    'Other'
  ]

  qualitymark_palladium = [
    '',
    '950',
    '900',
    'Other',
  ]

  qualitymark_rhodium = [
    '',
    'Other',
  ]
}