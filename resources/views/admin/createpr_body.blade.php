<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ asset('procurement/add') }}">
                                {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                  <h4 class="card-title">Status</h4>
                                                    <select class="form-control chosen-select" id="exampleFormControlSelect1" name="L1_status">
                                                    <option value="" selected disabled>-Select-</option>
                                                    @foreach ($status as $stat)
                                                     <option value="{{ $stat -> id }}">{{ $stat -> status }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <h4 class="card-title">Type</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="type_procure">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($type as $ty)
                                                        <option value="{{ $ty -> id }}">{{ $ty -> type_procure }}</option>
                                                        @endforeach
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
                                                            <textarea class="form-control" rows="3" placeholder="Purpose/Title" name="L1_title"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <h4 class="card-title">Office</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="L1_office">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($office as $off)
                                                        <option value="{{ $off -> id }}">{{ $off -> office }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <h4 class="card-title">Fund Year</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="L2_fundyear">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @for($year=2018;$year<=date('Y');$year++)
                                                         <option value="{{ $year }}">{{ $year }}</option>
                                                        @endfor
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h4 class="card-title">Fund Source</h4>
                                                    <input type="text" class="form-control" placeholder="Input Here..." name="L2_fundsource">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <h4 class="card-title">Category</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="L1_typeproc">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($category as $cat)
                                                        <option value="{{ $cat -> category_id }}">{{ $cat -> category }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h4 class="card-title">Fund Type</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="L2_fundtype">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($fundtype as $fundt)
                                                        <option value="{{ $fundt -> id }}">{{ $fundt -> fundtype }}</option>
                                                        @endforeach
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
                                                            <textarea class="form-control" rows="3" placeholder="Information to Supplier" name="supplier_inst"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h4 class="card-title">Date Prepared</h4>
                                                   
                                                        <div class="form-group">
                                                            <input type="datetime-local" class="form-control" name="date_prep_pr_enduser">
                                                        </div>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <h4 class="card-title">Requested by</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1 " name="requested_by">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($fundtype as $fundt)
                                                        <option value="{{ $fundt -> id }}">{{ $fundt -> fundtype }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <h4 class="card-title">Approved by</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="approved_by">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($fundtype as $fundt)
                                                        <option value="{{ $fundt -> id }}">{{ $fundt -> fundtype }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <h4 class="card-title">Certified by</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="cert_by1">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($fundtype as $fundt)
                                                        <option value="{{ $fundt -> id }}">{{ $fundt -> fundtype }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <h4 class="card-title">Certified by</h4>
                                                        <select class="form-control chosen-select" id="exampleFormControlSelect1" name="cert_by2">
                                                        <option value="" selected disabled>-Select-</option>
                                                        @foreach ($fundtype as $fundt)
                                                        <option value="{{ $fundt -> id }}">{{ $fundt -> fundtype }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                    <button type="reset" class="btn btn-dark">Reset</button>
                                                </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>        