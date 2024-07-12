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
                                <h3 class="d-flex align-center">User Dashboard</h3>
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
                  <uinfo />
                </v-col>
                <v-col cols="12" md="6">
                    <UserPurchaseOverview />
                </v-col>
            </v-row>
            <v-row class="pa-0 mt-5">
                <v-col cols="12" md="4">
                    <UserProductDetail />
                </v-col>
                <v-col cols="12" md="4">
                    <discount />
                </v-col>
               
            </v-row>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import UserPurchaseOverview from './Dashboard/UserPurchaseOverview.vue'
import UserProductDetail from './Dashboard/UserProductDetail.vue'
import discount from './Dashboard/DiscountItems.vue'
import uinfo from './Dashboard/Userdetails.vue'
import { Getter } from 'vuex-class';

@Component({
    components: {
        UserPurchaseOverview,
        UserProductDetail,
        discount,
        uinfo
    }
})
export default class userdashboard extends Vue {
  @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
  @Getter("Authenticated/token") token: () => Promise<Object>;
    public items: any = [
        'theme change',
        'logout'
    ]
    
    async mounted(){
        const user = this.getAuthUser
        const token = this.token
        console.log("*********",user, this.token);
        
        
        if(await user['type'] == "admin" && await token['token']){
            this.$router.push({path: '/Userdashboard'}).catch(()=>{})
        }
        else if(await user['type'] == "customer" && await token['token']){
            this.$router.push({path: '/Userdashboard'}).catch(()=>{})
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