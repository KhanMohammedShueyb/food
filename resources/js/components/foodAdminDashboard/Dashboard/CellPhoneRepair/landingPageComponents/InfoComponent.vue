<template>
    <div>
        <v-card flat class="white d-flex flex-column align-center " tile>
            <v-row>
                <v-card flat tile class="mt-16 card1" width="90vw" color="#f7f7f7">
                    <v-row class="row2">
                        <v-col class=" pa-16 d-flex align-center justify-center" cols="12" lg="7" md="7" sm="12" xs="12">
                            <v-card flat tile class="transparent" width="650px">
                                <v-card-title class="text-h4 black--text font-weight-bold pb-1 text1">
                                    Samsung Parts You Can Depend On.<br>
                                    Service You Can Trust.
                                </v-card-title>
                                <v-card-text class="text-h6 pt-5 black--text">
                                    As a Samsung Service Provider, CPR Cell Phone Repair proudly offers genuine parts on
                                    select
                                    Samsung repairs. Count on our certified repair technicians to quickly fix your broken
                                    Samsung device using OEM parts, proprietary tools, and processes.
                                </v-card-text>

                                <v-text-field tile height="60px" class="pt-8 custom-label-color" solo label="Search by Zip or Postal Code"
                                    prepend-inner-icon="mdi-magnify">

                                    <template #append>
                                        <v-btn class="desk-btn mr-3" color="red" x-large type="submit" value="Search">
                                            Search
                                        </v-btn>
                                    </template>
                                </v-text-field>
                                <v-btn class="tab-btn" width="100%" color="red" x-large type="submit" value="Search">
                                    Search
                                </v-btn>
                            </v-card>
                        </v-col>
                        <v-col class="d-flex align-center justify-center img2" cols="12" lg="5" md="5" sm="12" xs="12">
                            <v-img src="samsung.png" contain class="img1  pr-16"></v-img>
                        </v-col>
                    </v-row>
                </v-card>
            </v-row>
            <v-row>
                <v-col cols="12" lg="6" md="6" sm="12" xs="12" class="d-flex justify-center">
                    <v-card flat tile class="mt-16 card1" width="45vw" color="#f7f7f7" align="center">
                        <v-col class="row2" cols="12">
                            <v-col class="pa-16" cols="12">
                                <v-card flat tile class="transparent" width="650px">
                                    <v-card-title class="text1 text-h4 black--text font-weight-bold pb-1">
                                        Apple® Genuine Parts Now Available at CPR Stores
                                    </v-card-title>
                                    <v-card-text class="text-h6 pt-5 black--text">
                                        Genuine Apple iPhone parts are now available at Cell Phone Repair. We perform all
                                        iPhone
                                        repairs with Apple diagnostic software, tools, and processes to ensure your iPhone
                                        repair is done reliably and safely. Verify with Apple.
                                    </v-card-text>

                                    <v-text-field height="60px" tile class="pt-8 custom-label-color" solo
                                        label="Search by Zip or Postal Code" prepend-inner-icon="mdi-magnify">

                                        <template #append>
                                            <v-btn class="desk-btn mr-3" color="red" x-large type="submit" value="Search">
                                                Search
                                            </v-btn>
                                        </template>
                                    </v-text-field>
                                    <v-btn class="tab-btn" width="100%" color="red" x-large type="submit" value="Search">
                                        Search
                                    </v-btn>
                                </v-card>
                            </v-col>
                            <v-col class="d-flex align-center justify-center img2" cols="12">
                                <v-img height="400px" src="samsung1.png" contain></v-img>
                            </v-col>
                        </v-col>
                    </v-card>
                </v-col>
                <v-col cols="12" lg="6" md="6" sm="12" xs="12" class="d-flex justify-center">
                    <v-card flat tile class="mt-16 card1" width="45vw" color="#f7f7f7" align="center">
                        <v-col class="img" cols="12">
                            <v-img src="plus.png" height="400px" contain></v-img>
                        </v-col>
                        <v-col class=" pa-16" cols="12">
                            <v-card flat tile class="transparent" width="650px">
                                <v-card-title class="text1 text-h4 black--text font-weight-bold pb-1">
                                    Accidents happen. But high repair costs shouldn’t set you back.
                                </v-card-title>
                                <v-card-text class="text-h6 pt-5 black--text">
                                    Thanks to Assurant Device Care, your phone’s most common repairs are covered for only
                                    $8/mo.
                                </v-card-text>


                                <v-btn class="pa-10" color="red" x-large type="submit" value="Search">
                                    learn more
                                </v-btn>

                            </v-card>
                        </v-col>

                    </v-card>
                </v-col>

            </v-row>

        </v-card>
    </div>
</template>

<script>
export default {
    name: "info"
}
</script>

<style scoped>
.img {
    padding-top: 93px;
}

.desk-btn {
    display: block;
}

.tab-btn {
    display: none;
}


@media screen and (max-width: 1024px) {
    .card1 {
        width: 120vw !important;
    }

    .img2 {
        padding-top: 93px;
    }

    .img1 {
        height: 400px;
    }

    .desk-btn {
        display: none;
    }

    .tab-btn {
        display: block;
    }

    .row2 {
        display: flex !important;
        flex-direction: column-reverse !important;
    }

}

@media screen and (max-width: 600px) {
    .text1 {
        font-size: 20px !important;
    }


}
</style>