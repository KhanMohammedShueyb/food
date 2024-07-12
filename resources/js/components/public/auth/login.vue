<template>
<div>
  <v-form ref="form"  @submit.prevent="submit">
    <div class="right-content from-wrapper">
      <div class="lets-go  animate__animated animate__bounceInDown animate__delay-1s">
        <h2>Lets Go Today!</h2>
        <!-- <p>
          Duis aute irure dolor in voluptate velit dolore eu fugiat nulla
          pariatur.
        </p> -->
      </div>
      <from>
        <div  v-if="check_login_token">
        <div class="inner-wrapper input-name">
          <TextField
            :model.sync="userInfo.email"
            label="Enter your e-mail address"
            :required="true"
            :type="text"
            rule="email is required"
            :prependicon_bool="true"
            prependicon="account_circle"
          />
          <!-- <input type="text" name="name" autocomplete="off" required />
                            <label for="name" class="lable-name">
                                <span class="content-name">Name</span>
                            </label> -->
        </div>
        <div class="inner-wrapper ">
          <TextField
            :model.sync="userInfo.password"
            label="Enter your password"
            rule="password is required"
            :required="true"
            :type="showPassword ? 'text' : 'password'"
            :prependicon_bool="true"
            prependicon="lock"
            :appendicon_bool="true"
            :appendicon="showPassword ? 'visibility' : 'visibility_off'"
            @onClick="showPassword = !showPassword"
            v-on:keyup.enter="submit"
            class="content-name lable-name"
          />
          <!-- <input type="password" name="pass" autocomplete="off" required />
                            <label for="pass" class="lable-name">
                                <span class="content-name">Password</span>
                            </label> -->
        </div>
        <div class="froget-pswd">
          <a href="javascript:void(0)" class="forgot-pw" @click="forgetPasw">Forgot Password ?</a>
        </div>
        <div>
          <v-btn 
            @click="submit"
            :loading="btn_loader_login"
            dark
            color="primary"
            class="login">Login</v-btn>
        </div>
        <div class="creat-account">
          <a href="javascript:void(0)" @click="signupPage" class="forgot-pw"
            ><strong>create new account ?</strong></a
          >
        </div>
        </div>
        <div v-else>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <center>
          <p>The User is already loged in if You want to change user 
            <a href="javascript:void(0)" @click="logout()"> <br> click here </a>
          </p>
          </center>
          <!-- <div class="logo">
          <center>
           <img
                @click="$router.push({ path: '/home' })"
                class="drawer-logo"
                src="/images/Medical_Logo.png"
                alt="Affinity"
                title="Affinity"
                 style="width: 150px; height: 100px;"
              />
          </center>
          </div> -->
           <div>
          <!-- <v-btn 
            @click="logout"
            dark
            class="login">Logout</v-btn> -->
        </div>
        </div>
      </from>
    </div>
  </v-form>
  <!-- Modal -->
  <div class="text-center">
    <Dialog 
    :dialog="dialog"
    />
  </div>
  </div>
</template>
<script lang="ts">
import { Component, Vue, Prop } from "vue-property-decorator";
const Button = () => import("../../views/buttons/Button.vue");
const Dialog = () => import("../../views/dialogs/PasswordDialog.vue");

import { Action, Getter } from "vuex-class";
const TextField = () => import("../../views/InputElements/TextField.vue");
@Component({
  components: {
    TextField,
    Button,
    Dialog,
  },
})
export default class login extends Vue {
  $refs!: {
    vue: Vue;
  };
  @Action("auth/login") login!: (login: object) => Promise<any>;
  @Action('auth/createPassword') createPassword!: (param: object) => Promise<object>
  
  public dialog:boolean=false
  

  get userInfo(): object {
    
    return this.$store.getters["auth/getUser"];
  }

  get check_login_token(): Boolean {
    let check = this.$store.getters['auth/apiAccessToken']
    return check!='' ? false : true
  }
  logout(){
    localStorage.removeItem('token')
    this.$store.commit('auth/API_ACCESS_TOKEN', '')
    this.$store.commit('auth/GET_AUTHENTICATED_USER_SUCCESS', {})
  }
  
  get apiAccessToken(){
    let accesToken= this.$store.getters["auth/apiAccessToken"];
    return accesToken
  }
  btn_loader_login = false
  
  public loginS:string = 'login';
  forgetPasw(){
    this.$store.dispatch('auth/confirmPass',this.userInfo)
  }
  async submit(){
    if (this.$refs["form"].validate()) {
      this.btn_loader_login = true
      await this.login(this.userInfo).then((res) => {
        if (res.success) {
          localStorage.setItem('token', this.apiAccessToken)
          // localStorage.setItem('loginState', this)
          this.$router.push({ path: "/questioner" });
        }
        else
          Vue.prototype.$flashStorage.flash(res.message, "error", {
            timeout: 3000,
          });
        this.btn_loader_login = false
      }).catch(err=>{
        this.btn_loader_login = false
      });
    }
    
  }




  public showPassword: boolean = false;

  formState = 0;
  signupPage() {
    this.$store.dispatch("auth/setForm", this.formState);
  }
}
</script>
<style scoped>
  ::v-deep .v-input .v-label{
    line-height: 22px;
  }
.from-wrapper {
  background-image: linear-gradient(to bottom right, #0d3c94, #058ab3);
  padding: 40px;
  border-radius: 50px 50px 50px 50px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  margin-right: 8px;
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
  font-size: 18px;
  color: #222648;
  text-decoration: none;
}
.login {
  font-family: "Sitka";
  font-size: 26px;
  width: 100%;
  background: #222648;
  color: #f7f9fc;
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
  overflow: hidden;
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
.inner-wrapper input:focus + .lable-name .content-name,
.inner-wrapper input:valid + .lable-name .content-name {
  transform: translateY(-70%);
  font-size: 14px;
  color: #222648;
}
.inner-wrapper input:focus + .lable-name::after,
.inner-wrapper input:valid + .lable-name:after {
  transform: translateX(0%);
}
.logo{
   background: #222648;
}
</style>