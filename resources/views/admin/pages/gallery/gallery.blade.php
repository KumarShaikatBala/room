@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Gallery Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('storegallery')}}" method="post" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Tittle<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <input type="text" name="tittle" class="form-control" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Description <span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <textarea class="form-control" name="description"  rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Image <span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        <input type="file" name="gallery_image" class="form-control" />
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
@section('content')
    <script src="{{asset('admin/assets/js/form-validation.js')}}" type="text/javascript"></script>
@endsection


