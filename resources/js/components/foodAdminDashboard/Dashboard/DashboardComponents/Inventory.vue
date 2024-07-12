<template>
    <section class="mt-3">
        <h2>Inventory</h2>
        <v-card class="pa-3 rounded-xl borders" flat tile>
            <v-card class="pa-3 card1 white">
                <v-row class="pa-0">
                    <v-col>
                        <v-card-text class="pa-0">
                            <h4 class="black--text d-flex justify-center font-weight-bold pa-0">Product Name</h4>
                        </v-card-text>
                        <v-col v-for="item, i in data" :key="i">
                            <v-col class="d-flex pa-0">
                                <v-col  class="pa-0 d-flex align-center">
                                    <v-icon :class="item['iconColor']" class=" rounded-xl pa-2">{{ item['icon1']}}</v-icon>
                                </v-col>
                                <v-col  class="pa-0">
                                    <v-card-text class="pa-0">
                                        <h4 class="black--text font-weight-black pa-0">{{ item['text'] }}</h4>
                                    </v-card-text>
                                    <v-card-subtitle class="pa-0">
                                        <h5 class="black--text">{{ item['text1'] }}</h5>
                                    </v-card-subtitle>
                                </v-col>
                            </v-col>
                        </v-col>
                    </v-col>
                    <v-col>
                        <v-card-text class="pa-0 ">
                            <h4 class="black--text d-flex justify-center font-weight-bold pa-0">Import Day</h4>
                        </v-card-text>
                        <v-col v-for="item, i in data" :key="i">
                            <v-col class="d-flex pa-0">
                                <v-col class="pa-0 d-flex  justify-center" >
                                    <v-card-text class="pa-0 pb-8 d-flex align-center justify-center">
                                        <h4 class="black--text  pa-0">{{ item['date'] }}</h4>
                                    </v-card-text>
                                </v-col>
                            </v-col>
                        </v-col>
                    </v-col>
                </v-row>
            </v-card>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class Inventory extends Vue {
    public data: Array<Object> = [
        {
            icon1: 'mdi-printer',
            text: 'Printer',
            text1: '2 PC',
            background: 'white',
            iconColor: 'black',
            date: '16 Jan, 23'
        },
        {
            icon1: 'mdi-seat',
            text: 'Chairs',
            text1: '60 PC',
            background: 'white',
            iconColor: 'black',
            date: '16 Jan, 23'
        }
       
    ]

}
</script>

<style scoped>
.card1 {
    border-radius: 20px !important;
}

.borders {
    border: 3px solid white;
}
h2{
    color:rgb(32, 38, 57);
}
</style>