@extends('admin.admin_master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/css/datatables.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/css/dataTables.bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/Buttons/css/buttons.dataTables.min.css')}}" type="text/css" />
@endsection
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="data-table-style">
                <div class="bst-block pos-relative">
                    <div class="bst-block-title mrgn-b-lg">
                        <div class="caption">
                            <a href="{{route('facility')}}" class="btn btn btn-success"><i class="fa fa-plus"></i> Facility</a>
                        </div>
                    </div>
                    <div class="bst-block-content">
                        <div class="dataTables_wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">For</th>
                                        <th class="text-center">Heading</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 0;
                                    @endphp
                                    @foreach($facilities as $facility)
                                        <tr>
                                            <td class="text-center">{{++$serial}}</td>
                                            @if (is_null($facility->room))
                                                <td class="text-center">Other</td>
                                            @else
                                                <td class="text-center">{{$facility->room->type}}</td>
                                            @endif
                                            <td class="text-center">{{$facility->heading}}</td>
                                            <td class="text-center">
                                                <a href="{{route('facility_edit',['id'=>$facility->id])}}" class="btn btn-outline-inverse btn-xs" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                <a href="{{route('facility_destroy',['id'=>$facility->id])}}" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Delete <i class="fa fa-remove" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/js/datatable.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/buttons.flash.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/Buttons/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/ColReorder/dataTables.colReorder.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/datatables/RowReorder/dataTables.rowReorder.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/data-tables.js')}}" type="text/javascript"></script>
@endsection
