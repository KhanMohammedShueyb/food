<template>
     <v-menu
      v-for="([text, rounded], index) in btns"
      :key="text"
      :rounded="rounded"
      offset-y
    >
      <template v-slot:activator="{ attrs, on }">
        <v-btn
          class="white--text ma-5"
          v-bind="attrs"
          v-on="on"
        >
          {{ text }} Radius
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          v-for="item in items"
          :key="item"
          link
        >
          <v-list-item-title v-text="item"></v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
</template>
<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class AccountMenu extends Vue {
     public Categ: Array<Object> = [
          { id: 0, text: 'Theme Change', icon: 'mdi-shape' },
          { id: 1, text: 'Logout', icon: 'mdi-shape' },
     ]
}
</script>
<style scoped>
.title {
    font-size: 20px !important;
    color: #122932;
}

</style>