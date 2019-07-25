@extends('frontEnd.master')
@section('content')
    <div class="hero-wrap" style="background-image: url('/frontEnd/images/bg_1.jpg');height:200px;">
        <div class="overlay"></div>
        @if(Session::has('msg'))
            <h5 id="msg"class="alert-danger">{{session::get('msg')}}</h5>
        @endif
        <script>
            setTimeout(function() {
                $('#msg').fadeOut('fast');
            }, 4000);
        </script>
    </div>
    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6>Name</h6>
                    <p>{{$name}}</p>
                    <hr>
                    <h6>Email</h6>
                    <p>{{$email}}</p>
                    <hr>
                    <h6>Mobile</h6>
                    <p>{{$mobile}}</p>
                    <hr>
                    <h6>Amount</h6>
                    <p>{{$amount}}</p>
                    @if(Session::has('msg'))
                        <h5 id="msg"class="alert-danger">{{session::get('msg')}}</h5>
                    @endif
                    <script>
                        setTimeout(function() {
                            $('#msg').fadeOut('fast');
                        }, 4000);
                    </script>
                </div>
             <div class="col-md-6">
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Stripe</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Cash</a>
                          </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                              <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                              <form accept-charset="UTF-8" action="{!!route('addmoney.stripe')!!}" class="require-validation"
                                    data-cc-on-file="false"
                                    data-stripe-publishable-key="pk_test_vNKWFNuLEe1CmRCNWL33dAAc"
                                    id="payment-form" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="amount" value="{{$amount}}">
                                  <input type="hidden" name="name" value="{{$name}}">
                                  <input type="hidden" name="name" value="{{$name}}">
                                  <input type="hidden" name="email" value="{{$email}}">
                                  <input type="hidden" name="mobile" value="{{$mobile}}">
                                  <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}">
                                  <input type="hidden" name="room_id" value="{{$room_id}}">
                                  <input type="hidden" name="room" value="{{$room}}">
                                  <input type="hidden" name="booking_id" value="{{$id}}">

                                  <div class='form-row'>
                                      <div class='col-md-12 form-group required'>
                                          <label class='control-label'>Name on Card</label> <input
                                              class='form-control' size='4' type='text'>
                                      </div>
                                  </div>
                                  <div class='form-row'>
                                      <div class='col-md-12 form-group card required'>
                                          <label class='control-label'>Card Number</label> <input
                                              autocomplete='off' class='form-control card-number' size='20'
                                              type='text'>
                                      </div>
                                  </div>
                                  <div class='form-row'>
                                      <div class='col-md-4 form-group cvc required'>
                                          <label class='control-label'>CVC</label> <input
                                              autocomplete='off' class='form-control card-cvc'
                                              placeholder='ex. 311' size='4' type='text'>
                                      </div>
                                      <div class='col-md-4 form-group expiration required'>
                                          <label class='control-label'>Expiration</label> <input
                                              class='form-control card-expiry-month' placeholder='MM' size='2'
                                              type='text'>
                                      </div>
                                      <div class='col-md-4 form-group expiration required'>
                                          <label class='control-label'>Year</label> <input
                                              class='form-control card-expiry-year' placeholder='YYYY' size='2'
                                              type='text'>
                                      </div>

                                  </div>
                                  <div class='form-row'>
                                      <div class='col-md-12'>
                                          <div class='form-control total btn btn-info'>
                                              Total: <span class='amount'><input type="hidden" name="amount" value="{{$amount}}"/>{{$amount}}</span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class='form-row'>
                                      <div class='col-md-12 form-group'>
                                          <button class='form-control btn btn-primary submit-button'
                                                  type='submit' style="margin-top: 10px; color:#fff;">Pay »</button>
                                      </div>
                                  </div>
                                  <div class='form-row'>
                                      <div class='col-md-12 error form-group hide'>
                                          <div class='alert-danger alert'>Please correct the errors and try
                                              again.</div>
                                      </div>
                                  </div>
                              </form>
                              @if ((Session::has('success-message')))
                                  <div class="alert alert-success col-md-12">{{
                      Session::get('success-message') }}</div>
                              @endif @if ((Session::has('fail-message')))
                                  <div class="alert alert-danger col-md-12">{{
                      Session::get('fail-message') }}</div>
                              @endif
                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                              <form action="{{route('cash')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="amount" value="{{$amount}}">
                                  <input type="hidden" name="name" value="{{$name}}">
                                  <input type="hidden" name="name" value="{{$name}}">
                                  <input type="hidden" name="email" value="{{$email}}">
                                  <input type="hidden" name="mobile" value="{{$mobile}}">
                                  <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}">
                                  <input type="hidden" name="room_id" value="{{$room_id}}">
                                  <input type="hidden" name="room" value="{{$room}}">
                                  <input type="hidden" name="booking_id" value="{{$id}}">
                                  <h5>Payment Will Be Cash</h5>
                                  <button type="submit" class="btn btn-success">Submit</button>
                              </form>
                          </div>
                      </div>
                  </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
            crossorigin="anonymous"></script>
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(e.target).closest('form'),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault(); // cancel on first error
                    }
                });
            });
        });
        $(function() {
            var $form = $("#payment-form");
            $form.on('submit', function(e) {
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        })
    </script>

@endsection
