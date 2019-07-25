@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Counter Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form action="{{ route('counter_store')}}" method="POST" id="bst_demo_form1" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 1 Value<span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter1))
                                                    <input type="text" name="counter1" class="form-control" />
                                                @else
                                                    <input type="text" name="counter1" value="{{$counter1}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 2 Value<span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter2))
                                                    <input type="text" name="counter2" class="form-control" />
                                                @else
                                                    <input type="text" name="counter2" value="{{$counter2}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 3 Value<span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter3))
                                                    <input type="text" name="counter3" class="form-control" />
                                                @else
                                                    <input type="text" name="counter3" value="{{$counter3}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 4 Value<span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter4))
                                                    <input type="text" name="counter4" class="form-control" />
                                                @else
                                                    <input type="text" name="counter4" value="{{$counter4}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 1 Name <span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter1_name))
                                                    <input type="text" name="counter1_name" class="form-control" />
                                                @else
                                                    <input type="text" name="counter1_name" value="{{$counter1_name}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 2 Name <span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter2_name))
                                                    <input type="text" name="counter2_name" class="form-control" />
                                                @else
                                                    <input type="text" name="counter2_name" value="{{$counter2_name}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 3 Name <span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter3_name))
                                                    <input type="text" name="counter3_name" class="form-control" />
                                                @else
                                                    <input type="text" name="counter3_name" value="{{$counter3_name}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-12">Counter 4 Name <span class="required"> * </span> </label>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                @if (empty($counter4_name))
                                                    <input type="text" name="counter4_name" class="form-control" />
                                                @else
                                                    <input type="text" name="counter4_name" value="{{$counter4_name}}" class="form-control" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
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


