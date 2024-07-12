<template>
    <section>
        <v-card class="pa-3 rounded-xl borders" flat tile height="350px">
            <v-row>
                <v-col>
                    <h2>User Details</h2>
                </v-col>
                <v-col class="d-flex justify-end"><v-icon>mdi-dots-vertical</v-icon></v-col>
            </v-row>
            <v-row class="mt-5">
                <v-col class="pa-0">
                    <userinfo />
                </v-col>
            </v-row>
        </v-card>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import userinfo from './Userdetails/Userinfo.vue'

@Component({
    components: {
       userinfo
    }
})
export default class Userinfo extends Vue {

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