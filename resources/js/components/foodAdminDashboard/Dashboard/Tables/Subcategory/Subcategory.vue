<template>
    <section >
        <v-card class="pa-3 borders" height="100vh" flat tile>   
            <v-col class="d-flex justify-space-around px-0">
                <v-row>
                    <v-col><subcategory /></v-col>
                </v-row>
                
            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import subcategory from './Tables/Subcategories.vue'
import { Getter } from 'vuex-class';
@Component({
    components:{
        subcategory
    }
})
export default class subcategoriess extends Vue {
    @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
    @Getter("Authenticated/token") getToken: () => Promise<Object>;
    @Getter("usergroup/getGroupPermissions") getGroupPermissions: () => Promise<Object>;

    
    mounted(){
        let user: Object = this.getAuthUser;
        let token: Object = this.getToken;
        let permission: Object = this.getGroupPermissions[0]['group_permission']['category'];
        if(user['type'] == "admin" && token['token'] && permission == true){
            this.$router.push({path: '/dashboard/Subcategory'}).catch(()=>{})
        }
        else if(user['type'] == "customer" && token['token'] && permission == true){
            this.$router.push({path: '/dashboard/Subcategory'}).catch(()=>{})
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