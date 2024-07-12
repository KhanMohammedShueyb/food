<template>
    <section>
        <v-card class="pa-3 borders d-flex align-center " height="951px" flat tile>
            <v-card class="card pb-10 px-5" width="400px" flat tile>
                <v-col class="d-flex justify-center">
                    <v-card-title>
                        <h2>Create an account?</h2>
                    </v-card-title>
                </v-col>
                <v-form ref="form" v-model="valid" lazy-validation>
                    <v-col class="d-flex justify-start pa-0">
                        <v-text-field v-model="data['name']" required :rules="nameRules" class="custom-label-color" rounded solo label="Username">
                        </v-text-field>
                    </v-col>
                    <v-col class="d-flex justify-start pa-0">
                        <v-text-field v-model="data['email']" required :rules="emailRules" class="custom-label-color" rounded solo label="email">
                        </v-text-field>
                    </v-col>
                    <v-col class="d-flex justify-start pa-0">
                        <v-text-field v-model="data['password']" required :rules="passwordRules" class="custom-label-color" rounded solo label="Password">
                        </v-text-field>
                    </v-col>
                    <v-col class="d-flex justify-start pa-0">
                        <v-select v-model="data['gender']" :items="items1" required :rules="genderRules" class="custom-label-color" rounded solo label="Select your gender">
                        </v-select>
                    </v-col>
                    <v-col class="d-flex justify-start pa-0">
                        <v-text-field v-model="data['phno']" required :rules="phnoRules" class="custom-label-color" rounded solo label="phno">
                        </v-text-field>
                    </v-col>
                    <v-col class="d-flex justify-start pa-0">
                        <v-select v-model="data['type']" :items="items" required :rules="typeRules" class="custom-label-color" rounded solo label="1 for admin && 2 for customer">
                        </v-select>
                    </v-col>
                    <!-- <v-col class="d-flex justify-start pa-0">
                        <v-text-field v-model="password" required :rules="passwordRules" class="custom-label-color" rounded solo label="Re-enter Password">
                        </v-text-field>
                    </v-col> -->

                    <v-col class="d-flex justify-start pa-0">
                        <v-btn width="100%" @click="validate()" rounded x-large class="px-1 btn d-flex align-center justify-center">
                            Signup
                        </v-btn>
                    </v-col>
                </v-form>
                <!-- <v-col class="d-flex justify-space-between align-center pa-0">
                        <v-checkbox label="Remember me" color="white" value="Remember me" hide-details></v-checkbox>
                        <span class="mt-4">Forgot Password</span>
                    </v-col> -->
                <v-col></v-col>
                <v-col></v-col>
                <v-col class="d-flex justify-center align-center pa-0">
                    <v-btn @click="redirectToLogin()" class="btn1" text>
                        <h5 class="mt-4">already register login </h5>
                    </v-btn>
                </v-col>

            </v-card>
        </v-card>
    </section>
</template>

<script lang="ts">

import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';
import axios from 'axios';
@Component({
    components: {

    }
})
export default class signups extends Vue {
  @Action("Authenticated/register") register!: (params:Object) => Promise<Array<Object>>;

    public data:Object = {
        name: '',
        email: '',
        password: '',
        gender: '',
        phno: '',
        type: null
    }
    redirectToLogin() {
        this.$router.push({ path: '/' })
    }
    $refs!: {
        vue: Vue;
    };
    public items:any=["customer"]
    public items1:any=["male","female"]
    public valid: Boolean = true;
    public nameRules: Array<Object> = [
        (v: any) => !!v || 'Name is required',
        (v: any) => (v && v.length <= 10) || 'Name must be less than 10 characters',
    ]
    public typeRules: Array<Object> = [
        (v: any) => !!v || 'type is required',
    ]
    public emailRules: Array<Object> = [
        (v: any) => !!v || 'email is required',
    ]
    public passwordRules: Array<Object> = [
        (v: any) => !!v || 'Password is required',
    ]
    public genderRules: Array<Object> = [
        (v: any) => !!v || 'gender is required',
    ]
    public phnoRules: Array<Object> = [
        (v: any) => !!v || 'phno is required',
    ]
    validate() {
        const val =  this.$refs["form"].validate()
       this.register(this.data).then(res => {
        if (res['data'].success == true && val) {
            alert("successfully created account");
          this.$router.push({ path: "/verify" });
        }
       })
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
    position: relative;

}

:deep(.v-input--selection-controls .v-input__slot, .v-input--selection-controls .v-radio) {
    align-items: flex-start !important;

}

.btn1 {
    /* color: #efaf11 !important; */
    color: white;
    /* font-weight: bold; */
}

:deep(.v-input--selection-controls__input+.v-label) {
    margin-top: 3px !important;
}

:deep(.custom-label-color .v-input) {
    color: white !important;
    opacity: 1;
}

h2 {
    /* color: #fee1c7; */
    /* color: #efaf11;
    font-weight: bolder !important; */
    color: white;
    font-weight: bold;
}

.card {
    /* position: relative;
    top: 200px;
    height: 500px !important; */
    /* background-color: #132702; */
    background-color: transparent;
    position: relative;
    left: 450px;
    /* opacity: 0.6; */
    border: none;

}

:deep(.theme--dark.v-text-field--solo>.v-input__control>.v-input__slot) {
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

:deep(.custom-label-color .v-label) {
    color: white;
}

:deep(.theme--dark.v-input input) {
    color: #132702 !important;
}

@media screen and (max-width:600px) {
    .borders {
        width: auto !important;
        height: 125vh !important;
        display: flex;
        justify-content: center !important;
    }

    .card {
        left: 0px !important;
        position: relative;

    }
}

@media screen and (max-width:1024px) {
    .borders {
        width: auto !important;
        display: flex;
        height: 125vh !important;
        justify-content: center !important;
    }

    .card {
        left: 0px !important;
        position: relative;

    }
}
</style>