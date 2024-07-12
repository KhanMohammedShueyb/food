<template>
    <div>
        <v-card flat tile class="white" width="90vw">
            <v-row>
                <v-col v-for="(item, i) in device" :key="i">
                    <v-card flat tile class="white pa-5" width="290px">
                        <v-img :src="item.img" height="180px" contain></v-img>
                        <v-card-title class="d-flex justify-center black--text font-weight-bold text-h5 py-8">{{ item.title }}</v-card-title>
                        <v-card-subtitle class="black--text font-weight-medium text-h6 pb-0">Total Qty :
                            {{ item.quantity }}</v-card-subtitle>
                    </v-card>
                </v-col>
            </v-row>
        </v-card>
    </div>
</template>

<script>
export default {
    name: "IPad",
    data(){
        return{
            device:[
                {
                    img:'/iPad.png',
                    title:'iPad 5',
                    quantity:'6'
                },
                {
                    img:'/iPad1.png',
                    title:'iPad 5',
                    quantity:'6'
                },
                {
                    img:'/iPad.png',
                    title:'iPad 5',
                    quantity:'6'
                },
                {
                    img:'/iPad1.png',
                    title:'iPad 5',
                    quantity:'6'
                },
                {
                    img:'/iPad1.png',
                    title:'iPad 5',
                    quantity:'6'
                },
             
                
                
            ]
        }
    }
}
</script>

<style></style>