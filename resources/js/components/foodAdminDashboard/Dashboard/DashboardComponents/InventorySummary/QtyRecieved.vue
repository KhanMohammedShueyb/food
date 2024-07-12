<template>
    <section class="mt-3">
        <!-- <v-card class="pa-3 rounded-xl borders" flat tile width="auto">
            <h2>No. Of Users</h2>
            <v-col class="d-flex justify-space-around px-0"> -->
                <v-card v-for="item, i in data" :key="i"  class="pa-3 mx-1 card1 " width="200px">
                    <v-row>
                        <v-col class="">
                            <v-icon>{{ item['icon1']}}</v-icon>
                        </v-col>
                    </v-row>
                    <v-col>
                        <v-card-subtitle class="pa-0">
                            <h5 class="black--text">{{ item['text1']}}</h5>
                        </v-card-subtitle>
                        <v-card-text class="pa-0">
                            <h3 class="black--text font-weight-black pa-0">{{ item['text']}}</h3>
                        </v-card-text>
                    </v-col>
                </v-card>
            <!-- </v-col>
        </v-card> -->
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class QtyRecieved extends Vue {
    public data: Array<Object> = [
        {
            icon1: 'mdi-parachute',
            text: '27',
            text1: 'Total Supliers',
            background: 'white',
        },
       
    ]
  
}
</script>

<style scoped>
.card1 {
    border-radius: 20px !important;
    background-color: #f8f8f8;
}

:deep(.mdi-parachute) {
    font-size: 50px;
    color: #da2f1b;

}

</style>