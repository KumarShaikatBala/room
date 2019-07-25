@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>
    </div>
    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach($dinning as $data)
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
@foreach($dinning as $content)
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(/image/dinning/{!!$content->img!!});"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Dinning & Restaurant</h2>
            </div>
            <div>
                <p style="text-align: justify">{!!$content->contents!!}</p>
            </div>
        </div>
    </section>
@endforeach
    @endsection
