<template>
  <div>
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn tile color="primary" dark v-bind="attrs" v-on="on">
          Open Dialog
        </v-btn>
      </template>
      <v-card flat tile color="#2c2c39">
        <v-toolbar flat tile class="d-flex justify-end" color="#2c2c39">
          <v-btn icon small class="red mr-2" @click="dialog = false">
            <v-icon color="white" icon>mdi-close</v-icon>
          </v-btn>
        </v-toolbar>
        <v-card
          align="center"
          flat
          class="form-card pa-0 container"
          tile
          width="50%"
        >
          <v-form>
            <v-img contain src="repair.png" height="74" width="142"></v-img>
            <v-card-text
              class="pt-7 text--body-1 font-weight-black black--text"
            >
              CHECK YOUR REPAIR STATUS
            </v-card-text>
            <v-card-subtitle class="pt-0 grey--text">
              Checking the status of your repair is quick and easy at CPR Cell
              Phone Repair! Simply complete the form below to see the status of
              your device.
            </v-card-subtitle>
            <v-btn-toggle class="pb-7" v-model="toggle_exclusive">
              <v-row>
                <v-col>
                  <v-btn x-large outlined active-class="red--text"> USA </v-btn>
                </v-col>
                <v-col>
                  <v-btn x-large outlined active-class="red--text"> CANADA </v-btn>
                </v-col>
              </v-row>
            </v-btn-toggle>
            <v-text-field single-line label="Ticket ID" outlined></v-text-field>
            <v-text-field single-line label="Last Name" outlined></v-text-field>
            <v-btn x-large class="font-weight-black white--text" color="red">
              CHECK REPAIR STATUS
            </v-btn>
          </v-form>
          <v-card flat class="mt-10 warning-card">
            <v-row>
              <v-col
                class="d-flex justify-center"
                cols="12"
                lg="2"
                md="2"
                align="center"
              >
                <v-card-subtitle align="center">
                  <v-icon class="text-h4" color="#efaf11 ">mdi-alert</v-icon>
                </v-card-subtitle>
              </v-col>
              <v-col cols="12" class="pl-0" lg="10" md="10">
                <v-card-subtitle class="warning-card1 black--text" align="start">
                  You may find Ticket ID on your receipt, or in your email
                  confirmation if you opted to receive one.<b>
                    If the number on your ticket contains leading zeros, do not
                    include them when filling this form.</b
                  >
                  If you cannot find your Ticket ID, please call your store.
                </v-card-subtitle>
              </v-col>
            </v-row>
          </v-card>
        </v-card>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  name: "TrackC",
  data() {
    return {
      dialog: false,
      toggle_exclusive: 1,
    };
  },
};
</script>

<style scoped>
.active {
  background: red !important;
}
.form-card {
  padding: 50px !important;
}
:deep(.v-text-field input) {
  color: black !important;
}
.warning-card {
  border: 2px solid #efaf11 !important;
}
@media screen and (max-width:1024px) {
   .form-card {
    width: 83% !important;
} 
.warning-card1 {
  text-align: center !important;
  padding-top: 0px !important;
}
    
}
</style>
