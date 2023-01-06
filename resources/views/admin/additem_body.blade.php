<div class="container-fluid">
    <div class="row">
            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                <font size="2">
                                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
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
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->status}}</td>
                                                    <td>{{$data->office}}</td>
                                                    <td style="max-width:400px; text-overflow: ellipsis; overflow: hidden;">{{$data->L1_title}}</td>
                                                    <td>{{$data->procure_type}}</td>
                                                    <td>{{$data->L1_trackno}}</td>
                                                    <td>{{$data->category}}</td>
                                                    <td>{{$data->mode}}</td>
                                                    <td>{{$data->date_received_pr}}</td>
                                                    <td>{{$data->date_forwarded_enduser}}</td>
                                                    <td>{{$data->req_name}}</td>
                                                    <td>{{$data->app_name}}</td>
                                                    <td>{{$data->cert1_name}}</td>
                                                    <td>{{$data->cert2_name}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </font>
                                </div>
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
                                    <a href="#createpr_modal" data-toggle="modal" class="btn waves-effect waves-light btn-success createpr_modal">
                                              <i class="fa fa-plus"></i> Create Item
                                    </a>
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
                                            @foreach($items as $item)
                                                <tr>
                                                <td>{{$item->id}}</td>
                                                    <td>{{$item->status}}</td>
                                                    <td>{{$item->office}}</td>
                                                    <td style="max-width:400px; text-overflow: ellipsis; overflow: hidden;">{{$item->L1_title}}</td>
                                                    <td>{{$item->procure_type}}</td>
                                                    <td>{{$item->L1_trackno}}</td>
                                                    <td>{{$item->category}}</td>
                                                    <td>{{$item->mode}}</td>
                                                    <td>{{$item->date_received_pr}}</td>
                                                    <td>{{$item->date_forwarded_enduser}}</td>
                                                    <td>{{$item->req_name}}</td>
                                                    <td>{{$item->app_name}}</td>
                                                    <td>{{$item->cert1_name}}</td>
                                                    <td>{{$item->cert2_name}}</td>
                                                </tr>
                                            @endforeach
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