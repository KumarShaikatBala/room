@extends('admin.admin_master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/css/datatables.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/css/dataTables.bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/bootstrap-timepicker.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/bootstrap-datepicker/css/daterangepicker.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/Buttons/css/buttons.dataTables.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/bootstrap-datepicker.css')}}">
    <script src="{{asset('admin/assets/plugin/jquery/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="data-table-style">
                <div class="bst-block pos-relative">
                    {{--<div class="bst-block-title mrgn-b-lg">
                        <div class="caption">
                            <p>Booking Information</p>
                        </div>

                    </div>--}}
                    <div class="bst-block-content">
                        <div class="dataTables_wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-responsive" data-table="table-button" data-buttons="['copy', 'csv', 'excel', 'pdf', 'print']" style="overflow: auto!important;">
                                    <h5><span class="ti-server"></span>    Booking Information <span class="ti-receipt"></span> </h5>
                                    <thead>
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Room</th>
                                        <th class="text-center">Available</th>
                                        <th class="text-center">Booking</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 0;
                                    @endphp
                                    @foreach($bookings as $data)
                                        <tr>
                                            <td class="text-center">{{++$serial}}</td>
                                            <td class="text-center">{{$data->rooms->type}}</td>
                                            <td class="text-center">{{$data->rooms->available}}</td>
                                            <td class="text-center">{{$data->room}}</td>
                                            <td class="text-center">{{$data->name}}</td>
                                            <td class="text-center">
                                                @php
                                                $payment=$data->payment_status
                                                @endphp
                                               @if ($payment===1 or $data->cash_status===1)
