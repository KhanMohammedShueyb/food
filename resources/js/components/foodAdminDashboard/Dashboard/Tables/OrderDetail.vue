<template>
    <section >
        <v-card class="pa-3 borders" height="100vh" flat tile>
            <v-col class="d-flex justify-space-around px-0">
                <v-row>
                    <v-col><orderdetail /></v-col>
                </v-row>
                
            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import orderdetail from './OrdersDetails/OrdersDetails.vue'
import { Getter } from 'vuex-class';
@Component({
    components:{
        orderdetail
    }
})
export default class UserOrderDetailss extends Vue {
    @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
    @Getter("Authenticated/token") token: () => Promise<Object>;
    mounted(){
        const user = this.getAuthUser
        const token = this.token
        debugger
        if(user['type'] == "admin" && token['token']){
            this.$router.push({ path: '/dashboard/Orderdetails'}).catch(()=>{})

        }
        else if(user['type'] == "customer" && token['token']){
            this.$router.push({ path: '/dashboard/Orderdetails'}).catch(()=>{})

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