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
                        <h3>Meeting & Events</h3>
                    </div>
                    <div class="bst-block-content">
                        <form class="form" action="{{ route('meeting_store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label>Description</label>
                                    @if (empty($contents))<textarea  id="summernote" class="summernote"  name="contents" placeholder="Input your Message"></textarea>@else<textarea  id="summernote" class="summernote" name="contents" placeholder="Input your Address">{{$contents}}</textarea>@endif


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
                                    @if (empty($facility))<textarea  id="summernote" class="summernote"  name="facility" placeholder="Input your Message"></textarea>@else<textarea  id="summernote" class="summernote" name="facility" placeholder="Input your Address">{{$facility}}</textarea>@endif
                                    @if($errors->has('facility'))
                                        <span class="alert-danger">
                            {{ $errors->first('facility') }}
                        </span>
                                    @endif
                                </div>
                            </div>
                            @if(empty($img))

                                <div class="form-group m-t-40 row">
                                    <label  class="col-4 col-form-label">Change Image</label>
                                    <div class="col-8">
                                        <input type="file" class="form-control"  name="img">
                                    </div>
                                </div>

                            @else
                                <div class="form-group m-t-40 row">
                                    <label  class="col-4 col-form-label" for="img"><i class="fa fa-photo"></i> Image</label>
                                    <div class="col-8">
                                        <img src="/image/meeting/{{$img}}" width="auto" height="70px" alt="No Image">
                                    </div>
                                </div>

                                <div class="form-group m-t-40 row">
                                    <label  class="col-4 col-form-label" for="img"> <i class="fa fa-photo"></i>Change Image <i class="fa fa-camera"></i></label>
                                    <div class="col-8">
                                        <input type="file" class="form-control"  name="img" id="img">
                                    </div>
                                </div>
                            @endif
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
