<template>
  <v-dialog v-model="dialog" persistent max-width="500px">

    <v-card flat tile class="dialog">
      <v-card-title class="titlee">
        <span class="text-h5">{{ formTitle() }}</span>
        <!-- <span class="text-h5">Add User</span> -->
      </v-card-title>
      <v-form ref="form" v-model="valid" lazy-validation>
        <v-col class="d-flex justify-start pa-0 pl-3">
          <v-select v-model="editedGroup" :items="userGroup" required return-object item-text="type"
            item-value="user_group_id" :rules="typeRules" class="custom-label-color" rounded solo
            label="select user group"></v-select>
        </v-col>
        <v-col class="d-flex justify-start pa-0 pl-3">
          <v-text-field v-model="editedGroup['name']" required :rules="nameRules" class="custom-label-color" rounded solo
            label="Username"></v-text-field>
        </v-col>
        <v-col class="d-flex justify-start pa-0 pl-3">
          <v-text-field v-model="editedGroup['email']" required :rules="emailRules" class="custom-label-color" rounded
            solo label="email"></v-text-field>
        </v-col>
        <v-col class="d-flex justify-start pa-0 pl-3">
          <v-text-field v-model="editedGroup['password']" required :rules="passwordRules" class="custom-label-color"
            rounded solo label="Password"></v-text-field>
        </v-col>
        <v-col class="d-flex justify-start pa-0 pl-3">
          <v-select v-model="editedGroup['gender']" :items="items1" required :rules="genderRules"
            class="custom-label-color" rounded solo label="Select your gender"></v-select>
        </v-col>
        <v-col class="d-flex justify-start pa-0 pl-3">
          <v-text-field v-model="editedGroup['phno']" required :rules="phnoRules" class="custom-label-color" rounded solo
            label="phno"></v-text-field>
        </v-col>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="btn" @click="close">Cancel</v-btn>
          <v-btn color="btn" @click="save">Save</v-btn>
        </v-card-actions>
      </v-form>
    </v-card>
  </v-dialog>
</template>
<script lang="ts">
import { Vue, Prop, Component, Emit } from "vue-property-decorator";
import { Getter, Action } from "vuex-class";

@Component({

})


export default class AddUserDialog extends Vue {

  @Prop({ default: false }) readonly dialog: boolean
  @Prop() readonly index: number
  @Prop() readonly selectedItem: object

  // public dialog: Boolean = false;
  public userGroup: Array<Object> = [];
  public items1: any = ["male", "female"]
  public Id: any;
  public editedGroup: Object = {
    name: "",
    email: "",
    password: "",
    gender: "",
    phno: ""
  };

  public defaultItem: Object = {
    name: "",
    email: "",
    password: "",
    gender: "",
    phno: ""
  };
  $refs!: {
    vue: Vue;
  };

  public valid: Boolean = true;

  public nameRules: Array<Object> = [
    (v: any) => !!v || "Name is required",
    (v: any) => (v && v.length <= 10) || "Name must be less than 10 characters"
  ];
  public typeRules: Array<Object> = [(v: any) => !!v || "type is required"];
  public emailRules: Array<Object> = [(v: any) => !!v || "email is required"];
  public passwordRules: Array<Object> = [
    (v: any) => !!v || "Password is required"
  ];
  public genderRules: Array<Object> = [(v: any) => !!v || "gender is required"];
  public phnoRules: Array<Object> = [(v: any) => !!v || "phno is required"];


  public formTitle(): String {
    return this.index === -1 ? "New User" : "Edit User";
  }

  public close() {
    debugger
    this.$emit('close-dialog')
  }

  @Getter("usergroup/getGroup") get: () => Promise<Array<Object>>;
  @Action("usergroup/showGroup") show!: () => Promise<Array<Object>>;
  @Action("Authenticated/register") register!: (
    params: Object
  ) => Promise<Array<Object>>;
  @Action("Authenticated/updateUser") update!: (
    params: Object
  ) => Promise<Array<Object>>;
  public save(): void {
    if (this.index > -1) {
      this.Id = this.selectedItem["id"];
      this.update({ Id: this.Id, editedGroup: this.editedGroup }).then(
        (Response: any) => {
          if (Response['success'] == true) {
            alert("updated");
          } else {
            alert("not updated");
          }
        }
      );
    } else {
      const val = this.$refs["form"].validate();
      this.register(this.editedGroup).then(res => {
        if (res["data"].success == true && val) {
          alert("successfully created account");
          this.$router.push({ path: "/verify" });
        }
      });
    }
    this.close()
  }
  mounted() {
    this.show().then(Response => {
      if (Response["success"] == true) {
        this.get[0].forEach((element: Object) => {
          this.userGroup.push({
            user_group_id: element["id"],
            type: element["name"]
          });
        });
      }
    });
    debugger
    this.editedGroup = Object.assign({}, this.selectedItem)
  }
}
</script>
<style scoped>
:deep(.custom-label-color .v-label) {
  color: #122932;
  opacity: 1;
}

:deep(.theme--dark.v-text-field--solo > .v-input__control > .v-input__slot) {
  background: #f8f8f8 !important;
}

.dialog {
  background-color: #f9f9fb !important;
}

.titlee {
  background-color: #f8f8fa;
}

span {
  color: #122932;
  font-weight: bold !important;
}

.btn {
  color: #2ebd6e;
  background-color: #def2e7 !important;
  font-weight: bold !important;
}

:deep(.custom-label-color .v-label) {
  color: #122932;
  opacity: 1;
}

:deep(.v-data-footer__select .v-select__selections .v-select__selection--comma) {
  color: black;
}

:deep(.mdi-menu-down::before) {
  background-color: #2ebd6e !important;
}

/* :deep(.custom-label-color) {
  max-width: 60%;
} */

:deep(.v-input input) {
  max-height: 32px;
  color: black;
}

:deep(.v-input) {
  max-width: 90%;
}

:deep(.v-select__selection) {
  color: black;
}
</style>
