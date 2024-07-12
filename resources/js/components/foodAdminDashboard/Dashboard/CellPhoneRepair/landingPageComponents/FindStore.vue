<template>
    <div>
        <v-card flat tile class="white pt-5" align="center">
            <v-card flat tile class="white" width="90vw" height="100px">
                <v-row>
                    <v-col cols="12" lg="6" md="6" sm="6" xs="12" class="d-flex align-center">
                        <v-card-title class="black--text text-h5">Find a CPR Store Near You</v-card-title>
                    </v-col>
                    <v-col cols="12" lg="6" md="6" sm="6" xs="12" align="end" class="my-auto "><v-btn text
                            class="text-h6 black--text text-decoration-underline">View Canadian Stores</v-btn></v-col>
                </v-row>
            </v-card>
            <v-card flat class="white card " tile height="1000px">
                <v-sheet width="60vw" class="transparent mx-auto sheet">
                    <v-form width="100px">
                        <v-text-field height="90px" tile class="pt-8 custom-label-color text-h4" solo
                            label="Search by Zip or Postal Code" prepend-inner-icon="mdi-magnify"></v-text-field>
                        <v-btn class="btn font-weight-bold pa-10" color="red" x-large type="submit" value="Search">
                            Search locations
                        </v-btn>
                    </v-form>
                    <v-card-title class="black--text sheet">
                        With over 500 Cell Phone Repair (CPR) stores in our global network, a convenient mail-in repair
                        program,
                        and a growing fleet of on-site service technicians, we’re confident we can help with all of your
                        tech
                        and gadget problems. Use the locator below to find the service provider nearest you. No Cell Phone
                        Repair providers in your area? Consider becoming a member of the fastest growing franchise in the
                        nation
                        – visit our franchise section for more information.
                    </v-card-title>
                </v-sheet>
                <v-card width="90vw" flat tile class=" transparent">
                    <v-expansion-panels class="pt-16" light>
                        <v-expansion-panel class="expansion">
                            <v-expansion-panel-header class="text-h5 blue--text font-weight-bold"  disable-icon-rotate>
                                Locations By State / Province
                                <template v-slot:actions>
                                    <v-icon class="text-h4 font-weight-bold" color="black">
                                        mdi-plus
                                    </v-icon>
                                </template>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </v-expansion-panels>
                </v-card>
            </v-card>
        </v-card>
    </div>
</template>

<script>
export default {
    name: 'storeLocation'
}
</script>

<style scoped>
.card {
    background-image: url("/map-bg.jpg");
    background-size: cover;
}

.sheet {
    margin-top: 150px;
}
.expansion{
    border: 1px solid #02b9f6;
}
</style>