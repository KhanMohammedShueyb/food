<template>
    <section class="mt-3">
        <v-card class="white" flat tile width="auto">
            <v-col class="px-0">
                <v-list class="white pa-0" v-for="item,i in data" :key="i">
                    <v-list-item class="pa-0">
                        <v-list-item-content class="pa-0">
                            <v-row>
                                <v-col> <v-list-item-title class="title">{{item['detail']}}</v-list-item-title></v-col>
                                <v-col> <v-list-item-title class="title d-flex justify-end text-h5 font-weight-bold">{{item['number']}}</v-list-item-title></v-col>
                            </v-row>
                        </v-list-item-content>
                    </v-list-item>
                    <v-divider class="divider"></v-divider>
                </v-list>
            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
    components: {
    }
})
export default class userProdDetail extends Vue {
    public data: Array<Object> = [
        {
            detail: 'Low Stock Items',
            number: '02',
        },
        {
            detail: 'Item Group',
            number: '14',
        },
        {
            detail: 'No. of Items',
            number: '104',
        },
       

    ]

}
</script>

<style scoped>
.borders {
    border: 3px solid white;
    background-color: white;
}

h2 {
    color: #122932;
    font-weight: bold;
}
.title{
    color: #122932;
}
:deep(.mdi-dots-vertical) {
    color: #122932;
}
.divider{
    background: lightgrey;
}

@media screen and (max-width:600px) {
    .borders {
        width: auto !important;
    }
}
</style>