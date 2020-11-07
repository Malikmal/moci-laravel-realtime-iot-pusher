@extends('layouts.layout')

@section('content')

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        {{-- <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Add a new Device</h4>
        </div> --}}
        <!-- /Title -->

        <!-- Row -->
        <div class="row mt-10">
            <div class="col-xl-12 ">

                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Add a new Device</h5>
                    <p class="mb-25">Have a new device but didn't showed in this website. So let's add in here</p>
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{route('device.update', $device->id)}} ", method="POST">
                                {{method_field('PUT')}}
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control" value="{{$device->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="place" class="col-sm-2 col-form-label">Place</label>
                                    <div class="col-sm-10">
                                        <input name="place" type="text" class="form-control" value="{{$device->place}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control mt-15" rows="3"   required>{{$device->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="coordinate" class="col-sm-2 col-form-label">Coordinate</label>
                                    <div class="col-sm-10">
                                        <input name="coordinate" type="text" class="form-control"  value="{{$device->coordinate}}">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <fieldset class="form-group mb-15">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2 pt-0">Radios</label>
                                        <div class="col-sm-10">
                                            <div class="custom-control custom-radio mb-5">
                                                <input id="option_1" name="optionHorizontal" class="custom-control-input" checked="" type="radio">
                                                <label class="custom-control-label" for="option_1">Option 1</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-5">
                                                <input id="option_2" name="optionHorizontal" class="custom-control-input" type="radio">
                                                <label class="custom-control-label" for="option_2">Option 2</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="option_3" name="optionHorizontal" class="custom-control-input" type="radio">
                                                <label class="custom-control-label" for="option_3">Option 3</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 pt-0">Checkbox</label>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-checkbox mb-15">
                                            <input class="custom-control-input" id="chkbox_horizontal" type="checkbox" checked>
                                            <label class="custom-control-label" for="chkbox_horizontal">Checkbox</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row mb-0">
                                    <div class="col sm 2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->

    <!-- Footer -->
    <div class="hk-footer-wrap container">
        <footer class="footer">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> © 2019</p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <p class="d-inline-block">Follow us</p>
                    <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                    <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                    <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                </div>
            </div>
        </footer>
    </div>
    <!-- /Footer -->
@endsection
