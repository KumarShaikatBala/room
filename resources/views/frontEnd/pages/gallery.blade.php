@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach($galleries as $gallery)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="#" class="block-20" style="background-image: url('/image/gallery/{{$gallery->gallery_image}}');">
                        </a>
                        <div class="text">
                            <span class="tag">{{$gallery->tittle}}</span>
                            <h3 class="heading mt-3"><a href="#">{{$gallery->description}}</a></h3>
                            <div class="meta mb-3">
                                <div>{{$gallery->created_at}}</div>
                                {{--<div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>


@endsection
