<template>
    <section>
        
        <!-- <v-card class="pa-3 rounded-xl borders" flat tile> -->
            <!-- <v-col class="d-flex justify-space-around px-0" > -->
                <v-card v-for="item, i in data" :key="i" :class="item['background']" class="pa-3 mx-2 card1 " flat tile>
                    <v-row>
                        <v-col cols="12" md="4" class="d-flex align-center">
                            <v-icon  class="rounded-xl">{{ item['icon1']}}</v-icon>
                        </v-col>
                        <v-col cols="12" md="8" class="d-flex align-center">
                            <v-col class="pa-0 align-center">
                                <v-card-subtitle class="pa-0">
                                    <h5 class="black--text">{{ item['text1']}}</h5>
                                </v-card-subtitle>
                                <v-card-text class="pa-0">
                                    <h3 class="black--text font-weight-black pa-0">{{ item['text']}}</h3>
                                </v-card-text>
                            </v-col>
                        </v-col>
                        <!-- <v-divider class="divider"></v-divider> -->
                    </v-row>
                </v-card>
            <!-- </v-col> -->
        <!-- </v-card> -->
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class TotalSales extends Vue {
    public data: Array<Object> = [
        {
            icon1: 'mdi-sale',
            text: '786',
            text1: 'Total Sales',
            background: 'white',
        }
    ]
}
</script>

<style scoped>
.card1 {
    border-radius: 20px !important;
}
.borders{
    border: 3px solid white;
    background-color: white;
}

:deep(.mdi-sale) {
    font-size: 50px;
    color: #03a8ff;

}
.divider{
    background-color: red;
}
</style>