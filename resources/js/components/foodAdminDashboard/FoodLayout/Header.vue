<template>
    <section class="banner">
        <div>
            <v-app-bar height="90" id="Desktop" class="topBar px-0">
                <div class="d-flex align-center px-0">
                    <v-toolbar flat tile class="white px-0">
                        <v-col class="d-flex align-center px-0">
                            <h4 class="d-flex align-center"><v-icon>mdi-view-dashboard</v-icon> INVENTORY</h4>
                        </v-col>
                        <v-icon class="mt-n1" v-if="dialog == false"
                            v-on:click="(dialog = !dialog)">mdi-chevron-double-right</v-icon>
                        <v-icon class="mt-n1" v-if="dialog == true"
                            v-on:click="(dialog = !dialog)">mdi-chevron-double-left</v-icon>
                        <v-divider vertical class="divider ml-5"></v-divider>
                    </v-toolbar>
                    <TopMenu class="ml-5" />
                    <v-badge offset-x="50%" offset-y="13" color="#E4002B" :content="total()">
                        <v-icon @click="drawer = true">mdi-cart</v-icon>
                    </v-badge>
                </div>
            </v-app-bar>
            <v-navigation-drawer v-model="dialog" app class=" sideBar" height="100%">
                <Sidebar />
            </v-navigation-drawer>
            <v-navigation-drawer v-model="drawer" class="cart white"  temporary app height="100%" width="450" right >
                <cartSidebar />
            </v-navigation-drawer>
        </div>
        <v-main class="main">
            <!-- <v-container> -->

            <v-row>
                <v-col>
                    <router-view></router-view>
                </v-col>
            </v-row>
            <!-- </v-container> -->
        </v-main>
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
const Sidebar = () => import('../FoodLayout/Sidebar.vue');
const cartSidebar = () => import('../FoodLayout/cartSidebar.vue');
const TopMenu = () => import('../FoodLayout/Topmenu.vue');
@Component({
    components: {
        Sidebar,
        TopMenu,
        cartSidebar
    }
})
export default class Header extends Vue {
    public dialog: Boolean = true;
    public drawer: Boolean = false;
    total(){
      if( this.$store.getters.GetCartItems.length>0){
        return this.$store.getters.GetCartItems.length
      }
      else{
        return "0"
      }
    }
}
</script>

<style scoped>
.banner {
    background-size: cover;
    background-position: center center;
    max-height: 100%;

}

h4 {
    color: #122932;
    font-weight: bold;
}
.cart{
    top: 90px !important;
}

:deep(.mdi-view-dashboard) {
    color: #2ebd6e;
    font-size: 30px;
}

:deep(.mdi-cart) {
    color: #2ebd6e;
    font-size: 30px;
}

h3 {
    color: rgb(32, 38, 57);
}

.sideBar {
    top: 90px !important;
    background: white;


}

.btn {
    background-color: #f8f8fa !important;
    color: #122932 !important;
}

:deep(.mdi-chevron-double-right) {
    font-size: 40px;
    color: #2ebd6e;

}

:deep(.mdi-chevron-double-left) {
    font-size: 40px;
    color: #2ebd6e;

}

.topBar {
    position: fixed;
    z-index: 9999;
    background: white !important;
}

.main {
    position: relative;
    top: 90px !important;
}

.divider {
    background-color: lightgray;
}

:deep(.v-toolbar__content) {
    padding-left: 12px !important;

}
</style>