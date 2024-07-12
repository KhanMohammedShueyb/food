<template>
  <div>
    <v-card flat tile color="#5a5e6b" class="card">
      <v-row>
        <v-col cols="12" lg="6" md="6" sm="12" v-for="(item, i) in cards" :key="i">
          <v-card flat tile color="#2c2c39" class="child-card">
            <v-row class="pa-0">
              <v-col class="pa-0" cols="12" lg="5" md="5">
                <v-img max-height="250px" contain :src="item.img"></v-img>
              </v-col>
              <v-col class="align pa-0" cols="12" lg="7" md="7">
                <v-card-title class="align pt-0 font-weight-black white--text">
                  {{ item.title }}
                </v-card-title>
                <v-card-subtitle class="align pt-0 grey--text">
                  {{ item.description }}
                </v-card-subtitle>
                <v-btn
                  color="#03a8ff"
                  class="white--text text-caption font-weight-bold"
                  >RECEIVE A FREE ESTIMATE</v-btn
                >
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "EsitmaitS",
  data() {
    return {
      cards: [
        {
          img: "dead-batery.png",
          description:
            "If your device is constantly running on low battery, it may be time for a battery replacement. At CPR, we carry OEM batteries and premium charging accessories to keep your phone charged all day long!",
          title: "Dead Battery?",
        },
        {
          img: "Cracked-Screen.png",
          description:
            "Is shattered glass clouding the screen of your device? Cracked cell phone screens can make it difficult to complete even the simplest of tasks. Fortunately, CPR technicians provide fast, affordable cracked screen repair in Astoria, NY while you wait in-store.",
          title: "Cracked Screen?",
        },
      ],
    };
  },
};
</script>

<style scoped>
.card {
  padding: 50px;
}
.child-card {
  padding: 48px 36px;
}
@media screen and (max-width:1024px) {
    .align{
        text-align: center !important;
        justify-content: center;
        padding: 15px 0px !important;
        
    }
}

</style>
