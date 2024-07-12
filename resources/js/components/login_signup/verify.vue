<template>
  <section class="white sec d-flex align-center">
    <v-card class="card" width="40%">
      <v-col class="d-flex justify-center align-center flex-column">
        <v-col class="d-flex justify-center align-center" cols="12">
          <v-icon>mdi-email</v-icon>
          <v-card-title class="text-h4 font-weight-bold">Verify your email!!</v-card-title>
        </v-col>
        <v-col cols="12" class="d-flex justify-center align-center py-0">
          <v-card-text class="text-h6 d-flex justify-center">
            Please enter the 4-digit verification code that was
            sent to your email.
          </v-card-text>
        </v-col>
        <v-col cols="12" class="d-flex justify-center align-center pt-0">
          <v-form ref="form" v-model="valid" lazy-validation>
            <v-col class="d-flex justify-start pa-0">
              <v-text-field
                v-model="otp"
                :rules="otpRules"
                required
                class="custom-label-color"
                rounded
                solo
                label="OTP"
              ></v-text-field>
            </v-col>
            <v-col class="d-flex justify-start pa-0">
              <v-btn
                width="100%"
                rounded
                x-large
                class="px-1 btn d-flex align-center justify-center"
                @click="validate()"
              >Continue</v-btn>
            </v-col>
          </v-form>
        </v-col>
      </v-col>
    </v-card>
  </section>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Action } from "vuex-class";
import axios from "axios";
@Component({
  components: {}
})
export default class verify extends Vue {
  @Action("Authenticated/otp") verify!: (params:Object) => Promise<Array<Object>>;
  public valid: Boolean = true;
  public otp: any = 0;
  public otpRules: Array<Object> = [
    (v: any) => !!v || "OTP is required",
    (v: any) => (v && v.length == 6) || "OTP must be equal to 6 characters"
  ];
  $refs!: {
    vue: Vue;
  };
  validate() {
    
    const a = this.$refs["form"].validate();
    this.verify({ otp: this.otp }).then(Response => {
      debugger;
      if (
        Response['data'].success == true &&
        a &&
        Response['data'].user[0]["isLogin"] == 1 &&
        Response['data'].token &&
        Response['data'].user[0]["type"] == "admin"
      ) {
        this.$router.push({ path: "/dashboard" }).catch(() => {});
      } else if (
        Response['data'].user[0]["type"] == "customer" &&
        Response['data'].token  &&
        Response['data'].user[0]["isLogin"] == 1 &&
        a
      ) {
        alert("successfully login as User");
        this.$router.push({ path: "/Userdashboard" }).catch(() => {});
      }
    });
  }
}
</script>

<style scoped>
.mdi-email {
  color: #0ede63 !important;
  font-size: 50px !important;
}
.sec {
  height: 100vh !important;
  background-image: url("/background.jpg");
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
}

.card {
  background-color: transparent;
  border: none;
  left: 450px;
  position: relative;
}
:deep(.custom-label-color .v-input) {
  color: white !important;
  opacity: 1;
}
:deep(.theme--dark.v-text-field--solo > .v-input__control > .v-input__slot) {
  /* background: #fbe9e2 !important; */
  background: #c10204 !important;
  opacity: 0.35 !important;
}
.btn {
  /* background-color: #040b03 !important; */
  /* background-color: #efaf11 !important;
    opacity: 1 !important; */
  background-color: #c10204 !important;
  opacity: 0.8;
}
</style>