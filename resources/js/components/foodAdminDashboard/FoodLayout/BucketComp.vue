<template>
  <section style="background: #f8f8f8;">
    <v-card class="d-flex justify-center align-center" flat tile color="#f8f8f8">
      <v-card width="600" color="#f8f8f8" flat tile>
        <v-stepper class="rounded-xl mt-5 white" alt-labels value="2">
          <v-stepper-header>
            <v-stepper-step step="1" complete class="white--text" color="#2ebd6e">
              <h3 class="black--text font-weight-bold">Menu</h3>
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step step="2" class="white--text" color="#2ebd6e">
              <h3 class="black--text font-weight-bold">Bucket</h3>
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step complete step="3" class="black--text font-weight-bold" color="#c10204">
              <h3 class="black--text font-weight-bold">Checkout</h3>
            </v-stepper-step>
          </v-stepper-header>
        </v-stepper>
      </v-card>
    </v-card>
    <v-card class="mt-16" color="#f8f8f8" flat>
      <v-row>
        <v-col cols="12" md="8">
          <v-card v-for="(item, index) in data" :key="index" class="white rounded-xl mb-5">
            <v-row>
              <v-col cols="12" md="3" sm="5">
                <v-card v-show="true" flat tile class="white d-flex justify-center rounded-xl">
                  <v-col d-flex justify-center class="d-flex justify-center px-2">
                    <v-avatar tile size="100" class="d-flex justify-center pl-2">
                      <v-img src="/food.webp"></v-img>
                    </v-avatar>
                  </v-col>
                </v-card>
              </v-col>
              <v-col class="d-flex" cols="12" md="3" sm="3">
                <v-card class="justify-center white--text" color="white" flat tile>
                  <v-card-title>
                    <h3 class="black--text font-weight-bold">Name</h3>
                  </v-card-title>

                  <v-col class="pa-0 ma-0">
                    <v-card-subtitle class="ma-0 pa-0" style="color: #747170">
                      <h4 class="d-flex justify-center pa-0 ma-0 black--text">{{ item["item"]["Name"] }}</h4>
                    </v-card-subtitle>
                  </v-col>
                </v-card>
              </v-col>
              <v-col class="d-flex" cols="12" md="3" sm="3">
                <v-card class="justify-center align-center white--text" color="white" flat tile>
                  <v-card-title>
                    <h3 class="black--text font-weight-bold">Qunatity</h3>
                  </v-card-title>
                  <v-col class="pa-0 ma-0">
                    <v-card-subtitle class="d-flex pa-0 justify-center white--text">
                      <h4 class="pr-3 py-0 black--text">{{ item["qty"] }}</h4>
                    </v-card-subtitle>
                  </v-col>
                </v-card>
              </v-col>
              <v-col class="d-flex" cols="12" md="3" sm="4">
                <v-card class="white rounded-xl" flat tile>
                  <v-card-title class="black--text">
                    <h3 class="black--text font-weight-bold">Rs {{ pricePerItem(item) }}</h3>
                  </v-card-title>
                  <v-card-actions class="d-flex justify-center">
                    <v-icon color="#e4002b" @click="removeItem(index)">mdi-delete-outline</v-icon>
                  </v-card-actions>
                </v-card>
              </v-col>
            </v-row>
          </v-card>

          <v-card flat class="cart" align="center" color="#f8f8f8 " v-show="data.length < 1 ? true : false">
            <v-icon color="#2ebd6e">mdi-cart</v-icon>
            <v-card-text style="font-size: 20px" class="font-weight-bold black--text">You haven’t added any items in
              bucket yet..</v-card-text>
          </v-card>


        </v-col>
        <v-spacer></v-spacer>
        <v-col cols="12" md="4">
          <v-card flat class="rounded-xl white">
            <v-col class="pt-10">
              <v-text-field v-model="Order['shipping_address']" solo label="Shipping address"
                append-icon="mdi-map-marker"></v-text-field>
            </v-col>
            <v-col class="">
              <v-text-field v-model="Order['office_type']" solo label="Office type"></v-text-field>
            </v-col>
            <v-col class="">
              <v-text-field v-model="Order['flat_no']" solo label="Flat no"></v-text-field>
            </v-col>
            <v-col class="">
              <v-text-field v-model="Order['street']" solo label="Street"></v-text-field>
            </v-col>
            <v-col class="">
              <v-text-field v-model="Order['city']" solo label="City"></v-text-field>
            </v-col>
            <v-col class="">
              <v-text-field v-model="Order['phno']" solo label="Contact Number"></v-text-field>
            </v-col>
            <v-col class="">
              <v-text-field v-model="Order['zipcode']" solo label="Zipcode  "></v-text-field>
            </v-col>
            <v-col v-show="data.length >= 1 ? true : false">
              <v-btn @click="checkout()" block large class="white--text" color="#e4002b">Proceed to Checkout</v-btn>
            </v-col>
          </v-card>
          <v-card height="80" class="mt-10 rounded-xl d-flex justify-center align-center white">
            <v-row>
              <v-col cols="12" md="6">
                <h3 class="px-3 black--text font-weight-bold">Subtotal</h3>
              </v-col>
              <v-col cols="12" md="6" class="d-flex justify-end">
                <h3 class="px-3 black--text">Rs {{ totalP() }}</h3>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-card>



  </section>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Action, Getter } from "vuex-class";

