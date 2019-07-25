@extends('admin.admin_master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/css/datatables.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/css/dataTables.bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/Buttons/css/buttons.dataTables.min.css')}}" type="text/css" />
@endsection
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="data-table-style">
                <div class="bst-block pos-relative">
                    <div class="bst-block-content">
                        <div class="dataTables_wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-responsive" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']" style="overflow: auto!important;">
                                    <h5 class="text-info">Total Payment Amount <i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i>  {{$payments->sum('amount')}}<span class="ti-money"></span></h5>

                                    <thead>
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Room</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 0;
                                    @endphp
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td class="text-center">{{++$serial}}</td>
                                            <td class="text-center">{{$payment->amount}}</td>
                                            <td class="text-center">{{$payment->name}}</td>
                                            <td class="text-center">{{$payment->mobile}}</td>
                                            <td class="text-center">{{$payment->email}}</td>
                                            <td class="text-center">{{$payment->rooms->type}}</td>
                                            <td>
                                                <a href="#details{{$payment->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <div id="details{{$payment->id}}" class="modal fade" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Payment Details</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                                                            <h4>Amount</h4>
                                                                            <div class="form-group">
                                                                                <input type="text" value="{{$payment->amount}}" class="form-control" readonly> </div>
                                                                            <h4>Payment For</h4>
                                                                            <div class="form-group">
                                                                                <input type="text" value="{{$payment->rooms->category->name}}Room" class="form-control" readonly> </div>
                                                                            <h4>Email</h4>
                                                                            <div class="form-group">
                                                                                <input type="text" value="{{$payment->email}}" class="form-control" readonly> </div>

                                                                        </div>
                                                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                                                            <h4>Name</h4>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" value="{{$payment->name}}" readonly> </div>
                                                                            <h4>Payment Date & Time</h4>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" value="{{$payment->created_at}}" readonly> </div>
                                                                            <h4>Mobile</h4>
                                                                            <div class="form-group">
                                                                                <input type="text" value="{{$payment->mobile}}" class="form-control" readonly> </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-inverse">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{route('payment_destroy',['id'=>$payment->id])}}" class="btn btn-outline-danger btn-xs" style="float: right"><i class="fa fa-trash" aria-hidden="true"></i><i class="fa fa-remove" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/assets/plugin/jquery/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/js/datatable.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/buttons.flash.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/ColReorder/dataTables.colReorder.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/RowReorder/dataTables.rowReorder.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/data-tables.js')}}" type="text/javascript"></script>
@endsection
