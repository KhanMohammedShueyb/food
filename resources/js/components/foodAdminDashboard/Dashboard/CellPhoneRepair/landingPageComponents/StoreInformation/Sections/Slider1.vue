<template>
    <div>
        <v-carousel cycle class="py-16"  height="auto"  hide-delimiter-background  :show-arrows="false">
            <v-carousel-item v-for="(item, i) in info" :key="i">
                <v-card width="45vw" flat tile class="tabview white">
                    <v-img :src="item.img"></v-img>
                    <v-card-title class="mobile pl-0 py-10 black--text text-h4 font-weight-bold">
                        {{ item.title }}
                    </v-card-title>

                    <v-card-subtitle class="pl-0 black--text text-h6 ">
                        {{ item.description }}
                    </v-card-subtitle>

                    <v-btn v-if="item.show == true" x-large class="pa-8 font-weight-black red white--text">
                        learn more
                    </v-btn>
                </v-card>

            </v-carousel-item>
        </v-carousel>

    </div>
</template>

<script>
export default {
    name: "Slider1",
    data() {
        return {
            info: [
                {
                    img: "PC-repair.png",
                    title: "Computer Repairs Done Right.",
                    description: " If your Mac or PC is moving at a snail's pace, depend on the professionals at Cell Phone Repair Astoria for computer troubleshooting and repairs done right.",
                    show: true
                },
                {
                    img: "battery.jpg",
                    title: "iPhone Battery Replacement Service.",
                    description: "Is your iPhone running slower than usual? It may be time for an iPhone battery replacement! Rely on Cell Phone Repair Astoria for fast, affordable battery replacement services for all of the most popular iPhone models including the iPhone XS, iPhone XR, iPhone 11, iPhone 12, iPhone 13, and iPhone 14.",
                    show: false
                },
                {
                    img: "cell.jpg",
                    title: "Sell Your Phone.",
                    description: "Have old, unwanted smartphones lying around the house? Let Cell Phone Repair Astoria make you an offer on your existing smartphone!.",
                    show: false
                }
            ]
        }
    }
}
</script>

<style scoped>

:deep(.mdi-circle::before){
    color: black;
}
@media screen and (max-width: 1024px) {
    .tabview{
        width: 100% !important;
    }
}
@media screen and (max-width: 600px) {
    .mobile{
        font-size: 4.8vw !important;
    }
}
</style>