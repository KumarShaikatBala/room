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
                            <a href="#stack1" class="btn btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Category</a>
                            <div id="stack1" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">New Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('category_store')}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-12">Name <span class="required"> * </span> </label>
                                                                <div class="col-md-6 col-sm-8 col-12">
                                                                    <input type="text" name="name" data-required="1" class="form-control" /> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
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
                                <table class="table table-hover dataTable table-responsive" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Root</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 0;
                                    @endphp
                                    @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{++$serial}}</td>
                                        <td class="text-center">{{$category->name}}</td>
                                        <td class="text-center">
                                            <a href="#edit{{$category->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                <div id="edit{{$category->id}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Category</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <form action="{{ route('category_update',['id'=>$category->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-body">

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-4 col-sm-4 col-12">Name <span class="required"> * </span> </label>
                                                                                    <div class="col-md-6 col-sm-8 col-12">
                                                                                        <input type="text" name="name" value="{{$category->name}}" data-required="1" class="form-control" /> </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-actions">
                                                                                <div class="row">
                                                                                    <div class="col-md-offset-3 col-md-9">
                                                                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a data-dismiss="modal" class="btn btn-outline-inverse" href="#/">Close</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <a href="{{route('category_destroy',['id'=>$category->id])}}" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Delete <i class="fa fa-remove" aria-hidden="true"></i></a>
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
    <script>
        $('#selcat').on('change',function(){
            var category = $(this).val();
            if(category){
                console.log(category);
                $.ajax({
                    type:"GET",
                    url:"{{url('admin/get-class-list')}}?category_id="+category,
                    success:function(res){
                        if(res){
                            console.log(res);
                            $("#selsubcat").empty();
                            $("#selsubcat").append('<option value="">Select</option>');
                            $.each(res,function(key,value){
                                $("#selsubcat").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }else{
                            $("#selsubcat").empty();
                        }
                    }
                });
            }else{
                $("#selsubcat").empty();
            }
        });
    </script>
@endsection
