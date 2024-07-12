<template>
    <div>
        <v-card flat tile class="white py-5" align="center">
            <v-card flat tile class="white card" width="90vw">
                <v-card-title class="black--text font-weight-black text-h3">Devices</v-card-title>
                <v-divider class="mt-0 divider"></v-divider>
            </v-card>
            <v-card flat tile class="white py-10 card" width="90vw">
                <v-btn :class="item.bgcolor"  v-for="(item, i) in btns" :key="i" @click="showModels(item,btns)"
                    class="px-10 btn rounded-t-xl mx-1 font-weight-black text-h5" x-large>{{ item.btn }}</v-btn>
                <!-- <v-btn class="px-10 btn rounded-t-xl  font-weight-black text-h5" x-large>Samsung</v-btn>
                <v-btn class="px-10 btn rounded-t-xl  font-weight-black text-h5" x-large>iPad</v-btn> -->
                <v-divider class="mt-0 divider1"></v-divider>
            </v-card>
            <IPhone v-if="show == true" />
            <Samsung v-else-if="show1 == true" />
            <IPad v-else-if="show2 == true" />
        </v-card>
    </div>
</template>

<script>
import IPhone from './PhoneModels/IPhone.vue'
import Samsung from './PhoneModels/Samsung.vue'
import IPad from './PhoneModels/IPad.vue'
export default {
    name: "Devices",
    components: {
        IPhone,
        Samsung,
        IPad
    },
    data() {
        return {
            show: true,
            show1: false,
            show2: false,
            btns: [
                {
                    btn: "Iphone",
                    bgcolor:"red"
                },
                {
                    btn: "Samsung",
                    bgcolor:"grey"
                },
                {
                    btn: "Ipad",
                    bgcolor:"grey"
                }

            ],
        }
    },
    methods: {
        showModels(item,btns) {
            if (item.btn == 'Iphone') {
                this.show= true
                this.show1= false
                this.show2= false
                item.bgcolor = "red"
                btns[1].bgcolor = "grey"
                btns[2].bgcolor = "grey"
            }
            else if (item.btn == 'Samsung') {
                this.show= false
                this.show1= true
                this.show2= false
                item.bgcolor = "red"
                btns[0].bgcolor = "grey"
                btns[2].bgcolor = "grey"
            }
            else if (item.btn == 'Ipad') {
                this.show= false
                this.show1= false
                this.show2= true
               item.bgcolor = "red"
               btns[0].bgcolor = "grey"
                btns[1].bgcolor = "grey"
            }
        }
    }

}
</script>

<style scoped>
.divider {
    border: 2px solid #2196f3 !important;
}


.divider1 {
    border: 2px solid grey !important;
}

@media screen and (max-width: 600px) {
    .card {
        width: 100% !important;
    }

    .btn {
        font-size: 15px !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
    }
}
</style>