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
                            <a href="#slider" class="btn btn-primary" data-toggle="modal">Add Slider</a>
                            <div id="slider" class="modal fade" style="overflow: auto !important;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">New Slider</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{ route('storeimg')}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-12">Select <span class="required" aria-required="true"> * </span> </label>
                                                                <div class="col-md-6 col-sm-8 col-12">
                                                                    <select class="form-control" name="room_id">
                                                                        <option>Select...</option>
                                                                        @foreach($rooms as $room)
                                                                            <option value="{{$room->id}}">{{$room->type}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-12">Image <span class="required"> * </span> </label>
                                                                <div class="col-md-6 col-sm-8 col-12">
                                                                    <input type="file" name="image" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Submit</button>
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
                                <table class="table table-hover dataTable table-responsive" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']">
                                    <thead>
                                    <tr>
                                        <td>Item Number</td>
                                        <td>Room type</td>
                                        <td>Image</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial=0
                                    @endphp
                                    @foreach($slider as $slider)
                                        <tr>
                                            <td class="text-dark weight-600">{{++$serial}}</td>
                                            <td class="text-dark weight-600">{{$slider->room->type}} </td>
                                            <td><img src="/image/room/{{$slider->image}}" width="60px" height="auto"></td>
                                            <td class="text-center">
                                                <a href="#edit{{$slider->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                <div id="edit{{$slider->id}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Slider</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <form action="{{ route('updateimg',['id'=>$slider->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-12 col-sm-12 col-12">Room Type<span class="required"> * </span> </label>
                                                                                        <div class="col-md-12 col-sm-12 col-12">
                                                                                            <select class="form-control" name="room_id">
                                                                                                <option>Select...</option>
                                                                                                @foreach($rooms as $room)
                                                                                                    <option value="{{$room->id}}">{{$room->type}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-12 col-sm-12 col-12">Old Image <span class="required"> * </span> </label>
                                                                                        <div class="col-md-12 col-sm-12 col-12">
                                                                                            <img src="/image/room/{{$slider->image}}" width="60px" height="auto">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-12 col-sm-12 col-12">Upload new Image <span class="required"> * </span> </label>
                                                                                        <div class="col-md-12 col-sm-12 col-12">
                                                                                            <input type="file" name="slider_image" class="form-control" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                                </form>
                                                                <a data-dismiss="modal" class="btn btn-outline-inverse" href="#/">Close</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            &nbsp;
                            <a href="{{route('deleteimg',['id'=>$slider->id])}}" onclick="return confirm('Confirm Delete?')"><i class="mdi mdi-delete font-18">Delete</i></a>
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
