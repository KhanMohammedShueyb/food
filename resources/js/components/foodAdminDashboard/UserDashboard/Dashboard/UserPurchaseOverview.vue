<template>
    <section>
        <v-card class="pa-3 rounded-xl borders" flat tile height="350px">
            <v-row>
                <v-col>
                    <h2>Purchase Overview</h2>
                </v-col>
                <v-col class="d-flex justify-end"><v-icon>mdi-dots-vertical</v-icon></v-col>
            </v-row>
            <v-row class="mt-5">
                <v-col class="pa-0 d-flex justify-center">
                    <div>
                        <TotalPurchase />
                        <v-divider class="divider"></v-divider>
                        <Cost class="mt-4" />
                    </div>
                </v-col>
                <v-divider vertical class="divider"></v-divider>
                <v-col class="pa-0 d-flex justify-center">
                    <div>
                        <CancelOrder />
                        <v-divider class="divider"></v-divider>
                        <Returns class="mt-4" />
                    </div>
                </v-col>
            </v-row>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import TotalPurchase from './UserPurchaseOverview/TotalPurchase.vue';
import Cost from './UserPurchaseOverview/Cost.vue';
import CancelOrder from './UserPurchaseOverview/CancelOrder.vue';
import Returns from './UserPurchaseOverview/Returns.vue';
@Component({
    components: {
        TotalPurchase,
        Cost,
        CancelOrder,
        Returns
    }
})
export default class PurchaseOverview extends Vue {

}
</script>

<style scoped>
.borders {
    border: 3px solid white;
    background: white;
}

h2 {
    color: #122932;
    font-weight: bold;
}

:deep(.mdi-dots-vertical) {
    color: #122932;

}
.divider{
    background: lightgrey;
}
@media screen and (max-width:600px){
    .borders{
        height: auto !important;
    }

}
@media screen and (max-width:1024px){
    .borders{
        height: auto !important;
    }

}
</style>