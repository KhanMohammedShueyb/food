<template>
    <v-container fluid fill-height class="loginOverlay">
        <v-layout row wrap align-center justify-center>
            <v-card width="550" class="mx-auto mt-5">
                <v-form ref="form" @submit.prevent="submit">
                    <v-card-title class="pb-0">
                        <h1>Confirm Password</h1>
                    </v-card-title>
                    <v-card-text>
                        <TextField
                        :model.sync="userInfo.password"
                        label="Enter your password"
                        :rules="[v => !!v || 'Password is required']"
                        :required="true"
                        :type="showPassword ? 'text' : 'password'"
                        :prependicon_bool="true"
                        prependicon="lock"
                        :appendicon_bool="true"
                        :appendicon="
                            showPassword ? 'visibility' : 'visibility_off'
                        "
                        @onClick="showPassword = !showPassword"
                        v-on:keyup.enter="submit"
                            
                        />
                        <TextField
                        :rules="[[v => !!v || 'Password is required'],passwordConfirmationRule]"
                        :model.sync="userInfo.password_confirmation"
                        label="Confirm your password"
                        :required="true"
                        :type="showPassword ? 'text' : 'password'"
                        :prependicon_bool="true"
                        prependicon="lock"
                        :appendicon_bool="true"
                        :appendicon="showPassword ? 'visibility' : 'visibility_off'"
                        @onClick="showPassword = !showPassword"
                        v-on:keyup.enter="submit"
                            
                        />
                        
                        <input type="submit" style="display: none;" />
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <Button
                            label="Reset Password"
                            class="no-uppercase"
                            @onClick="submit"
                        />
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-form>
            </v-card>
        </v-layout>
    </v-container>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
const TextField = () => import("../../views/InputElements/TextField.vue");
const Button = () => import("../../views/buttons/Button.vue");
import { Action, Getter } from "vuex-class";
@Component({
    components: {
        TextField,
        Button
    }
})
export default class ConfirmPassword extends Vue {
@Action('auth/updatePassword') updatePassword!: (param: object) => Promise<object>
   $refs!: {
        vue: Vue;
    };
    get passwordConfirmationRule() : any {
        return () => (this.userInfo['password'] === this.userInfo['password_confirmation']) || 'Password must match'
    }
    public userInfo:object={
       password : '',
       confirm_password : '',

    }
    public userId:number = 0;
     get allUsers(): object {
        return this.$store.getters["auth/allUsers"];
    }  
    created(){
        debugger
    var email = this.$route.query.email
    let arr:any =this.allUsers
     for(var val of arr){
       if(val.email==email){
           this.userId=val.id
           return val.id
       }
     }
    }
    submit(){
        this.updatePassword({...this.userInfo,id:this.userId})
        this.$router.push({ path: "/public/login" });
    }
     public showPassword: boolean = false;
    

}
</script>
<style scoped>
.loginOverlay {
    background-color: #f5f5f9 !important;
}

.no-uppercase {
    text-transform: none;
}
</style>
