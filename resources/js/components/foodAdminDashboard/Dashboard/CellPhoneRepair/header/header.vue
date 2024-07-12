<template>
  <div class="section">
    <v-card flat tile color="white">
      <v-col cols="12" class="pa-0 tab-info">
        <v-app-bar flat tile class="white container-fluid">
          <v-toolbar-title class="d-flex align-center font-weight-bold black--text">
            <v-icon class="pr-3 blue--text font-weight-bold">mdi-clock</v-icon>
            Mon-Sat 9:00 Am - 7:00 Pm
          </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn class="black--text font-weight-bold" text>
            About US
          </v-btn>
          <v-btn class="black--text font-weight-bold " text>
            Contact US
          </v-btn>
          <v-btn class="black--text font-weight-bold" text>
            Shipping
          </v-btn>
          <v-btn class="black--text font-weight-bold" text>
            Create Account
          </v-btn>
        </v-app-bar>

      </v-col>
      <v-divider class="grey  mt-1 tab-info"></v-divider>

      <v-col cols="12" class="pa-0 pb-5 ">
        <v-card tile flat class="white container-fluid">
          <v-row class="container-fluid mobile-row">

            <v-col cols="12" md="4" lg="3" sm="3" class="img-col d-flex justify-center align-center">
              <v-btn @click="active = !active" class="blue ml-10 tab-btn"><v-icon
                  class="white--text text-h4">mdi-menu</v-icon></v-btn>
              <v-card flat tile class="transparent" width="100px">
                <v-img class="tab-img" contain height="120px" width="250px" src="mobile-repair-logo.png"></v-img>
              </v-card>
            </v-col>
            <v-col cols="12" md="4" lg="4" sm="6" class="d-flex justify-center tab-search align-center pa-0">
              <v-text-field height="60px" class="mt-6 search custom-label-color" rounded solo label="Search anything"
                prepend-inner-icon="mdi-magnify">

                <template class="temp" #append>
                  <v-btn class="btn" color="red" x-large rounded type="submit" value="Search">
                    Search
                  </v-btn>
                </template>
              </v-text-field>
            </v-col>

            <v-col cols="12" md="4" lg="5" sm="3" class="tab-pad pt-12">
              <v-row class="tab-info">
                <v-col class="py-0">
                  <v-card-subtitle class="blue--text font-weight-bold text-h6 pb-1 py-0">832-489-2386</v-card-subtitle>
                </v-col>
              </v-row>
              <v-row>
                <v-col class="py-0 tab-info">
                  <v-card-subtitle class="black--text text-h6 py-0">Sales@part4cells.com</v-card-subtitle>
                </v-col>
                <v-col class="d-flex align-center py-0 mobile">
                  <v-col class=" d-flex align-center pa-0">
                    <v-icon class="black--text font-weight-bold ">mdi-account</v-icon>
                    <v-btn class="black--text login-btn text-h6" text>
                      Login/Signup
                    </v-btn>
                    <v-divider class="grey" vertical></v-divider>
                  </v-col>
                  <v-col class="d-flex align-center pa-0">
                    <v-badge offset-x="40%" offset-y="13" class="badge" color="blue" :content="1">
                      <v-icon @click="drawer = true">mdi-cart</v-icon>
                    </v-badge>
                    <v-card-subtitle class="black--text tab-info  text-h6 py-0">
                      Cart
                      <v-icon>mdi-chevron-down</v-icon>
                    </v-card-subtitle>
                  </v-col>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-card>
      </v-col>

      <v-col cols="12" :class="{ show: active == true, hide: active == false }" class="pa-0 ">
        <v-card v-card tile flat class="tab-height blue container-fluid" height="90px">
          <v-row class="container-fluid">
            <v-tabs class="tab-height" v-model="tab" background-color="transparent" color="basil" height="90px" grow>
              <v-tab class="d-flex text-h6 white--text justify-center align-center" v-for="(item, i) in items" :key="i">
                {{ item }}
                <v-icon>mdi-chevron-down</v-icon>
              </v-tab>
            </v-tabs>
          </v-row>
        </v-card>
      </v-col>
    </v-card>

    <info />
    <find />
    <device />
    <StoreHero />
    <Estimate />
    <StoreInformation />
    <Estimat />
  </div>
</template>
<script>
import info from '../landingPageComponents/InfoComponent.vue'
import find from '../landingPageComponents/FindStore.vue'
import device from '../Devices/Devices.vue'
import StoreHero from '../landingPageComponents/StoreHero.vue'
import Estimate from "../landingPageComponents/FreeEstimate.vue"
import StoreInformation from '../landingPageComponents/StoreInformation/StoreInformation.vue'
import Estimat from '../landingPageComponents/StoreInformation/Sections/Estimate.vue'
export default {
  name: "header",
  components:{
    info,
    find,
    device,
    StoreHero,
    Estimate,
    StoreInformation,
    Estimat
  },
  data() {
    return {
      active: false,
      tab: null,
      isActive: true,
      items: [
        'Devices', 'Apple', 'Samsung', 'LG', 'Motorola', 'Other', 'Tempered Glass', 'Cases', 'Tools & Asscessories'
      ],
    }
  }


}
</script>

<style scoped>
/* .section{
  background-color: white;
} */
:deep(.mdi-account) {
  font-size: 30px !important;
}

:deep(.mdi-cart) {
  font-size: 30px !important;
  color: black;
}

:deep(.mdi-chevron-down) {

  color: black;
}

.tab-btn {
  display: none;
}

.v-input {
  max-width: 70%;
}


.v-tabs--grow>.v-tabs-bar .v-tab {
  border-left: 2px solid white !important;
}

.v-tabs--grow>.v-tabs-bar .v-tab:nth-child(2) {
  border-left: none !important;
}

:deep(.v-input__append-inner) {
  position: relative !important;
  left: 19px !important;
}

@media screen and (max-width: 1024px) {
  .tab-info {
    display: none;
  }

  .tab-img {
    height: 70px !important;
   
  }

  .tab-pad {

    padding-top: 20px !important;

  }

  .badge {
    padding-left: 8px !important;
  }

  :deep(.theme--dark.v-text-field--solo>.v-input__control>.v-input__slot) {
    height: 50px !important;
  }

  .search {
    max-width: 100% !important;
  }

  .tab-search {
    align-items: start !important;
  }

  .btn {
    height: 40px !important;
  }

  :deep(.v-slide-group__content) {
    flex-direction: column !important;
  }

  .tab-height {
    height: 50vh !important;
  }

  :deep(.v-slide-group__wrapper) {
    height: 50vh !important;
  }

  .v-tabs--grow>.v-tabs-bar .v-tab {
    border-left: none !important;
  }

  :deep(.v-tabs-slider-wrapper) {
    display: none !important;
  }

  .tab-btn {
    display: block;
    margin: 0px !important;
    margin-right: 15px !important;
  }

  .show {
    display: block;
  }

  .hide {
    display: none;
  }

  .login-btn {
    font-size: 17px !important;
  }
}

@media screen and (max-width: 600px) {
  .tab-info {
    display: none;
  }

  .tab-img {
    height: 40px !important;
  }

  .search {
    max-width: 100% !important;
  }
  .tab-btn {
    display: block;
    
  }

  .login-btn {
    font-size: 15px !important;
  }

  .tab-pad {
    padding-top: 0px !important;
    position: absolute;
    width: auto;
    right: 0;
  }
  .img-col{
    display: flex !important;
    justify-content: start !important;
  }
  .mobile-row {
    padding-top: 10px;
  }
}</style>