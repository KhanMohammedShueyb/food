<template>
    <div>
        <v-card class="white" flat tile align="center">
            <v-card flat tile class="white" width="90vw" align="start">
                <v-row>
                    <v-col>
                        <Slider1 />
                    </v-col>
                    <v-col align="center">
                        <Life />
                    </v-col>
                </v-row>
                <v-row class="py-10 d-flex align-center">
                    <v-divider class="my-0 divider"></v-divider>
                    <v-card-subtitle class=" py-0 font-weight-bold text-h6 grey--text">
                        STORE INFORMATION
                    </v-card-subtitle>
                    <v-divider class="my-0 divider"></v-divider>
                </v-row>

                <v-row>
                    <v-col  cols="12" lg="3" md="3">
                        <v-card class="white align" flat tile>
                            <v-card-title class="pl-0 d-flex justify-center pt-2 black--text text-h5 font-weight-bold">
                                Cell Phone Repair Astoria
                            </v-card-title>

                            <v-card-subtitle class="pl-0 py-0 black--text text-h6 ">
                                32-30 Steinway street
                            </v-card-subtitle>
                            <v-card-subtitle class="pl-0 py-0 black--text text-h6 ">
                                Astoria, NY 11103
                            </v-card-subtitle>
                            <v-card-subtitle class="pl-0 pt-0 py-7 black--text text-h6 ">
                                718-806-1486
                            </v-card-subtitle>

                            <v-btn x-large class="pa-5 font-weight-black red white--text">
                                <v-icon>mdi-sign-direction</v-icon>
                                DRIVING DIRECTIONS
                            </v-btn>
                        </v-card>
                    </v-col>

                    <v-col  cols="12" lg="3" md="3">
                        <v-card flat tile class="white">
                            <v-card-title class="pl-0 d-flex justify-center pt-2 black--text text-h5 font-weight-bold">
                                Store Hours
                            </v-card-title>
                            <v-card v-for="(item, i) in days" :key="i" flat tile class="white">
                                <v-row>
                                    <v-col>
                                        <v-card-subtitle class=" py-0 font-weight-bold text-h6 black--text">
                                            {{ item.day }}
                                        </v-card-subtitle>
                                    </v-col>
                                    <v-col>
                                        <v-card-subtitle v-if="item.show == true"
                                            class=" py-0 font-weight-bold text-h6 black--text">
                                            10:00 AM
                                        </v-card-subtitle>
                                        <v-card-subtitle v-if="item.show == false"
                                            class=" py-0 font-weight-bold text-h6 black--text">
                                            CLOSE
                                        </v-card-subtitle>
                                    </v-col>
                                    <v-col>
                                        <v-card-subtitle v-if="item.show == true"
                                            class=" py-0 font-weight-bold text-h6 black--text">
                                            7:00 PM
                                        </v-card-subtitle>
                                    </v-col>
                                </v-row>
                                <v-col>
                                    <v-divider class="my-0 divider"></v-divider>
                                </v-col>
                            </v-card>
                        </v-card>
                    </v-col>

                    <v-col cols="12" lg="6" md="6">
                        <v-row>
                            <v-carousel  height="auto" hide-delimiter-background :show-arrows="false">
                                <v-carousel-item v-for="(item, i) in repair" :key="i">
                                    <v-card flat tile class="white" align="center">
                                        <v-img width="650" :src="item.img"></v-img>
                                    </v-card>
                                </v-carousel-item>
                            </v-carousel>
                        </v-row>
                        <v-row class="mt-16">
                            <v-col class="align d-flex justify-center">
                                <ReviewSlider />
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>

            </v-card>
        </v-card>
    </div>
</template>

<script>
import Slider1 from './Sections/Slider1.vue'
import Life from './Sections/LifetimeWaranty.vue'
import ReviewSlider from './Sections/Reviews.vue'
export default {
    name: "StoreInformation",
    components: {
        Slider1,
        Life,
        ReviewSlider
    },
    data() {
        return {
            days: [
                {
                    day: 'MON',
                    show: true
                },
                {
                    day: 'TUE',
                    show: true
                },
                {
                    day: 'WED',
                    show: true
                },
                {
                    day: 'THU',
                    show: true
                },
                {
                    day: 'FRI',
                    show: true
                },
                {
                    day: 'SAT',
                    show: true
                },
                {
                    day: 'SUN',
                    show: false
                },
            ],
            repair: [
                {
                    img: "ipad-repair.jpg"
                },
                {
                    img: "ipad-repair.jpg"
                },
                {
                    img: "ipad-repair.jpg"
                },
                {
                    img: "ipad-repair.jpg"
                },
            ]
        }
    }
}
</script>

<style scoped>
:deep(.mdi-circle::before){
    color: black;
}
.divider {
    border: 0.5px solid lightgray !important;
}
@media screen and (max-width:1024px) {
  .align{
    text-align: center !important;
  }
}
</style>