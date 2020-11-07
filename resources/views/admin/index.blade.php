@extends('layouts.layout')

@section('content')

    <!-- Container -->
    <div class="container">

        {{-- <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Tables</h4>
        </div>
        <!-- /Title --> --}}

        <!-- Row -->
        <div class="row mt-10">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">All Devices</h5>
                    <p class="mb-40">All devices that showed in this website and that integrated with this website.</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Place</th>
                                            <th>Description</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                            {{-- <th>Start date</th> --}}
                                            {{-- <th>Salary</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($devices ?? '' as $device)

                                        <tr>
                                            <td>{{$device->id}}</td>
                                            <td>{{$device->name}}</td>
                                            <td>{{$device->place}}</td>
                                            <td>{{$device->description}}</td>
                                            {{-- <td>{{$device->coordinate}}</td> --}}
                                            <td>{{$device->created_at}}</td>
                                            <td>
                                                <form action="{{route('device.destroy', $device->id)}}" method="POST">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    @if($device->publish != null)
                                                        <?php $button = 'btn-primary'; ?>
                                                    @else
                                                        <?php $button = 'btn-secondary'; ?>
                                                    @endif
                                                    <a href="{{route('device.publish', $device->id)}} " class="btn {{$button}} btn-xs"><span class="glyphicon glyphicon-globe"></span></a>
                                                    <a href="{{route('device.edit', $device->id)}} " class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                                                    {{-- <a href="{{route('device.destroy', $device->id)}} " class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> --}}
                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>


                                            </td>
                                            {{-- <td>$320,800</td> --}}
                                        </tr>

                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
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

@push('style')

    <!-- Data Table CSS -->
    <link href="{{asset('template/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- Custom CSS -->
    <link href="{{ asset('template/dist/css/style.css')}}" rel="stylesheet" type="text/css">
@endpush

@push('script')
    <!-- Data Table JavaScript -->
    <script src="{{ asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-dt/js/dataTables.dataTables.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/jszip/dist/jszip.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/pdfmake/build/pdfmake.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/pdfmake/build/vfs_fonts.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')  }} "></script>
    <script src="{{ asset('template/dist/js/dataTables-data.js')  }} "></script>
@endpush
