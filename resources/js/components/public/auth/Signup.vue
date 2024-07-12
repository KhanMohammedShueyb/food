<template>
  <div class="right-content from-wrapper">
    <v-form ref="form" @submit.prevent="submit">
      <div class="lets-go  animate__animated animate__bounceInDown">
        <h2>Lets Go Today!</h2>
        <!-- <p>Duis aute irure dolor in voluptate velit dolore eu fugiat nulla pariatur.</p> -->
      </div>
      <from>
        <v-row wrap>
          <v-col cols="6">
            <div class="inner-wrapper input-name">
              <TextField :model.sync="userInfo.first_name" label="Enter First Name" :required="true" :outlined="true"
                :dense="true" rule="First Name is required" :prependicon_bool="true" prependicon="account_circle" />
            </div>
          </v-col>
          <v-col cols="6">
            <div class="inner-wrapper input-name">
              <TextField :model.sync="userInfo.last_name" label="Enter Last Name" :outlined="true" :dense="true"
                :required="true" rule="Last Name is required" />
            </div>
          </v-col>
        </v-row>
        <div class="inner-wrapper input-name">
          <TextField :model.sync="userInfo.email" label="Enter e-mail address" :required="true" :outlined="true"
            :dense="true" rule="email is required" :prependicon_bool="true" prependicon="mdi-email" />
        </div>
        <v-row wrap>
          <v-col cols="6">
            <div class="inner-wrapper input-name">
              <TextField :model.sync="userInfo.password" label="Enter password"
                :rules="[(v) => !!v || 'Password is required']" :required="true"
                :type="showPassword ? 'text' : 'password'" :prependicon_bool="true" :outlined="true" :dense="true"
                prependicon="lock" :appendicon_bool="true" :appendicon="showPassword ? 'visibility' : 'visibility_off'"
                @onClick="showPassword = !showPassword" class="content-name lable-name" />
            </div>
          </v-col>
          <v-col cols="6">
            <div class="inner-wrapper input-name">
              <TextField :rules="[
                [(v) => !!v || 'Password is required'],
                passwordConfirmationRule,
              ]" :model.sync="userInfo.password_confirmation" label="Confirm your password" :required="true"
                :type="showPassword ? 'text' : 'password'" :prependicon_bool="true" prependicon="lock"
                :appendicon_bool="true" :appendicon="showPassword ? 'visibility' : 'visibility_off'"
                @onClick="showPassword = !showPassword" class="content-name lable-name" :outlined="true"
                :dense="true" />
            </div>
          </v-col>
        </v-row>
        <v-row wrap>
          <v-col cols="3">
            <div class="inner-wrapper input-name">
              <TextField :model.sync="userInfo.age" :required="false" label="Age" :prependicon_bool="true"
                :outlined="true" :dense="true" />
            </div>
          </v-col>
          <v-col cols="9">
            <!-- <div class="inner-wrapper input-name"> -->
            <!-- <TextField
              :required="false"
                :model.sync="userInfo.contact"
                label="Enter Contact numbers"
                mask="+(###) ###-####"
                rule="Contact number is required"
                :prependicon_bool="true"
                prependicon="account_circle"
              /> -->
            <vue-phone-number-input v-model="userInfo.contact" @update="onUpdate" />
            <!-- <VuePhoneNumberInput  /> -->
            <!-- </div> -->
          </v-col>
        </v-row>
        <v-row wrap>
          <v-col cols="4">
            <div class="inner-wrapper input-name">
              <TextField :model.sync="userInfo.dob" :required="false" label="Enter DOB" rule="DOB is required"
                type="date" :outlined="true" :dense="true" />

            </div>
          </v-col>
          <v-col cols="4">

            <div class="inner-wrapper input-name">
              <AutoComplete :model.sync="userInfo.country" label="Select Hospital Country" :required="false"
                :items="countries" item_value="code" item_text="name" :outlined="true" :dense="true" />

            </div>
          </v-col>
          <v-col cols="4">
            <TextField :model.sync="userInfo.hospital" label="Enter Hospital name" :required="false"
              rule="hospital is required" :prependicon_bool="true" :outlined="true" :dense="true" />
          </v-col>
        </v-row>
        <v-row wrap>
          <v-col cols="6">
            <v-radio-group v-model="userInfo.gender" label="Gender" :required="false" rule="Gender is required"
              :prependicon_bool="true" prependicon="account_circle" color="#0b97b9" :outlined="true" :dense="true" row>
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Male" value="male"></v-radio>
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Female" value="female"></v-radio>
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Muxus" value="muxus"></v-radio>
            </v-radio-group>
          </v-col>
          <v-col cols="6">
            <v-radio-group v-model="userInfo.department" :required="true" :outlined="true" :dense="true"
              rule="department is required" color="#0b97b9" row>
              <v-radio color="#0b97b9" style="color: #0b97b9" label="General surgery" value="general surgery"></v-radio>
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Hepatobilary" value="Hepatobilary "></v-radio>
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Gastrointestinal" value="gastrointestinal">
              </v-radio>
            </v-radio-group>
          </v-col>
        </v-row>

        <v-radio-group v-model="userInfo.user_role" :required="true" label="Role" :outlined="true"
          rule="user role is required" color="#0b97b9" dense row>
          <v-row>
            <v-col cols="4">
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Consultant" value="Consultant"></v-radio>
            </v-col>
            <!-- <v-col cols="3">
              <v-radio
                color="#0b97b9"
                style="color: #0b97b9"
                label="Supervisor"
                value="supervisor"
              ></v-radio>
            </v-col> -->
            <v-col cols="4">
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Trainee" value="Trainee"></v-radio>
            </v-col>
            <v-col cols="4">
              <v-radio color="#0b97b9" style="color: #0b97b9" label="Other" value="other"></v-radio>
            </v-col>
          </v-row>
        </v-radio-group>

        <v-radio-group v-model="userInfo.user_type" :required="true" rule="user type is required" color="#0b97b9"
          :outlined="true" :dense="true" row>
          <v-radio color="#0b97b9" style="color: #0b97b9" label="Researcher" value="Researcher"></v-radio>
          <v-radio color="#0b97b9" style="color: #0b97b9" label="Guest" value="Visitor"></v-radio>
        </v-radio-group>
        <div>
          <v-btn @click="submit" :loading="btn_loader_login" dark color="primary" class="login">Register</v-btn>
          <!-- <button class="login">Register</button> -->
        </div>
        <div class="creat-account">
          <a href="javascript:void(0)" @click="loginPage" class="forgot-pw"><strong>Already a memeber </strong></a>
        </div>
      </from>
    </v-form>
  </div>
