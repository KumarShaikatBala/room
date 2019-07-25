@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Social Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('social_store')}}" method="POST" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Facebook <i class="fa fa-facebook fa-2x square-50" aria-hidden="true"></i> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($facebook))
                                                    <input type="text" name="facebook" class="form-control" />
                                                @else
                                                    <input type="text" name="facebook" value="{{$facebook}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Instagram <i class="fa fa-instagram fa-2x square-50" aria-hidden="true"></i> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($instagram))
                                                    <input type="text" name="instagram" class="form-control" />
                                                @else
                                                    <input type="text" name="instagram" value="{{$instagram}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Submit All Your Social Links<i class="fa fa-link fa-2x square-50" aria-hidden="true"></i> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Twitter <i class="fa fa-twitter fa-2x square-50" aria-hidden="true"></i> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($twitter))
                                                    <input type="text" name="twitter" class="form-control" />
                                                @else
                                                    <input type="text" name="twitter" value="{{$twitter}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Youtube <i class="fa fa-youtube fa-2x square-50" aria-hidden="true"></i> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($youtube))
                                                    <input type="text" name="youtube" class="form-control" />
                                                @else
                                                    <input type="text" name="youtube" value="{{$youtube}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Linkedin <i class="fa fa-linkedin fa-2x square-50" aria-hidden="true"></i> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($linkedin))
                                                    <input type="text" name="linkedin" class="form-control" />
                                                @else
                                                    <input type="text" name="linkedin" value="{{$linkedin}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
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


