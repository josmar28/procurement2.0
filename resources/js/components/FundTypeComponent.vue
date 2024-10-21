<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <vue-confirm-dialog></vue-confirm-dialog>
                <h4 class="card-title">Fund Type List</h4>
                <div style="margin-bottom: 20px">
                    <button
                        type="button"
                        class="btn waves-effect waves-light btn-rounded btn-success"
                        @click="create_type()"
                    >
                        Create Type
                    </button>
                </div>
                <div class="table-responsive">
                    <font size="2">
                        <table
                            id="zero_config"
                            class="table table-striped table-bordered no-wrap"
                        >
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>ID</th>
                                    <th>Fund Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="dat in dataLists" :key="dat.id">
                                    <td>
                                        <div class="btn-group">
                                            <button
                                                type="button"
                                                class="btn dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <i
                                                    class="fas fa-ellipsis-v"
                                                ></i>
                                            </button>
                                            <div
                                                class="dropdown-menu dropdown-menu-right"
                                            >
                                                <button
                                                    class="dropdown-item"
                                                    type="button"
                                                    @click="view(dat)"
                                                >
                                                    <i class="far fa-edit"></i>
                                                    View/Edit
                                                </button>
                                                <button
                                                    class="dropdown-item"
                                                    type="button"
                                                    @click="remove(dat)"
                                                >
                                                    <i
                                                        class="far fa-trash-alt"
                                                    ></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ dat.id }}</td>
                                    <td>{{ dat.fundtype }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>ID</th>
                                    <th>Fund Type</th>
                                </tr>
                            </tfoot>
                        </table>
                    </font>
                </div>
            </div>
        </div>

        <div
            id="create_type_modal"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-labelledby="success-header-modalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel">
                            <p v-if="form.id">View Type</p>
                            <p v-else>Add Type</p>
                        </h4>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-hidden="true"
                        >
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <input
                                                type="hidden"
                                                class="form-control"
                                                placeholder="Input Here..."
                                                v-model="form.id"
                                            />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <h4 class="card-title">
                                                            Fund Type
                                                        </h4>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Input Here..."
                                                            v-model="
                                                                form.fundtype
                                                            "
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <button
                                                        class="btn btn-info"
                                                        @click="type_submit()"
                                                    >
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</template>

<script>
export default {
    props: ["data"],
    data() {
        return {
            dataLists: this.data,
            form: {
                id: null,
                fundtype: null,
            },
        };
    },
    methods: {
        create_type() {
            const vm = this;
            (vm.form.id = null),
                (vm.form.fundtype = null),
                $("#create_type_modal").modal("show");
        },

        type_submit() {
            const vm = this;
            axios
                .post("/procurement2.0/procurement/fundtype/add", this.form)
                .then(function (response) {
                    vm.dataLists.push(response.data.data);
                    (vm.form.id = null),
                        (vm.form.fundtype = null),
                        location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        view(data) {
            console.log(data);
            const vm = this;

            (vm.form.id = data.id),
                (vm.form.fundtype = data.fundtype),
                $("#create_type_modal").modal("show");
        },
        remove(dat) {
            this.$confirm({
                message: "Are you sure?",
                button: {
                    no: "No",
                    yes: "Yes",
                },
                /**
                 * Callback Function
                 * @param {Boolean} confirm
                 */
                callback: (confirm) => {
                    if (confirm) {
                        axios
                            .post(
                                "/procurement2.0/procurement/fundtype/remove",
                                {
                                    id: dat.id,
                                }
                            )
                            .then(function (response) {
                                //console.log(response.data.status)
                                if (response.data.status == "updated") {
                                    location.reload();
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    }
                },
            });
        },
    },
};
</script>
