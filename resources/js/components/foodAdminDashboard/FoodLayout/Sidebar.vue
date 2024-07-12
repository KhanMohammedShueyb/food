<template>
  <v-card flat tile class="transparent">
    <v-list dense class="list">
      <v-list-item-group color="primary">
        <v-list-item
          v-on:click="redirectTo(item)"
          v-for="(item, i) in items"
          :key="i"
          class="mt-7 transparent"
        >
          <v-list-item-icon>
            <v-icon v-text="item['icon']"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title class="title" v-text="item['text']"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item
          v-show="show"
          v-on:click="redirectTo(item)"
          v-for="(item, i) in items1"
          :key="i+'b'"
          class="mt-7 transparent"
        >
          <v-list-item-icon>
            <v-icon v-text="item['icon']"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title class="title" v-text="item['text']"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>

      <v-list-group :value="false" prepend-icon="mdi-shape" class="mt-7">
        <template v-slot:activator>
          <v-list-item-title class="title">Categories</v-list-item-title>
        </template>
        <v-list-item
          v-on:click="redirectTo(item)"
          v-for="(item, i) in Categ"
          :key="i"
          class="mt-7 ml-3"
          link
        >
          <v-list-item-icon>
            <v-icon v-text="item['icon']"></v-icon>
          </v-list-item-icon>
          <v-list-item-title class="title" v-text="item['text']"></v-list-item-title>
        </v-list-item>
      </v-list-group>
    </v-list>
  </v-card>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Getter } from "vuex-class";
@Component({})
export default class Sidebar extends Vue {
  @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
  @Getter("Authenticated/token") getToken: () => Promise<Object>;
    @Getter("usergroup/getGroupPermissions") getGroupPermissions: () => Promise<Object>;

  public show: any = true;
  public GPermission:Object = {}
  public items: Array<Object> = [
    { id: 0, text: "Dashboard", icon: "mdi-view-dashboard" },
    { id: 1, text: "Offers", icon: "mdi-offer" },
    { id: 2, text: "Products", icon: "mdi-view-list" },
    { id: 3, text: "Orders", icon: "mdi-truck" },
    { id: 3, text: "Orderdetails", icon: "mdi-details" },
  ];
  public items1: Array<Object> = [
    { id: 0, text: "Users", icon: "mdi-account" },
    { id: 1, text: "UserGroups", icon: "mdi-account-group" },
    { id: 2, text: "UserGroupPermissions", icon: "mdi-account-convert" },
  ];

  public Categ: Array<Object> = [
    { id: 0, text: "Category", icon: "mdi-shape" },
    { id: 1, text: "Subcategory", icon: "mdi-shape" }
  ];
  redirectTo(item: any) {
    if (item["text"] == "Category") {
      this.$router.push({ path: "/dashboard/Category" }).catch(() => {});
    } else if (item["text"] == "Subcategory") {
      this.$router.push({ path: "/dashboard/Subcategory" }).catch(() => {});
    } else if (item["text"] == "Dashboard") {
      this.$router.push({ path: "/dashboard" }).catch(() => {});
    } else if (item["text"] == "Offers") {
      this.$router.push({ path: "/dashboard/Offerss" }).catch(() => {});
    } else if (item["text"] == "Orders") {
      this.$router.push({ path: "/dashboard/Orderss" }).catch(() => {});
    } else if (item["text"] == "Orderdetails") {
      this.$router.push({ path: "/dashboard/Orderdetails" }).catch(() => {});
    } else if (item["text"] == "Users") {
      this.$router.push({ path: "/dashboard/Userss" }).catch(() => {});
    } else if (item["text"] == "Products") {
      this.$router.push({ path: "/dashboard/Productss" }).catch(() => {});
    } else if (item["text"] == "UserGroups") {
      this.$router.push({ path: "/dashboard/Usergroup" }).catch(() => {});
    } else if (item["text"] == "UserGroupPermissions") {
      this.$router.push({ path: "/dashboard/UserGroupPermission" }).catch(() => {});
    } 
  }

  public token: Object = this.$store.getters.token;

  mounted() {
    let user: Object = this.getAuthUser;
    let token: Object = this.getToken;
    this.GPermission = this.getGroupPermissions[0]['group_permission']['user_group'];
    if (user["type"] == "customer" && token["token"] && this.GPermission == true) {
      this.show = false;
    } else if (user["type"] == "admin" && token["token"] && this.GPermission == true) {
      this.show = true;
    }
    else{
      this.show = false;
    }
  }
}
</script>

<style scoped>
.title {
  font-size: 20px !important;
  color: #122932;
}

:deep(.mdi-view-dashboard) {
  color: #2ebd6e;
}

:deep(.mdi-shape) {
  color: #2ebd6e;
}

:deep(.mdi-offer) {
  color: #2ebd6e;
}

:deep(.mdi-view-list) {
  color: #2ebd6e;
}

:deep(.mdi-truck) {
  color: #2ebd6e;
}
:deep(.mdi-details) {
  color: #2ebd6e;
}

:deep(.mdi-account) {
  color: #2ebd6e;
}
:deep(.mdi-account-group) {
  color: #2ebd6e;
}
:deep(.mdi-account-convert) {
  color: #2ebd6e;
}

</style>