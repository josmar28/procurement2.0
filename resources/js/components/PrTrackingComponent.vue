<template>
<div class="container-fluid">
    <div class="row">
            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Procurement Tracking</h4>
                                <div class="table-responsive">
                                <font size="2">
                                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Options</th>
                                                    <th>Barcode</th>
                                                    <th>Status</th>
                                                    <th>Office</th>
                                                    <th>Procurement Title</th>
                                                    <th>Procurement Type</th>
                                                    <th>Pruchase Request No.</th>
                                                    <th>Category</th>
                                                    <th>Mode</th>
                                                    <th>Date Receive</th>
                                                    <th>Date Forwarded to Enduser</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="( dat, index ) in dataLists" :key="dat.id">
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <button class="dropdown-item" type="button" @click="view(dat)"><i class="far fa-edit"></i> View/Edit</button>
                                                                <button class="dropdown-item" type="button"><i class="far fa-trash-alt"></i> Delete</button>
                                                                <button class="dropdown-item" type="button"><i class="fas fa-file-pdf"></i> PR</button>
                                                                <button class="dropdown-item" type="button"><i class="fas fa-file-pdf"></i> RFQ</button>
                                                                <button class="dropdown-item" type="button"><i class="fas fa-file-pdf"></i> QA</button>
                                                                <button class="dropdown-item" type="button"><i class="fas fa-file-pdf"></i> BAC Resolution</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{dat.id}}</td>
                                                    <td>{{dat.status}}</td>
                                                    <td>{{dat.office}}</td>
                                                    <td style="max-width:400px; text-overflow: ellipsis; overflow: hidden;">{{dat.L1_title}}</td>
                                                    <td>{{dat.procure_type}}</td>
                                                    <td>{{dat.L1_trackno}}</td>
                                                    <td>{{dat.category}}</td>
                                                    <td>{{dat.mode}}</td>
                                                    <td>{{dat.date_received_pr}}</td>
                                                    <td>{{dat.date_forwarded_enduser}}</td>
                                                </tr>
                               
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Options</th>
                                                    <th>Barcode</th>
                                                    <th>Status</th>
                                                    <th>Office</th>
                                                    <th>Procurement Title</th>
                                                    <th>Procurement Type</th>
                                                    <th>Pruchase Request No.</th>
                                                    <th>Category</th>
                                                    <th>Mode</th>
                                                    <th>Date Receive</th>
                                                    <th>Date Forwarded to Enduser</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                </font>
                                </div>
                            </div>
                        </div>
                </div>
        </div>

    <div id="view_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">View PR
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
                                                            <span class="d-none d-lg-block">General Information</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#profile1" data-toggle="tab" aria-expanded="true"
                                                            class="nav-link rounded-0 ">
                                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                                            <span class="d-none d-lg-block">RFQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#settings1" data-toggle="tab" aria-expanded="false"
                                                            class="nav-link rounded-0">
                                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                                            <span class="d-none d-lg-block">ABSTRACT</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#settings2" data-toggle="tab" aria-expanded="false"
                                                            class="nav-link rounded-0">
                                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                                            <span class="d-none d-lg-block">MONITORING</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="home1">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Barcode</h4>
                                                                        <input type="text" class="form-control" v-model="barcode" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">ABC</h4>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <h4 class="card-title">Status</h4>
                                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L1_status">
                                                                        <option value="" disabled>-Select-</option>
                                                                        <option v-for="stat in status" :value="stat.id">{{ stat.status }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <h4 class="card-title">Type</h4>
                                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.type_procure">
                                                                            <option value="" disabled>-Select-</option>
                                                                            <option v-for="ty in type" :value="ty.id">{{ ty.type_procure }}</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <h4 class="card-title">Purpose/Title</h4>
                                                                        <form class="mt-3">
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" rows="3" placeholder="Purpose/Title" v-model="form.L1_title"></textarea>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <h4 class="card-title">Office</h4>
                                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L1_office">
                                                                            <option value=""  disabled>-Select-</option>
                                                                            <option v-for="of in office" :value="of.id">{{ of.office }}</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Fund Year</h4>
                                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L2_fundyear">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option v-for="y in year" :value="y.id">{{ y.year }}</option>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Fund Source</h4>
                                                                            <input type="text" class="form-control" placeholder="Input Here..." v-model="form.L2_fundsource">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <h4 class="card-title">Category</h4>
                                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L1_typeproc">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option v-for="cat in category" :value="cat.category_id">{{ cat.category }}</option>
                                                                                </select>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Fund Type</h4>
                                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L2_fundtype">
                                                                                <option value=""  disabled>-Select-</option>
                                                                                <option v-for="fund in fundtype" :value="fund.id">{{ fund.fundtype }}</option>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Information to Supplier</h4>
                                                                            <form class="mt-3">
                                                                                <div class="form-group">
                                                                                    <textarea class="form-control" rows="3" placeholder="Information to Supplier" v-model="form.supplier_inst"></textarea>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Folder Link</h4>
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane " id="profile1">
                                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                                                            justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis
                                                            eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum
                                                            semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor
                                                            eu, consequat vitae, eleifend ac, enim.</p>
                                                        <p class="mb-0">Leggings occaecat dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus
                                                            et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                                            ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                                                            quis enim.</p>
                                                    </div> 
                                                    <div class="tab-pane" id="settings1">
                                                        <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean
                                                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                                            magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                                            ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                                                            quis enim.</p>
                                                        <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                                            arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                                            dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                                            elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                                            porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                    </div>
                                                    <div class="tab-pane" id="settings2">
                                                        <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                                            arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                                            dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                                            elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                                            porttitor eu, consequat vitae, eleifend ac, enim.</p>
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
    data(){
        return {
            dataLists: this.data,
            barcode: null,
            form: {
                L1_status: null,
                L1_office: null,
                L2_fundyear: null,
                L2_fundsource: null,
                L1_typeproc: null,
                L2_fundtype: null,
                supplier_inst: null,
                date_prep_pr_enduser: null,
                requested_by: null,
                approved_by: null,
                L1_title: null,
                cert_by1: null,
                cert_by2: null,
                type_procure: null
            },
            status: [],
            type: [],
            category: [],
            office: [],
            fundtype: [],
            year: [],
        }
    },
    methods: {
        view(dat)
        {
            console.log(dat);
            const vm = this;
            vm.form.L1_status = dat.L1_status;
            vm.form.L1_office = dat.L1_office;
            vm.form.L2_fundyear = dat.L2_fundyear;
            vm.form.L2_fundsource = dat.L2_fundsource;
            vm.form.L1_typeproc = dat.L1_typeproc;  
            vm.form.L2_fundtype = dat.L2_fundtype; 
            vm.form.type_procure = dat.type_procure;
            vm.form.supplier_inst = dat.supplier_inst;
            vm.form.L1_title = dat.L1_title;
            vm.barcode = dat.id;
            $('#view_modal').modal('show');
            axios
                .get('/procurement2.0/procurement/createpr')
                .then(function(response){
                    vm.status = response.data.status;
                    vm.type = response.data.type;
                    vm.office = response.data.office;
                    vm.category = response.data.category;
                    vm.fundtype = response.data.fundtype;
                    vm.year = response.data.year;
                })
                .catch(function(error){
                    console.log(error)
                })

        },
    },
}

</script>