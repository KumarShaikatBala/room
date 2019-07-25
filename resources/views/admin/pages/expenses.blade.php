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
                    <div class="bst-block-title mrgn-b-lg">
                        <div class="caption">
                            <a href="#expense" class="btn btn btn-success" data-toggle="modal">Create Expense <i class="fa fa-money" aria-hidden="true"></i></a>
                            <p class="text-danger">Total Expenses Amount: {{$expenses->sum('amount')}} <i class="fa fa-dollar" aria-hidden="true"></i></p>
                            <div id="expense" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Expense</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('expense_store')}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-12 col-sm-12 col-12">Name <span class="required"> * </span> </label>
                                                                        <div class="col-md-12 col-sm-12 col-12">
                                                                            <input type="text" name="name" class="form-control" /> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-12 col-sm-12 col-12">Amount <span class="required"> * </span> </label>
                                                                        <div class="col-md-12 col-sm-12 col-12">
                                                                            <input type="text" name="amount" class="form-control"  id="amount"/> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-12 col-sm-12 col-12">Details </label>
                                                                        <div class="col-md-12 col-sm-12 col-12">
                                                                            <textarea class="form-control" name="details" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Save</button>
                                            </form>
                                            <a data-dismiss="modal" class="btn btn-outline-inverse" href="#/">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bst-block-content">
                        <div class="dataTables_wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-responsive" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']" style="overflow: auto!important;">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 0;
                                    @endphp
                                    @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{++$serial}}</td>
                                        <td>{{$expense->name}}</td>
                                        <td>{{$expense->amount}}</td>
                                        <td>
                                            <a href="#details{{$expense->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i> Details</a>
                                            <div id="details{{$expense->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Expense</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="blockquote-style-1">
                                                                <blockquote class="blockquote blockquote-outline-danger">
                                                                    <p class="base-dark">{{$expense->name}}{{$expense->amount}}</p>
                                                                </blockquote>
                                                            </div>
                                                            <div class="blockquote-style-1">
                                                                <blockquote class="blockquote blockquote-outline-default">
                                                                    <p class="base-dark">{{$expense->details}}</p>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-dismiss="modal" class="btn btn-outline-inverse" href="#/">Close</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="#edit{{$expense->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                <div id="edit{{$expense->id}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Expense</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <form action="{{ route('expense_update',['id'=>$expense->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-body">
                                                                               <div class="row">
                                                                                   <div class="col-md-6">
                                                                                       <div class="form-group">
                                                                                           <label class="control-label col-md-12 col-sm-12 col-12">Name <span class="required"> * </span> </label>
                                                                                           <div class="col-md-12 col-sm-12 col-12">
                                                                                               <input type="text" name="name" value="{{$expense->name}}" class="form-control" /> </div>
                                                                                       </div>
                                                                                   </div>
                                                                                   <div class="col-md-6">
                                                                                       <div class="form-group">
                                                                                           <label class="control-label col-md-12 col-sm-12 col-12">Amount <span class="required"> * </span> </label>
                                                                                           <div class="col-md-12 col-sm-12 col-12">
                                                                                               <input type="text" name="amount" value="{{$expense->amount}}" class="form-control"  id="amount"/> </div>
                                                                                       </div>
                                                                                   </div>
                                                                                   <div class="col-md-12">
                                                                                       <div class="form-group">
                                                                                           <label class="control-label col-md-12 col-sm-12 col-12">Details </label>
                                                                                           <div class="col-md-12 col-sm-12 col-12">
                                                                                               <textarea class="form-control" name="details" rows="3">{{$expense->details}}</textarea>
                                                                                           </div>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Update</button>
                                                                </form>
                                                                <a data-dismiss="modal" class="btn btn-outline-inverse" href="#/">Close</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <a href="{{route('expense_destroy',['id'=>$expense->id])}}" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Delete <i class="fa fa-remove" aria-hidden="true"></i></a>
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
    <script>
        var input = document.getElementById('amount');
        input.onkeyup = input.onchange = enforceFloat;
        function enforceFloat() {
            var valid = /^\-?\d+\.\d*$|^\-?[\d]*$/;
            var number = /\-\d+\.\d*|\-[\d]*|[\d]+\.[\d]*|[\d]+/;
            if (!valid.test(this.value)) {
                var n = this.value.match(number);
                this.value = n ? n[0] : '';
            }
        }
    </script>
@endsection