</template>
<script lang="ts">
import { isNumber } from "lodash";
import { Component, Vue, Mixins } from "vue-property-decorator";
import { Action, Getter } from "vuex-class";
const Button = () => import("../../views/buttons/Button.vue");
const AutoComplete = () => import("../../views/SelectOptions/Autocomplete.vue");
const TextField = () => import("../../views/InputElements/TextField.vue");
import { States } from "../../../helpers/states";
import { CountriesList } from "../../../helpers/countries_list";
@Component({
  components: {
    Button,
    AutoComplete,
    TextField,
  },
})
export default class Signup extends Mixins(States, CountriesList) {
  $refs!: {
    vue: Vue;
  };
  @Action("auth/registerUser") registerUser!: (login: object) => Promise<any>;
  get passwordConfirmationRule(): any {
    return () =>
      this.userInfo["password"] === this.userInfo["password_confirmation"] ||
      "Password must match";
  }
  btn_loader_login = false
  userInfo = {
    first_name: "",
    last_name: "",
    email: "",
    password: "",
    user_type: "Visitor",
    password_confirmation: "",
    age: null,
    user_role: "",
    contact: "",
    dob: null,
    hospital: "",
    department: "",
    gender: "",
  };
  formState = 1;
  themedark = true;
  loginPage() {
    this.$store.dispatch("auth/setForm", this.formState);
  }

