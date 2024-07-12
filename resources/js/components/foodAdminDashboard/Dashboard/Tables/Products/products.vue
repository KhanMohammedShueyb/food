<template>
    <section >
        <v-card class="pa-3 borders" height="100vh" flat tile>
            <!-- <v-row>
                <v-col>
                    <h2>Products</h2>
                </v-col>
                <v-col class="d-flex justify-end"><v-icon>mdi-dots-vertical</v-icon></v-col>
            </v-row> -->
            
            <v-col class="d-flex justify-space-around px-0">
                <v-row>
                    <v-col><product /></v-col>
                </v-row>
                
            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import product from './Tables/products.vue';
import { Getter } from 'vuex-class';
@Component({
    components:{
        product
    }
})
export default class Productss extends Vue {
    @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
    @Getter("Authenticated/token") getToken: () => Promise<Object>;
    mounted(){
        let user: Object = this.getAuthUser;
        let token: Object = this.getToken;
        if(user['type'] == "admin" && token['token']){
            this.$router.push({path: '/dashboard/Productss'}).catch(()=>{})
        }
        else if(user['type'] == "customer" && token['token']){
            this.$router.push({path: '/dashboard/Productss'}).catch(()=>{})
        }
        else{
            this.$router.push({path: '/'})
        }
    }
}
</script>

<style scoped>
.borders{
   background-color: #f8f8fa;
}
h2{
    color:#122932;
    font-weight:bold ;
}
:deep(.mdi-dots-vertical) {
    color: #122932;
}
@media screen and (max-width:600px){
    .borders{
        width: auto !important;
        height: auto !important;
    }
}
@media screen and (max-width:1024px){
    .borders{
        width: auto !important;
        height: auto !important;
    }
}
</style>