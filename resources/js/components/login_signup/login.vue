<template>
  <section>
    <v-card class="pa-3 borders" height="951px" flat tile>
      <v-container>
        <v-card class="card px-8" width="450px" flat tile>
          <v-col class="d-flex justify-center">
            <v-card-title>
              <h2>LOGIN</h2>
            </v-card-title>
          </v-col>
          <v-form ref="form" v-model="valid" lazy-validation>
            <v-col class="d-flex justify-start pa-0">
              <v-text-field v-model="user['email']" :rules="nameRules" required class="custom-label-color" rounded solo
                label="Email"></v-text-field>
            </v-col>
            <v-col class="d-flex justify-start pa-0">
              <v-text-field v-model="user['password']" required type="password" :rules="passwordRules"
                class="custom-label-color" rounded solo label="Password"></v-text-field>
            </v-col>
            <v-col class="d-flex justify-start pa-0">
              <v-btn width="100%" rounded x-large class="px-1 btn d-flex align-center justify-center"
                @click="validate()">SignIn</v-btn>
            </v-col>

            <v-col class="d-flex justify-space-between align-center pa-0">
              <v-checkbox v-model="checkbox" label="Remember me" color="white" value="Remember me"
                hide-details></v-checkbox>
              <span class="mt-4">Forgot Password</span>
            </v-col>
          </v-form>
          <v-col></v-col>
          <v-col></v-col>
          <v-col class="d-flex justify-center align-center pa-0">
            <v-btn @click="redirectToSignup()" text>
              <h5 class="mt-4">Create your account</h5>
            </v-btn>
          </v-col>
        </v-card>
      </v-container>
    </v-card>
  </section>
</template>

<script lang="ts">
import axios from "axios";
import { Component, Vue } from "vue-property-decorator";
import { Action, Getter } from "vuex-class";

@Component({
  components: {}
})
export default class logins extends Vue {
  @Action("usergroup/groupPermission") groupPermission!: (params: Object) => Promise<Array<Object>>;
  @Action("Authenticated/login") login!: (params: Object) => Promise<Array<Object>>;
  @Getter("Authenticated/authenticatedUser") getAuthUser: () => Promise<Object>;
  @Getter("Authenticated/token") token: () => Promise<Object>;

  $refs!: {
    vue: Vue;
  };
  public name: any = "";
  public resp: any = "";
  public checkbox: Boolean = false;
  public password: any = "";
  public valid: Boolean = true;
  public user: Object = {
    email: "",
    password: ""
  };
  redirectToSignup() {
    this.$router.push({ path: "/signup" });
  }
  public nameRules: Array<Object> = [(v: any) => !!v || "email is required"];
  public passwordRules: Array<Object> = [
    (v: any) => !!v || "Password is required"
  ];
  // public checkboxErrors: Array<Object> = [
  //   (v: any) => !!v || "You must agree to continue!"
  // ];
  validate() {
    const a = this.$refs["form"].validate();
    this.login(this.user)
      .then(Response => {
        if (Response['data'].success == true && a) {
          const user = this.getAuthUser
          const token = this.token
          this.groupPermission(user).then(Response => {
            console.log("Permisisons", Response['data']);
          });
          if (user['type'] == "admin" && Response['data'].token['token'] == token['token'] && user['isLogin'] == 1) {
            alert("successfully login as admin");
            this.$router.push({ path: "/dashboard" }).catch(() => { });
          }
          // else if(user['type'] == "customer" && Response['data'].token['token'] == token['token'] && user['isLogin'] == 1){
          //   alert("successfully login as User");
          //   this.$router.push({ path: "/Userdashboard" }).catch(()=>{});
          // }
          else if (user['type'] == "customer" && Response['data'].token['token'] == token['token'] && user['isLogin'] == 1) {
            alert("successfully login as User");
            this.$router.push({ path: '/dashboard' }).catch(() => { });
          }
          else {
            alert("Verify or Create your account please ");
            this.$router.push({ path: "/verify" }).catch(() => { });
          }
        }
      });
  }
}
</script>

<style scoped>
:deep([data-v-2ea61d1e] .theme--dark.v-input input) {
  color: #ffffff !important;
}

.borders {
  background-image: url("/background.jpg");
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
  width: 103%;
}

:deep(.v-input--selection-controls .v-input__slot, .v-input--selection-controls .v-radio) {
  align-items: flex-start !important;
}

:deep(.v-input--selection-controls__input + .v-label) {
  margin-top: 3px !important;
}

h2 {
  /* color:#c10204; */
  color: white;
  font-weight: bold;
}

.card {
  position: relative;
  top: 200px;
  height: 500px !important;
  background-color: transparent;
  border: none;
  left: 100px;
}

:deep(.theme--dark.v-text-field--solo > .v-input__control > .v-input__slot) {
  /* background: #fbe9e2 !important; */
  background: #c10204 !important;
  opacity: 0.35 !important;
}

.btn {
  background-color: #c10204 !important;
  opacity: 0.8;
}

span {
  color: #c10204 !important;
}

@media screen and (max-width: 1024px) {
  .borders {
    width: 103% !important;
    /* height: auto !important; */
    height: 1276px !important;
  }

  .card {
    left: 250px !important;
    top: 250px !important;
  }
}

@media screen and (max-width: 600px) {
  .borders {
    width: auto !important;
    /* height: auto !important; */
    height: 835px !important;
  }

  .card {
    /* left: -500px !important; */
    left: 0px !important;
  }
}
</style>