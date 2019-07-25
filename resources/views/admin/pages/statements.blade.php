@extends('admin.admin_master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/fontawesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/animate/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/toster/css/sweetalert.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/toster/css/toastr.min.cs')}}s" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/bootstrap-timepicker.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/daterangepicker.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/clockface.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/themify-icons/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/assets/css/beast.css')}}" type="text/css" />
@endsection
@section('content')
    <div class="bst-content-wrapper">
            <div class="bst-block-content">
                <div class="row">
                    <div class="col-lg-12 col-xl-8 offset-xl-2">
                        <div class="bst-block">
                            <div class="bst-block-title mrgn-b-md">
                                <h3>Statement</h3> </div>
                            <form action="{{route('statement')}}" method="post">
                                @csrf
                            <div class="form-input">
                                <div class="form-group has-feedback">
                                    <input class="form-control" name="daterange" type="text">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback fa-lg base-dark" aria-hidden="true"></span>
                                </div>
                                <button type="submit" class="btn btn-success">Search</button>
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
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/tether/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/bootstrap-timepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/daterangepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-datepicker/js/clockface.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap-hover/bootstrap-hover.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/toster/js/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/toster/js/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/component.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/element.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>
@endsection
