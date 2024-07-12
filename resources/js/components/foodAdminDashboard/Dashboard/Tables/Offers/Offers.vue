<template>
    <section class="mt-3">
        <!-- <v-card class="rounded white pa-5"> -->
        <v-data-table show-select flat tile :search="search" :headers="headers" :items="data" sort-by="Id"
            class="elevation-1 table">
            <template v-slot:top>
                <v-toolbar class="white" tile flat>
                    <v-row>
                        <v-col> <v-toolbar-title>
                                <h2 class="d-flex align-center"><v-icon class="px-2">mdi-offer</v-icon> Offers
                                </h2>
                            </v-toolbar-title>
                        </v-col>
                        <v-col class="d-flex align-center justify-end ">
                            <v-text-field v-model="search" class="custom-label-color mr-5" hide-details single-line
                                color="red" dense solo label="Search anything"
                                prepend-inner-icon="mdi-magnify"></v-text-field>
                            <v-dialog v-model="dialog" max-width="500px">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn class="btn" v-bind="attrs" v-on="on">
                                        New Item
                                    </v-btn>
                                </template>
                                <v-card flat tile class="dialog">
                                    <v-card-title class="titlee">
                                        <span class=" text-h5">{{ formTitle() }}</span>
                                    </v-card-title>

                                    <!-- <v-card-text> -->
                                        <!-- <v-container>
                                            <v-row> -->
                                                <!-- <v-col cols="12" sm="12" md="12">
                                                    <v-text-field solo v-model="editedItem['id']"
                                                       class="label-color" label="Item Code"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-file-input label="File input" solo ref="fileInput"
                                                        v-model="editedItem['image']" @change="uploadFile"
                                                        prepend-icon="mdi-camera"></v-file-input>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field v-model="editedItem['title']"
                                                        label="Name"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field v-model="editedItem['description']"
                                                        label="Item Group"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field v-model="editedItem['condition']"
                                                        label="Quantity"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field v-model="editedItem['discount']"
                                                        label="Price"></v-text-field>
                                                </v-col> -->
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field solo v-model="editedItem['Id']"
                                                    class="label-color" label="Offers Id"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <!-- <v-file-input class="label-color" label="File input" solo ref="fileInput"
                                                        v-model="editedItem['image']" @change="uploadFile"
                                                        prepend-icon="mdi-camera"></v-file-input> -->
                                                        
                                                    <v-text-field class="label-color" solo v-model="editedItem['Title']"
                                                        label="Title"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field class="label-color" solo v-model="editedItem['Image']"
                                                        label="Image"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field class="label-color" solo v-model="editedItem['Description']"
                                                        label="Description"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field class="label-color" solo v-model="editedItem['Condition']"
                                                        label="Condition"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="12" md="12">
                                                    <v-text-field class="label-color" solo v-model="editedItem['Discount']"
                                                        label="Discount"></v-text-field>
                                                </v-col>
                                            <!-- </v-row>
                                        </v-container> -->
                                    <!-- </v-card-text> -->

                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="btn"  @click="close">
                                            Cancel
                                        </v-btn>
                                        <v-btn color="btn"  @click="save">
                                            Save
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-col>

                    </v-row>




                    <v-dialog v-model="dialogDelete" max-width="500px">
                        <v-card class="dialog" flat tile>
                            <v-card-title class="black--text text-h5">Are you sure you want to delete this item?</v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
                <v-icon small class="mr-2" @click="editItem(item)">
                    mdi-pencil
                </v-icon>
                <v-icon small @click="deleteItem(item)">
                    mdi-delete
                </v-icon>
                <v-icon small >
                    mdi-ticket-percent
                </v-icon>
            </template>
            <template v-slot:item.image="{ item }">
                <v-avatar>
                    <img :src="item.image" alt="John">
                </v-avatar>
            </template>
        </v-data-table>
        <!-- </v-card> -->
    </section>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import axios from 'axios';
@Component({
})
export default class offers extends Vue {
    public selected: any = []
    public search: any = ""
    public input: any = []
    public dialog: Boolean = false;
    public dialogDelete: Boolean = false;
    public headers: Array<Object> = [
        {
            text: 'Id',
            align: 'start',
            sortable: false,
            value: 'Id',
        },
        { text: 'Title', value: 'Title' },
        { text: 'Image', value: 'Image' },
        { text: 'Description', value: 'Description' },
        { text: 'Condition', value: 'Condition' },
        { text: 'Discount', value: 'Discount' },
        { text: 'Actions', value: 'actions', sortable: false }
    ]
    public data: Array<Object> = []
    public editedIndex: any = -1
    public Id: any
    public editedItem: Object = {

        Id: '',
        Title: '',
        Image: '',
        Description: '',
        Condition: '',
        Discount: "",

    }
    public defaultItem: Object = {
        Id: '',
        Title: '',
        Image: '',
        Description: '',
        Condition: '',
        Discount: "",
    }
    public editItem(item: any): void {
        this.editedIndex = this.data.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
    }

