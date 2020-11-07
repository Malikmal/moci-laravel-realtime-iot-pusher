@extends('layouts.layout')

@section('content')

<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
			<h2 class="hk-pg-title font-weight-600 mb-10">Humidity Analytics</h2>
			{{-- <p>Wanna see more data sensor? <a href="#">Click here.</a></p> --}}
		</div>
		<div class="d-flex w-250p">
			{{-- <select class="form-control custom-select custom-select-sm mr-15">
				<option selected="">Latest Products</option>
				<option value="1">CRM</option>
				<option value="2">Projects</option>
				<option value="3">Statistics</option>
			</select> --}}
			<select class="form-control custom-select custom-select-sm mr-15" onchange="location=this.value">
                @foreach ($device as $item)

                    <option
                        value="{{route('humidity', $item->id)}} "
                        @if ($item->id == $id)
                            selected
                        @endif
                    >{{$item->place}}</option>

                @endforeach
			</select>
			{{-- <select class="form-control custom-select custom-select-sm">
				<option selected="">December</option>
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="1">April</option>
				<option value="2">May</option>
				<option value="3">June</option>
				<option value="1">July</option>
				<option value="2">August</option>
				<option value="3">September</option>
				<option value="1">October</option>
				<option value="2">November</option>
				<option value="3">December</option>
			</select> --}}
		</div>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
				<div class="col-sm-12">
					<div class="card-group hk-dash-type-2">
						<div class="card card-sm">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-5">
									<div>
										<span class="d-block font-15 text-dark font-weight-500">Current Humidity</span>
									</div>
									<div>
										<span class="text-success font-14 font-weight-500" id="current_percentage">+10%</span>
									</div>
								</div>
								<div>
									<span class="d-block display-4 text-dark mb-5" id="current_humidity">34 %</span>
									<small class="d-block" id="current_count"> {{date('l, d-F-Y')}} </small>
								</div>
							</div>
						</div>

						<div class="card card-sm">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-5">
									<div>
										<span class="d-block font-15 text-dark font-weight-500">Morning before</span>
									</div>
									<div>
										{{-- <span class="text-success font-14 font-weight-500">+12.5%</span> --}}
									</div>
								</div>
								<div>
									<span class="d-block display-4 text-dark mb-5">{{$thisday['morning']->humidity ?? ''}} %</span>
									<small class="d-block">{{date('l, d F Y', strtotime($thisday['morning']->created_at ?? ''))}}</small>
								</div>
							</div>
						</div>

						<div class="card card-sm">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-5">
									<div>
										<span class="d-block font-15 text-dark font-weight-500">Afternoon before</span>
									</div>
									<div>
										{{-- <span class="text-warning font-14 font-weight-500">-2.8%</span> --}}
									</div>
								</div>
								<div>
									<span class="d-block display-4 text-dark mb-5">{{$thisday['afternoon']->humidity ?? ''}} %</span>
									<small class="d-block">{{date('l, d F Y', strtotime($thisday['afternoon']->created_at ?? ''))}}</small>
								</div>
							</div>
						</div>

						<div class="card card-sm">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-5">
									<div>
										<span class="d-block font-15 text-dark font-weight-500">Evening before</span>
									</div>
									<div>
										{{-- <span class="text-danger font-14 font-weight-500">-75%</span> --}}
									</div>
								</div>
								<div>
									<span class="d-block display-4 text-dark mb-5">{{$thisday['evening']->humidity ?? ''}} %</span>
									<small class="d-block">{{date('l, d F Y', strtotime($thisday['evening']->created_at ?? ''))}}</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hk-row">
				<div class="col-lg-6">
                    <div class="card">
                        <div class="card-header card-header-action">
                            <h6>Realtime Statistics</h6>
                            <div class="d-flex align-items-center card-action-wrap">
                                <div class="d-flex align-items-center card-action-wrap">
                                    <a href="#" class="inline-block refresh mr-15">
                                        <i class="ion ion-md-arrow-down"></i>
                                    </a>
                                    <a class="inline-block card-close" href="#" data-effect="fadeOut">
                                        <i class="ion ion-md-close"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="flot_line_chart_moving" class="" style="height:334px;"></div>
                        </div>
                    </div>
					{{-- <div class="card card-refresh">
						<div class="refresh-container">
							<div class="loader-pendulums"></div>
						</div>
						<div class="card-header card-header-action">
							<h6>Youtube Subscribers</h6>
							<div class="d-flex align-items-center card-action-wrap">
								<a href="#" class="inline-block refresh mr-15">
									<i class="ion ion-md-radio-button-off"></i>
								</a>
								<div class="inline-block dropdown">
									<a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-md-more"></i></a>
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
						<div class="card-body">
							<div class="hk-legend-wrap mb-20">
								<div class="hk-legend">
									<span class="d-10 bg-brown rounded-circle d-inline-block"></span><span>Desktop</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-4 rounded-circle d-inline-block"></span><span>Mobile</span>
								</div>
							</div>
							<div id="e_chart_3" class="echart" style="height: 240px;"></div>
						</div>
					</div> --}}
					{{-- <div class="card">
						<div class="card-header card-header-action">
							<h6>Daily Humidity</h6>
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
				</div>
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header card-header-action">
							<h6>Daily Humidity</h6>
							<div class="d-flex align-items-center card-action-wrap">
								<a href="#" class="inline-block refresh mr-15">
									<i class="ion ion-md-arrow-down"></i>
								</a>
								<a href="#" class="inline-block full-screen mr-15">
									<i class="ion ion-md-expand"></i>
								</a>
								<a class="inline-block card-close" href="#" data-effect="fadeOut">
									<i class="ion ion-md-close"></i>
								</a>
							</div>
						</div>
						<div class="card-body pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-sm table-hover mb-0">
										<thead>
											<tr>
												<th>Day</th>
												<th class="w-30">Avg</th>
												<th class="w-35">min</th>
												<th class="w-35">Max</th>
												<th>Graph</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($daily as $item)
                                                @if(!empty($item))
                                                <tr>
                                                    <td>{{ $item->day }} </td>
                                                    <td>
                                                        <div class="progress-wrap lb-side-left mnw-75p">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mnw-50p">{{round($item->humidity, 2)}} %</label>
                                                                {{-- <div class="progress progress-bar-rounded progress-bar-xs">
                                                                    <div class="progress-bar bg-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{round($item->humidityMin, 2)}} %</td>
                                                    <td>{{round($item->humidityMax, 2)}} %</td>
                                                    <td><div id="sparkline_{{$loop->iteration}}"></div></td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td> </td>
                                                    <td>
                                                        <div class="progress-wrap lb-side-left mnw-75p">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mnw-50p"> %</label>
                                                                {{-- <div class="progress progress-bar-rounded progress-bar-xs">
                                                                    <div class="progress-bar bg-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> %</td>
                                                    <td> %</td>
                                                    <td><div id="sparkline_{{$loop->iteration}}"></div></td>
                                                </tr>
                                                @endif
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="card">
						<div class="card-header card-header-action">
							<h6>Users by Gendar & Age</h6>
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
						<div class="card-body">
							<div id="e_chart_5" class="echart" style="height:250px;"></div>
							<div class="hk-legend-wrap mt-20">
								<div class="hk-legend">
									<span class="d-10 bg-primary rounded-circle d-inline-block"></span><span>18-24</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-2 rounded-circle d-inline-block"></span><span>25-34</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-3 rounded-circle d-inline-block"></span><span>35-44</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-4 rounded-circle d-inline-block"></span><span>45-54</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-5 rounded-circle d-inline-block"></span><span>55-64</span>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header card-header-action">
							<h6>Analytics Audience Matrics</h6>
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
						<div class="card-body">
							<div class="hk-legend-wrap mb-20">
								<div class="hk-legend">
									<span class="d-10 bg-brown rounded-circle d-inline-block"></span><span>Users</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-1 rounded-circle d-inline-block"></span><span>Sessions</span>
								</div>
								<div class="hk-legend">
									<span class="d-10 bg-brown-light-4 rounded-circle d-inline-block"></span><span>Pageviews</span>
								</div>
							</div>
							<div id="e_chart_6" class="echart" style="height:250px;"></div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->
@endsection

@push('style')

@endpush

@push('script')


	<!-- Vector Maps JavaScript -->
    <script src=" {{ asset('template/vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src=" {{ asset('template/vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src=" {{ asset('template/dist/js/vectormap-data.js') }}"></script>


	<!-- Pusher Socket JavaScript for realtime  -->
  	<script src="https://js.pusher.com/5.0/pusher.min.js"></script>


    <!-- Flot Charts JavaScript -->
    <script src="{{ asset('template/vendors/flot/excanvas.min.js')  }} "></script>
    <script src="{{ asset('template/vendors/flot/jquery.flot.js')  }} "></script>
    <script src="{{ asset('template/vendors/flot/jquery.flot.pie.js')  }} "></script>
    {{-- <script src="{{ asset('template/vendors/flot/jquery.flot.resize.js')  }} "></script> --}}
    <script src="{{ asset('template/vendors/flot/jquery.flot.time.js')  }} "></script>
    <script src="{{ asset('template/vendors/flot/jquery.flot.stack.js')  }} "></script>
    <script src="{{ asset('template/vendors/flot/jquery.flot.crosshair.js')  }} "></script>
    <script src="{{ asset('template/vendors/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js')  }} "></script>

    {{-- <script src=" {{ asset('template/dist/js/dashboard-data.js') }}"></script> --}}

	<script  type="text/javascript">
  //       setInterval(function() {
  //       // fill_line_chart_data = getRandomData();
  //       $.get('/sensorLast', function(suhu, success){
  //           // var fill_line_chart_data = {
  //               // data : suhu
  //           // }
  //           // console.log(fill_line_chart_data);
  //           // $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
  //           var current = suhu[0][1];
  //           var percentage = (current - suhu[1][1]) * 100 / suhu[1][1];
  //           var isPlus ;
  //           var percentageDiv = document.getElementById('current_percentage');
  //           if(percentage >= 0)
  //           {
  //               isPlus = '+';
  //               percentageDiv.className = "text-success font-14 font-weight-500";
  //           }else{
  //               isPlus = '';
  //               percentageDiv.className = "text-danger font-14 font-weight-500";
  //           }
  //           document.getElementById('current_humidity').innerHTML = current + "° C";
  //           percentageDiv.innerHTML = isPlus + percentage.toFixed(2)  + "%";
  //       });

  //       $.get('/getCount', function(jumlah, status){
	 //        var countdDiv = document.getElementById('current_count');
		// 	// var count = "{{DB::table('sensors')->count()}}";
	 //        countdDiv.innerHTML = jumlah + ' Data Collected Today';

  //       });
		// // $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
  //   }, /*40*/100000);
        var sensors  = [];

	// console.log(sensor);
	// var i = 0;
	@foreach($sensor as $item)
		// console.log({{$item->humidity}});
		sensors[{{ count($sensor) - $loop->iteration}} - 1] = [{{ count($sensor) - $loop->iteration}} - 1, {{$item->humidity}}]
	@endforeach

	// @for($i = count($sensor) - 1; $i >= 0 ; $i--)

	// 	sensors[$i] =  [{{$i}}, {{$sensor[$i]->humidity}}];

	// @endfor

	// this.sensors = this.sensors.reverse();
	//console.log(sensors);



	//plot the graph
	if( $('#flot_line_chart_moving').length > 0 ){
		/*Defining Option*/
		var fill_line_chartop = {
			series:{
				shadowSize: 0,
				lines: {
					fill: false
				},
			},
				grid: {
				color: "#fff",
				hoverable: true,
				borderWidth: 0,
				backgroundColor: 'transparent'
			},
			colors: ["#7a5449"],
			tooltip: true,
			tooltipOpts: {
				content: "Y: %y",
				defaultTheme: false
			},
			yaxis: {
				show: true,
				color: '#5e7d8a',
				tickColor: '#eaecec'
			},
			xaxis: {
				show: false
			}
		};

		/*Defining Data*/
		var fill_line_chart_data = {
			data: this.sensors,
		}

		/*Chart Plot*/
		$.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop);
	}
    </script>

	<script>

	var a;
    // Enable pusher logging - don't include this in production
    //Pusher.logToConsole = true;

    var pusher = new Pusher('80591f2e6f7d317e5392', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        if(data.id == {{$id}})
        {

            // console.log(data.id);
            // console.log(data.humidity);
            // console.log(data.humidity);
            // console.log(data.airPressure);
            // console.log(data.rain);

            //current temperature 	//and 		//parsing value of current temperature
            var current_humidity_id = document.getElementById('current_humidity');
            var last_temp = parseInt(current_humidity_id.textContent);
            current_humidity_id.innerHTML = data.humidity + "° C";

            //current percentage
            var percentage = (data.humidity - last_temp) * 100 / last_temp;
            var isPlus ;
            var percentageDiv = document.getElementById('current_percentage');
            if(percentage >= 0)
            {
                isPlus = '+';
                percentageDiv.className = "text-success font-14 font-weight-500";
            }else{
                isPlus = '';
                percentageDiv.className = "text-danger font-14 font-weight-500";
            }
            percentageDiv.innerHTML = isPlus + percentage.toFixed(2)  + "%";

            //update data graph
            this.sensors = this.fill_line_chart_data.data;
            // console.log(this.sensors);

            // this.sensors = this.sensors.slice(1);
            // this.sensors.push([this.sensors.length, parseInt(data.humidity)]);
            // for(var i = 0 ; i < sensors.length; ++i)
            // {
            // 	this.sensors[i] = [i, this.sensor[i]];
            // }
            // console.log(this.sensors);
            this.sensors.push([this.sensors.length, parseInt(data.humidity)]);
            var newSensors = [];
            for(var i = 0; i < this.sensors.length - 2 ; i++)
            {
                newSensors[i] = [i, this.sensors[i + 1][1] ];
            }
            this.sensors = newSensors;

            // console.log(this.sensors);
            // this.sensors = this.sensors.shift();
            // this.sensors.push([this.sensors.length, parseInt(data.humidity)]);
            // dataGraph.push(this.sensors.length, data.humidity);
            var fill_line_chart_data = {
                data : newSensors
            }
            this.fill_line_chart_data.data = this.fill_line_chart_data.data.slice(1);
            $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop);
        }
    });

    var sparklineLogin = function() {
        if( $('#sparkline_1').length > 0 ){
            var humidity  = [];
            <?php $i= 0; ?>
            @foreach($daily as $item)
                <?php $j= 0; ?>
                @foreach($item->collect as $item2)
                    <?php $j++; ?>
                    humidity[{{$j - 1}}] = {{round($item2->humidity, 2)}};
                    @if($j > 8)
                        @break
                    @endif
                @endforeach
                $("#sparkline_{{$i}}").sparkline(humidity, {
                    type: 'line',
                    width: '100',
                    height: '34',
                    resize: true,
                    lineWidth: '1',
                    lineColor: '#7a5449',
                    fillColor: '#f6f3f2',
                    spotColor:'#7a5449',
                    spotRadius:'0',
                    minSpotColor: '#7a5449',
                    maxSpotColor: '#7a5449',
                    highlightLineColor: 'rgba(0, 0, 0, 0)',
                    highlightSpotColor: '#7a5449'
                });
                <?php $i++; ?>

            @endforeach
        }
    }
    sparklineLogin();
    </script>
@endpush
