<template>
    <section class="mt-3">
        <h2>Employees</h2>
        <v-card class="pa-3 rounded-xl borders" flat tile >
            <v-card class="pa-3 card1 white">
                <v-row class="pa-0">
                    <v-col>
                        <v-col v-for="item, i in data" :key="i">
                            <v-row class="pa-0">
                                <v-col cols="12" md="2" class="pa-0 d-flex align-center">
                                    <v-icon :class="item['iconColor']" class=" rounded-xl pa-2">{{ item['icon1']}}</v-icon>
                                </v-col>
                                <v-col cols="12" md="6" class="pa-0">
                                    <v-card-text class="pa-0">
                                        <h4 class="black--text font-weight-black pa-0">{{ item['text'] }}</h4>
                                    </v-card-text>
                                    <v-card-subtitle class="pa-0">
                                        <h5 class="black--text">{{ item['text1'] }}</h5>
                                    </v-card-subtitle>
                                </v-col>
                                <v-col cols="12" md="4" class="pa-0 d-flex  justify-center" >
                                    <v-card-text class="pa-0 d-flex align-center justify-center">
                                        <h4 class="black--text  pa-0">{{ item['time'] }}</h4>
                                    </v-card-text>
                                </v-col>
                            </v-row>
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
export default class Employees extends Vue {
    public data: Array<Object> = [
        {
            icon1: 'mdi-alpha-s',
            text: 'Sabih',
            text1: 'Sales Manager',
            background: 'white',
            iconColor: 'black',
            time: '35hr/Week'
        },
        {
            icon1: 'mdi-alpha-s',
            text: 'Sabih',
            text1: 'Sales Manager',
            background: 'white',
            iconColor: 'red',
            time: '35hr/Week'
        },
        {
            icon1: 'mdi-alpha-s',
            text: 'Sabih',
            text1: 'Sales Manager',
            background: 'white',
            iconColor: 'black',
            time: '35hr/Week'
        },
        {
            icon1: 'mdi-alpha-s',
            text: 'Sabih',
            text1: 'Sales Manager',
            background: 'white',
            iconColor: 'red',
            time: '35hr/Week'
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