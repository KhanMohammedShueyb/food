<template>
    <div>
        <v-card class="transparent d-flex align-center justify-center hero" flat tile>
            <v-card flat tile  class="transparent hero-align py-10 pb-0" width="90vw">
                <v-card-subtitle class="hero-align black--text font-weight-medium">CELL PHONE REPAIR ASTORIA</v-card-subtitle>
                <v-card-title class="pt-0 hero-align hero-title black--text font-weight-bold text-h3">Your Trusted Electronics Problem Solvers</v-card-title>
                <v-card-text class="pt-0 hero-txt hero-align black--text  font-weight-medium text-h5 py-10">Fast and affordable device repairs for phones,<br>
                    tablets, laptops, and more!</v-card-text>
                <v-btn class="font-weight-black red pa-8" x-large>
                    GET A REPAIR QUOTE
                </v-btn>
                <v-card flat tile class="transparent info-card mt-5 py-10" width="45vw">
                    <v-row>
                        <v-col cols="12" lg="3" md="3" sm="3" xs="6" align="center">
                            <v-icon class="hero-align black--text font-weight-medium text-h4">mdi-decagram-outline</v-icon>
                            <v-card-subtitle class="hero-align black--text font-weight-medium">LIFETIME WARRANTY</v-card-subtitle>
                        </v-col>
                        <v-col cols="12" lg="3" md="3" sm="3" xs="6" align="center">
                            <v-icon class="hero-align black--text font-weight-medium text-h4">mdi-clock-time-five-outline</v-icon>
                            <v-card-subtitle class="hero-align black--text font-weight-medium">SAME DAY REPAIRS</v-card-subtitle>
                        </v-col>
                        <v-col cols="12" lg="3" md="3" sm="3" xs="6" align="center">
                            <v-icon class="hero-align black--text font-weight-medium text-h4">mdi-seal</v-icon>
                            <v-card-subtitle class="hero-align black--text font-weight-medium">EXPERT TECHNICIANS</v-card-subtitle>
                        </v-col>
                        <v-col cols="12" lg="3" md="3" sm="3" xs="6"  align="center">
                            <v-icon class="hero-align black--text font-weight-medium text-h4">mdi-star-three-points-outline</v-icon>
                            <v-card-subtitle class="hero-align black--text font-weight-medium">1M+ DEVICES FIXED</v-card-subtitle>
                        </v-col>
                    </v-row>
                </v-card>
            </v-card>
        </v-card>
    </div>
</template>

<script>
export default {
    name: "StoreHero"
}
</script>

<style scoped>
.hero {
    background: url("/banner.jpg");
    background-position: center center;
    background-size: cover;
    background-repeat:no-repeat;
    
}
.hero-txt{
    line-height: 2;
}
@media screen and (max-width:1024px) {
    .hero{
        height: auto !important;
        background: url("/herotab.jpg") no-repeat bottom right !important;
        background-size: auto 100% !important;
    }
    .info-card {
        width: 100vw !important;
    }
    .hero-align{
        text-align: center !important;
        color: white !important;
    }
    .hero-title{
        font-size:5.2vw !important;
    }
}
@media screen and (max-width:600px) {
    .hero{
        height: auto !important;
    }
    .hero-align{
        text-align: center !important;
    }
    .hero-title{
        font-size:5vw !important;
    }
    
}

</style>