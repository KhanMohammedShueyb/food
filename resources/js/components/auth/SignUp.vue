<template>
    <v-form ref="form" @submit.prevent="submit">
        <v-card-title class="pb-0">
            <h1>Signup</h1>
        </v-card-title>
        <v-card-text>
            <v-row>
                <v-col
                    cols="6"
                    sm="6"
                    md="6"
                    style="padding-bottom: 0px;">
                    <TextField
                        :model.sync="userInfo.first_name"
                        label="Enter your First Name"
                        :required="true"
                        rule="First Name is required"
                        :prependicon_bool="true"
                        prependicon="account_circle"
                    />
                </v-col>
                <v-col
                    cols="6"
                    sm="6"
                    md="6"
                    style="padding-bottom: 0px;">
                    <TextField
                        :model.sync="userInfo.last_name"
                        label="Enter your Last Name"
                        :required="true"
                        rule="Last Name is required"
                    />
                </v-col>
            </v-row>
            <v-row>
                 <v-col
                    cols="12"
                    sm="12"
                    md="12"
                    style="padding-bottom: 0px;">
                        <TextField
                            :model.sync="userInfo.email"
                            label="Enter your e-mail address"
                            :required="true"
                            rule="email is required"
                            :prependicon_bool="true"
                            prependicon="account_circle"
                        />
                 </v-col>
            </v-row>
            <v-row>
                 <v-col
                    cols="12"
                    sm="12"
                    md="12"
                    style="padding-bottom: 0px;">
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
                </v-col>
            </v-row>
            <v-row>
                 <v-col
                    cols="12"
                    sm="12"
                    md="12"
                    style="padding-bottom: 0px;">
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
                </v-col>
            </v-row>
            <v-row>
                 <v-col
                    cols="12"
                    sm="12"
                    md="12"
                    style="padding-bottom: 0px;">
                    <v-radio-group
                        v-model="userInfo.user_type"
                        color="#0b97b9"
                        row>
                        <v-radio
                            color="#0b97b9"
                            style="color: #0b97b9;"
                            label="Researcher"
                            value="Researcher"
                        ></v-radio>
                        <v-radio
                            color="#0b97b9"
                            style="color: #0b97b9;"
                            label="Visitor"
                            value="Visitor"
                        ></v-radio>
                    </v-radio-group>
                </v-col>
            </v-row>
            <input type="submit" style="display: none;" />
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
            <v-spacer></v-spacer>
            <Button
                label="Signup"
                @onClick="submit"
                class="no-uppercase"
            />
        </v-card-actions>
    </v-form>
</template>

<script lang="ts">
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
export default class SignUp extends Vue {
    $refs!: {
        vue: Vue;
    };
    @Action("auth/registerUser") registerUser!: (login: object) => Promise<any>;

    get passwordConfirmationRule() : any {
        return () => (this.userInfo['password'] === this.userInfo['password_confirmation']) || 'Password must match'
    }

    userInfo = {
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        user_type: 'Visitor',
        password_confirmation: ''
    }
    public submit(): void {
        if (this.$refs["form"].validate()) {
            this.registerUser(this.userInfo).then(res => {
                if (res && res.success) this.$router.push({ path: "score" });
                else if(res&&res.errors&&res.errors.length>0)
                    Vue.prototype.$flashStorage.flash(res.errors[0], "error", {
                        timeout: 3000
                    });
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




