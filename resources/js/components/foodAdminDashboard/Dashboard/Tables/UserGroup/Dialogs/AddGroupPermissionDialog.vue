<template>
    <v-col v-show="dialog2 == true" cols="12" sm="12" md="12">
        <v-col>
            <v-switch color="success" v-model="editedGroup['group_permission']['users']" hide-details
                :label="`Users: ${editedGroup['group_permission']['users']}`"></v-switch>
        </v-col>
        <v-col>
            <v-switch color="success" v-model="editedGroup['group_permission']['user_group']" hide-details
                :label="`User_group: ${editedGroup['group_permission']['user_group']}`"></v-switch>
        </v-col>
        <v-col>
            <v-switch color="success" v-model="editedGroup['group_permission']['category']" hide-details
                :label="`Category: ${editedGroup['group_permission']['category']}`"></v-switch>
        </v-col>

    </v-col>
</template>

<script lang="ts">
import { Component, Vue, Prop, Watch } from "vue-property-decorator";
@Component({})
export default class AddGroupPermissionDialog extends Vue {
    @Prop({ default: false }) readonly dialog2: Boolean
    @Prop() readonly selectedGroupPermission: Object
    @Prop() editedGroup: Object
    @Watch('editedGroup') OnChange(newValue:Object,oldValue:Object){
        debugger
        console.log("old value is ",oldValue);
        console.log("new value is ",newValue);
        
    } 
    mounted() {
        debugger
        this.editedGroup = Object.assign({}, this.selectedGroupPermission)
    }
};
</script>

<style></style>