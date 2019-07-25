@extends('admin.admin_master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/summernote/summernote.css')}}" type="text/css">
@endsection
@section('content')
    <div class="bst-content-wrapper">
        <div class="bst-content">
            <div class="form-validation-style">
                <div class="bst-block">
                    <div class="bst-block-title mrgn-b-lg">
                        <h3>Room Information</h3>
                    </div>
                    <div class="bst-block-content">
                        <form class="form" action="{{ route('room_store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">type<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    @if($errors->has('category_id'))
                                        <span class="alert-danger">
                            {{ $errors->first('category_id') }}
                        </span>
                                    @endif
                                    <select class="form-control" name="category_id" required="required">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">type<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="type" class="form-control" />
                                </div>
                            </div>
                            <link rel="stylesheet" href="{{asset('admin/assets/plugin/summernote/summernote.css')}}" type="text/css">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label>Description</label>
                                    <textarea  id="summernote" class="summernote"  name="contents" placeholder="Input your Message"></textarea>
                                    @if($errors->has('contents'))
                                        <span class="alert-danger">
                            {{ $errors->first('contents') }}
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label>Facility</label>
                                    <textarea  id="summernote" class="summernote"  name="facility" placeholder="Input your Message"></textarea>
                                    @if($errors->has('facility'))
                                        <span class="alert-danger">
                            {{ $errors->first('facility') }}
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Toatal Room<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="number" name="total" class="form-control" id="total"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Available Room<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="number" name="available" class="form-control" id="available"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">price Room<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="number" name="price" class="form-control" id="price"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Total Room price<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="total_price" class="form-control" id="total_price" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-12">Available Room price<span class="required"> * </span> </label>
                                <div class="col-md-6 col-sm-8 col-12">
                                    <input type="text" name="available_price" class="form-control" id="available_price" readonly/>
                                </div>
                            </div>
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fa fa-floppy-o fa-lg"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/assets/plugin/jquery/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script>
   $('#total,#price,#available').ready(function () {
   $('#total,#price,#available').keyup(function () {
            var total=($("#total").val());
            var available=($("#available").val());
            var price=($("#price").val());
            var totalPrice=Number(total)* Number(price);
            var availablePrice=Number(available)* Number(price);
       $('#total_price').val(totalPrice);
       $('#available_price').val(availablePrice);

                    });
        });


    </script>
    <script src="{{asset('admin/assets/plugin/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/tether/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/scrollspy/scrollspy.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countUp/countUp.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/summernote/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/plugin/matchmedia/matchMedia.addListener.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/features.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/element.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/charts.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/main.js')}}" type="text/javascript"></script>
@endsection