@Component({})
export default class bucketpage extends Vue {
  @Action('orders/createOrder') createOrder!: (param: object) => Promise<object>
  @Getter('Authenticated/authenticatedUser') get:() => Promise<object>
  public data: Array<Object> = [];
  public OrderedItems: Array<Object> = [];
  public Order: Object =
    {
      Items: {},
      shipping_address: "",
      office_type: "",
      flat_no: "",
      street: "",
      city: "",
      zipcode: "",
      phno: "",
      totalprice: ""
    };

  removeItem(index: number) {

    const y = this.$store.getters.GetCartItems.indexOf(
      this.$store.getters.GetCartItems[index]
    );
    this.$store.getters.GetCartItems.splice(y, 1);
  }
  pricePerItem(item: any) {

    var x = item.qty * item.item.Price;
    return x;
  }
  totalP(): number {

    return this.$store.getters.GetTotalPrice;
  }
  checkout() {
    const obj = this.get;
    alert("Your Order is placed Successfully :)");
    debugger
    this.Order['totalprice'] = this.totalP();
    this.Order['Items'] = this.data;
    this.Order['user_id'] = obj['id']
    this.OrderedItems.push(this.Order);
    debugger
    this.createOrder(this.Order);
  }
  mounted() {
    this.data = this.$store.getters.GetCartItems;
  }
}
</script>

<style scoped>
.btn {
  color: #2ebd6e;
  background-color: #f8f8fa !important;
  font-weight: bold;
}

.card1 {
  border: 2px solid red;
}

.theme--light.v-stepper .v-stepper__header .v-divider {
  border-color: #e4002b;
  margin-top: 50px !important;
}

:deep(.v-stepper__step__step) {
  font-size: 1.2rem !important;
  height: 50px !important;
  width: 50px !important;
}

.v-stepper__header .v-divider {
  margin: 50px -60px 0;
  background-color: #2ebd6e;
}

:deep(.theme--light.v-stepper .v-stepper__step:not(.v-stepper__step--active):not(.v-stepper__step--complete):not(.v-stepper__step--error) .v-stepper__step__step) {
  background: rgba(228, 0, 43, 0.38);
}

:deep(.v-text-field .v-counter) {
  margin-left: 8px !important;
  font-size: 16px !important;
  margin-top: 3px !important;
  color: white !important;
}

:deep(.v-text-field .v-label) {
  transform-origin: top left !important;
  font-weight: bold !important;
  color: #afa89e !important;
}

:deep(.v-input--selection-controls__input + .v-label) {
  color: white;
  font-weight: bold;
}

:deep(.v-text-field > .v-input__control > .v-input__slot) {
  background-color: #747170;
}

:deep(.mdi-checkbox-blank-outline) {
  color: #2ebd6e;
  position: relative;
  bottom: 4px !important;
}

:deep([data-v-476ee4c2] .v-input--selection-controls__input + .v-label) {
  color: black !important;
}
</style>
