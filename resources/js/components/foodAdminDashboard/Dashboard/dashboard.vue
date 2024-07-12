<template>
    <section>
        <v-card class="white" flat tile>
            <v-row>
                <v-col>
                    <v-list class="white mt-3 py-0">
                        <v-list-item>
                            <v-list-item-icon>
                                <v-icon>mdi-view-dashboard</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title class="mt-2 d-flex align-center">
                                <h3 class="d-flex align-center">Dashboard</h3>
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-col>
                <v-col class="d-flex justify-end align-center mt-2">
                    <v-btn class="btn font-weight-bold">
                        Month to date
                    </v-btn>
                    <v-btn class="ml-4 btn font-weight-bold">
                        Year to date
                    </v-btn>
                    <v-menu left offset-y rounded>
                        <template v-slot:activator="{ attrs, on }">
                            <v-btn class="ma-5 px-1 btn d-flex align-center justify-space-between" v-bind="attrs"
                                v-on="on">
                                <h6 class="mt-3 font-weight-bold">Export</h6>
                                <v-icon>mdi-chevron-down</v-icon>
                            </v-btn>
                        </template>

                        <v-list class="list">
                            <v-list-item v-for="item in items" :key="item" link>
                                <v-list-item-title class="title1" v-text="item"></v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </v-col>
            </v-row>
        </v-card>
        <v-card flat tile class="pa-5 card">
            <v-row>
                <v-col cols="12" md="6">
                    <Overview />
                </v-col>
                <v-col cols="12" md="6">
                    <PurchaseOverview />
                </v-col>
            </v-row>
            <v-row class="pa-0 mt-5">
                <v-col cols="12" md="4">
                    <InventorySummary />
                </v-col>
                <v-col cols="12" md="4">
                    <ProductDetail />
                </v-col>
                <v-col cols="12" md="4">
                    <Users />
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <Graphs />
                </v-col>
            </v-row>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Overview from './DashboardComponents/SalesOverview.vue'
import PurchaseOverview from './DashboardComponents/PurchaseOverview.vue'
import Users from './DashboardComponents/Users.vue'
import PopularCategory from './DashboardComponents/PopularCategory.vue'
import InventorySummary from './DashboardComponents/InventorySummary.vue'
import ProductDetail from './DashboardComponents/ProductDetail.vue'
import Graphs from './DashboardComponents/Graphs.vue'
import { Getter } from 'vuex-class';
@Component({
    components: {
        Overview,
        Users,
        PopularCategory,
        InventorySummary,
        PurchaseOverview,
        ProductDetail,
        Graphs
    }
})
export default class dashboard extends Vue {
    @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
    @Getter("Authenticated/token") token: () => Promise<Object>;
    public items: any = [
        'theme change',
        'logout'
    ]
   
   
    mounted(){
        const user = this.getAuthUser
        const token = this.token
        debugger
        if(user['type'] == "admin" && token['token']){
            this.$router.push({path: '/dashboard'}).catch(()=>{});
        }
        else if(user['type'] == "customer" && token['token']){
            this.$router.push({path: '/dashboard'}).catch(()=>{});
        }
        else{
            this.$router.push({path: '/'})
        }
    }
}
</script>

<style scoped>
.card {
    background-color: #f8f8fa;
}

:deep(.theme--dark.v-sheet) {
    border-color: white !important;
    color: #fff;
}
h3{
    color:#122932;
    font-weight:bold ;
}
.btn {
    background-color: #f8f8fa !important;
    color: #2ebd6e !important;
}
</style>