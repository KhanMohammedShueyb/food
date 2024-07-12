<template>
    <v-dialog persistent v-model="dialog" max-width="500px">
        <v-card flat tile class="dialog">
            <v-card-title class="titlee">
                <span class="text-h5">{{ formTitle() }}</span>
            </v-card-title>


            <v-col cols="12" sm="12" md="12">

                <v-text-field class="label-color" solo v-model="editedItem['Image']" label="Image"></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="12">
                <v-text-field class="label-color" solo v-model="editedItem['Name']" label="Name"></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="12">
                <v-text-field class="label-color" solo v-model="editedItem['Item_Group']" label="Item Group"></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="12">
                <v-text-field class="label-color" solo v-model="editedItem['Quantity']" label="Quantity"></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="12">
                <v-text-field solo class="label-color" v-model="editedItem['Price']" label="Price"></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="12">
                <v-text-field solo class="label-color" v-model="editedItem['Description']"
                    label="Description"></v-text-field>
            </v-col>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="btn" @click="close">Cancel</v-btn>
                <v-btn color="btn" @click="save">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script lang="ts">
import axios from 'axios'
import { Component, Vue, Prop } from 'vue-property-decorator'
import { Action } from 'vuex-class'
@Component({
    components: {}
})
export default class AddProductDialog extends Vue {
    @Prop({ default: true }) readonly dialog: Boolean
    @Prop() readonly selectedItem: Object
    @Prop() readonly editedIndex: number
    @Action("ProductStore/createProducts") create!: (
        params: Object
    ) => Promise<Array<Object>>;
    @Action("ProductStore/updateProducts") update!: (
        param: Object
    ) => Promise<Array<Object>>;

    public Id: any;
    public editedItem: Object = {
    // id: '',
    Image: "",
    Name: "",
    Item_Group: "",
    Quantity: 0,
    Price: 0,
    Description: ""
  };
    public formTitle(): String {
        return this.editedIndex === -1 ? "New Item" : "Edit Item";
    }

    public save(): void {
        if (this.editedIndex > -1) {
            this.Id = this.selectedItem["id"];
            this.update({ Id: this.Id, editedItem: this.editedItem})
                .then(Response => {
                    if (Response['success'] == true) {
                        alert("updated");
                        this.close();
                    } else {
                        alert("not updated");
                        this.close();
                    }
                });
        } else {
               this.create(this.editedItem)
                .then(response => {
                    debugger
                    if (response['data']['success'] == true) {
                        alert("Created Successfully");
                        this.close();
                    } else {
                        alert("error");
                        this.close();
                    }
                });
        }

    }

    public close() {
        this.$emit('close-dialog')
    }
    mounted() {
        this.editedItem = Object.assign({}, this.selectedItem)
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

:deep(.custom-label-color) {
 color:black
}

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
:deep(.theme--dark.v-label) {
    color: black !important;
}
</style>