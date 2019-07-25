@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>

    </div>
    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach($meeting as $data)
                    @foreach($data->facilities as $facility)
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-resort"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">{{$facility->heading}}</h3>
                            <p>{!! $facility->facility !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </section>
@foreach($meeting as $data)
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(/image/meeting/{{$data->img}});"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Meeting & Events</h2>
            </div>
            <div>
                <p>{!! $data->contents !!}</p>
            </div>
        </div>
    </section>
@endforeach

@endsection