    public deleteItem(item: any): void {
        this.editedIndex = this.data.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
    }

    public deleteItemConfirm(): void {
        this.Id = this.data[this.editedIndex]["Id"];
        axios.delete("http://127.0.0.1:8000/api/Offer/del/"+this.Id).then(Response => {
            if(Response.data.success == true){
                this.data.splice(this.editedIndex, 1)
            }
            else{
                alert("not deleted")
            }
        })
        this.closeDelete()
    }
    public formTitle(): String {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item';
    }
    public close(): void {
        this.dialog = false
        this.$nextTick(() => {
            this.editedItem = Object.assign({}, this.defaultItem)
            this.editedIndex = -1
        })
    }

    public closeDelete(): void {
        this.dialogDelete = false
        this.$nextTick(() => {
            this.editedItem = Object.assign({}, this.defaultItem)
            this.editedIndex = -1
        })
    }
    public save(): void {
        if (this.editedIndex > -1) {
            this.Id = this.data[this.editedIndex]["Id"];
            Object.assign(this.data[this.editedIndex], this.editedItem)
            axios.put("http://127.0.0.1:8000/api/Offer/upd/"+this.Id,this.editedItem).then(Response => {
            if(Response.data.success == true){
                alert("Updated")
            }
            else{
                alert("not Updated")
            }
        })
        } else {
            this.data.push(this.editedItem)
            axios.post("http://127.0.0.1:8000/api/Offer/create",this.editedItem)
        }
        this.close()
    }
    public uploadFile() {
        this.input = this.$refs.fileInput;
        debugger;
        this.editItem['image'] = this.input['$refs']['input']['files'][0]['name']
        console.log("filessssss :  ", this.editItem['image'])
    }
    mounted(){
        axios.get("http://127.0.0.1:8000/api/Offer/show").then((Response)=>{
            this.data = Response.data.Offer;
        });
    }
}
</script>

<style scoped>
.card1 {
    border-radius: 20px !important;
    background-color: #f8f8f8;
}
:deep(.label-color .v-label) {
    color: #122932;
    opacity: 1;
}
span{
    color: #122932;
    font-weight: bold !important;
}
:deep(.theme--dark.v-text-field--solo>.v-input__control>.v-input__slot) {
    background: #f8f8f8 !important;
}

.btn {
    color: #2ebd6e;
    background-color: #f8f8fa !important;
    font-weight: bold !important;
}
:deep(.v-data-footer__icons-before) {
    /* font-size: 50px !important; */
    background-color: #2ebd6e !important;
}
:deep(.custom-label-color ) {
    max-width: 60%; 
}
:deep(.v-data-footer__select .v-select__selections .v-select__selection--comma) {
    color: black;
}

:deep(.v-data-footer__icons-after) {
    background-color: #2ebd6e !important;

}
:deep(.mdi-menu-down::before) {
    background-color: #2ebd6e !important;
}
:deep(.mdi-offer) {
    font-size: 50px;
    color: #2ebd6e;
}
:deep(.mdi-camera) {
    
    color: #2ebd6e;
}

:deep(.mdi-pencil) {
    font-size: 30px !important;
    color: #2ebd6e;

}
:deep(.mdi-ticket-percent) {
    font-size: 30px !important;
    color: #2ebd6e;

}

:deep(.mdi-delete) {
    font-size: 30px !important;
    color: red;

}

:deep(.mdi-magnify) {

    color: #2ebd6e;
}

:deep(.mdi-checkbox-blank-outline) {

    color: #2ebd6e;
}

:deep(.custom-label-color .v-label) {
    color: #122932;
    opacity: 1;
}

:deep(.custom-label-color .v-input) {
    color: #122932;
    opacity: 1;
}

:deep(.v-input input) {
    max-height: 32px;
    color: black;
}

.table {
    background-color: transparent;
    color: #122932;

}

h2 {
    color: #122932;
    font-weight: bold;
}

:deep(thead) {
    background: #f9f9fb !important;
    height: 60px !important;
}

:deep(th) {
    color: #2ebd6e !important;
    font-size: 20px !important;
    position: relative;
    font-weight: bold;
    vertical-align: middle !important;
}
:deep(.custom-label-color) {
    max-width: 60%; 
}
.titlee{
    background-color: #f8f8fa !important;    
}
.dialog{
    background-color: #f9f9fb !important;
}
:deep(tbody tr) {
    height: 80px;
    border-top: 2px solid #def2e7;
}

:deep(tbody) {
    margin: 80px !important;
}


:deep(td) {

    font-size: 20px !important;
    vertical-align: middle;
}

@media screen and (max-width:600px) {
    :deep(tbody tr) {
        height: auto;
        border-top: 2px solid #def2e7;
    }
}

/* @media screen and (max-width:1024px){
    .borders{
        width: auto !important;
        height: auto !important;
    }
} */
</style>