@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>
    </div>
    <!-- my account start  -->
    <section class="ftco-section services-section bg-light" style="padding: 100px 0;">
        <div class="container">   
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button" style="background-color: #e3fff8;border: 3px solid #fe5e00;padding: 20px">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active btn-outline-success">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link btn-outline-success">Booking</a></li>
                                <li><a href="{{route('logout')}}" class="nav-link  btn-dark">Logout</a></li>
                            </ul>
                        </div>    
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Booking List</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Room</th>
                                                <th>order</th>
                                                <th>Name</th>
                                                <th>Payment</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $serial = 0;
                                        @endphp
                                        @foreach($bookings as $data)
                                            <tr>
                                                <td>{{++$serial}}</td>
                                                <td>{{$data->rooms->type}}</td>
                                                <td><span class="success">{{$data->created_at}}</span></td>
                                                <td>{{$data->name}}</td>
                                                <td>
                                                    @php
                                                        $payment=$data->payment_status
                                                    @endphp
                                                    @if ($payment===1)
                                                        <i class="fa fa-dollar" aria-hidden="true"></i> Completed <i class="fa fa-money" aria-hidden="true"></i>
                                                    @else
                                                        <a href="{{route('payment',['id'=>$data->id])}}">Not Completed</a>
                                                    @endif
                                                </td>
                                                <td><a href="#details{{$data->id}}" class="btn btn-outline-inverse btn-xs" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
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
                                                                        <h6>Check In</h6>
                                                                        <p>{{$data->check_in}}</p>
                                                                        <hr>
                                                                        <h6>Check Out</h6>
                                                                        <p>{{$data->check_out}}</p>
                                                                        <hr>
                                                                        <h6>Check Out</h6>
                                                                        <p>{{$data->check_out}}</p>
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
                                                                        <h6>Email</h6>
                                                                        <p>{{$data->email}}</p>
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
    </section>			
    <!-- my account end   -->
    <style>
        .tabactive{
            background-color: #0b0b0b
        }



    </style>
@endsection
