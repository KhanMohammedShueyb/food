<template>
    <section class="mt-3">
        <!-- <v-card class="rounded white pa-5"> -->
        <v-data-table flat tile :search="search" :headers="headers" :items="data" sort-by="id"
            class="elevation-1 table">
            <template v-slot:top>
                <v-toolbar class="white" tile flat>
                    <v-row>
                        <v-col> <v-toolbar-title>
                                <h2 class="d-flex align-center"><v-icon class="px-2">mdi-details</v-icon>User order details
                                </h2>
                            </v-toolbar-title>
                        </v-col>
                        <v-col class="d-flex align-center justify-end ">
                            <v-text-field v-model="search" class="custom-label-color mr-5" hide-details single-line
                                color="red" dense solo label="Search anything"
                                prepend-inner-icon="mdi-magnify"></v-text-field>
                        </v-col>
                    </v-row>
                </v-toolbar>
            </template>
            <template v-slot:item.item="{ item }">
                <v-avatar>
                    <img :src="item.item" alt="John">
                </v-avatar>
            </template>
        </v-data-table>
        <!-- </v-card> -->
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import axios from 'axios';
import { Action,Getter } from 'vuex-class';

@Component({
})
export default class ordersdetail extends Vue {
    @Action("orders/showOrderDetail") showOrderDetail!: (param:Object) => Promise<Array<Object>>;
    @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
    @Getter("orders/getOrdersDetails") getOrdersDetails: () => Promise<Array<Object>>;

    public search: any =""
    public input: any = []
    public headers: Array<Object> = [
        {
            text: 'id',
            align: 'start',
            sortable: false,
            value: 'id',
        },
        { text: 'name', value: 'name' },
        { text: 'image', value: 'image' },
        { text: 'item_group', value: 'item_group' },
        { text: 'price', value: 'price' },
        { text: 'quantity', value: 'quantity' },
        { text: 'description', value: 'description' },
        { text: 'order_id', value: 'order_id' },
    ]
    public data: any = [];
    
    mounted(){
        const obj = this.getAuthUser
        this.showOrderDetail(obj).then((Response)=>{
            if(Response['data'].success == true){
                this.data = this.getOrdersDetails
            }
            
            
        })
    }
}
</script>

<style scoped>
.card1 {
    border-radius: 20px !important;
    background-color: #f8f8f8;
}

:deep(.theme--dark.v-text-field--solo>.v-input__control>.v-input__slot) {
    background: #f8f8f8 !important;
}

.btn {
    color: #2ebd6e;
    background-color: #def2e7 !important;
    font-weight: bold !important;
}

:deep(.mdi-details) {
    font-size: 50px;
    color: #2ebd6e;

}

:deep(.mdi-pencil) {
    font-size: 30px !important;
    color: #2ebd6e;

}

:deep(.mdi-delete) {
    font-size: 30px !important;
    color: red;

}

:deep(.mdi-magnify) {

    color: #2ebd6e;
}
:deep(.custom-label-color .v-label) {
    color: #122932;
    opacity: 1;
}
:deep(.v-data-footer__icons-before) {
    /* font-size: 50px !important; */
    background-color: #2ebd6e !important;
}
:deep(.v-input) {
    max-width: 60%; 
}
:deep(.v-data-footer__icons-after) {
    background-color: #2ebd6e !important;
}
:deep(.v-data-footer__select .v-select__selections .v-select__selection--comma) {
    color: black;
}
:deep(.mdi-menu-down::before) {
    background-color: #2ebd6e !important;
}

:deep(.custom-label-color .v-input) {
    color: #122932;
    opacity: 1;
}

:deep(.v-input input) {
    max-height: 32px;
    color: black;
}

.table {
    background-color: transparent;
    color: #122932;

}

h2 {
    color: #122932;
    font-weight: bold;
}

:deep(thead) {
    background: #f9f9fb !important;
    height: 60px !important;
}

:deep(th) {
    color: #2ebd6e !important;
    font-size: 20px !important;
    position: relative;
    font-weight: bold;
    vertical-align: middle !important;
}

:deep(tbody tr) {
    height: 80px;
    border-top: 2px solid #def2e7;
}

:deep(tbody) {
    margin: 80px !important;
}


:deep(td) {

    font-size: 20px !important;
    vertical-align: middle;
}

@media screen and (max-width:600px) {
    :deep(tbody tr) {
        height: auto;
        border-top: 2px solid #def2e7;
    }
}

/* @media screen and (max-width:1024px){
    .borders{
        width: auto !important;
        height: auto !important;
    }
} */
</style>