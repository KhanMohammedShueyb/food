<template>
    <section class="mt-3">
        <v-card class="pa-3 rounded-xl borders" flat tile width="auto" height="380px">
            <v-row>
                <v-col>
                    <h2>No. Of Users</h2>
                </v-col>
                <v-col class="d-flex justify-end"><v-icon>mdi-dots-vertical</v-icon></v-col>
            </v-row>
            
            <v-col class="d-flex justify-space-around px-0">
                <v-row>
                    <v-col><Totalcustomer /></v-col>
                    <v-col><Totalsupliers /></v-col>
                </v-row>
                
            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Totalcustomer from '../DashboardComponents/Users/Totalcustomers.vue'
import Totalsupliers from '../DashboardComponents/Users/Totalsupliers.vue'
@Component({
    components:{
        Totalcustomer,
        Totalsupliers
    }
})
export default class Users extends Vue {
}
</script>

<style scoped>
.borders{
    border: 3px solid white;
    background-color: white;
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