@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="note note-info">
                @if(Session::has('msg'))
                    <h5 id="msg">{{session::get('msg')}}</h5>
                @endif
                <script>
                    setTimeout(function() {
                        $('#msg').fadeOut('fast');
                    }, 4000);
                </script>
            </div>
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Tutor Testimonial Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('updateslider2',['id'=>$slider->id])}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form validation is successful!
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Name<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <input type="text" name="heading_1" value="{{$slider->heading_1}}" class="form-control" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Designation<span class="required"> * </span> </label>
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
                                    <label class="control-label col-md-4 col-sm-4 col-12">Image <span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <img src="/image/slider2/{{$slider->slider_image}}" width="60px" height="auto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Image  </label>
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
