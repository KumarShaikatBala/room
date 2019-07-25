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
                        <h3>Facility</h3>
                    </div>
                    <div class="bst-block-content">
                        <form class="form" action="{{ route('facility_update',['id'=>$facility->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">type<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <select class="form-control" name="room_id">
                                        <option value="0">Select...</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Meeting<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <select class="form-control" name="meeting_id">
                                        <option value="0">Select...</option>
                                        @foreach($meeting as $meeting)
                                            <option value="{{$meeting->id}}">Meeting</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Dinning<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <select class="form-control" name="dinning_id">
                                        <option value="0">Select...</option>
                                        @foreach($dinning as $dinning)
                                            <option value="{{$dinning->id}}">Dinning</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Heading<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="heading" value="{{$facility->heading}}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label>Facility</label>
                                    <textarea  id="summernote" class="summernote"  name="facility" placeholder="Input your Message">{!! $facility->facility !!}</textarea>
                                    @if($errors->has('facility'))
                                        <span class="alert-danger">
                                   {{ $errors->first('facility') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fa fa-floppy-o fa-lg"></i> Save</button>

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


