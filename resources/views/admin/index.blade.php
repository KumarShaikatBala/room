@extends('admin.admin_master')
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="bst-block bst-shadow">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center pad-tb-xs">
                        <div class="mrgn-b-sm"> <i class="fa fa-arrow-up fa-2x text-success" aria-hidden="true"></i> </div>
                        <p class="font-2x mrgn-b-none">$<span class="count-item" data-count="{{$expenses->sum('amount')}}">{{$expenses->sum('amount')}}</span></p>
                        <p class="font-xl mrgn-b-none">Expenses</p>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center pad-tb-xs">
                        <div class="mrgn-b-sm"> <i class="fa fa-arrow-down fa-2x text-danger" aria-hidden="true"></i> </div>
                        <p class="font-2x mrgn-b-none"><span class="count-item" data-count="{{$sale}}">{{$sale}}</span></p>
                        <p class="font-xl mrgn-b-none">Total Sale <span class="ti-money"></span></p>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center pad-tb-xs">
                        <div class="mrgn-b-sm"> <i class="fa fa-arrow-down fa-2x text-danger" aria-hidden="true"></i> </div>
                        <p class="font-2x mrgn-b-none"><span class="count-item" data-count="{{$rooms->sum('available')}}">{{$rooms->sum('available')}}</span></p>
                        <p class="font-xl mrgn-b-none">Available Rooms<span class="ti-money"></span></p>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center pad-tb-xs">
                        <div class="mrgn-b-sm"> <i class="fa fa-arrow-up fa-2x text-success" aria-hidden="true"></i> </div>
                        <p class="font-2x mrgn-b-none">$<span class="count-item" data-count="{{$books->sum('room')}}">{{$books->sum('room')}}</span></p>
                        <p class="font-xl mrgn-b-none">Booked</p>
                    </div>

                </div>
            </div>
            <div class="bst-block bst-shadow">
            <div class="dataTables_wrapper">
                <div class="table-responsive">
                    <table class="table table-hover dataTable table-responsive" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']" style="overflow: auto">
                        <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Rooms</th>
                            <th>Booked</th>
                            <th>Available</th>
                            <th>Rent</th>
                            <th>Opening$</th>
                            <th>Closing$</th>
                            <th>Card</th>
                            <th>Cash</th>
                            <th>Due</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $serial = 0;
                        @endphp
                        @foreach($statements as $statement)
                            <tr>
                                <td class="text-center">{{++$serial}}</td>
                                <td>
                                    {{$statement->date}}
                                </td>
                                <td>{{$statement->rooms}}</td>
                                <td>{{$statement->booked}}</td>
                                <td>{{$statement->available}}</td>
                                <td>{{$statement->rent}}</td>
                                <td>{{$statement->opening}}</td>
                                <td>{{$statement->closeing}}</td>
                                <td>{{$statement->card}}</td>
                                <td>{{$statement->cash}}</td>
                                <th>due</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/highchart/highcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/highchart/highcharts-3d.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/highchart/highcharts-more.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/skycons/js/skycons.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/am-chart/js/amcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/am-chart/js/gauge.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/am-chart/js/ammap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jvmap/js/jquery.vmap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jvmap/js/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jvmap/js/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jvmap/js/jquery-jvectormap-continents-mill.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/clndr/underscore.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/clndr/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/clndr/clndr.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/toster/js/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/toster/js/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/morris/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/morris/morris.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/full-calendar/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/full-calendar/js/fullcalendar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/full-calendar/locale-all.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/chartjs/Chart.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/chartjs/utils.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/chartjs/Chart.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/weather.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/map-vector.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/chart-google.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/dashboard.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/chart-highcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
@endsection