<span class="label label-success"><i class="fa fa-dollar" aria-hidden="true"></i> Completed <i class="fa fa-check" aria-hidden="true"></i></span>
                                                   @else
                                                   @if ($data->cash_status===0)
                                                        <span class="label label-outline-warning"><i class="fa fa-close" aria-hidden="true"></i>Cash Pending</span>
                                                  @else
                                                    <span class="label label-outline-warning"><i class="fa fa-close" aria-hidden="true"></i>Not Completed</span>
                                                    @endif
                                               @endif
                                            </td>
                                            <td class="text-center">
                                                @if($data->publication_status===1)
                                                    <span class="label label-success"><i class="fa fa-envelope-open" aria-hidden="true"></i> Confirm</span>
                                                @else
                                                    <span class="label label-warning"><i class="fa fa-window-close-o" aria-hidden="true"></i> Pending</span>
                                                @endif
                                            </td>
                                            <td style="display: inline-block">
                                                @if($data->publication_status===1)
                                                   {{-- <a class="btn btn-outline-warning btn-xs" href="{{route('booking_deactive',['id'=>$data->id])}}"><i class="fa fa-close" aria-hidden="true"></i>Pending</a>--}}

                                                @else
                                                    @php
                                                        $total=$data->rooms->available;
                                                    $booked=$data->room;
                                                    $result=$total-$booked;
                                                    $add=$total+$booked;
                                                      @endphp

                                                    <a class="btn btn-outline-success btn-xs" href="{{route('booking_active',['id'=>$data->id,'room'=>$data->rooms->id,$result])}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Confirm</a>
                                                @endif
                                                    <a href="#details{{$data->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <div id="details{{$data->id}}" class="modal fade" style="overflow: auto!important;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Booking Details</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>Room type</h6>
                                                                            <p>{{$data->rooms->type}}</p>
                                                                            <hr>
                                                                            <h6>Check In <i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i> <i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i><i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i><i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i></h6>
                                                                            <p>{{$data->check_in}}</p>
                                                                            <hr>
                                                                            <h6>Email</h6>
                                                                            <p>{{$data->email}}</p>
                                                                            <hr>
                                                                            <h6>Room: {{$data->room}}</h6>
                                                                            <hr>
                                                                            <h6>Adult: {{$data->adult}}</h6>
                                                                            <hr>
                                                                            <h6>Child: {{$data->child}}</h6>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h6>Booking Name</h6>
                                                                            <p>{{$data->name}}</p>
                                                                            <hr>
                                                                            <h6>Check Out <i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i> <i class="fa fa-angle-double-right fa-lg text-info" aria-hidden="true"></i>Total <span class="date{{$data->id}}"></span> Days.</h6>
                                                                            <p>{{$data->check_out}}</p>
                                                                            <script>
                                                                                $(document).ready(function(){
                                                                                    const date1 = new Date('{{$data->check_in}}');
                                                                                    const date2 = new Date('{{$data->check_out}}');
                                                                                    const diffTime = Math.abs(date2.getTime() - date1.getTime());
                                                                                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                                                                    date= diffDays;
                                                                                    $('.date{{$data->id}}').text(date);
                                                                                });
                                                                            </script>
                                                                            <hr>
                                                                            <h6>Mobile</h6>
                                                                            <p>{{$data->mobile}}</p>
                                                                            <hr>
                                                                            <h6>Address</h6>
                                                                            <p>{{$data->address}}</p>
                                                                            <hr>
                                                                            <h6>Payment</h6>
                                                                            <p>{{$data->payment}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a data-dismiss="modal" class="btn btn-outline-inverse" href="#/">Close</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#edit{{$data->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <div id="edit{{$data->id}}" class="modal fade" style="overflow: auto!important;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                   <h5 class="modal-title" id="exampleModalLongTitle">Booking Form For {{$data->rooms->type}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('bookingUpdate',['id'=>$data->id])}}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="price" id="val{{$data->id}}" value="{{$data->rooms->price}}">
                                                                            <input type="hidden" name="payment_id" value="{{$data->payment_id}}">
                                                                            <input type="hidden" name="cash_id" value="{{$data->cash_id}}">
                                                                            <input type="hidden" name="room_id" value="{{$data->rooms->id}}">
                                                                            <input type="hidden" name="customer_id" value="{{$data->customer->id}}">
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="check_in">Check In >>></label>
                                                                                        <input type="text" name="check_in" id="check_in{{$data->id}}" value="{{$data->check_in}}" class="form-control checkin_date dateDisable" data-provide="datepicker">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Room {{$data->room}} &  &nbsp;&nbsp;Price:<b class="booking{{$data->id}}" style="display: inline-block">{{$data->payment}}</b></label>
                                                                                        <select name="room" id="booking{{$data->id}}" class="form-control">
                                                                                            @for ($j = 1;$j<=$data->rooms->available;$j++)
                                                                                                <option value="{{$j}}" @if ($data->room==$j)
                                                                                                selected
                                                                                                @else
                                                                                                    @endif>{{$j}}</option>
                                                                                            @endfor
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="child">Child</label>
                                                                                        <input type="text" name="child" id="child" value="{{$data->child}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Email address</label>
                                                                                    <input type="email" name="email" value="{{$data->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="address">Address</label>
                                                                                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="{{$data->address}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="check_out">Check Out>>>Total</label> <b class="date{{$data->id}}"></b> Days
                                                                                        <input type="text" name="check_out" id="check_out{{$data->id}}" value="{{$data->check_out}}" class="form-control checkout_date dateDisable" data-provide="datepicker">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="hidden"  class="form-control date{{$data->id}}" value="" readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="adult">Adult</label>
                                                                                        <input type="text" name="adult" id="adult" value="{{$data->adult}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">Booking Name </label>
                                                                                    <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="mobile">Mobile</label>
                                                                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" value="{{$data->mobile}}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="payment">Payment</label>
                                                                                    <input type="text" name="payment" class="form-control final{{$data->id}}" value="{{$data->payment}}" id="payment" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <script>
                                                                            $(document).ready(function(){
                                                                                $('#booking{{$data->id}},#check_in{{$data->id}},#check_out{{$data->id}},#room{{$data->id}},#val{{$data->id}},.booking{{$data->id}}').change(function(){
                                                                                    var value1=($("#check_in{{$data->id}}").val());
                                                                                    var value2=($("#check_out{{$data->id}}").val());
                                                                                    const date1 = new Date(value1);
                                                                                    const date2 = new Date(value2);
                                                                                    const diffTime = Math.abs(date2.getTime() - date1.getTime());
                                                                                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                                                                    date= diffDays;
                                                                                    $('.date{{$data->id}}').text(date);
                                                                                var number = $('#booking{{$data->id}}').find(":selected").val();
                                                                                var price = $('#val{{$data->id}}').val();
                                                                                if (date==0) {
                                                                                    date=1;
                                                                                }
                                                                                var result = number * price *date;
                                                                                $('.booking{{$data->id}}').empty();
                                                                                $('.booking{{$data->id}}').append(result);
                                                                                $('.final{{$data->id}}').val(result);
                                                                                });
                                                                            });
                                                                        </script>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $total=$data->rooms->available;
                                                    $booked=$data->room;
                                                    $result=$total-$booked;
                                                    $add=$total+$booked;
                                                    @endphp
                                                    @if($data->checkout_status===1)
                                                        @elseif ($data->publication_status===1)
                                                        <a class="btn btn-outline-warning btn-xs" href="{{route('booking_close',['id'=>$data->id,'room'=>$data->rooms,$add])}}"><i class="fa fa-close" aria-hidden="true"></i>Chceck Out</a>
                                                    @else
                                                        @endif
                                                    @if ($payment===1 or $data->cash_status===1)
                                                        @else
                                                <a href="{{route('booking_destroy',['id'=>$data->id])}}" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Delete <i class="fa fa-remove" aria-hidden="true"></i></a>
                                                        @endif
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
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('frontEnd/js/bootstrap-datepicker.js')}}"></script>
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
    <script>
        var dateDisable = new Date();
        dateDisable.setDate(dateDisable.getDate());

        $('.dateDisable').datepicker({
            startDate: dateDisable
        });
    </script>
@endsection
