@extends('layouts.app')

@section('content')
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
                                            @foreach($data as $dat)
                                                <tr>
                                                    <td>{{$dat->id}}</td>
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
@endsection
