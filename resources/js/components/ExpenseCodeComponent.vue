<template>
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <vue-confirm-dialog></vue-confirm-dialog>
            <h4 class="card-title">Expense Code List</h4>
                <div style="margin-bottom:20px;">
                    <button type="button"
                    class="btn waves-effect waves-light btn-rounded btn-success" @click="create_code()">Create Code</button>
                </div>
            <div class="table-responsive">
                <font size="2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Code</th>.
                                <th>Name</th>
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
                                <td>{{dat.id}}</td>
                                <td>{{dat.code}}</td>
                                <td>{{dat.name}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Code</th>.
                                <th>Name</th>
                            </tr>
                        </tfoot>
                    </table>
                </font>
            </div>
        </div>
        </div>


        <div id="create_code_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
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
                                                    <input type="hidden" class="form-control" placeholder="Input Here..." v-model="form.id">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h4 class="card-title">Expense Code</h4>
                                                                <input type="text" class="form-control" placeholder="Input Here..." v-model="form.code" >
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h4 class="card-title">Expense Name</h4>
                                                                <input type="text" class="form-control" placeholder="Input Here..." v-model="form.name" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="form-actions">
                                                    <div class="text-right">
                                                        <button class="btn btn-info" @click="code_submit()">Submit</button>
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
                code: null,
                name: null,
            },
         }
    },

    methods: {
        create_code(){
            const vm = this;
            vm.form.id = null,
            vm.form.code = null,
            vm.form.name = null,
            $('#create_code_modal').modal('show');
        },

        code_submit()
        {
            const vm = this;
            axios
                .post('/procurement2.0/procurement/expensecode/add', this.form)
                .then(function(response){
                    vm.dataLists.push(response.data.data);
                    vm.form.id = null,
                    vm.form.code = null,
                    vm.form.name = null,
                    location.reload();
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        view(data){
            console.log(data);
            const vm = this;

                vm.form.id = data.id,
                vm.form.code = data.code,
                vm.form.name = data.name,

            $('#create_code_modal').modal('show');
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
                        .post('/procurement2.0/procurement/expensecode/remove',{
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