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
                  <v-icon class="px-2">mdi-account-group</v-icon>User_Groups
                </h2>
              </v-toolbar-title>
            </v-col>
            <v-col class="d-flex align-center justify-end">
              <v-text-field v-model="search" class="custom-label-color mr-5" hide-details single-line color="red" dense
                solo label="Search anything" prepend-inner-icon="mdi-magnify"></v-text-field>
              <v-btn class="btn" @click="dialog = true">New Group</v-btn>
            </v-col>
          </v-row>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card class="dialog">
              <v-card-title class="black--text text-h5">Are you sure you want to delete this group?</v-card-title>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteGroupConfirm">OK</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editGroup(item)">mdi-pencil</v-icon>
        <v-icon small @click="deleteGroup(item)">mdi-delete</v-icon>
      </template>
    </v-data-table>

    <AddUserGroupDialog v-if="dialog" :dialog="dialog" :selectedItem="selectedItem" :editedIndex="editedIndex"
      @close-dialog="close" @show-data="showData" />
    <!-- </v-card> -->
  </section>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import axios from "axios";
import { Action, Getter } from "vuex-class";
import AddUserGroupDialog from "../Dialogs/AddUserGroupDialog.vue";

@Component({
  components: {
    AddUserGroupDialog
  }
})
export default class usersgroup extends Vue {
  @Action("usergroup/deleteeGroup") delete!: (
    params: number
  ) => Promise<Array<Object>>;
  @Action("usergroup/showGroup") show!: () => Promise<Array<Object>>;
  @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
  @Action("usergroup/groupPermission") groupPermission!: (params: Object) => Promise<Array<Object>>;


  // public groupID: number;
  public selectedItem: Object = {};
  public search: any = "";
  public input: any = [];
  public dialog: Boolean = false;
  public dialogDelete: Boolean = false;
  public headers: Array<Object> = [
    {
      text: "id",
      align: "start",
      sortable: false,
      value: "id"
    },
    { text: "name", value: "name" },
    { text: "Actions", value: "actions" }
  ];

  public data: any = [];
  public editedIndex: any = -1;
  public Id: any;
  public editedGroup: Object = {
    name: "",
    group_permission: {
      users: false,
      user_group: false,
      category: false
    }
  };

  public defaultItem: Object = {
    name: "",
    group_permission: {
      users: false,
      user_group: false,
      category: false
    }
  };
  // public GroupPermission: Object = {};
  public editGroup(item: any): void {
    debugger;
    this.editedIndex = this.data.indexOf(item);
    this.selectedItem = item
    this.dialog = true;
  }

  public deleteGroup(item: any): void {
    this.editedIndex = this.data.indexOf(item);
    this.dialogDelete = true;
  }

  public deleteGroupConfirm(): void {
    this.Id = this.data[this.editedIndex]["id"];
    this.delete(this.Id).then(Response => {
      if (Response["success"] == true) {
        this.data.splice(this.editedIndex, 1);
      } else {
        alert("not deleted");
      }
    });
    this.closeDelete();
  }



  public close(): void {
    this.showData();
    this.dialog = false;
    this.$nextTick(() => {
      this.editedGroup = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });

  }

  public showData() {
    let user: Object = this.getAuthUser;
    this.show().then(Response => {
      debugger
      return this.data = Response["Usergroup"];
    });
    debugger
    this.groupPermission(user).then(res => {
      console.log("Permisisons", res['data']);
    });
  }

  public closeDelete(): void {
    this.dialogDelete = false;
    this.$nextTick(() => {
      this.editedGroup = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
  }


  mounted() {
    this.showData();
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

:deep(.mdi-account-group) {
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

:deep(td) {
  font-size: 20px !important;
  vertical-align: middle;
}

:deep(.theme--dark.v-label) {
  color: black !important;
}

:deep(.v-input--selection-controls .v-input__slot > .v-label, .v-input--selection-controls .v-radio > .v-label) {
  margin-top: 9px !important;
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