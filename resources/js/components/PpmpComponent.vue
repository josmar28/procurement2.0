<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <vue-confirm-dialog></vue-confirm-dialog>
                <h4 class="card-title">PPMP List</h4>
                    <div style="margin-bottom:20px;">
                        <button type="button"
                        class="btn waves-effect waves-light btn-rounded btn-success" @click="create_ppmp()">Add PPMP</button>
                    </div>
                <div class="table-responsive">
                    <font size="2">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Year</th>
                                    <th>Office</th>
                                    <th>Item Code</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Estimated Budget</th>
                                    <th>JAN</th>
                                    <th>FEB</th>
                                    <th>MARCH</th>
                                    <th>APRIL</th>
                                    <th>MAY</th>
                                    <th>JUNE</th>
                                    <th>JULY</th>
                                    <th>AUG</th>
                                    <th>SEPT</th>
                                    <th>OCT</th>
                                    <th>NOV</th>
                                    <th>DEC</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="dat in dataLists" :key="dat.id">
                                <td> 
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
                                <td>{{dat.year}}</td>
                                <td>{{dat.office}}</td>
                                <td>{{dat.item_code}}</td>
                                <td style="white-space:normal;">{{dat.name}}</td>
                                <td>{{dat.category}}</td>
                                <td style="white-space:normal;">{{dat.supply_item}}</td>
                                <td>{{dat.supply_unit}}</td>
                                <td>{{dat.supply_price}}</td>
                                <td>{{dat.estimated_budget}}</td>
                                <td>{{dat.jan}}</td>
                                <td>{{dat.feb}}</td>
                                <td>{{dat.march}}</td>
                                <td>{{dat.april}}</td>
                                <td>{{dat.may}}</td>
                                <td>{{dat.june}}</td>
                                <td>{{dat.july}}</td>
                                <td>{{dat.august}}</td>
                                <td>{{dat.september}}</td>
                                <td>{{dat.october}}</td>
                                <td>{{dat.november}}</td>
                                <td>{{dat.december}}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Year</th>
                                    <th>Office</th>
                                    <th>Item Code</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Estimated Budget</th>
                                    <th>JAN</th>
                                    <th>FEB</th>
                                    <th>MARCH</th>
                                    <th>APRIL</th>
                                    <th>MAY</th>
                                    <th>JUNE</th>
                                    <th>JULY</th>
                                    <th>AUG</th>
                                    <th>SEPT</th>
                                    <th>OCT</th>
                                    <th>NOV</th>
                                    <th>DEC</th>
                                </tr>
                            </tfoot>
                        </table>
                    </font>
                </div>
            </div>
        </div>
    
        <div id="create_ppmp_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel">Add PPMP
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
                                                    <input type="hidden" class="form-control" placeholder="Input Here..." v-model="form.id">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <h4 class="card-title">Year</h4>
                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.year">
                                                            <option value="" selected >-Select-</option>
                                                            <option v-for="y in year" :value="y.id">{{ y.year }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">Office</h4>
                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.office">
                                                                <option value="" selected >-Select-</option>
                                                                <option v-for="off in office" :value="off.id">{{ off.office }}</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Item Code</h4>
                                                            <input type="text" class="form-control" placeholder="Input Here..." v-model="form.item_code" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">Title</h4>
                                                                <textarea class="form-control" rows="3" v-model="form.title" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Category</h4>
                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" @change="categoty_change($event)" v-model="form.category">
                                                                <option value="" selected >-Select-</option>
                                                                <option v-for="cat in category" :value="cat.category_id">{{ cat.category }}</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Item</h4>
                                                                <select class="form-control filter_item" id="exampleFormControlSelect1" @change="item_change($event)" v-model="form.item">
                                                                <option value="" selected >-Select-</option>
                                                                <option v-for="val in cat_value" :value="val.supply_id" :data-price="val.price">{{ val.item }}</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                            <h4 class="card-title">January </h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.jan">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">Febuary </h4>
                                                                <input type="number" class="form-control" placeholder="Input Here..." v-model="form.feb">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                            <h4 class="card-title">March </h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.march">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">April </h4>
                                                                <input type="number" class="form-control" placeholder="Input Here..." v-model="form.april">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                            <h4 class="card-title">May </h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.may">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">June </h4>
                                                                <input type="number" class="form-control" placeholder="Input Here..." v-model="form.june">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                            <h4 class="card-title">July </h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.july">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">August </h4>
                                                                <input type="number" class="form-control" placeholder="Input Here..." v-model="form.aug">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                            <h4 class="card-title">September</h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.sept">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">October </h4>
                                                                <input type="number" class="form-control" placeholder="Input Here..." v-model="form.oct">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                            <h4 class="card-title">November </h4>
                                                            <input type="number" class="form-control" placeholder="Input Here..." v-model="form.nov">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <h4 class="card-title">December </h4>
                                                                <input type="number" class="form-control" placeholder="Input Here..." v-model="form.dec">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="text-right">
                                                        <button class="btn btn-info" @click="ppmp_submit()">Submit</button>
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
            office: [],
            category: [],
            year: [],
            form: {
                id: null,
                year:null,
                category: null,
                item: null,
                office: null,
                item_code: null,
                title: null,
                jan: null,
                feb: null,
                march: null,
                april: null,
                may: null,
                june: null,
                july: null,
                aug: null,
                sept: null,
                oct: null,
                nov: null,
                dec: null,
                price: null,
            },
            cat_value: [],
        }
    },
    methods: {
        create_ppmp(){
            const vm = this;
            $('#create_ppmp_modal').modal('show');
            axios
                .get('/procurement2.0/procurement/addppmp/modal')
                .then(function(response){
                    // console.log(response)
                    vm.office = response.data.office;
                    vm.category = response.data.category;
                    vm.year = response.data.year;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        categoty_change(event){
            const vm = this;
            console.log(event.target.value);
            axios
                .post('/procurement2.0/get/category',{
                    cat_id : event.target.value
                })
                .then(function(response){
                    // console.log(response.data.cat);
                    vm.cat_value = response.data.cat;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        ppmp_submit(){
            const vm = this;
            axios
                .post('/procurement2.0/procurement/create/ppmp', this.form)
                .then(function(response){
                    vm.dataLists.push(response.data.data);
                    vm.form.year = null,
                    vm.form.category = null,
                    vm.form.item = null,
                    vm.form.office = null,
                    vm.form.item_code = null,
                    vm.form.title = null,
                    vm.form.jan = null,
                    vm.form.feb = null,
                    vm.form.march = null,
                    vm.form.april = null,
                    vm.form.may = null,
                    vm.form.june = null,
                    vm.form.july = null,
                    vm.form.aug = null,
                    vm.form.sept = null,
                    vm.form.oct = null,
                    vm.form.nov = null,
                    vm.form.dec = null
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        item_change(event){
            const vm = this;
           console.log(event.target.options[event.target.options.selectedIndex].getAttribute('data-price'));
           vm.form.price = event.target.options[event.target.options.selectedIndex].getAttribute('data-price');
        },
        remove(dat)
        {
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
                   
                    }
                }
            }
            )
        },
    }
}
</script>