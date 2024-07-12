<template>
  <div>
    <v-card width="650px" class="length pt-10 white" flat tile>
      <v-row>
        <v-col class="d-flex align-center">
          <v-card-subtitle class="pl-2 title font-weight-bold text-h6 grey--text">RECENT STORE REVIEWS</v-card-subtitle>
        </v-col>
        <v-col class="d-flex align-center">
          <v-divider class="my-0 divider"></v-divider>
        </v-col>
      </v-row>
      <v-carousel hide-delimiter-background cycle height="300" :show-arrows="false">
        <v-carousel-item :reverse-transition="fade - transition" :transition="fade - transition"
          v-for="(item, i) in reviews" :key="i">
          <v-card class="white" flat tile>
            <v-row>
              <v-col>
                <v-card-subtitle class="pl-2 black--text text-subtitle-1 font-weight-bold">{{ item.name }}</v-card-subtitle>
              </v-col>
              <v-col>
                <v-card-subtitle class="black--text text-subtitle-1 text-right">{{
                  item.date
                }}</v-card-subtitle>
              </v-col>
            </v-row>
            <v-rating dense background-color="warning lighten-1" color="warning" :empty-icon="mdiStarOutline"
              :full-icon="mdiStar" :half-icon="mdiStarHalfFull" hover length="5" value="3"></v-rating>
            <v-card-subtitle class="pl-2 text-subtitle-1 black--text">{{
              item.comment
            }}</v-card-subtitle>
            <v-card-subtitle class="pl-2 pt-0 black--text text-subtitle-1">
              <v-icon class="blue--text text-subtitle-1"> mdi-check-decagram </v-icon>
              VERIFIED
            </v-card-subtitle>
          </v-card>
        </v-carousel-item>
      </v-carousel>
    </v-card>

    <!-- <Estimate />
    <Track /> -->
  </div>
</template>

<script>
// import Estimate from '../cellphone/Estimate.vue'
// import Track from '../cellphone/Track.vue'
export default {
  name: "reviewS",
  components: {
    // Estimate,
    // Track
  },
  data() {
    return {
      reviews: [
        {
          name: "Joshua Josey",
          date: "July 08, 2022",
          comment:
            "The guys were great; they got the part they needed expedited for only $20 more, and had my phone's charging port fixed same day. I'd absolutely recommend them to anybody in need of a quick fix.",
        },
        {
          name: "James Antonaglia",
          date: "August 24, 2022",
          comment: "9179578604",
        },
      ],
    };
  },
};
</script>

<style scoped>
.divider {
  border: 1px solid lightgray !important;
}

:deep(.mdi-circle) {
  color: red !important;
}
@media screen and (max-width:600px) {
  .length{
    width: 500px !important;
  }
}
</style>
