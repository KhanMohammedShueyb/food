<template>
  <section class="mt-3">
    <!-- <v-card class="rounded white pa-5"> -->
    <v-data-table show-select flat tile :search="search" :headers="headers" :items="data" sort-by="id"
      class="elevation-1 table">
      <template v-slot:top>
        <v-toolbar class="white" tile flat>
          <v-row>
            <v-col>
              <v-toolbar-title>
                <h2 class="d-flex align-center">
                  <v-icon class="px-2">mdi-shape-outline</v-icon>Subcategories
                </h2>
              </v-toolbar-title>
            </v-col>
            <v-col class="d-flex align-center justify-end">
              <v-text-field v-model="search" class="custom-label-color mr-5" hide-details single-line color="red" dense
                solo label="Search anything" prepend-inner-icon="mdi-magnify"></v-text-field>
              <v-btn class="btn" @click="dialog = true">New Item</v-btn>
            </v-col>
          </v-row>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card class="dialog">
              <v-card-title class="black--text text-h5">Are you sure you want to delete this item?</v-card-title>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
        <v-icon small @click="deleteItem(item)">mdi-delete</v-icon>
      </template>
      <template v-slot:item.image="{ item }">
        <v-avatar>
          <img :src="item.image" alt="John" />
        </v-avatar>
      </template>
    </v-data-table>
    <AddSubcategoryDialog v-if="dialog" :dialog="dialog" :selectedItem="selectedItem" :editedIndex="editedIndex"
      @close-dialog="close" />
  </section>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import axios from "axios";
import AddSubcategoryDialog from "../Dialogs/AddSubcategoryDialog.vue";
import { Action } from "vuex-class";

@Component({
  components:{
    AddSubcategoryDialog
  }
})
export default class subcategories extends Vue {
  @Action("subcategories/showSubcategory") show!: () => Promise<Array<Object>>
  @Action("subcategories/deleteSubcategory") delete!: (
    params: number
  ) => Promise<Array<Object>>;
  public selectedItem: Object = {};
  public search: any = "";
  public input: any = [];
  public dialog: Boolean = false;
  public a: Boolean = false;
  public dialogDelete: Boolean = false;
  public headers: Array<Object> = [
    {
      text: "Id",
      align: "start",
      sortable: false,
      value: "id"
    },
    { text: "Image", value: "Image" },
    { text: "Name", value: "Name" },
    { text: "Description", value: "Description" },
    { text: "Category_id", value: "category_id" },
    { text: "Actions", value: "actions", sortable: false }
  ];
  public data: Array<Object> = [];
  public Id: any;
  public editedIndex: any = -1;
  public editedItem: Object = {
    Image: "",
    Name: "",
    Description: "",
    category_id: null
  };
  public defaultItem: Object = {
    Image: null,
    Name: null,
    Description: null,
    category_id: null
  };
  public editItem(item: any): void {
    this.selectedItem = item
    this.editedIndex = this.data.indexOf(item);
    this.editedItem = Object.assign({}, item);
    this.dialog = true;
  }

  public deleteItem(item: any): void {
    this.editedIndex = this.data.indexOf(item);
    this.editedItem = Object.assign({}, item);
    this.dialogDelete = true;
  }

  public deleteItemConfirm(): void {
    this.Id = this.data[this.editedIndex]["id"];
    debugger;
    this.delete(this.Id).then(Response => {
      if (Response['success'] == true) {
        this.data.splice(this.editedIndex, 1);
      }
      else {
        alert('not Deleted')
      }
    });
    this.closeDelete();
  }
  public close(): void {
    this.dialog = false;
    this.$nextTick(() => {
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
    this.show().then((Response) => {
      this.data = Response['Subcategory'];
    });
  }

  public closeDelete(): void {
    this.dialogDelete = false;
    this.$nextTick(() => {
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
  }
  mounted() {
    this.show().then((Response) => {
      this.data = Response['Subcategory'];
    });
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

:deep(.mdi-shape-outline) {
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

:deep(.v-data-footer__select .v-select__selections .v-select__selection--comma) {
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

:deep(.v-select__selection--comma) {
  color: black !important;
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