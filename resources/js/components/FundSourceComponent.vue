<template>
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <vue-confirm-dialog></vue-confirm-dialog>
            <h4 class="card-title">Fund Source List</h4>
                <div style="margin-bottom:20px;">
                    <button type="button"
                    class="btn waves-effect waves-light btn-rounded btn-success" @click="create_source()">Create Source</button>
                </div>
            <div class="table-responsive">
                <font size="2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Year</th>
                                <th>Fund Source</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            <tr v-for="(dat, i) in dataLists" :key="i">
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
                                <td>{{dat.id}}</td>
                                <td>{{dat.year}}</td>
                                <td>{{dat.fundsource}}</td>
                                <td style="white-space:normal;">{{dat.amount}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Year</th>
                                <th>Fund Source</th>
                                <th>Amount</th>
                            </tr>
                        </tfoot>
                    </table>
                </font>
            </div>
        </div>
        </div>

        <div id="create_source_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
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
                                                                <h4 class="card-title">Fund Source</h4>
                                                                <input type="text" class="form-control" placeholder="Input Here..." v-model="form.fundsource" >
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Amount</h4>
                                                            <input type="text" class="form-control" placeholder="Input Here..." v-model="form.amount" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <div class="text-right">
                                                        <button class="btn btn-info" @click="source_submit()">Submit</button>
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
                id:null,
                year: null,
                fundsource: null,
                amount: null,
            },
            year:[],
         }
    },
    methods: {
        create_source(){
            const vm = this;
            vm.form.id = null,
            vm.form.year = null,
            vm.form.fundsource = null,
            vm.form.amount = null,
            $('#create_source_modal').modal('show');
            axios
                .get('/procurement2.0/get/year')
                .then(function(response){
                    // console.log(response.data.cat);
                    vm.year = response.data.year;
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        source_submit(){
            const vm = this;
            axios
                .post('/procurement2.0/procurement/fundsource/add', this.form)
                .then(function(response){
                    vm.dataLists.push(response.data.data);
                    vm.form.id = null,
                    vm.form.year = null,
                    vm.form.fundsource = null,
                    vm.form.amount = null,
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        view(data)
        {
            console.log(data);
            const vm = this;
            axios
                .get('/procurement2.0/get/year')
                .then(function(response){
                    // console.log(response.data.cat);
                    vm.year = response.data.year;
                })
                .catch(function(error){
                    console.log(error)
                })

                vm.form.id = data.id,
                vm.form.year = data.year_id,
                vm.form.fundsource = data.fundsource,
                vm.form.amount = data.amount,

            $('#create_source_modal').modal('show');
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
                        .post('/procurement2.0/procurement/fundsource/remove',{
                            id : dat.id
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