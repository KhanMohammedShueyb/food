<template>
    <section class="white d-flex flex-column align-center">
        <v-card flat tile class="container white" width="100%">
            <v-row>
                <v-col cols="12" md="3"><v-btn width="100%" class="font-weight-bold text-h5" text  color="black">Broken iphone?
                    </v-btn></v-col>
                <v-col cols="12" md="3"><v-btn width="100%" class="font-weight-bold text-h5" text  color="black">Broken Sansung Galaxy?
                    </v-btn></v-col>
                <v-col cols="12" md="3"><v-btn width="100%" class="font-weight-bold text-h5" text  color="black">Broken iPad?
                    </v-btn></v-col>
                <v-col cols="12" md="3"><v-btn width="100%" class="font-weight-bold text-h5" text  color="black">Computer Not Working?
                    </v-btn></v-col>
            </v-row>
        </v-card>
        <v-card flat tile class="container white" height="100vh">
            <v-row>
                <v-col class="py-0" cols="12" md="4">
                    <v-img contain src="iphone-home-issues.jpg" height="80%">
                    </v-img>
                </v-col>
                <v-col cols="12" md="8">
                    <v-card flat tile class="pa-6 mt-16" color="#f7f7f7">
                        <v-card-title class="font-weight-bold black--text">
                            Apple Genuine Parts Now Available at CPR Stores
                        </v-card-title>
                        <v-card-text class="text-h6 black--text">
                            CPR offers iPhone repairs using genuine Apple parts, Apple diagnostic software, tools, and
                            processes to ensure your iPhone® repair is done reliably and safely. Be sure to ask a store
                            associate about genuine Apple part options and availability.
                        </v-card-text>
                    </v-card>

                    <v-card flat tile class="white">
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-card v-for="(item, i) in left_content" :key="i" flat tile class="pa-6" color="white">
                                    <v-card-title class="font-weight-bold black--text">
                                        {{ item.title }}
                                    </v-card-title>
                                    <v-card-text class="text-h6 black--text">
                                        {{ item.description }}
                                    </v-card-text>
                                </v-card>
                                <v-col class="pt-0">
                                    <v-btn width="100%" x-large color="red">LET US FIX IT
                                    </v-btn>
                                </v-col>
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-card v-for="(item, i) in right_content" :key="i" flat tile class="pa-6" color="white">
                                    <v-card-title class="font-weight-bold black--text">
                                        {{ item.title }}
                                    </v-card-title>
                                    <v-card-text class="text-h6 black--text">
                                        {{ item.description }}
                                    </v-card-text>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
            </v-row>
        </v-card>
    </section>
</template>

<script>
export default {
    name: "CellPhone",
    data() {
        return {
            left_content: [
                {
                    title: "Cracked Screen",
                    description: "CPR’s iPhone cracked screen replacement services are both fast and affordable. In fact, a majority of iPhone screen repairs can be completed within one business day, if not while you wait in-store."
                },
                {
                    title: "Water Damage",
                    description: "If your iPhone is suffering from water damage, visit CPR. We will perform a professional diagnostic to determine the extent of the damage, clean out the device, flush out any debris and test accordingly."
                },
                {
                    title: "Speaker Not Working",
                    description: "If your iPhone speaker is muffled, distorted, or simply producing no sound at all, you may be in need of a speaker repair or replacement. Trust the experts at CPR to solve all of your iPhone audio issues."
                },
            ],
            right_content: [
                {
                    title: "No Signal",
                    description: "When you are experiencing weak signal or no signal on your iPhone, CPR is here to help. Your iPhone could be suffering from a variety of issues including water damage, SIM card damage, or outdated software."
                },
                {
                    title: "Broken Buttons",
                    description: "If buttons on your iPhone are malfunctioning or broken, count on the technicians of CPR for professional repair services. We work quickly to fix the problem so that you never have to be without your iPhone."
                },
                {
                    title: "Dead Battery",
                    description: "An iPhone battery that won’t hold its charge can put a serious damper on your productivity. Luckily, CPR performs professional iPhone battery replacements so that your iPhone can keep up with your busy lifestyle."
                },
            ]
        }
    }
}
</script>