  onUpdate(e: any) {
    this.userInfo['country_code'] = e.countryCode
  }

  async submit() {
    // if (this.$refs["form"].validate()) {

    this.btn_loader_login = true
    await this.registerUser(this.userInfo).then((res) => {
      this.btn_loader_login = false
      if (res && res.success) {
        // this.$router.push({ path: "/public" });
        Vue.prototype.$flashStorage.flash(res.message, "success", {
          timeout: 3000,
        });
      } else if (res && res.errors && res.errors.length > 0)
        Vue.prototype.$flashStorage.flash(res.errors[0], "error", {
          timeout: 3000,
        });
      else
        Vue.prototype.$flashStorage.flash(res.message, "error", {
          timeout: 3000,
        });
      this.loginPage()
    }).catch(err => {
      this.btn_loader_login = false
    });
    // }
  }
  public showPassword: boolean = false;
}
</script>
<style scoped>
.forgot-pw strong:hover {
  color: #fff;
}

::v-deep .country-selector__list {
  color: black;
}

::v-deep .v-text-field--outlined.v-input--dense .v-label--active {
  transform: translateY(-20px) scale(0.75);
}

::v-deep .v-input--selection-controls .v-radio>.v-label {
  margin-top: 12px;
}

.from-wrapper {
  background-image: linear-gradient(to bottom right, #0d3c94, #058ab3);
  padding: 40px;
  border-radius: 50px 50px 50px 50px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.from-wrapper .lets-go {
  max-width: 215px;
  margin: 0 auto;
}

.lets-go h2 {
  font-family: "Sitka";
  font-size: 30px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 50px;
}

.lets-go p {
  font-family: "Segoe UI";
  font-size: 16px;
  color: #707070;
  margin-bottom: 40px;
}

.creat-account {
  text-align: center;

  margin-top: 10px;
}

.creat-account a {
  font-family: "Sitka";
  font-size: 16px;
  color: #222648;
  text-decoration: none;
}

.froget-pswd {
  text-align: right;
  margin-bottom: 135px;
}

.froget-pswd a {
  font-family: "Sitka";
  font-size: 16px;
  color: #222648;
  text-decoration: none;
}

.login {
  font-family: "Sitka";
  font-size: 26px;
  width: 100%;
  background: #222648;
  color: #fff;
  border: 1px solid #707070;
  cursor: pointer;
  outline: none;
  transition: 0.5s;
}

.login:hover {
  background: #707070;
  box-shadow: -1px 4px 10px 0px rgba(0, 0, 0, 0.7);
  -webkit-box-shadow: -1px 4px 10px 0px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: -1px 4px 10px 0px rgba(0, 0, 0, 0.7);
}

/****==== form Css====**** */
.inner-wrapper {
  /* background: red; */
  position: relative;
  height: 50px;
  width: 100%;
  /* overflow: hidden; */
}

.inner-wrapper input {
  font-family: "Sitka";
  width: 100%;
  color: #707070;
  height: 100%;
  padding-top: 10px;
  border: none;
  outline: none;
}

.input-name {
  margin-bottom: 30px;
}

.inner-wrapper label {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  border-bottom: 1px solid #707070;
}

.inner-wrapper label::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 100%;
  width: 100%;
  border-bottom: 3px solid #222648;
  transform: translateX(-100%);
  transition: transform 0.3s ease;
}

.content-name {
  font-family: "Sitka";
  font-size: 16px;
  color: #707070;
  position: absolute;
  bottom: 5px;
  left: 0;
  transition: all 0.3s ease;
}

.inner-wrapper input:focus+.lable-name .content-name,
.inner-wrapper input:valid+.lable-name .content-name {
  transform: translateY(-70%);
  font-size: 14px;
  color: #222648;
}

.inner-wrapper input:focus+.lable-name::after,
.inner-wrapper input:valid+.lable-name:after {
  transform: translateX(0%);
}
</style>
