<template>
    <v-app class="zooom">
        <flash-message class="myCustomClass"></flash-message>
        <router-view></router-view>
    </v-app>
</template>

<script lang="ts">
import 'animate.css'
import { Component, Vue } from 'vue-property-decorator'

import Vuetify from 'vuetify/lib'
@Component
export default class App extends Vue {
    
}
</script>
<style>
.zooom
{
    zoom: 80%;
}
.myCustomClass {
  z-index: 99 !important;
  position: fixed;
  right: 20px;
  color: white;
}
</style>
