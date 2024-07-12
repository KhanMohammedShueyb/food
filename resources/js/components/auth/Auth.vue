<template>
    <v-container fluid fill-height class="loginOverlay">
        <v-layout row wrap align-center justify-center>
            <v-card width="550" class="mx-auto mt-5">
                <!-- <v-tabs
                    v-model="tab"
                    background-color="#0b97b9"
                    centered
                    dark
                    icons-and-text
                >
                    <v-tabs-slider></v-tabs-slider>
                    <v-tab href="#login">
                        Login
                    </v-tab>
                    <v-tab href="#signup">
                        Signup
                    </v-tab>
                </v-tabs>

                <v-tabs-items v-model="tab">
                    <v-tab-item value="login">
                        <v-card flat>
                            <v-card-text> -->
                                <Login/>
                            <!-- </v-card-text>
                        </v-card>
                    </v-tab-item>
                    <v-tab-item value="signup">
                        <v-card flat>
                            <v-card-text>
                                <SignUp/>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items> -->
            </v-card>
        </v-layout>
    </v-container>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
const Login = () => import('./Login.vue')
const SignUp = () => import('./SignUp.vue')
@Component({
    components: {
        Login,
        SignUp
    }
})
export default class Auth extends Vue {
   
    tab = null
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
