@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Contact Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('contactinfo_store')}}" method="POST" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Notes<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        @if (empty($note))
                                            <textarea class="form-control" name="note"  rows="3"></textarea>
                                            @else
                                            <textarea class="form-control" name="note"  rows="3">{{$note}}</textarea>
@endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Mobile<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        @if (empty($mobile))
                                        <input type="text" name="mobile" class="form-control" />
                                        @else
                                            <input type="text" name="mobile" value="{{$mobile}}" class="form-control" />
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Email 1<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        @if (empty($email_1))
                                            <input type="email" name="email_1" class="form-control" />
                                        @else
                                            <input type="email" name="email_1" value="{{$email_1}}" class="form-control" />
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-12">Email 2<span class="required"> * </span> </label>
                                    <div class="col-md-6 col-sm-8 col-12">
                                        @if (empty($email_2))
                                            <input type="email" name="email_2" class="form-control" />
                                        @else
                                            <input type="email" name="email_2" value="{{$email_2}}" class="form-control" />
                                        @endif
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
    <script src="{{asset('admin/assets/js/element.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
@endsection


