@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('/frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <div class="sidebar-wrap ftco-animate">
                        <h3 class="heading mb-4">Facility</h3>

                        @foreach($room->facilities as $facility)
                        <div class="services d-block">
                            <div class="icon"><span class="flaticon-yatch"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">{{$facility->heading}}</h3>
                                <p>{!! $facility->facility !!}</p>
                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                @foreach($room->image as $img)
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url('/image/room/{{$img->image}}')"></div>
                                </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <span>Our Best hotels &amp; Rooms</span>
                            <h2>{{$room->type}}</h2>
                            <p>{!!$room->contents!!}</p>
                            <p>{!!$room->facility!!}</p>
                        </div>
                        {{--<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-5">Check Availability &amp; Booking</h4>
                            <div class="fields">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control checkin_date" placeholder="Date from">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control checkout_date" placeholder="Date to">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control" placeholder="Guest">
                                                    <option value="0">Guest</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control" placeholder="Children">
                                                    <option value="0">Children</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Check Availability" class="btn btn-primary py-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                       {{-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Review &amp; Ratings</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" class="star-rating">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i> 100 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i> 30 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 5 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>--}}
                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                            <h4 class="mb-4">Related Hotels</h4>
                            <div class="row">
                                @foreach($datas as $data)
                                <div class="col-md-4">
                                    <div class="destination">
                                        @foreach($data->img_single as $img)
                                        <a href="{{ route('frontend-room_details',['id'=>$data->id])}}" class="img img-2" style="background-image: url('/image/room/{{$img->image}}');"></a>
                                        @endforeach
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="{{ route('frontend-room_details',['id'=>$data->id])}}">{{$data->type}}</a></h3>
                                                    <p class="rate">
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-o"></i>
                                                        <span>8 Rating</span>
                                                    </p>
                                                </div>
                                                <div class="two">
                                                    <span class="price per-price">${{$data->price}}<br><small>/night</small></span>
                                                </div>
                                            </div>
                                            <p>{!! \Illuminate\Support\Str::words($data->contents, 10,'....') !!}</p>
                                            <hr>
                                            {{--<p class="bottom-area d-flex">
                                                <span><i class="icon-home"></i> Available:{{$data->available}}</span>

                                                @guest('customer')
                                                    <span class="ml-auto"><a href="#login" data-toggle="modal" data-target="#login">Book Now</a></span>
                                                @else
                                                    <span class="ml-auto"><a href="#book{{$data->id}}" data-toggle="modal" data-target="#book{{$data->id}}">Book Now</a></span>
                                                @endguest
                                            </p>--}}
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header nav" role="tablist">
                                                    <a href="#dashboard" id="exampleModalLongTitle" data-toggle="tab" class="modal-title nav-link active btn btn-secondary">Login</a>
                                                    &nbsp;
                                                    <a href="#orders" id="exampleModalLongTitle" data-toggle="tab" class=" modal-title nav-link btn btn-secondary">Registration</a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="dashboard">
                                                            <h3>Login</h3>
                                                            <form action="{{route('user-login-action')}}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="email">Email address</label>
                                                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="orders">
                                                            <h3>User Registration</h3>
                                                            <form action="{{route('user-registration')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email address</label>
                                                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password_confirmation">Password</label>
                                                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @guest('customer')
                                    @else
                                        <div class="modal fade" id="book{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="book{{$data->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Booking Form</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>{{$room->type}}</h4>
                                                        <form action="{{route('booking_store')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="room_id" value="{{$room->id}}" class="form-control">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Name {{Auth::guard('customer')->user()->name}}</label>
                                                                <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="check_in">Check In </label>
                                                                @if (empty($check_in))
                                                                    <input type="text" name="check_in" id="check_in" class="form-control checkin_date">
                                                                @else
                                                                    <input type="text" name="check_in" id="check_in" value="{{$check_in}}" class="form-control checkin_date">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="check_out">Check Out</label>
                                                                @if (empty($check_out))
                                                                    <input type="text" name="check_out" id="check_out" class="form-control checkout_date">
                                                                @else
                                                                    <input type="text" name="check_out" id="check_out" value="{{$check_out}}" class="form-control checkout_date">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="check_out">Room</label>
                                                                @if (empty($room_number))
                                                                    <input type="text" name="room" id="check_out"  class="form-control">
                                                                @else
                                                                    <input type="text" name="room" id="check_out" value="{{$room_number}}" class="form-control">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="adult">Adult</label>
                                                                @if (empty($adult))
                                                                    <input type="text" name="adult" id="adult" class="form-control">
                                                                @else
                                                                    <input type="text" name="adult" id="adult" value="{{$adult}}" class="form-control">
                                                                @endif

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="child">Child</label>
                                                                @if (empty($child))
                                                                    <input type="text" name="child" id="child" class="form-control">
                                                                @else
                                                                    <input type="text" name="child" id="child" value="{{$child}}" class="form-control">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Booking Name </label>
                                                                <input type="text" name="name" id="name" value="{{Auth::guard('customer')->user()->name}}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" name="email" value="{{Auth::guard('customer')->user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="mobile">Mobile</label>
                                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                                                                <small id="emailHelp" class="form-text text-muted">We'll never share your Mobile Number with anyone else.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="payment">Payment</label>
                                                                <input type="text" name="payment" class="form-control" id="payment" placeholder="Enter Payment Information">
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <img width="320px" style="width: 320px">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endguest
                                    @endforeach
                            </div>
                        </div>

                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->

@endsection
