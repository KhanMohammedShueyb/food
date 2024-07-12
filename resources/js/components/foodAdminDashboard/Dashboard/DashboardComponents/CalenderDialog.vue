<template>
  <section>
    <v-card class="pa-3 borders" height="100vh" flat tile>
      <v-col class="d-flex justify-space-around px-0">
        <v-row>
          <v-col>
            <v-dialog v-model="dialog" width="500">
              <template v-slot:activator="{ on, attrs }">
                <v-btn color="red lighten-2" dark v-bind="attrs" v-on="on">Click Me</v-btn>
              </template>

              <v-card>
                <v-row class="d-flex align-center grey lighten-2">
                  <v-col class="d-flex align-center">
                    <v-icon class="black--text mt-2">mdi-menu</v-icon>
                  </v-col>
                  <v-col class="d-flex justify-end align-center">
                    <v-icon class="black--text mt-2">mdi-close</v-icon>
                  </v-col>
                </v-row>
                <v-col class="pl-10">
                  <v-col>
                    <v-text-field label="Add title"></v-text-field>
                  </v-col>
                  <v-col class="d-flex py-0">
                    <v-btn color=" lighten-2 primary">Event</v-btn>

                    <v-btn class="ml-3" color=" lighten-2 primary">Task</v-btn>

                    <v-btn class="ml-3" color=" lighten-2 primary">Reminder</v-btn>
                  </v-col>
                </v-col>

                <v-col class="d-flex align-center">
                  <v-col cols="12" md="1" class="d-flex align-center pl-0">
                    <v-icon class="white--text mt-2">mdi-clock</v-icon>
                  </v-col>
                  <v-col cols="12" md="11" class="d-flex justify-start align-center pb-0">
                    <div class="py-0">
                      <v-menu v-model="menu1" :close-on-content-click="false">
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            :value="computedDateFormattedMomentjs"
                            clearable
                            label="Formatted with Moment.js"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            @click:clear="date = null"
                          ></v-text-field>
                        </template>
                        <v-date-picker v-model="date" @change="menu1 = false"></v-date-picker>
                      </v-menu>
                    </div>

                    <div class="py-0">
                      <v-menu
                        ref="menu"
                        v-model="menu2"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        :return-value.sync="time"
                        transition="scale-transition"
                        offset-y
                        max-width="290px"
                        min-width="290px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="time"
                            label="Picker in menu"
                            prepend-icon="mdi-clock-time-four-outline"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-time-picker
                          v-if="menu3"
                          v-model="time"
                          full-width
                          @click:minute="['$refs']['menu'].save(time)"
                        ></v-time-picker>
                      </v-menu>
                    </div>
                  </v-col>
                </v-col>

                <v-col class="py-0 d-flex align-center">
                  <v-checkbox
                    v-model="ex4"
                    label="All day"
                    color="white"
                    value="white"
                    hide-details
                    class="mt-n1"
                  ></v-checkbox>
                  <v-btn class="ml-3" color=" lighten-2 primary">Time zone</v-btn>
                </v-col>

                <v-col class="pb-0">
                  <v-select label="Doesnot repeat" solo></v-select>
                </v-col>

                <v-col class="py-0">
                  <v-btn class="ml-3" color=" lighten-2 primary">Find a time</v-btn>
                </v-col>
                <v-col class="py-0 d-flex align-center">
                    <v-icon>mdi-account</v-icon>
                  <v-text-field label="Add guest" solo></v-text-field>
                </v-col>

                <v-divider></v-divider>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="primary" text @click="dialog = false">I accept</v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-col>
        </v-row>
      </v-col>
    </v-card>
  </section>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import moment from "moment";

@Component({})
export default class CalenderDialog extends Vue {
  public dialog: Boolean = true;
  public menu1: Boolean = false;
  public menu2: Boolean = false;

  public time: any = null;
  public ex4: any = null;
  public menu3: Boolean = false;
  public modal2: Boolean = false;

  computedDateFormattedMomentjs() {
    return ["date"] ? moment(["date"]).format("dddd, MMMM Do YYYY") : "";
  }
}
</script>

<style scoped>
.borders {
  background-color: #f8f8fa;
}
:deep(.v-input--selection-controls .v-input__slot, .v-input--selection-controls
    .v-radio) {
  align-items: flex-start !important;
}
:deep(.v-input--selection-controls__input + .v-label) {
  margin-top: 3px !important;
}

@media screen and (max-width: 600px) {
  .borders {
    width: auto !important;
    height: auto !important;
  }
}

@media screen and (max-width: 1024px) {
  .borders {
    width: auto !important;
    height: auto !important;
  }
}
</style>