@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>

    </div>



    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-yatch"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Special Activities</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-around"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Travel Arrangements</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-compass"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Private Guide</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-map-of-roads"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Location Manager</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($facility as $data)
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(/image/facility/{{$data->img}});"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Facilities</h2>
            </div>
            <div>
                <p style="text-align: justify">

                        {!! $data->contents !!}

                </p>
            </div>
        </div>
    </section>
    @endforeach

@endsection
