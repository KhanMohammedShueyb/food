<template>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card flat tile class="dialog">
            <v-card-title class="titlee">
                <v-btn @click="dialog1 = true, dialog2 = false" class="btn">{{ formTitle() }}</v-btn>
                <v-btn @click="dialog2 = true, dialog1 = false" class="btn ml-5">{{ formTitle1() }}</v-btn>
            </v-card-title>
            <v-col v-show="dialog1 == true" cols="12" sm="12" md="12">
                <v-text-field class="label-color" solo v-model="editedGroup['name']" label="Name"></v-text-field>
            </v-col>
            <AddGroupPermissionDialog
            v-if="dialog2"
            :dialog2="dialog2"
            :selectedGroupPermission="selectedItem"
            :editedGroup="editedGroup"
            />
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="btn" @click="close">Cancel</v-btn>
                <v-btn color="btn" @click="save">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script lang="ts">
import { Component, Vue, Prop,Watch } from "vue-property-decorator";
import { Action, Getter } from "vuex-class";
import { isEmptyObject } from "jquery";
import AddGroupPermissionDialog from "./AddGroupPermissionDialog.vue";
@Component({
    components:{
        AddGroupPermissionDialog
    }
})
export default class AddUserGroupDialog extends Vue {
    @Action("usergroup/createGroup") create!: (
        params: Object
    ) => Promise<Array<Object>>;
    @Action("usergroup/updateGroup") update!: (
        param: Object
    ) => Promise<Array<Object>>;

    @Getter("usergroup/getGroup") get: () => Promise<Array<Object>>;

    @Action("groupPermission/CreateGroupPermission") CreateGroupPermission!: (
        params: Object
    ) => Promise<Array<Object>>;
    @Action("groupPermission/ShowGroupPermission") ShowGroupPermission!: () => Promise<
        Array<Object>
    >;
    @Action("groupPermission/UpdateGroupPermission") UpdateGroupPermission!: (
        param: Object
    ) => Promise<Array<Object>>;
    @Getter("groupPermission/getPermission") getPermission: () => Promise<
        Array<Object>
    >;


    @Prop({ default: false }) readonly dialog: boolean
    @Prop() readonly editedIndex: number
    @Prop() readonly selectedItem: object


    public dialog1: Boolean = true;
    public dialog2: Boolean = false;
    public groupID: number;

    public Id: any;
    public editedGroup: Object = {
        name: "",
        group_permission: {
            users: false,
            user_group: false,
            category: false
        }
    };

    public defaultItem: Object = {
        name: "",
        group_permission: {
            users: false,
            user_group: false,
            category: false
        }
    };

  

    public formTitle(): String {
        return this.editedIndex === -1 ? "New Group" : "Edit Group";
    }

    public formTitle1(): String {
        return this.editedIndex === -1
            ? "New Group Permission"
            : "Edit Group Permission";
    }
    public close() {
        debugger
        this.$emit('close-dialog')
    }

    public save(): void {
        if (this.editedIndex > -1) {
            debugger;
            this.Id = this.selectedItem["id"];
            const editedGroup = {
                name: this.editedGroup["name"],
                Id: this.editedGroup["Id"]
            };
            this.update({ Id: this.Id, editedGroup: editedGroup, GroupPermission: this.editedGroup['group_permission'] }).then(Response => {
                if (Response["success"] == true) {
                    debugger;
                    this.UpdateGroupPermission(Response["group_permission"]).then(res => { 
                        if(res['success']==true){
                            debugger
                            this.close();
                            alert("Group Permissions updated")
                            
                        }
                     });
                    this.close();
                    alert("updated");
                } else {
                    alert("not updated");
                }
            });
           
        } else {
            debugger;
            this.create(this.editedGroup).then(response => {
                debugger;
                if (response["success"] == true) {

                    this.groupID = response["Usergroup"].id;
                    response["Usergroup"]['group_permission']["user_group_id"] = this.groupID;
                    this.CreateGroupPermission(response["Usergroup"]['group_permission']).then(res => {

                    });
                    alert("Created Successfully");
                } else {
                    alert("error");
                }
            });
            this.close();
        }
      
    }
    mounted() {
       
        if (!isEmptyObject(this.selectedItem)) {
            this.editedGroup = Object.assign({}, this.selectedItem)
        }
        else{
            this.editedGroup = Object.assign({}, this.defaultItem)
        }
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

:deep(.v-data-footer__select .v-select__selections .v-select__selection--comma) {
    color: black;
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

:deep(.theme--dark.v-label) {
    color: black !important;
}

:deep(.v-input--selection-controls .v-input__slot > .v-label, .v-input--selection-controls .v-radio > .v-label) {
    margin-top: 9px !important;
}

:deep(.custom-label-color .v-input) {
    color: #122932;
    opacity: 1;
}
</style>