<template>
  <v-card flat tile class="transparent cards d-flex" width="99vw">
    <v-col cols="12" md="4" sm="4" class="d-flex col1 justify-start align-center pa-0">
      <v-text-field
        class="mt-6 custom-label-color"
        color="red"
        rounded
        solo
        label="Search anything"
        prepend-inner-icon="mdi-magnify"
      ></v-text-field>
    </v-col>
    <v-col cols="12" md="8" sm="8" class="d-flex justify-end align-center">
      <v-badge color="error" dot overlap>
        <v-icon class="col1">mdi-bell-outline</v-icon>
      </v-badge>
      <v-menu left offset-y rounded>
        <template v-slot:activator="{ attrs, on }">
          <v-btn
            rounded
            class="ma-5 px-1 btn d-flex align-center justify-space-between"
            v-bind="attrs"
            v-on="on"
          >
            <v-icon class="user">mdi-account</v-icon>
            <h6 class="mt-3 font-weight-bold">{{userName}}</h6>
            <v-icon>mdi-chevron-down</v-icon>
          </v-btn>
        </template>

        <v-list  class="list">
          <v-list-item v-show="userType == 'admin'" v-for="(item,i) in user" :key="i" link>
            <v-list-item-title @click="showUserRecord(item)" class="title1" >{{ item.email }}</v-list-item-title>
          </v-list-item>

          <v-list-item v-for="(item,i) in items" :key="i+'A'" link>
            <v-list-item-title @click="logout(item)" class="title1" >{{ item }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

      <v-icon class="col1">mdi-cog-outline</v-icon>
    </v-col>
  </v-card>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Action, Getter } from "vuex-class";
@Component({})
export default class Topmenu extends Vue {
  @Action("orders/showOrder") showOrder!: (param:Object) => Promise<Array<Object>>;
  @Action("Authenticated/users") users!: () => Promise<Array<Object>>;
  @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
  @Getter("Authenticated/users") getUser: () => Promise<Array<Object>>;
  public userName: String = "";
  public userType: String = "";
  public user: any = [];
  // public allUsers: string = this.$store.getters.users;
  public items: any = ["theme change", "logout"];
  

  logout(item: any) {
    if (item == "logout") {
      window.sessionStorage.clear();
      alert("logout successfully");
      this.$router.push({ path: "/" });
    }
  }
  showUserRecord(payload:Object){
     console.log("Record is ",payload);
     
  }
  async mounted() {
    await this.users();
    this.userName = this.getAuthUser["name"];
    this.userType = this.getAuthUser["type"];
    this.user = this.getUser;
  }
}
</script>

<style scoped>
.title {
  font-size: 40px !important;
  color: #122932;
  font-weight: bold;
}

.title1 {
  color: #122932;
  font-weight: bold;
}

.list {
  background: #ffffff;
}

:deep(.mdi-cog-outline) {
  font-size: 28px !important;
  color: black;
}

:deep(.mdi-magnify) {
  /* font-size: 28px !important; */
  color: #2ebd6e;
}

:deep(.custom-label-color .v-label) {
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

.user {
  /* color: #2ebd6e !important; */
  font-size: 28px !important;
}

:deep(.mdi-bell-outline) {
  font-size: 28px;
  color: #2ebd6e;
}

:deep(.theme--dark.v-text-field--solo > .v-input__control > .v-input__slot) {
  background: #f8f8f8 !important;
}

.btn {
  background-color: #f8f8fa !important;
  color: #2ebd6e !important;
}

@media screen and (max-width: 1024px) {
  .cards {
    width: 75vw !important;
  }
}

@media screen and (max-width: 600px) {
  .col1 {
    display: none !important;
  }

  .cards {
    width: auto !important;
  }
}
</style>