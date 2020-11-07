@extends('layouts.layout')
@section('content')

<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Weather Statistics</h2>
            <p>Monitoring weather integrated with the real sensor.<i class="ion ion-md-help-circle-outline ml-5" data-toggle="tooltip" data-placement="top" title="Choose the place of weather in right option."></i></p>
        </div>
        <div class="d-flex w-250p">
            <select class="form-control custom-select custom-select-sm mr-15" onchange="location=this.value">
                @foreach ($device as $item)

                    <option
                        value="{{route('dashboard', $item->id)}} "
                        @if ($item->id == $id)
                            selected
                        @endif
                    >{{$item->place}}</option>

                @endforeach
            </select>
           {{--  <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-secondary">Split dropdown</button>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
                <div class="col-lg-8">
                    <div class="card-group hk-dash-type-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <span class="d-block font-14 font-weight-500 text-dark">Temperature</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="display-5 font-weight-400 text-dark" id="current_temp">{{$sensorNow->temp}}° C</div>
                                    <div class="font-13 font-weight-500">
                                        <span id="current_percentage_temperature">-28.12%</span>
                                        <i class="ion ion-md-arrow-down text-danger ml-5"></i>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <div id="sparkline_1"></div>
                                    {{-- span.mouseoverregion --}}
                                    <span id="mouseoverregion_1"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card card-sm">
                            <div class="card-body">
                                <span class="d-block font-14 font-weight-500 text-dark">Humidity</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="display-5 font-weight-400 text-dark" id="current_humidity">{{$sensorNow->humidity}} %</div>
                                    <div class="font-13 font-weight-500">
                                        <span id="current_percentage_humidity">2.12%</span>
                                        <i class="ion ion-md-arrow-up text-success ml-5"></i>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <div id="sparkline_2"></div>
                                    <span id="mouseoverregion_2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card card-sm">
                            <div class="card-body">
                                <span class="d-block font-14 font-weight-500 text-dark">Air Pressure</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="display-5 font-weight-400 text-dark" id="current_airPressure">{{$sensorNow->airPressure}} Pa</div>
                                    <div class="font-13 font-weight-500">
                                        <span id="current_percentage_airPressure">39.15%</span>
                                        <i class="ion ion-md-arrow-up text-success ml-5"></i>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <div id="sparkline_3"></div>
                                    <span id="mouseoverregion_3"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hk-row">
                        <div class="col-lg-12">
                            <div class="card card-refresh">
                                <div class="refresh-container">
                                    <div class="loader-pendulums"></div>
                                </div>
                                <div class="card-header card-header-action">
                                    <h6>All Sensor Data </h6>
                                    <div class="d-flex align-items-center card-action-wrap">
                                        <a href="#" class="inline-block refresh mr-15">
                                            <i class="ion ion-md-radio-button-off"></i>
                                        </a>
                                        <a href="#" class="inline-block full-screen">
                                            <i class="ion ion-md-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="hk-legend-wrap mb-20">

                                        <div class="hk-legend">
                                            <span class="d-10 bg-brown-dark-5 rounded-circle d-inline-block"></span><span>Temperature</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-brown-dark-2 rounded-circle d-inline-block"></span><span>Humidity</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-brown-light-1 rounded-circle d-inline-block"></span><span>Air Pressure</span>
                                        </div>
                                        <div class="hk-legend">
                                            <span class="d-10 bg-brown-light-3 rounded-circle d-inline-block"></span><span>Rain</span>
                                        </div>
                                    </div>
                                    <div id="area_chart" class="echart" style="height: 194px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header card-header-action">
                            <h6>Rain Sensor</h6>
                            {{-- <div class="d-flex align-items-center card-action-wrap">
                                <div class="inline-block dropdown">
                                    <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="hk-legend-wrap mt-10">
                                <div class="hk-legend">
                                    @if($sensorNow->rain >= 50)
                                            <img id="rain_image" src="{{asset('template/dist/img/rain.png')}} " alt="">
                                    @else
                                             <img id="rain_image" src="{{asset('template/dist/img/unrain.png')}} " alt="">
                                    @endif
                                </div>
                            </div>
                            <div class=" hk-legend-wrap mt-10">
                                <div class="hk-legend text-center">
                                    <h4 id="rain_text">@if($sensorNow->rain >= 50) Raining @else sunny @endif</h4>
                                    <span>Data from Rain Sensor : <span id="current_rain">{{$sensorNow->rain}} %  </span></span>
                                </div>
                            </div>
                            {{-- <div id="e_chart_1" class="echart" style="height:190px;"></div>
                            <div class="hk-legend-wrap mt-10">
                                <div class="hk-legend">
                                    <span class="d-10 bg-brown-dark rounded-circle d-inline-block"></span><span>A-1</span>
                                </div>
                                <div class="hk-legend">
                                    <span class="d-10 bg-brown-light-3 rounded-circle d-inline-block"></span><span>B-2</span>
                                </div>
                                <div class="hk-legend">
                                    <span class="d-10 bg-brown-light-4 rounded-circle d-inline-block"></span><span>C-3</span>
                                </div>
                                <div class="hk-legend">
                                    <span class="d-10 bg-brown-light-2 rounded-circle d-inline-block"></span><span>D-4</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="card card-sm border-bottom-0">
                        <div class="card-header card-header-action">
                            <h6>Device Stats</h6>
                            <div class="d-flex align-items-center card-action-wrap">
                                <div class="inline-block dropdown">
                                    <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pa-0">
                            <div class="pa-15">
                                <div class="row">
                                    <div class="col-4">
                                        <span class="d-block text-capitalize">desktop</span>
                                        <span class="d-block text-dark font-weight-500 font-20">15%</span>
                                        <span class="d-block font-weight-600 font-13">201,434</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="d-block text-capitalize">mobile</span>
                                        <span class="d-block text-dark font-weight-500 font-20">34.5%</span>
                                        <span class="d-block font-weight-600 font-13">101,434</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="d-block text-capitalize">tablet</span>
                                        <span class="d-block text-dark font-weight-500 font-20">60.8%</span>
                                        <span class="d-block font-weight-600 font-13">101,434</span>
                                    </div>
                                </div>
                            </div>
                             <div class="progress-wrap">
                                <div class="progress rounded-bottom-left rounded-bottom-right">
                                    <div class="progress-bar bg-primary w-15" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-brown-light-2 w-35" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-brown-light-3 w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header card-header-action">
                    <h6>Daily Temperature</h6>
                    <div class="d-flex align-items-center card-action-wrap">
                        <a href="#" class="inline-block refresh mr-15">
                            <i class="ion ion-md-arrow-down"></i>
                        </a>
                        <a href="#" class="inline-block full-screen">
                            <i class="ion ion-md-expand"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body pa-0">
                    <div class="pa-20">
                        <div id="world_map_marker_1" style="height: 300px"></div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-25">Country</th>
                                        <th>Sessions</th>
                                        <th>Goals</th>
                                        <th>Goals Rate</th>
                                        <th>Bounce Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Canada</td>
                                        <td>55,555</td>
                                        <td>210</td>
                                        <td>2.46%</td>
                                        <td>0.26%</td>
                                    </tr>
                                    <tr>
                                        <td>India</td>
                                        <td>24,152</td>
                                        <td>135</td>
                                        <td>0.58%</td>
                                        <td>0.43%</td>
                                    </tr>
                                    <tr>
                                        <td>UK</td>
                                        <td>15,640</td>
                                        <td>324</td>
                                        <td>5.15%</td>
                                        <td>2.47%</td>
                                    </tr>
                                    <tr>
                                        <td>Botswana</td>
                                        <td>12,148</td>
                                        <td>854</td>
                                        <td>4.19%</td>
                                        <td>0.1%</td>
                                    </tr>
                                    <tr>
                                        <td>UAE</td>
                                        <td>11,258</td>
                                        <td>453</td>
                                        <td>8.15%</td>
                                        <td>0.14%</td>
                                    </tr>
                                    <tr>
                                        <td>Australia</td>
                                        <td>10,786</td>
                                        <td>376</td>
                                        <td>5.48%</td>
                                        <td>0.45%</td>
                                    </tr>
                                    <tr>
                                        <td>Phillipines</td>
                                        <td>9,485</td>
                                        <td>63</td>
                                        <td>3.51%</td>
                                        <td>0.9%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="card">
                <div class="card-body pa-0">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Chart</th>
                                        <th>last Year</th>
                                        <th>6 months</th>
                                        <th>1 month</th>
                                        <th>Day</th>
                                        <th>Sale</th>
                                        <th>Buy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img class="circle" src=" {{ asset('template/dist/img/logo5.jpg') }} " alt="icon"></td>
                                        <td>Fakebook</td>
                                        <td><span class="peity-line" data-width="90" data-peity='{ "fill": ["rgba(102,64,178,.05)"], "stroke":["#6640b2"]}' data-height="40">1,6,6,9,7,4,8,5,2,1</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 1,234</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 5,678</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 9,101</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 1,121</span> </td>
                                        <td>$3,141</td>
                                        <td>$5,161</td>
                                    </tr>
                                    <tr>
                                        <td><img class="circle" src=" {{ asset('template/dist/img/logo2.jpg') }} " alt="icon"></td>
                                        <td>Microhard</td>
                                        <td><span class="peity-line" data-width="90" data-peity='{ "fill": ["rgba(102,64,178,.05)"], "stroke":["#6640b2"]}' data-height="40">1,6,6,9,9,9,8,5,2,1</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 7,181</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 9,202</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 1,222</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 3,242</span> </td>
                                        <td>$5,262</td>
                                        <td>$7,282</td>
                                    </tr>
                                    <tr>
                                        <td><img class="circle" src=" {{ asset('template/dist/img/logo3.jpg') }} " alt="icon"></td>
                                        <td>Oesla Motors</td>
                                        <td><span class="peity-line" data-width="90" data-peity='{ "fill": ["rgba(102,64,178,.05"], "stroke":["#6640b2"]}' data-height="40">5,6,5,5,7,4,6,5,2,1</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 9,303</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 1,323</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 3,343</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 5,363</span> </td>
                                        <td>$7,383</td>
                                        <td>$9,404</td>
                                    </tr>
                                    <tr>
                                        <td><img class="circle" src=" {{ asset('template/dist/img/logo4.jpg') }} " alt="icon"></td>
                                        <td>NVISION</td>
                                        <td><span class="peity-line" data-width="90" data-peity='{ "fill": ["rgba(50,65,72,.05"], "stroke":["#6640b2"]}' data-height="40">3,4,4,6,4,4,7,5,2,1</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 1,424</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 3,444</span> </td>
                                        <td><span class="text-success"><i class="ion ion-md-arrow-up" aria-hidden="true"></i> $ 5,464</span> </td>
                                        <td><span class="text-danger"><i class="ion ion-md-arrow-down" aria-hidden="true"></i> $ 7,484</span> </td>
                                        <td>$9,505</td>
                                        <td>$1,525</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->

@endsection

@push('style')

	<!-- Morris Charts CSS -->
    <link href="{{ asset('template/vendors/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('script')

	<!-- Easy pie chart JS -->
    <script src="{{ asset('template/vendors/easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>


	<!-- EChartJS JavaScript -->
    <script src="{{ asset('template/vendors/echarts/dist/echarts-en.min.js') }}"></script>

	<!-- Morris Charts JavaScript -->
    <script src="{{ asset('template/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('template/vendors/morris.js/morris.min.js') }}"></script>

	<!-- Sparkline JavaScript -->
    <script src="{{ asset('template/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>


	<!-- Vector Maps JavaScript -->
    <script src=" {{ asset('template/vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src=" {{ asset('template/vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src=" {{ asset('template/dist/js/vectormap-data.js') }}"></script>


	<!-- Pusher Socket JavaScript for realtime  -->
  	<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

    <!-- Init JavaScript -->
	{{-- <script src="{{ asset('template/dist/js/dashboard5-data.js') }}"></script> --}}
    {{-- <script src=" {{ asset('template/dist/js/dashboard-data.js') }}"></script> --}}

	{{-- <script src="{{ asset('template/dist/js/dashboard2-data.js') }}"></script> --}}

    <script>
         var sensors;
        "use strict";
        $(document).ready(function() {
            if($('#area_chart').length > 0) {
                var data=[{
                    period: 'Son',
                    iphone: 10,
                    ipad: 80,
                    itouch: 20
                }, {
                    period: 'Mon',
                    iphone: 130,
                    ipad: 100,
                    itouch: 80
                }, {
                    period: 'Tue',
                    iphone: 80,
                    ipad: 30,
                    itouch: 70
                }, {
                    period: 'Wed',
                    iphone: 70,
                    ipad: 200,
                    itouch: 140
                }, {
                    period: 'Thu',
                    iphone: 180,
                    ipad: 50,
                    itouch: 140
                }, {
                    period: 'Fri',
                    iphone: 105,
                    ipad: 170,
                    itouch: 80
                },
                 {
                    period: 'Sat',
                    iphone: 250,
                    ipad: 150,
                    itouch: 200
                }];

            // var sensors = [];
            @foreach($daily as $item)
                data[{{$loop->iteration}} - 1] = {
                    period : '{{$item->day}}',
                    temperature : ({{round($item->temp, 2)}}),
                    humidity : ({{round($item->humidity, 2)}}),
                    airPressure :({{round($item->airPressure, 2)}}),
                    rain : ({{round($item->rain, 2)}})
                }
            @endforeach
            //console.log(data);
            // this.sensors = data; gk bisa

                var lineChart = Morris.Area({
                element: 'area_chart',
                data: data ,
                xkey: 'period',
                ykeys: ['temperature', 'humidity', 'airPressure', 'rain'],
                labels: ['Temperature', 'Humidity', 'Air pressure', 'rain'],
                pointSize: 2,
                lineWidth:2,
                fillOpacity: 0.1,
                pointStrokeColors:['#301811', '#633d32', '#8b6a61', '#bca9a4'],
                behaveLikeLine: true,
                grid: false,
                hideHover: 'auto',
                lineColors: ['#301811', '#633d32', '#8b6a61', '#bca9a4'],
                resize: true,
                redraw: true,
                smooth: true,
                gridTextColor:'#878787',
                gridTextFamily:"Poppins",
                parseTime: false
                });
            }
        });


        var temperature  = [];
                @foreach($delapanterakhir as $item)
                    temperature[{{$loop->iteration - 1}}] = {{round($item->temp, 2)}};
                @endforeach
        var humidity = [];
                @foreach($delapanterakhir as $item)
                    humidity[{{$loop->iteration - 1}}] = {{round($item->temp, 2)}};
                @endforeach
        var airPressure  = [];
                @foreach($delapanterakhir as $item)
                    airPressure[{{$loop->iteration - 1}}] = {{round($item->temp, 2)}};
                @endforeach

        var sparklineLogin = function() {
            if( $('#sparkline_1').length > 0 ){
                $("#sparkline_1").sparkline(temperature, {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    resize: true,
                    lineWidth: '1',
                    lineColor: '#7a5449',
                    fillColor: '#bca9a4',
                    spotColor:'7a5449',
                    spotRadius:'2',
                    minSpotColor: '#7a5449',
                    maxSpotColor: '#7a5449',
                    highlightLineColor: 'rgba(0, 0, 0, 0)',
                    highlightSpotColor: '#7a5449'
                });
            }
            $('#sparkline_1').bind('sparklineRegionChange', function(ev) {
                    var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields(),
                    value = region.y;
                    // console.log(region);
                    var i = 1;
                    if(region.y <10)
                        var time = "0" + 3*region.x + ":00";
                    else
                        var time = 3*region.x + ":00";

                    $('#mouseoverregion_1').text(time);
            }).bind('mouseleave', function() {
                $('#mouseoverregion_1').text('');
            });

            if( $('#sparkline_2').length > 0 ){
                $("#sparkline_2").sparkline(humidity, {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    resize: true,
                    lineWidth: '1',
                    lineColor: '#7a5449',
                    fillColor: '#bca9a4',
                    spotColor:'7a5449',
                    spotRadius:'2',
                    minSpotColor: '#7a5449',
                    maxSpotColor: '#7a5449',
                    highlightLineColor: 'rgba(0, 0, 0, 0)',
                    highlightSpotColor: '#7a5449'
                });
            }
            $('#sparkline_2').bind('sparklineRegionChange', function(ev) {
                    var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields(),
                    value = region.y;
                    // console.log(region);
                    var i = 1;
                    if(region.y <10)
                        var time = "0" + 3*region.x + ":00";
                    else
                        var time = 3*region.x + ":00";

                    $('#mouseoverregion_2').text(time);
            }).bind('mouseleave', function() {
                $('#mouseoverregion_2').text('');
            });

            if( $('#sparkline_3').length > 0 ){
                $("#sparkline_3").sparkline( airPressure, {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    resize: true,
                    lineWidth: '1',
                    lineColor: '#7a5449',
                    fillColor: '#bca9a4',
                    spotColor:'7a5449',
                    spotRadius:'2',
                    minSpotColor: '#7a5449',
                    maxSpotColor: '#7a5449',
                    highlightLineColor: 'rgba(0, 0, 0, 0)',
                    highlightSpotColor: '#7a5449'
                });
            }
        }
        $('#sparkline_3').bind('sparklineRegionChange', function(ev) {
                    var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields(),
                    value = region.y;
                    // console.log(region);
                    var i = 1;
                    if(region.y < 10)
                        var time = "0" + 3*region.x + ":00";
                    else
                        var time = 3*region.x + ":00";

                    $('#mouseoverregion_3').text(time);
            }).bind('mouseleave', function() {
                $('#mouseoverregion_3').text('');
            });


        sparklineLogin();


    </script>



    <script>
        // pusher
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('80591f2e6f7d317e5392', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            var current_temp_id = document.getElementById('current_temp');
            var last_temp = parseInt(current_temp_id.textContent);
            current_temp_id.innerHTML = data.temperature + "° C";

            var current_humidity_id = document.getElementById('current_humidity');
            var last_humidity = parseInt(current_humidity_id.textContent);
            current_humidity_id.innerHTML = data.humidity + " %";

            var current_airPressure_id = document.getElementById('current_airPressure');
            var last_airPressure = parseInt(current_airPressure_id.textContent);
            current_airPressure_id.innerHTML = data.airPressure + " mBar";

            var current_rain_id = document.getElementById('current_rain');
            var last_rain = parseInt(current_rain_id.textContent);
            current_rain_id.innerHTML = data.rain + " %";
            var rainImage = document.getElementById('rain_image');
            var rainText = document.getElementById('rain_text');
            if(data.rain >= 50)
            {
                // rainImage.
                rainImage.src = "{{asset('template/dist/img/rain.png')}}";
                rainText.innerHTML = "Rainning";
            }else{

                rainImage.src = "{{asset('template/dist/img/unrain.png')}}";
                rainText.innerHTML = "Sunny";
            }

            // percentage of temperature
            var percentage = (data.temperature - last_temp) * 100 / last_temp;
            var isPlus ;
            var percentageDiv = document.getElementById('current_percentage_temperature');
            if(percentage >= 0)
            {
                isPlus = '+';
                percentageDiv.className = "text-success font-14 font-weight-500";
            }else{
                isPlus = '';
                percentageDiv.className = "text-danger font-14 font-weight-500";
            }
            percentageDiv.innerHTML = isPlus + percentage.toFixed(2)  + "%";

            //percentage of humidity
            var percentage = (data.humidity - last_humidity) * 100 / last_humidity;
            var isPlus ;
            var percentageDiv = document.getElementById('current_percentage_humidity');
            if(percentage >= 0)
            {
                isPlus = '+';
                percentageDiv.className = "text-success font-14 font-weight-500";
            }else{
                isPlus = '';
                percentageDiv.className = "text-danger font-14 font-weight-500";
            }
            percentageDiv.innerHTML = isPlus + percentage.toFixed(2)  + "%";

            //percentage of airPressure
            var percentage = (data.airPressure - last_airPressure) * 100 / last_airPressure;
            var isPlus ;
            var percentageDiv = document.getElementById('current_percentage_airPressure');
            if(percentage >= 0)
            {
                isPlus = '+';
                percentageDiv.className = "text-success font-14 font-weight-500";
            }else{
                isPlus = '';
                percentageDiv.className = "text-danger font-14 font-weight-500";
            }
            percentageDiv.innerHTML = isPlus + percentage.toFixed(2)  + "%";


            // #rain_image

        });

    </script>
@endpush
