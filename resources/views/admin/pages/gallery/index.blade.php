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
                            <a href="#gallery" class="btn btn-primary" data-toggle="modal">Add Photo</a>
                            <div id="gallery" class="modal fade" style="overflow: auto !important;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Gallery Image</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{ route('storegallery')}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-12">Tittle<span class="required"> * </span> </label>
                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                    <input type="text" name="tittle" class="form-control" /> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-12">Description <span class="required"> * </span> </label>
                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                    <textarea class="form-control" name="description"  rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-12">Image <span class="required"> * </span> </label>
                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                    <input type="file" name="gallery_image" class="form-control" />
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
                                <table class="table table-hover dataTable" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery as $gallery)
                                    <tr>
                                        <td class="text-dark weight-600">{{$gallery->tittle}} </td>
                                        <td>{{$gallery->description}}</td>
                                        <td><img src="/image/gallery/{{$gallery->gallery_image}}" width="60px" height="auto"></td>
                                        <td class="text-center">
                                            <a href="#edit{{$gallery->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                            <div id="edit{{$gallery->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Image</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('updategallery',['id'=>$gallery->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-body">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-12 col-sm-12 col-12">Name<span class="required"> * </span> </label>
                                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                                    <input type="text" name="tittle" value="{{$gallery->tittle}}" class="form-control" /> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-12 col-sm-12 col-12">Description <span class="required"> * </span> </label>
                                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                                    <textarea class="form-control" name="description"  rows="3">{{$gallery->description}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-12 col-sm-12 col-12">Old Image <span class="required"> * </span> </label>
                                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                                    <img src="/image/gallery/{{$gallery->gallery_image}}" width="60px" height="auto">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-12 col-sm-12 col-12">Upload new Image <span class="required"> * </span> </label>
                                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                                    <input type="file" name="gallery_image" class="form-control" />
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






                                            <a href="{{route('deletegallery',['id'=>$gallery->id])}}" onclick="return confirm('Confirm Delete?')"><i class="mdi mdi-delete font-18">Delete</i></a>
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
