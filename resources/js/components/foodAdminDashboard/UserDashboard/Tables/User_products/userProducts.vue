<template>
  <section class="mt-3">
    <!-- <v-card class="rounded white pa-5"> -->
    <v-data-table
      show-select
      flat
      tile
      :search="search"
      :headers="headers"
      :items="data"
      sort-by="id"
      class="elevation-1 table"
    >
      <template v-slot:top>
        <v-toolbar class="white" tile flat>
          <v-row>
            <v-col>
              <v-toolbar-title>
                <h2 class="d-flex align-center">
                  <v-icon class="px-2">mdi-view-list</v-icon>User
                  Products
                </h2>
              </v-toolbar-title>
            </v-col>
            <v-col class="d-flex align-center justify-end">
              <v-text-field
                v-model="search"
                class="custom-label-color mr-5"
                hide-details
                single-line
                color="red"
                dense
                solo
                label="Search anything"
                prepend-inner-icon="mdi-magnify"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-btn color="btn" v-on:click="addToCart(item)">Add to Cart</v-btn>
      </template>
      <template v-slot:item.image="{ item }">
        <v-avatar>
          <img :src="item.Image" alt="John" />
        </v-avatar>
      </template>
    </v-data-table>
    <!-- </v-card> -->
  </section>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { computed } from "vue";
import { Action,Getter } from "vuex-class";

@Component({})
export default class Userproducts extends Vue {
    // @Action("product/GetProducts") GetProducts: () => Promise<Array<object>>;  
    @Getter("auth/authenticatedUser") authenticatedUser: () => Promise<Array<object>>
      
  public selected: any = [];
  public search: any = "";
  public input: any = [];
  public dialog: Boolean = false;
  public active: Boolean = false;
  public qty: number = 1;

  public dialogDelete: Boolean = false;
  public headers: Array<Object> = [
    {
      text: "id",
      align: "start",
      sortable: false,
      value: "id"
    },
    { text: "image", value: "Image" },
    { text: "name", value: "Name" },
    { text: "item_Group", value: "Item_Group" },
    // { text: "Quantity", value: "Quantity" },
    { text: "price", value: "Price" },
    { text: "description", value: "Description" },
    { text: "actions", value: "actions", sortable: false }
  ];
  public editedIndex: any = -1;
  public data : Array<Object> = []

   public addToCart(item:any){
       this.$store.dispatch('getData',{item:item,id:item.id,qty:this.qty})
       this.$store.dispatch('TotalPrice',{id:item.id})
  }
 mounted() {
  debugger
    debugger
    this.$store.dispatch('GetProducts').then((res) => {
        debugger
        if(res){
            this.data = this.$store.getters.ProductsGet.Product
        }
    })
    this.authenticatedUser
  }
}
</script>

<style scoped>
.card1 {
  border-radius: 20px !important;
  background-color: #f8f8f8;
}

:deep(.theme--dark.v-text-field--solo > .v-input__control > .v-input__slot) {
  background: #f8f8f8 !important;
}

span {
  color: #122932;
  font-weight: bold !important;
}

.dialog {
  background-color: #f9f9fb !important;
}

.titlee {
  background-color: #f8f8fa;
}

.btn {
  color: #2ebd6e;
  background-color: #f8f8fa !important;
  font-weight: bold !important;
}

.mdi-view-list {
  font-size: 50px;
  color: #2ebd6e;
}

:deep(.mdi-camera) {
  /* font-size: 50px; */
  color: #2ebd6e;
}

:deep(.v-data-footer__icons-before) {
  /* font-size: 50px !important; */
  background-color: #2ebd6e !important;
}

:deep(.v-data-footer__icons-after) {
  background-color: #2ebd6e !important;
}

:deep(.v-data-footer__select
    .v-select__selections
    .v-select__selection--comma) {
  color: black;
}

:deep(.mdi-menu-down::before) {
  background-color: #2ebd6e !important;
}

:deep(.mdi-pencil) {
  font-size: 30px !important;
  color: #2ebd6e;
}

:deep(.mdi-delete) {
  font-size: 30px !important;
  color: red;
}

:deep(.mdi-magnify) {
  color: #2ebd6e;
}

:deep(.custom-label-color) {
  max-width: 60%;
}

:deep(.mdi-checkbox-blank-outline) {
  color: #2ebd6e;
}

:deep(.custom-label-color .v-label) {
  color: #122932;
  opacity: 1;
}

:deep(.label-color .v-label) {
  color: #122932;
  opacity: 1;
}

:deep(.custom-label-color .v-input) {
  color: #122932;
  opacity: 1;
}

:deep(.v-input input) {
  max-height: 32px;
  color: black;
}

.table {
  background-color: transparent;
  color: #122932;
}

h2 {
  color: #122932;
  font-weight: bold;
}

:deep(thead) {
  background: #f9f9fb !important;
  height: 60px !important;
}

:deep(th) {
  /* color: #122932 !important; */
  color: #2ebd6e !important;
  font-size: 20px !important;
  position: relative;
  font-weight: bold;
  vertical-align: middle !important;
}

:deep(tbody tr) {
  height: 80px;
  border-top: 2px solid #def2e7;
}

:deep(tbody) {
  margin: 80px !important;
}

:deep(td) {
  font-size: 20px !important;
  vertical-align: middle;
}

@media screen and (max-width: 600px) {
  :deep(tbody tr) {
    height: auto;
    border-top: 2px solid #def2e7;
  }
}

/* @media screen and (max-width:1024px){
    .borders{
        width: auto !important;
        height: auto !important;
    }
} */
</style>