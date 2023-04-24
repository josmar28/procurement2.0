<template>
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <vue-confirm-dialog></vue-confirm-dialog>
            <h4 class="card-title">Fund Type List</h4>
                <div style="margin-bottom:20px;">
                    <button type="button"
                    class="btn waves-effect waves-light btn-rounded btn-success" @click="create_pr()">Create Type</button>
                </div>
            <div class="table-responsive">
                <font size="2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Business Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="dat in dataLists" :key="dat.id">
                                <td width="33.33%"> 
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
                                <td width="33.33%">{{dat.id}}</td>
                                <td width="33.33%">{{dat.business_cat}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Business Category</th>
                            </tr>
                        </tfoot>
                    </table>
                </font>
            </div>
        </div>
        </div>
      
    </div>

</template>

<script>
export default{
    props: ['data'],
    data() {
        return {
            dataLists: this.data,
            form: {
                id:null,
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
         }
    },
}
</script>