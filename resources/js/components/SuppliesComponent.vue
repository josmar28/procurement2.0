<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <vue-confirm-dialog></vue-confirm-dialog>
                <h4 class="card-title">Supplies List</h4>
                    <div style="margin-bottom:20px;">
                        <button type="button"
                        class="btn waves-effect waves-light btn-rounded btn-success" @click="create_supply()">Add Supply</button>
                    </div>
                <div class="table-responsive">
                    <font size="2">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Item Description</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="dat in dataLists" :key="dat.id">
                                <td width="5%"> 
                                    <div class="btn-group">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button" @click="view(dat)"><i class="far fa-edit"></i> View/Edit</button>
                                            <button class="dropdown-item" type="button" @click="remove(dat)"><i class="far fa-trash-alt"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                                <td>{{dat.supply_id}}</td>
                                <td>{{dat.category}}</td>
                                <td>{{dat.item}}</td>
                                <td style="white-space:normal;">{{dat.item_desc}}</td>
                                <td>{{dat.price}}</td>
                                <td>{{dat.unit}}</td>
                                <td>
                                    <p v-if="dat.status == 1"> Active</p>
                                    <p v-else>Inactive</p>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Item Description</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </font>
                </div>
            </div>
        </div>

        <div id="create_supply_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel"> <p v-if="form.id">View Supply</p><p v-else>Add Supply</p>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" class="form-control" placeholder="Input Here..." v-model="form.supply_id">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <h4 class="card-title">Category</h4>
                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.category">
                                                            <option value="" selected >-Select-</option>
                                                            <option v-for="cat in category" :value="cat.category_id">{{ cat.category }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">Item</h4>
                                                                <input type="text" class="form-control" placeholder="Input Here..." v-model="form.item" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Item Description</h4>
                                                            <textarea class="form-control" rows="3" v-model="form.item_desc" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Price</h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.price" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Unit</h4>
                                                            <input type="text" class="form-control" placeholder="Input Here..." v-model="form.unit" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Status</h4>
                                                                <select class="form-control filter_item" id="exampleFormControlSelect1" v-model="form.status">
                                                                <option value="" selected >-Select-</option>
                                                                <option value="1">Active</option>
                                                                <option value="2">Inactive</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="text-right">
                                                        <button class="btn btn-info" @click="supply_submit()">Submit</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>        
                    </div> 
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
export default{
    props: ['data'],
    data() {
        return {
            dataLists: this.data,
            form: {
                supply_id: null,
                category: null,
                item: null,
                item_desc: null,
                price: null,
                unit: null,
                status: null,
            },
            category: [],
        }
    },
    methods: {
        create_supply(){
            const vm = this;
            vm.form.supply_id = null,
            vm.form.category = null,
            vm.form.item = null,
            vm.form.item_desc = null,
            vm.form.price = null,
            vm.form.unit = null,
            vm.form.status = null,
            $('#create_supply_modal').modal('show');
            axios
                .get('/procurement2.0/get/supp_category')
                .then(function(response){
                    // console.log(response.data.cat);
                    vm.category = response.data.cat;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        supply_submit(){
            const vm = this;
            axios
                .post('/procurement2.0/procurement/create/supply', this.form)
                .then(function(response){
                    vm.dataLists.push(response.data.data);
                    vm.form.supply_id = null,
                    vm.form.category = null,
                    vm.form.item = null,
                    vm.form.item_desc = null,
                    vm.form.price = null,
                    vm.form.unit = null,
                    vm.form.status = null,
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        view(data){
            console.log(data);
            const vm = this;
            vm.form.supply_id = data.supply_id;
            vm.form.category = data.category_id;
            vm.form.item = data.item;
            vm.form.item_desc = data.item_desc;
            vm.form.price = data.price;
            vm.form.unit = data.unit;
            vm.form.status = data.status;
            $('#create_supply_modal').modal('show');
            axios
                .get('/procurement2.0/get/supp_category')
                .then(function(response){
                    // console.log(response.data.cat);
                    vm.category = response.data.cat;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        remove(data){
            this.$confirm(
            {
            message: 'Are you sure?',
            button: {
                no: 'No',
                yes: 'Yes'
            },
            /**
             * Callback Function
             * @param {Boolean} confirm
             */
            callback: confirm => {
                if (confirm) {
                    axios
                        .post('/procurement2.0/procurement/remove/supply',{
                            supply_id : data.supply_id
                        })
                        .then(function(response){
                            //console.log(response.data.status)
                            if(response.data.status == 'updated')
                                {
                                    location.reload();
                                }
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                    }
                }
            }
            )
        },
    },
}
</script>