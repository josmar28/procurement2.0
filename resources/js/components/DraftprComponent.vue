<template>
    <div class="col-12">
        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Draft PR List</h4>
                                    <div style="margin-bottom:20px;">
                                        <button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-success" @click="create_pr()">Create PR</button>
                                    </div>
                                <div class="table-responsive">
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
                                                    <th>Requested By</th>
                                                    <th>Approved By</th>
                                                    <th>Certified By</th>
                                                    <th>Certified By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        
                                                <tr v-for="dat in dataLists" :key="dat.id">
                                                    <td> 
                                                        <button type="button"
                                                        class="btn waves-effect waves-light btn-rounded btn-success" @click="show_item(dat.id)">Items</button>
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
                                                    <td>{{dat.req_name}}</td>
                                                    <td>{{dat.app_name}}</td>
                                                    <td>{{dat.cert1_name}}</td>
                                                    <td>{{dat.cert2_name}}</td>
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
                                                    <th>Requested By</th>
                                                    <th>Approved By</th>
                                                    <th>Certified By</th>
                                                    <th>Certified By</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                </div>
                            </div>
        </div>
        <div id="create_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-success">
                                                        <h4 class="modal-title" id="success-header-modalLabel">Add Item
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
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                            <h4 class="card-title">PR Number</h4>
                                                                                <input type="text" class="form-control" placeholder="Input Here..." v-model="L1_trackno_show" disabled>
                                                                                <input type="hidden" class="form-control" placeholder="Input Here..." v-model="formAdd.pr_ref">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <h4 class="card-title">Year</h4>
                                                                                    <input type="text" class="form-control" placeholder="Input Here..." v-model="year_show" disabled>
                                                                                    <input type="hidden" class="form-control" placeholder="Input Here..." v-model="formAdd.year" disabled>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                            <h4 class="card-title">Office</h4>
                                                                            <input type="text" class="form-control" placeholder="Input Here..." v-model="office_show" disabled>
                                                                                <input type="hidden" class="form-control" placeholder="Input Here..." v-model="formAdd.office" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <h4 class="card-title">Category</h4>
                                                                                    <input type="text" class="form-control" placeholder="Input Here..." v-model="category_show" disabled>
                                                                                        <input type="hidden" class="form-control" placeholder="Input Here..." v-model="formAdd.category_id" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">Title</h4>
                                                                                <select class="form-control" v-model="formAdd.title" @change="title_change($event)">
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="title in titleList" :value="title.supply_id" :data-id="title.id">{{ title.name }}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">Name</h4>
                                                                                <input type="text" class="form-control" placeholder="Input Here..." v-model="formAdd.app_item" disabled>
                                                                                <textarea class="form-control" rows="3" v-model="app_item_show" placeholder="" disabled></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-3">  
                                                                            <div class="form-group">
                                                                                  
                                                                            </div>
                                                                        </div> 
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <h4 class="card-title">Quantity</h4>
                                                                                        <input type="text" class="form-control" placeholder="Input Here..." v-model="formAdd.quantity" >
                                                                            </div>
                                                                        </div> 
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                        <div class="form-actions">
                                                                            <div class="text-right">
                                                                                <button class="btn btn-info" @click="item_submit()">Submit</button>
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
        <div id="show_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-full-width">
                            <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-success">
                                                        <h4 class="modal-title" id="success-header-modalLabel">Add Item
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                                <div class="row">
                                                        <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="table-responsive">
                                                                            <font size="2">
                                                                                    <table class="table table-striped table-bordered no-wrap">
                                                                                        <thead>
                                                                                            <tr>
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
                                                                                                <th>Requested By</th>
                                                                                                <th>Approved By</th>
                                                                                                <th>Certified By</th>
                                                                                                <th>Certified By</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>{{ dataShow.id }}</td>
                                                                                                <td>{{ dataShow.status }}</td>
                                                                                                <td>{{ dataShow.office}}</td>
                                                                                                <td style="max-width:400px; text-overflow: ellipsis; overflow: hidden;">{{ dataShow.L1_title }}</td>
                                                                                                <td>{{ dataShow.procure_type }}</td>
                                                                                                <td>{{ dataShow.L1_trackno }}</td>
                                                                                                <td>{{ dataShow.category }}</td>
                                                                                                <td>{{ dataShow.mode }}</td>
                                                                                                <td>{{ dataShow.date_received_pr}}</td>
                                                                                                <td>{{ dataShow.date_forwarded_enduser}}</td>
                                                                                                <td>{{ dataShow.req_name}}</td>
                                                                                                <td>{{ dataShow.app_name}}</td>
                                                                                                <td>{{ dataShow.cert1_name}}</td>
                                                                                                <td>{{ dataShow.cert2_name}}</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                            </font>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Add Item</h4>
                                                                            <div style="margin-bottom:20px;">
                                                                            <button type="button"
                                                                            class="btn waves-effect waves-light btn-rounded btn-success" @click="add_item(dataShow)"> <i class="fa fa-plus"></i> Create Item</button>
                                                                                <!-- <button type="button"
                                                                                        class="btn waves-effect waves-light btn-success"><i class="fas fa-plus"></i> Create PR</button> -->
                                                                            </div>
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
                                                                                            <th>Requested By</th>
                                                                                            <th>Approved By</th>
                                                                                            <th>Certified By</th>
                                                                                            <th>Certified By</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr v-for="dat in itemShow" :key="dat.id">
                                                                                            <td>
                                                                                                
                                                                                            </td>
                                                                                            <td>{{ dat.id }}</td>
                                                                                            <td>{{ dat.status }}</td>
                                                                                            <td>{{ dat.office }}</td>
                                                                                            <td style="max-width:400px; text-overflow: ellipsis; overflow: hidden;">{{ dat.L1_title }}</td>
                                                                                            <td>{{ dat.procure_type }}</td>
                                                                                            <td>{{ dat.L1_trackno }}</td>
                                                                                            <td>{{ dat.category }}</td>
                                                                                            <td>{{ dat.mode }}</td>
                                                                                            <td>{{ dat.date_received_pr }}</td>
                                                                                            <td>{{ dat.date_forwarded_enduser }}</td>
                                                                                            <td>{{ dat.req_name }}</td>
                                                                                            <td>{{ dat.app_name }}</td>
                                                                                            <td>{{ dat.cert1_name }}</td>
                                                                                            <td>{{ dat.cert2_name }}</td>
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
                                                                                            <th>Requested By</th>
                                                                                            <th>Approved By</th>
                                                                                            <th>Certified By</th>
                                                                                            <th>Certified By</th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                        </font>
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
        <div id="createpr_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-success">
                                                        <h4 class="modal-title" id="success-header-modalLabel">Create PR
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
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                            <h4 class="card-title">Status</h4>
                                                                                <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L1_status">
                                                                                <option value="" selected disabled>-Select-</option>
                                                                                <option v-for="stat in status" :value="stat.id">{{ stat.status }}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <h4 class="card-title">Type</h4>
                                                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.type_procure">
                                                                                    <option value="" selected disabled>-Select-</option>
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
                                                                                    <option value="" selected disabled>-Select-</option>
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
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="n in year" :value="n">{{ n }}</option>
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
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="cat in category" :value="cat.category_id">{{ cat.category }}</option>
                                                                                    </select>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">Fund Type</h4>
                                                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.L2_fundtype">
                                                                                    <option value="" selected disabled>-Select-</option>
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
                                                                                <h4 class="card-title">Date Prepared</h4>
                                                                            
                                                                                    <div class="form-group">
                                                                                        <input type="datetime-local" class="form-control" v-model="form.date_prep_pr_enduser">
                                                                                    </div>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">Requested by</h4>
                                                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1 " v-model="form.requested_by">
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="fund in fundtype" :value="fund.id">{{ fund.fundtype }}</option>
                                                                                    </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">Approved by</h4>
                                                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.approved_by">
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="fund in fundtype" :value="fund.id">{{ fund.fundtype }}</option>
                                                                                    </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">Certified by</h4>
                                                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.cert_by1">
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="fund in fundtype" :value="fund.id">{{ fund.fundtype }}</option>
                                                                                    </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                            <h4 class="card-title">Certified by</h4>
                                                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1" v-model="form.cert_by2">
                                                                                    <option value="" selected disabled>-Select-</option>
                                                                                    <option v-for="fund in fundtype" :value="fund.id">{{ fund.fundtype }}</option>
                                                                                    </select>
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
            status: [],
            type: [],
            category: [],
            office: [],
            fundtype: [],
            year: [2020,2021,2022,2023],
            dataShow: [],
            itemShow: [],
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
            formAdd: {
                
                pr_ref: null,
                year: null,
                office: null,
                category_id: null,
                title: null,
                app_item: null,
             },
            L1_trackno_show: null,
            year_show: null,
            office_show: null,
            category_show: null,
            titleList: [],
            app_item_show: null,
         }
    },
    methods: {
        submit() {
            const vm = this;
            axios
                .post('/procurement2.0/procurement/add', this.form)
                .then(function(response){
                    vm.dataLists.push(response.data.data);
                    vm.form.L1_status = null,
                    vm.form.L1_office = null,
                    vm.form.L2_fundyear = null,
                    vm.form.L2_fundsource = null,
                    vm.form.L1_typeproc = null,
                    vm.form.L2_fundtype = null,
                    vm.form.supplier_inst = null,
                    vm.form.date_prep_pr_enduser = null,
                    vm.form.requested_by = null,
                    vm.form.approved_by = null, 
                    vm.form.L1_title = null,
                    vm.form.cert_by1 = null,
                    vm.form.cert_by2 = null,
                    vm.form.type_procure = null
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        create_pr() {
            const vm = this;
            $('#createpr_modal').modal('show');
            axios
                .get('/procurement2.0/procurement/createpr')
                .then(function(response){
                    vm.status = response.data.status;
                    vm.type = response.data.type;
                    vm.office = response.data.office;
                    vm.category = response.data.category;
                    vm.fundtype = response.data.fundtype;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        show_item(var_id){
            const vm = this;
            $('#show_item_modal').modal('show');
            axios
                .post('/procurement2.0/procurement/showitem',{
                    id: var_id
                })
                .then(function(response){
                    vm.dataShow = response.data.info;
                    vm.itemShow = response.data.items;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        add_item(data) {
            const vm = this;
            $('#show_item_modal').modal('hide');
            $('#create_item_modal').modal('show');
            // console.log(data)
            vm.L1_trackno_show = data.L1_trackno,
            vm.year_show = data.year,
            vm.office_show = data.office,
            vm.category_show = data.category,
            vm.formAdd.year = data.year_id,
            vm.formAdd.office = data.office_id,
            vm.formAdd.category_id = data.category_id,
            vm.formAdd.pr_ref = data.id,
            axios
                .post('/procurement2.0/get/title',{
                    category_id : data.L1_typeproc,
                    year : data.L2_fundyear
                })
                .then(function(response){
                    vm.titleList = response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        title_change(event) {
            const vm = this;
                axios
                    .post('/procurement2.0/get/name',{
                        supply_id : event.target.value
                    })
                    .then(function(response){
                        vm.app_item_show = response.data.data.item_desc + ', ' + response.data.data.price;
                        vm.formAdd.app_item = event.target.options[event.target.options.selectedIndex].getAttribute('data-id');
                    })
                    .catch(function(error){
                        console.log(error)
                    })
        },
        item_submit() {
            const vm = this;
            axios
                .post('/procurement2.0/procurement/add/item', this.formAdd)
                .then(function(response){
                    vm.itemShow.push(response.data.data);
                    vm.formAdd.L1_trackno = null,
                    vm.formAdd.L2_fundyear = null,
                    vm.formAdd.L1_office = null,
                    vm.formAdd.L1_typeproc = null,
                    vm.formAdd.title = null,
                    vm.formAdd.app_item = null,
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
        }
        
    }

}
</script>