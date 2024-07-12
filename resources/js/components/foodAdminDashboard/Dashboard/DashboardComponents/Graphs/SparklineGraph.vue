<template>
    <section class="mt-3">
        <v-card flat tile class="pa-3 mx-1 card1 ">
            <v-row>
                <v-col class="">
                    <v-sheet class="v-sheet--offset mx-auto" color="cyan" elevation="12" max-width="calc(100% - 32px)">
                        <v-sparkline :labels="labels" :value="value" color="white" line-width="2"
                            padding="16"></v-sparkline>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
})
export default class SparkGraph extends Vue {
    public labels:any = [
        '12am',
        '3am',
        '6am',
        '9am',
        '12pm',
        '3pm',
        '6pm',
        '9pm',
      ]
      public value:any = [
        200,
        675,
        410,
        390,
        310,
        460,
        250,
        240,
      ]

}
</script>

<style scoped>
.card1 {
    border-radius: 20px !important;
    background-color: white;
}
</style>