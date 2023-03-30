<template>
<div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <vue-confirm-dialog></vue-confirm-dialog>
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
                                                                <button class="dropdown-item" type="button" @click="remove(dat)"><i class="far fa-trash-alt"></i> Delete</button>
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
                                                    <td style="white-space:normal;">{{dat.L1_title}}</td>
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
                    <h4 class="modal-title" id="success-header-modalLabel"><p v-if="form.barcode">View PR</p><p v-else>Add PR</p>
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
                                                                        <input type="text" class="form-control" v-model="form.barcode" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">ABC</h4>
                                                                        <input type="number" class="form-control" v-model="form.abc">
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
                                                                            <h4 class="card-title">Type Procurement</h4>
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
                                                                    <h4 class="card-title">Procurement Description</h4>
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" rows="3" placeholder="Purpose/Title" v-model="form.pr_description"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <h4 class="card-title">Mode</h4>
                                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.mode">
                                                                            <option value=""  disabled>-Select-</option>
                                                                            <option v-for="mo in mode" :value="mo.id">{{ mo.mode }}</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <h4 class="card-title">Purpose/Title</h4>
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" rows="3" placeholder="Purpose/Title" v-model="form.L1_title"></textarea>
                                                                            </div>
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
                                                                    <h4 class="card-title">Level</h4>
                                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.level">
                                                                            <option value=""  disabled>-Select-</option>
                                                                            <option v-for="lev in level" :value="lev.id">{{ lev.status }}</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Purchase Request No.</h4>
                                                                        <input type="text" class="form-control" v-model="form.pr_no">
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
                                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L2_fundsource">
                                                                            <option value=""  disabled>-Select-</option>
                                                                            <option v-for="val in fundsource" :value="val.id">{{ val.fundsource }}</option>
                                                                            </select>
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
                                                                                <div class="form-group">
                                                                                    <textarea class="form-control" rows="3" placeholder="Information to Supplier" v-model="form.supplier_inst"></textarea>
                                                                                </div>
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">ITB/RFQ No.</h4>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" v-model="form.rfqitb_no">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">RFQ/ITB</h4>
                                                                        <div class="form-group">
                                                                            <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.rfqitb">
                                                                            <option value="">-Select-</option>
                                                                            <option v-for="val in rfqitb" :value="val.id">{{ val.type }}</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date RFQ Created</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.date_rfq_created">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Days to be Returned</h4>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" v-model="form.days_to_be_return">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Signatory</h4>
                                                                        <div class="form-group">
                                                                            <select class="form-control chosen-select" v-model="form.signatories">
                                                                            <option value="">-Select-</option>
                                                                            <option v-for="val in signatories" :value="val.id">{{ val.name }}</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="tab-pane" id="settings1">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Abstract No.</h4>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" v-model="form.abstract_no">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Abstract of Canvas</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.abstract_date">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Supplier 1</h4>
                                                                        <div class="form-group">
                                                                            <select class="form-control chosen-select" v-model="form.supp_1">
                                                                            <option value="">-Select-</option>
                                                                            <option v-for="val in suppliers" :value="val.id">{{ val.business_name }}</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Supplier 2</h4>
                                                                        <div class="form-group">
                                                                            <select class="form-control chosen-select" v-model="form.supp_2">
                                                                            <option value="">-Select-</option>
                                                                            <option v-for="val in suppliers" :value="val.id">{{ val.business_name }}</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Supplier 3</h4>
                                                                        <div class="form-group">
                                                                            <select class="form-control chosen-select" v-model="form.supp_3">
                                                                            <option value="">-Select-</option>
                                                                            <option v-for="val in suppliers" :value="val.id">{{ val.business_name }}</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Override Lowest Supplier</h4>
                                                                        <div class="form-group">
                                                                            <select class="form-control chosen-select" v-model="form.lowest_supp">
                                                                            <option value="">-Select-</option>
                                                                            <option v-for="val in suppliers" :value="val.id">{{ val.business_name }}</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="settings2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date PR Received</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.pr_received">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Forwarded to Canvasser</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.forwarded_to_canvasser">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Canvass Return</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.canvass_return">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Forwarded to Budget</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.forwarded_to_budget">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Served to Supplier</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.served_to_supplier">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Forwarded to Supplier</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.forwarded_to_supplier">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Forwarded to Supply Office</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.forwarded_to_supply">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Forwarded to End User</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.forwarded_to_user">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Delivery</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.delivery_date">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Date Inspection</h4>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control" v-model="form.inspection_date">
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
    data(){
        return {
            dataLists: this.data,
            
            form: {
                L1_status: null,
                L1_office: null,
                L2_fundyear: null,
                L2_fundsource: null,
                L1_typeproc: null,
                L2_fundtype: null,
                supplier_inst: null,
                L1_title: null,
                type_procure: null,
                rfqitb: null,
                signatories: null, 
                rfqitb_no: null,
                abstract_no: null,
                abstract_date: null,
                supp_1: null,
                supp_2: null,
                supp_3: null,
                lowest_supp: null,
                pr_received: null,
                forwarded_to_canvasser: null,
                canvass_return: null,
                forwarded_to_budget: null,
                served_to_supplier: null,
                forwarded_to_supplier: null,
                forwarded_to_supply: null,
                forwarded_to_user: null,
                delivery_date: null,
                inspection_date: null,
                date_rfq_created: null,
                days_to_be_return: null,
                level: null,
                pr_no: null,
                pr_description: null,
                mode: null,
                barcode: null,
                abc: null,
            },
            status: [],
            type: [],
            category: [],
            office: [],
            fundtype: [],
            year: [],
            rfqitb: [],
            signatories: [],
            fundsource: [],
            suppliers: [],
            level: [],
            mode: [],
        }
    },
    methods: {
        view(dat)
        {
            console.log(dat);
            const vm = this;
            vm.form.mode = dat.L1_modeproc;
            vm.form.pr_description = dat.procurement_description;
            vm.form.level = dat.L1_level;
            vm.form.pr_no = dat.L1_trackno;
            vm.form.L1_status = dat.L1_status;
            vm.form.L1_office = dat.L1_office;
            vm.form.L2_fundyear = dat.L2_fundyear;
            vm.form.L2_fundsource = dat.L2_fundsource;
            vm.form.L1_typeproc = dat.L1_typeproc;  
            vm.form.L2_fundtype = dat.L2_fundtype; 
            vm.form.type_procure = dat.type_procure;
            vm.form.supplier_inst = dat.supplier_inst;
            vm.form.barcode = dat.id;
            vm.form.L1_title = dat.L1_title;
            vm.form.rfqitb_no = dat.L2_rfqitbno; 
            vm.form.rfqitb = dat.L2_selectrfqitb; 
            vm.form.abstract_no = dat.abstract_no;
            vm.form.supp_1 = dat.supplier1;
            vm.form.supp_2 = dat.supplier2;
            vm.form.supp_3 = dat.supplier3;
            vm.form.date_rfq_created = dat.date_rfq_created;
            vm.form.days_to_be_return = dat.days_to_be_return;
            vm.form.abstract_date = dat.date_abstractcanv;
            vm.form.pr_received = dat.date_received_pr; 
            vm.form.forwarded_to_canvasser = dat.date_forwarded_canvasser; 
            vm.form.canvass_return = dat.date_canvass_return; 
            vm.form.forwarded_to_budget = dat.date_forwarded_budget;  
            vm.form.served_to_supplier = dat.date_served_supplier; 
            vm.form.forwarded_to_supplier = dat.date_forwarded_to_supplier; 
            vm.form.forwarded_to_user = dat.date_forwarded_enduser; 
            vm.form.delivery_date = dat.date_delivery;  
            vm.form.inspection_date = dat.date_inspection; 
            vm.form.lowest_supp = dat.override_lowest_supplier; 
            vm.form.abc = dat.L1_abc;
            vm.form.signatories= dat.rfq_sig;
            $('#view_modal').modal('show');
            axios
                .get('/procurement2.0/procurement/view/track')
                .then(function(response){
                    vm.status = response.data.status;
                    vm.type = response.data.type;
                    vm.office = response.data.office;
                    vm.category = response.data.category;
                    vm.fundtype = response.data.fundtype;
                    vm.year = response.data.year;
                    vm.rfqitb = response.data.rfqitb;
                    vm.signatories = response.data.signatories;
                    vm.fundsource = response.data.fundsource;
                    vm.suppliers = response.data.suppliers;
                    vm.level = response.data.level;
                    vm.mode = response.data.mode;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        submit(){
            const vm = this;
            axios
                .post('/procurement2.0/procurement/track/update', this.form)
                .then(function(response){
                    console.log(response);
                    if(response.data.status == 'updated')
                    {
                        location.reload();
                    }
                })
                .catch(function(error){
                    console.log(error)
                })
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
                        axios
                        .post('/procurement2.0/procurement/remove/pr',{
                            pr_id : dat.id
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