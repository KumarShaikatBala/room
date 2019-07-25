@extends('admin.admin_master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/summernote/summernote.css')}}" type="text/css">
@endsection
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Edit Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('room_update',['id'=>$room->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">type<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="type" value="{{$room->type}}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label>Description</label>
                                    <textarea  id="summernote" class="summernote"  name="contents" placeholder="Input your Message">{!! $room->contents!!}</textarea>
                                    @if($errors->has('contents'))
                                        <span class="alert-danger">
                                                                                        {{ $errors->first('contents') }}
                                                                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label>Facility</label>
                                    <textarea  id="summernote" class="summernote"  name="facility" placeholder="Input your Message">{!! $room->facility!!}</textarea>
                                    @if($errors->has('facility'))
                                        <span class="alert-danger">
                                                                                    {{ $errors->first('facility') }}
                                                                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Toatal Room<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="total" value="{{$room->total}}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Available Room<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="available" value="{{$room->available}}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">price Room<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="price" value="{{$room->price}}" class="form-control" />
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
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/assets/plugin/jquery/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/tether/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/summernote/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/features.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/element.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
@endsection


