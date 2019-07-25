@extends('frontEnd.master')
@section('content')

    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>

    </div>
    @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{ Session::get('success') }}
        </div>
    @endif


    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Contact Information</h2>
                </div>
                <div class="w-100"></div>

            </div>
            <div class="row block-9">
                <div class="col-md-6 order-md-last pr-md-5">
                    <form action="{{route('contactus.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" name="name">
                            @if($errors->has('name'))
                                <span class="alert-danger">
                            {{ $errors->first('name') }}
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email" name="email">
                            @if($errors->has('email'))
                                <span class="alert-danger">
                            {{ $errors->first('email') }}
                        </span>
                            @endif
                        </div>
                       {{-- <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>--}}
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            @if($errors->has('message'))
                                <span class="alert-danger">
                            {{ $errors->first('message') }}
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>
                @php
                    $contacts=\App\Contact::all()

                @endphp
@foreach($contacts as $contact)
                <div class="col-md-6">
                    <div class="col-md-12">
                        <p><span>Address:</span> {{$contact->note}}</p>
                    </div>
                    <div class="col-md-12">
                        <p><span>Phone:</span> <a href="tel://1234567920">{{$contact->mobile}}</a></p>
                    </div>
                    <div class="col-md-12">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{$contact->email_1}}</a></p>
                    </div>
                    <div class="col-md-12">
                        <p><span>Website</span> <a href="#">{{$contact->email_2}}</a></p>
                    </div>
                </div>
    @endforeach
            </div>
        </div>
    </section>

@endsection
