<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Adventure</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">About Us</a></li>
                        <li><a href="#" class="py-2 d-block">Online enquiry</a></li>
                        <li><a href="#" class="py-2 d-block">Call Us</a></li>
                        <li><a href="#" class="py-2 d-block">General enquiries</a></li>
                        <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                        <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                        <li><a href="#" class="py-2 d-block">Refund policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Experience</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Beach</a></li>
                        <li><a href="#" class="py-2 d-block">Adventure</a></li>
                        <li><a href="#" class="py-2 d-block">Wildlife</a></li>
                        <li><a href="#" class="py-2 d-block">Honeymoon</a></li>
                        <li><a href="#" class="py-2 d-block">Nature</a></li>
                        <li><a href="#" class="py-2 d-block">Party</a></li>
                    </ul>
                </div>
            </div>
            @php
$contacts=\App\Contact::all();
            $copyright=\App\Copyright::all();
@endphp
            @foreach($contacts as $contact)
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{$contact->note}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{$contact->mobile}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"> </span><span class="text"> {{$contact->email_1}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
@foreach($copyright as $copy)
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> {!! $copy->content !!} made <i class="icon-heart" aria-hidden="true"></i> by <a href="http://amazingsoftbd.com/" target="_blank">Amazing Soft</a>
    @endforeach
            </div>
        </div>
    </div>
</footer>
