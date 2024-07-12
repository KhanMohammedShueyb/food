<template>
  <v-container>
    <v-card flat tile class="white">
      <div class="d-flex justify-center align-center">
        <v-badge offset-x="50%" offset-y="13" color="#E4002B" :content="total()">
          <v-icon color="#2ebd6e">mdi-cart</v-icon>
        </v-badge>
        <v-card-title class="text-h5 white black--text" align="center">
          <b>Your Bucket</b>
        </v-card-title>
        <v-spacer></v-spacer>
        <v-card-title class="text-h5 white black--text" align="center">
          <b>Rs {{ totalP() }}</b>
        </v-card-title>
        <v-btn color="#2ebd6e" append text align="center">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </div>
    </v-card>

    <v-card flat v-show="true" color="#f8f8f8 " class="mt-4 mb-5 main-card-nav">

      <v-card flat color="#f8f8f8 " class="mb-1" v-for="(item, index ) in data" :key="index">

        <v-col class="pa-0">
          <v-list v-show="true" subheader two-line>
            <v-list-item>
              <v-list-item-avatar tile size="70">
                <!-- <v-icon class="grey lighten-1" dark>  </v-icon> -->
                <v-img :src="item['item'].Image"></v-img>
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title class="d-flex justify-space-between black--text">
                  <h4>{{ item['item'].Name }}</h4>
                  <h4>Rs{{ item['item'].Price }}</h4>
                </v-list-item-title>
                <v-list-item-subtitle class="d-flex align-center pt-2 black--text" align="center">
                  <v-icon @click="removeItem(index)" v-show="item['qty'] == 1" size="20" color="#E4002B" class="mr-5">
                    mdi-delete-outline
                  </v-icon>
                  <v-icon @click="minusQty(item)" v-show="item['qty'] > 1" size="20" color="#E4002B" class="mr-5">
                    mdi-minus
                  </v-icon>
                  <h6 class="pr-5">{{ item['qty'] }}</h6>
                  <v-icon @click="addQty(item)" size="20" color="#E4002B">
                    mdi-plus
                  </v-icon>
                  <v-spacer></v-spacer>
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-col>
        <v-divider class="divider"></v-divider>
      </v-card>
      <v-card flat class="cart" align="center" color="#f8f8f8 " v-show="data.length < 1 ? true : false">
        <v-icon color="#2ebd6e">mdi-cart</v-icon>
        <v-card-text style="font-size: 20px" class="font-weight-bold black--text">You haven’t added any items in bucket
          yet..</v-card-text>
      </v-card>
    </v-card>

    <v-card flat color="black">
      <v-btn v-on:click="gotobucket()" block color="#E4002B" class="white--text cart-btn" large>View Bucket</v-btn>
    </v-card>
  </v-container>
</template>

<script lang="ts">

import { Component, Vue } from 'vue-property-decorator';
@Component({
})
export default class cartSidebar extends Vue {
  public data: Array<Object> = []
  public active: Boolean = true
  public qty: any = 1
  public totals: any = 0
  gotobucket() {
    this.$router.push({ path: '/bucket' })
  }
  addQty(item: any) {

    return item['qty'] += 1

  }
  minusQty(item: any) {
    if (item['qty'] > 0) {
      return item['qty'] -= 1
    }
  }
  removeItem(index: number) {

    const y = this.$store.getters.GetCartItems.indexOf(this.$store.getters.GetCartItems[index])
    this.$store.getters.GetCartItems.splice(y, 1)
  }
  totalP(): number {

    this.$store.dispatch('TotalPrice', this.qty)
    return this.$store.getters.GetTotalPrice
  }
  mounted() {
    this.data = this.$store.getters.GetCartItems
    this.$store.dispatch('TotalPrice', this.qty)
  }
  total() {
    if (this.data.length > 0) {
      return this.data.length
    }
    else {
      return "0"
    }
  }
}
</script>

<style scoped>
/* .main-card-nav {
  height: 410px;
  overflow-y: scroll;
  overscroll-behavior-y: auto;
} */
.divider {
  background: lightgrey;
}
</style>