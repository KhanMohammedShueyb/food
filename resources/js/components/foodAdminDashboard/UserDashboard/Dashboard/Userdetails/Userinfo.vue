<template>
    <section>

        <!-- <v-card class="pa-3 rounded-xl borders" flat tile> -->
        <!-- <v-col class="d-flex justify-space-around px-0" > -->
        <v-card class="pa-3 mx-2 card1 " flat tile>
            <v-row class="pt-0">
                <v-col cols="12" md="4" class="d-flex justify-center pt-0">
                    <v-img class="rounded-xl" lazy-src="https://picsum.photos/id/11/10/6" max-height="120"
                        max-width="150" src="https://picsum.photos/id/11/500/300"></v-img>
                </v-col>
                <v-col cols="12" md="8" class="d-flex pt-0">
                    <v-col class="pa-0">
                        <v-col class="d-flex pa-0 pt-1 align-center ">
                            <h5 class="name font-weight-black">Sabih Ur Rehman</h5>
                        </v-col>
                        <v-col class="d-flex pa-0 pt-1 align-center ">
                            <h5 class="font-weight-black">Email: </h5>
                            <h6 class="ml-16">Sabih@gmail.com</h6>
                        </v-col>
                        <v-col class="d-flex pa-0 pt-1 align-center ">
                            <h5 class=" font-weight-black">Contact no: </h5>
                            <h6 class="ml-4">03435515668</h6>
                        </v-col>
                        <v-col class="d-flex pa-0 pt-1 align-center ">
                            <h5 class=" font-weight-black">Zipcode: </h5>
                            <h6 class="ml-10">0343</h6>
                        </v-col>
                    </v-col>
                </v-col>
            </v-row>
            <v-col class="d-flex pt-5 align-center ">
                <h5 class=" font-weight-black">Bill Address: </h5>
                <h6 class="ml-3">910 Arlington Terrace, Fayetteville AR 72701</h6>
            </v-col>
            <v-col class="d-flex align-center ">
                <h5 class=" font-weight-black">Shipping Address: </h5>
                <h6 class="ml-3">910 Arlington Terrace, Fayetteville AR 72701</h6>
            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class info extends Vue {

}
</script>

<style scoped>
.card1 {
    background: transparent;
    border: none;
}
.name{
    color: #2ebd6e;
}
h6,h5{
    color: #122932;
}
.borders {
    border: 3px solid white;
    background-color: white;
}

:deep(.mdi-arrow-down-bold) {
    font-size: 50px;
    color: #fa9274;

}

.divider {
    background-color: red;
}
</style>