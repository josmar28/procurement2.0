@extends('layouts.app')

@section('content')
<?php  
    use App\Http\Controllers\admin\DraftPRCtrl as DraftPRCtrl;
?>
<div class="container-fluid">
    <div class="row">
            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Draft PR List</h4>
                                    <div style="margin-bottom:20px;">
                                    <a href="#createpr_modal" data-toggle="modal" class="btn waves-effect waves-light btn-success createpr_modal">
                                              <i class="fa fa-plus"></i> Create PR
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
                                            @foreach($data as $dat)
                                            <?php  
                                                $totalitems = DraftPRCtrl::countItem($dat->id);
                                            ?>
                                        
                                                <tr>
                                                    <td> 
                                                        <a href="#additem_modal" data-id ="{{$dat->id}}" data-toggle="modal" class="btn waves-effect waves-light btn-success additem_modal">
                                                        @if($totalitems > 1 || $totalitems == 0)
                                                        {{$totalitems}} Items 
                                                        @else 
                                                        {{$totalitems}} Item 
                                                        @endif
                                                        </a>
                                                    </td>
                                                    <td>{{$dat->id}}</td>
                                                    <td>{{$dat->status}}</td>
                                                    <td>{{$dat->office}}</td>
                                                    <td style="max-width:400px; text-overflow: ellipsis; overflow: hidden;">{{$dat->L1_title}}</td>
                                                    <td>{{$dat->procure_type}}</td>
                                                    <td>{{$dat->L1_trackno}}</td>
                                                    <td>{{$dat->category}}</td>
                                                    <td>{{$dat->mode}}</td>
                                                    <td>{{$dat->date_received_pr}}</td>
                                                    <td>{{$dat->date_forwarded_enduser}}</td>
                                                    <td>{{$dat->req_name}}</td>
                                                    <td>{{$dat->app_name}}</td>
                                                    <td>{{$dat->cert1_name}}</td>
                                                    <td>{{$dat->cert2_name}}</td>
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

@include('modal.createpr')
@section('js')
@include('script.createpr')
@endsection
@endsection
