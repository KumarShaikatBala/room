@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Tutor Testimonial Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('updateslider',['id'=>$slider->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form validation is successful!
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Heading1<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <input type="text" name="heading_1" value="{{$slider->heading_1}}" class="form-control" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Heading2<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <input type="text" name="heading_2" value="{{$slider->heading_2}}" class="form-control" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Description <span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <textarea class="form-control" name="description"  rows="3">{{$slider->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Old Image <span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <img src="/image/slider/{{$slider->slider_image}}" width="60px" height="auto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Upload new Image <span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <input type="file" name="slider_image" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-inverse btn-outline">Cancel</button>
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
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jquery-validation/jquery.validate.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/form-validation.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/element.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
@endsection
