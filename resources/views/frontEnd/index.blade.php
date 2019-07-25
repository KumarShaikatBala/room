@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('frontEnd/images/bg_1.jpg');background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A new Place</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section justify-content-end ftco-search">
        <div class="container-wrap ml-auto">
            <div class="row no-gutters">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">
                            Booking Now</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content p-4 px-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                            <form action="{{ route('search')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Check In</label>
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-map-marker"></span></div>
                                                <input type="text" name="check_in" class="form-control checkin_date dateDisable" placeholder="Check In" data-provide="datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Check Out</label>
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-map-marker"></span></div>
                                                <input type="text" name="check_out" class="form-control checkout_date dateDisable" placeholder="Check Out" data-provide="datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Room</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="room" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Adult</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="adult" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Child</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="child" id="" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md align-self-end">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input type="submit" value="Search" class="form-control btn btn-primary">
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
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($rooms as $room)
                            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                                <div class="destination">
                                    @foreach($room->img_single as $img)
                                        <a href="{{ route('frontend-room_details',['id'=>$room->id])}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('/image/room/{{$img->image}}');">
                                            <div class="icon d-flex justify-content-center align-items-center">
                                                <span class="icon-link"></span>
                                            </div>
                                        </a>
                                    @endforeach
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="{{ route('frontend-room_details',['id'=>$room->id])}}">{{$room->type}}</a></h3>
                                                {{--  <p class="rate">
                                                      <i class="icon-star"></i>
                                                      <i class="icon-star"></i>
                                                      <i class="icon-star"></i>
                                                      <i class="icon-star"></i>
                                                      <i class="icon-star-o"></i>
                                                      <span>8 Rating</span>
                                                  </p>--}}
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">${{$room->price}}<br><small>/night</small></span>
                                            </div>
                                        </div>
                                        <p style="text-align: justify;overflow: hidden">{!! \Illuminate\Support\Str::words($room->contents, 10,'....') !!}</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="icon-hotel"></i> Total:{{$room->total}}</span>
                                            &nbsp;
                                            <span><i class="icon-home"></i> Available:{{$room->available}}</span>
                                            @php
                                                $available=$room->available;
                                            @endphp
                                            @if ($available==0)
                                                <span class="ml-auto">Not Available</span>
                                            @else
                                                @guest('customer')
                                                    <span class="ml-auto"><a href="#login" data-toggle="modal" data-target="#login">Book Now</a></span>
                                                @else
                                                    <span class="ml-auto"><a href="#booking{{$room->id}}" data-toggle="modal" data-target="#booking{{$room->id}}">Book Now</a></span>
                                                @endguest
                                            @endif
                                        </p>
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
                                                    <form action="{{route('user-login-action2')}}" method="post">
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
                                <div class="modal fade" id="booking{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="booking{{$room->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Booking Form For {{$room->type}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('booking_store')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="name" class="form-control" id="val{{$room->id}}" value="{{$room->price}}">
                                                    <input type="hidden" name="room_id" value="{{$room->id}}" class="form-control">
                                                    <div class="form-group">
                                                        <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}" class="form-control">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="check_in">Check In >>> &nbsp;&nbsp;>>> &nbsp;&nbsp;>>></label>
                                                                @if (empty($check_in))
                                                                    <input type="text" name="check_in" id="check_in{{$room->id}}" value="" class="form-control checkin_date dateDisable" data-provide="datepicker">
                                                                @else
                                                                    <input type="text" name="check_in" id="check_in{{$room->id}}" value="{{$check_in}}" class="form-control checkin_date dateDisable" data-provide="datepicker">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Room  &  &nbsp;&nbsp;Price:<b class="booking{{$room->id}}" style="display: inline-block">{{$room->price}}</b></label>
                                                                @if (empty($room_number))
                                                                    <select name="room" id="booking{{$room->id}}" class="form-control">
                                                                        @for ($i = 1;$i<=$available;$i++)
                                                                            <option value="{{$i}}">{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                @else
                                                                    <select name="room" id="booking{{$room->id}}" class="form-control">

                                                                        @for ($j = 1;$j<=$available;$j++)
                                                                            <option value="{{$j}}" @if ($room_number==$j)
                                                                            selected
                                                                            @else
                                                                                @endif>{{$j}}</option>
                                                                        @endfor

                                                                    </select>

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
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" name="email" value="{{Auth::guard('customer')->user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="check_out">Check Out >>> &nbsp;&nbsp;>>> Total </label> <b class="date{{$room->id}}"></b> Days
                                                                @if (empty($check_out))
                                                                    <input type="text" name="check_out" id="check_out{{$room->id}}" class="form-control checkout_date dateDisable" data-provide="datepicker">
                                                                @else
                                                                    <input type="text" name="check_out" id="check_out{{$room->id}}" value="{{$check_out}}" class="form-control checkout_date dateDisable" data-provide="datepicker">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                {{--  <label for="payment">Days</label>--}}
                                                                <input type="hidden"  class="form-control date{{$room->id}}" value="" readonly>
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
                                                                <label for="name">Booking Name </label>
                                                                <input type="text" name="name" id="name" value="{{Auth::guard('customer')->user()->name}}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mobile">Mobile</label>
                                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                                                                <small id="emailHelp" class="form-text text-muted">We'll never share your Mobile Number with anyone else.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="payment">Payment</label>
                                                                <input type="text" name="payment" class="form-control final{{$room->id}}" value="{{$room->price}}" id="payment" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var date;
                                                        $('#check_in{{$room->id}},#check_out{{$room->id}}').change(function () {
                                                            var value1=($("#check_in{{$room->id}}").val());
                                                            var value2=($("#check_out{{$room->id}}").val());
                                                            const date1 = new Date(value1);
                                                            const date2 = new Date(value2);
                                                            const diffTime = Math.abs(date2.getTime() - date1.getTime());
                                                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                                            date= diffDays;
                                                            $('.date{{$room->id}}').val(date);
                                                            $('.date{{$room->id}}').text(date);

                                                        });
                                                        $(document).ready(function(){
                                                            var value1=($("#check_in{{$room->id}}").val());
                                                            var value2=($("#check_out{{$room->id}}").val());
                                                            const date3 = new Date(value1);
                                                            const date4 = new Date(value2);
                                                            const diffTime1 = Math.abs(date4.getTime() - date3.getTime());
                                                            const diffDays2 = Math.ceil(diffTime1 / (1000 * 60 * 60 * 24));

                                                            date= diffDays2;

                                                            $('.date{{$room->id}}').val(date);
                                                            $('.date{{$room->id}}').text(date);
                                                            var number = $('#booking{{$room->id}}').find(":selected").val();
                                                            var price = $('#val{{$room->id}}').val();
                                                            if (date==0) {
                                                                date=1;
                                                            }
                                                            var result = number * price *date;
                                                            $('.booking{{$room->id}}').empty();
                                                            $('.booking{{$room->id}}').append(result);
                                                            $('.final{{$room->id}}').val(result);
                                                        });
                                                        $('#booking{{$room->id}}').change(function(){
                                                            var number = $('#booking{{$room->id}}').find(":selected").val();
                                                            var price = $('#val{{$room->id}}').val();
                                                            if (date==0) {
                                                                date=1;
                                                            }
                                                            var result = number * price *date;
                                                            $('.booking{{$room->id}}').empty();
                                                            $('.booking{{$room->id}}').append(result);
                                                            $('.final{{$room->id}}').val(result);
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
                            @endguest
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('frontEnd/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{$counter->counter1}}">0</strong>
                                    <span>{{$counter->counter1_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{$counter->counter2}}">0</strong>
                                    <span>{{$counter->counter2_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{$counter->counter3}}">0</strong>
                                    <span>{{$counter->counter3_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{$counter->counter4}}">0</strong>
                                    <span>{{$counter->counter4_name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url('/image/slider2/{{$testimonial->slider_image}}')">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">{!! $testimonial->description !!}</p>
                                    <p class="name">{{$testimonial->heading_1}}</p>
                                    <span class="position">{{$testimonial->heading_2}}</span>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var dateDisable = new Date();
        dateDisable.setDate(dateDisable.getDate());

        $('.dateDisable').datepicker({
            startDate: dateDisable
        });

    </script>
    @endsection
