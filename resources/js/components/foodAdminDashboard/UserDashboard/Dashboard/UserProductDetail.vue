<template>
    <section class="mt-3">
        <v-card class="pa-3 rounded-xl borders" flat tile width="auto">
            <v-row>
                <v-col cols="12" md="9">
                    <h2>User Product Details</h2>
                </v-col>
                <v-col cols="12" md="3" class="d-flex justify-end"><v-icon>mdi-dots-vertical</v-icon></v-col>
            </v-row>

            <v-col class="d-flex justify-space-around px-0">
                <v-row>
                    <v-col>
                      <userProdDetails />
                    </v-col>
                </v-row>

            </v-col>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import userProdDetails from './UserProductDetails/userProdDetails.vue'
@Component({
    components: {
     userProdDetails
    }
})
export default class userProductdetail extends Vue {
    

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

:deep(.mdi-dots-vertical) {
    color: #122932;
}

@media screen and (max-width:600px) {
    .borders {
        width: auto !important;
        height: auto !important;
    }
}
@media screen and (max-width:1024px) {
    .borders {
        width: auto !important;
        height: auto !important;
    }
}
</style>