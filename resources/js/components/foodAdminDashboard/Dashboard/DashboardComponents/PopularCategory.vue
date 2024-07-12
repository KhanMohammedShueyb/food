<template>
    <section class="mt-3">
        <h2>Popular Category</h2>
        <v-card class="pa-3 rounded-xl borders" flat tile>
            <v-card class="pa-3 card1 white">
                <v-col v-for="item, i in data" :key="i">
                    <v-row class="pa-0">
                        <v-col cols="12" md="2" class="pa-0 d-flex align-center" >
                            <v-icon :class="item['iconColor']" class=" rounded-xl pa-2">{{ item['icon1']}}</v-icon>
                        </v-col>
                        <v-col cols="12" md="10" class="pa-0">
                            <v-card-text class="pa-0">
                                <h4 class="black--text font-weight-black pa-0">{{ item['text'] }}</h4>
                            </v-card-text>
                            <v-progress-linear v-model="item['value']" height="25">
                                <strong>{{ Math.ceil(item['value']) }}%</strong>
                            </v-progress-linear>
                        </v-col>
                    </v-row>
                </v-col>
            </v-card>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class PopularCategory extends Vue {
    public data: Array<Object> = [
        {
            icon1: 'mdi-pizza',
            text: 'Pizza',
            background: 'white',
            iconColor: 'black',
            value: 80
        },
        {
            icon1: 'mdi-hamburger',
            text: 'Burger',
            background: 'white',
            iconColor: 'black',
            value: 60
        },
        {
            icon1: 'mdi-cake',
            text: 'Cake',
            background: 'white',
            iconColor: 'black',
            value: 50
        },
        {
            icon1: 'mdi-carrot',
            text: 'Salad',
            background: 'white',
            iconColor: 'black',
            value: 40
        },
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