<template>
    <v-form ref="form" @submit.prevent="submit" >
        <v-card-title class="pb-0">
            <h1>Login</h1>
        </v-card-title>
        <v-card-text>
            <TextField
                :model.sync="userInfo.email"
                label="Enter your e-mail address"
                :required="true"
                rule="email is required"
                :prependicon_bool="true"
                prependicon="account_circle"
            />
            <TextField
                :model.sync="userInfo.password"
                label="Enter your password"
                rule="password is required"
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
            <input type="submit" style="display: none;" />
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
            <Button
                label="Login"
                @onClick="submit"
                class="no-uppercase"
            />
            <v-spacer></v-spacer>
            <Button
                label="Forgot Password"
                :text="true"
                class="no-uppercase"
            />
        </v-card-actions>
    </v-form>
</template>

<script lang="ts">
import { replace } from "lodash";
import { Component, Vue } from "vue-property-decorator";
const TextField = () => import("../views/InputElements/TextField.vue");
const Button = () => import("../views/buttons/Button.vue");
import { Action } from "vuex-class";

@Component({
    components: {
        TextField,
        Button
    }
})
export default class Login extends Vue {
    $refs!: {
        vue: Vue;
    };
    @Action("auth/login") login!: (login: object) => Promise<any>;

    get userInfo(): object {
        return this.$store.getters["auth/getUser"];
    }
    
    public submit(): void {
        if (this.$refs["form"].validate()) {
            this.login(this.userInfo).then(res => {
                if (res.success) 
                {
                    if(res.user.user_role === 'Admin'){
                        this.$router.push({ path: '/admin'});
                    }
                    else{
                        this.$router.push({ path: '/login'});
                        Vue.prototype.$flashStorage.flash("You don't have the access to enter into the Administrator account", "error", {
                            timeout: 3000
                        });
                    }
                }
                else
                    Vue.prototype.$flashStorage.flash(res.message, "error", {
                        timeout: 3000
                    });
            });
        }
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
