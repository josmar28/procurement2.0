<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <vue-confirm-dialog></vue-confirm-dialog>
                <h4 class="card-title">Supplier List</h4>
                    <div style="margin-bottom:20px;">
                        <button type="button"
                        class="btn waves-effect waves-light btn-rounded btn-success" @click="create_supplier()">Add Supplier</button>
                    </div>
                <div class="table-responsive">
                    <font size="2">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Business Name</th>
                                    <th>Line of Business</th>
                                    <th>Status</th>
                                    <th>Tax Clearance Validity</th>
                                    <th>Philgeps Validity</th>
                                    <th>Business Permit Validity</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(dat, i) in dataLists" :key="i">
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
                                <td>{{dat.business_name}}</td>
                                <td>{{dat.business_cat}}</td>
                                <td>
                                    <p v-if="dat.active == 1"> Active</p>
                                    <p v-else>Inactive</p>
                                </td>
                                <td >{{dat.tc_val_date}}</td>
                                <td>{{dat.philgeps_val_date}}</td>
                                <td>{{dat.dti_isssued_date}}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Business Name</th>
                                    <th>Line of Business</th>
                                    <th>Status</th>
                                    <th>Tax Clearance Validity</th>
                                    <th>Philgeps Validity</th>
                                    <th>Business Permit Validity</th>
                                </tr>
                            </tfoot>
                        </table>
                    </font>
                </div>
            </div>
        </div>

        <div id="create_supplier_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel"><p v-if="form.id">View Supply</p><p v-else>Add Supply</p>
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
                                                    <h4 class="card-title mb-3">Tabs Justified</h4>

                                                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                                        <li class="nav-item">
                                                            <a href="#home1" data-toggle="tab" aria-expanded="false"
                                                                class="nav-link rounded-0 active">
                                                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">Business Information</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#profile1" data-toggle="tab" aria-expanded="true"
                                                                class="nav-link rounded-0 ">
                                                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">Eligibility</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#settings1" data-toggle="tab" aria-expanded="false"
                                                                class="nav-link rounded-0">
                                                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">Contact & Remarks</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <input type="hidden" class="form-control"  v-model="form.supplier_id">
                                                        <div class="tab-pane show active" id="home1">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Business Name</h4>
                                                                            <input type="text" class="form-control"  v-model="form.business_name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Line of Business</h4>
                                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.line_business">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option v-for="cat in business_cat" :value="cat.id">{{ cat.business_cat }}</option>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                        <h4 class="card-title">Date Registered to BAC</h4>
                                                                         <input type="date" class="form-control" v-model="form.date_reg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Active</h4>
                                                                            <select class="form-control chosen-select" v-model="form.active">
                                                                            <option value=""  disabled>-Select-</option>
                                                                            <option value="1"  >Active</option>
                                                                            <option value="0"  >Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                        <h4 class="card-title">Address</h4>
                                                                        <input type="text" class="form-control" v-model="form.address">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <h4 class="card-title">Tin</h4>
                                                                                <input type="text" class="form-control" v-model="form.tin">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                                <h4 class="card-title">Link</h4>
                                                                                <input type="text" class="form-control" v-model="form.link">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane " id="profile1">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Tax Clearance</h4>
                                                                            <div class="form-group">
                                                                                <select class="form-control chosen-select" v-model="form.tax_clearance">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option value="1"  >Yes</option>
                                                                                <option value="2"  >No</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Tax Clearance Validity</h4>
                                                                            <div class="form-group">
                                                                                <input type="date" class="form-control" v-model="form.tc_val">
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Philgeps</h4>
                                                                            <div class="form-group">
                                                                                <select class="form-control chosen-select" v-model="form.philgeps">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option value="1"  >Yes</option>
                                                                                <option value="0"  >No</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Philgeps Validity</h4>
                                                                            <div class="form-group">
                                                                                <input type="date" class="form-control" v-model="form.philgeps_val">
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">DIT</h4>
                                                                            <div class="form-group">
                                                                                <select class="form-control chosen-select" v-model="form.dti">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option value="1"  >Yes</option>
                                                                                <option value="0"  >No</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">DIT Date Issued</h4>
                                                                            <div class="form-group">
                                                                                <input type="date" class="form-control" v-model="form.dti_dateissued">
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Business Permit</h4>
                                                                            <div class="form-group">
                                                                                <select class="form-control chosen-select" v-model="form.business_permit">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option value="1"  >Yes</option>
                                                                                <option value="0"  >No</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Business Permit Validity</h4>
                                                                            <div class="form-group">
                                                                                <input type="date" class="form-control" v-model="form.bp_val">
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="tab-pane" id="settings1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Business Conctact</h4>
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" rows="3" placeholder="Information to Supplier" v-model="form.contact"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Remarks</h4>
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" rows="3" placeholder="Information to Supplier" v-model="form.remarks"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <button class="btn btn-info" @click="submit()">Submit</button>
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
                supplier_id: null,
                business_name: null,
                contact: null,
                date_reg: null,
                active: null,
                tax_clearance: null,
                tc_val: null,
                philgeps: null,
                philgeps_val: null,
                dti: null,
                dti_dateissued: null,
                business_permit: null,
                line_business: null,
                remarks: null,
                link: null,
                address: null,
                tin: null,
                bp_val: null,
            },
            business_cat: [],
        }
    },
    methods: {
        create_supplier(){
           const vm = this;
           vm.form.business_name = null
            vm.form.supplier_id = null
            vm.form.contact = null
            vm.form.date_reg = null
            vm.form.active = null
            vm.form.tax_clearance = null
            vm.form.tc_val = null
            vm.form.philgeps = null
            vm.form.philgeps_val = null
            vm.form.dti = null
            vm.form.dti_dateissued = null
            vm.form.business_permit = null
            vm.form.line_business = null
            vm.form.remarks = null
            vm.form.link = null
            vm.form.address = null
            vm.form.tin = null
            vm.form.bp_val = null
        $('#create_supplier_modal').modal('show');
        axios
            .get('/procurement2.0/get/business')
            .then(function(response){
                vm.business_cat = response.data.data;
            })
            .catch(function(error){
                console.log(error)
            })
      },
      submit(){
        const vm = this;
            axios
                .post('/procurement2.0/procurement/supplier/create', this.form)
                .then(function(response){
                    console.log(response);
                    vm.dataLists.push(response.data.data);
                    vm.form.business_name = null
                    vm.form.supplier_id = null
                    vm.form.contact = null
                    vm.form.date_reg = null
                    vm.form.active = null
                    vm.form.tax_clearance = null
                    vm.form.tc_val = null
                    vm.form.philgeps = null
                    vm.form.philgeps_val = null
                    vm.form.dti = null
                    vm.form.dti_dateissued = null
                    vm.form.business_permit = null
                    vm.form.line_business = null
                    vm.form.remarks = null
                    vm.form.link = null
                    vm.form.address = null
                    vm.form.tin = null
                    vm.form.bp_val = null
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
      },
      view(data)
      {
        const vm = this;
        console.log(data);
        vm.form.supplier_id = data.id 
        vm.form.business_name = data.business_name
        vm.form.contact = data.contact
        vm.form.date_reg = data.date_reg
        vm.form.active = data.active
        vm.form.tax_clearance = data.tax_clearance
        vm.form.tc_val = data.tc_val
        vm.form.philgeps = data.philgeps
        vm.form.philgeps_val = data.philgeps_val
        vm.form.dti = data.dti
        vm.form.dti_dateissued = data.dti_dateissued
        vm.form.business_permit = data.business_permit
        vm.form.line_business = data.line_business
        vm.form.remarks = data.remarks
        vm.form.link = data.link
        vm.form.address = data.address
        vm.form.tin = data.tin  
        vm.form.bp_val = data.bp_val
        $('#create_supplier_modal').modal('show');
        axios
            .get('/procurement2.0/get/business')
            .then(function(response){
                vm.business_cat = response.data.data;
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
                        .post('/procurement2.0/procurement/remove/supplier',{
                            supplier_id : data.id
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
    }
}
</script>