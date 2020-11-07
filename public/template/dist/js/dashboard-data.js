/*Dashboard3 Init*/



var data = [],
totalPoints = 300;

/*Getting Random Data*/
function getRandomData() {

    if (data.length > 0)
        data = data.slice(1);

    // Do a random walk

    while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y = prev + Math.random() * 10 - 5;

        if (y < 0) {
            y = 0;
        } else if (y > 100) {
            y = 100;
        }

        data.push(y);
    }

    // Zip the generated y values with the x values

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
    }

    return res;
}

/***Filled Line Chart***/
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
        data: getRandomData(),
    }

    /*Chart Plot*/
    $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop);

    /*Realtime Data*/
    // setInterval(function updateRandom() {
    //     // fill_line_chart_data = getRandomData();
    //     $.get('/sensorLast', function(suhu, success){
    //         var fill_line_chart_data = {
    //             data : suhu
    //         }
    //         // console.log(fill_line_chart_data);
    //         $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
    //     });


    //     // $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
    // }, /*40*/100);
    // console.log(fill_line_chart_data);
}




//realtime flot chart

// var data = [];
// var totalPoints = 100;
// var updateInterval = 1000;
// var now = new Date().getTime();

// function GetData() {
//     data.shift(); //to remove first item of array

//     while (data.length < totalPoints) {
//         var y = Math.random() * 100;
//         var temp = [now += updateInterval, y]; //data format [x, y]

//         data.push(temp);
//     }
// }

// var fill_line_chartop = {
//     series: {
//         lines: {
//             show: true,
//             lineWidth: 1.2,
//             fill: true
//         }
//     },
//     xaxis: {
//         mode: "time",
//         tickSize: [2, "second"],
//         tickFormatter: function (v, axis) {
//             var date = new Date(v);

//             if (date.getSeconds() % 20 == 0) {
//                 var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
//                 var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
//                 var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

//                 return hours + ":" + minutes + ":" + seconds;
//             } else {
//                 return "";
//             }
//         },
//         axisLabel: "Time",
//         axisLabelUseCanvas: true,
//         axisLabelFontSizePixels: 12,
//         axisLabelFontFamily: 'Verdana, Arial',
//         axisLabelPadding: 10
//     },
//     yaxis: {
//         min: 0,
//         max: 100,
//         tickFormatter: function (v, axis) {
//             if (v % 10 == 0) {
//                 return v + "%";
//             } else {
//                 return "";
//             }
//         },
//         axisLabel: "CPU loading",
//         axisLabelUseCanvas: true,
//         axisLabelFontSizePixels: 12,
//         axisLabelFontFamily: 'Verdana, Arial',
//         axisLabelPadding: 6
//     },
//     legend: {
//         labelBoxBorderColor: "#fff"
//     },

//     grid: {
//         backgroundColor: "#000000",
//         tickColor: "#008040"
//     }
// };

// $(document).ready(function () {
//     GetData();

//     dataset = [
//         { label: "CPU", data: data, color: "#00FF00" }
//     ];

//     $.plot($("#flot_line_chart_moving"), dataset, options);

//     function update() {
//         GetData();

//         $.plot($("#flot_line_chart_moving"), dataset, options)
//         setTimeout(update, updateInterval);
//     }

//     update();
// });

// // $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop);
// //end realtime flot chart

















// "use strict";
// var test1, test2;
// $(document).ready(function() {
// 	/*Toaster Alert*/
// 	// $.toast({
// 	// 	heading: 'Well done!',
// 	// 	text: '<p>You have successfully completed level 1.</p><button class="btn btn-primary btn-sm mt-10">Play again</button>',
// 	// 	position: 'top-right',
// 	// 	loaderBg:'#7a5449',
// 	// 	class: 'jq-toast-primary',
// 	// 	hideAfter: 3500,
// 	// 	stack: 6,
// 	// 	showHideTransition: 'fade'
//     // });
// });

// var totalPoints = 100;
// var data = [100];
// for(var i = 0; i<100; i++)
// {
//     data[i] = 0;
// }

// function isiData(data, data2)
// {
//     data = data2;
//     // for(var i = 0 ; i < data.length; i++)
//     // {
//     //     data[i] = data2[i];
//     // }
// };


// // function sensorLast(){
// //     // var out = parseInt(1);
// //     var out = [];
// // 	$.get('/sensorLast',function(data, status){
// //         // alert(data + " "  + status);
// //         // console.log(status);
// //         out = data;
// //     });

// //     // $.ajax({
// //     //     url: "/sensorLast",
// //     //     method : 'GET',
// //     //     data : {
// //     //         request: out,
// //     //         suhu : [],
// //     //     },
// //     //     success: function(suhu){

// //     //         // for(var i = 0; i<suhu.length; i++)
// //     //         // {
// //     //         //     // res[i] = data[i];
// //     //         //     // res1.push( [ i, suhu[i] ] );
// //     //         //     out = suhu[0];
// //     //         //     // console.log(suhu[0]ss);
// //     //         // }
// //     //         // console.log(suhu);
// //     //         // test1 = suhu;
// //     //         // test2 = parseInt(suhu);
// //     //         // return parseInt(suhu);
// // 	// 		// return suhu;
// // 	// 		// this.indexValue.data = parseInt(suhu);
// //     //         // out = parseInt(suhu)    ;
// //     //         // isiData(this.data.request, suhu)
// //     //         // console.log(suhu + " " + this.out + " " + parseInt(parseInt(out)+parseInt(suhu)));
// //     //         this.data.request = suhu;
// //     //         console.log(this.data.request);
// //     //     }
// //     // });

// //     // console.log(out);
// //     return parseInt(out);
// // }

// function getRandomData() {

//     if (data.length > 0)
//         data = data.slice(1);

//     // Do a random walk

//     while (data.length < totalPoints) {

//         var prev = data.length > 0 ? data[data.length - 1] : 50,
//             // y = prev + Math.random() * 10 - 5;

//     //     // y = "<?php route('sensorLast') ?>";
//         y = sensorLast();
//         // console.log(y);
//         if (y < 0) {
//             // y = 0;
//         } else if (y > 100) {
//             y = 100;
//         }
//         // y = sensorLast();

//         data.push(parseInt(y));
//     }

//     // Zip the generated y values with the x values

//     var res = [];
//     for (var i = 0; i < data.length; ++i) {
//         res.push([i, data[i]]);
//          // console.log(data[i]);
//     }


//     // console.log(res);
//     // test1 = res;

//     var res1  = [];
//     // var suhu = [];
//     $.ajax({
//         url: "/sensorLast",
//         method : 'GET',
//         success: function(suhu){
//             // res = suhu;
//             // return parseInt(suhu);
//             test1 = suhu;
//             for(var i = 0; i<suhu.length; i++)
//             {
//                 // res[i] = data[i];
//                 // res1.push([parseInt(suhu[i][0]), parseInt(suhu[i][1])]);
//                 // res1[i] = suhu[i];
//                 // console.log(suhu);

//                 // console.log(res1);
//             }

//             // console.log(data[0]);
//         }
//     });
//     test2 = res1;
//     // console.log(res1);
//     // test2 = res1;
//     return res1;
// }
// if( $('#flot_line_chart_moving').length > 0 ){
//     /*Defining Option*/
//     var fill_line_chartop = {
//         series:{
//             shadowSize: 0,
//             lines: {
//                 fill: false
//             },
//         },
//             grid: {
//             color: "#fff",
//             hoverable: true,
//             borderWidth: 0,
//             backgroundColor: 'transparent'
//         },
//         colors: ["#7a5449"],
//         tooltip: true,
//         tooltipOpts: {
//             content: "Y: %y",
//             defaultTheme: false
//         },
//         yaxis: {
//             show: true,
//             color: '#5e7d8a',
//             tickColor: '#eaecec'
//         },
//         xaxis: {
//             show: false
//         }
//     };


//     /*Defining Data*/
//     var fill_line_chart_data = {
//         data: getRandomData(),
//         // console.log(data);
//     }

//     /*Chart Plot*/
//     $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop);
//     // console.log(fill_line_chart_data);
//     /*Realtime Data*/
//     // setInterval(function updateRandom() {
//     // 	fill_line_chart_data = getRandomData();
//     // 	$.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
//     // }, 1000);
// }
// setInterval(function updateRandom() {
//     // $.get('/sensorLast', function(suhu,status){
//     //     fill_line_chart_data = {
//     //         data : suhu
//     //     }
//     //     $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
//     // })

//     fill_line_chart_data = getRandomData();
//     $.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
// }, 1000);


/*****E-Charts function start*****/
var echartsConfig = function() {
	if( $('#e_chart_3').length > 0 ){
		var eChart_3 = echarts.init(document.getElementById('e_chart_3'));
		var option3 = {
			timeline: {
				data: ['91', '92', '93', '94', '95', '96', '97', '98', '99', '91'],
				axisType: 'category',
				show: false,
				autoPlay: true,
				playInterval: 1000,
			},
			options: [{
				tooltip: {
					show: true,
					trigger: 'axis',
					backgroundColor: '#fff',
					borderRadius:6,
					padding:6,
					axisPointer:{
						lineStyle:{
							width:0,
						}
					},
					textStyle: {
						color: '#324148',
						fontFamily: '"Roboto", sans-serif',
						fontSize: 12
					}
				},
				calculable: true,
				grid: {
					top: '3%',
					left: '3%',
					right: '3%',
					bottom: '3%',
					containLabel: true
				},
				xAxis: [{
					'type': 'category',
					axisLabel: {
						textStyle: {
							color: '#324148',
							fontFamily: '"Roboto", sans-serif',
							fontSize: 12
						}
					},
					axisLine: {
						show:false
					},
					splitLine:{
						show:false
					},
					'data': [
						'x1', ' x2', 'x3', 'x4', 'x5', 'x6', 'x7', 'x8'
					]
				}],
				yAxis: [{
					type: 'value',
					axisLine: {
						show:false
					},
					axisTick: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					},
					splitLine: {
						lineStyle: {
							color: '#eaecec',
						}
					}
				}, {
					type: 'value',
					axisLine: {
						show:false
					},
					axisTick: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					},
					splitLine: {
						lineStyle: {
							color: '#eaecec',
						}
					}
				}],
				series: [{
					'name': 'tq',
					'yAxisIndex': 1,
					'type': 'line',
					'data': [5, 6, 8, 28, 8, 24, 11, 16],
					symbolSize: 6,
					itemStyle: {
						normal: {
							color: '#7a5449'
						}
					},
					areaStyle: {
						normal: {
							color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
								offset: 0,
								color: '#7a5449'
							}, {
								offset: 1,
								color: '#f6f3f2'
							}])
						}
					},
					label: {
						normal: {
							show: true,
							position: 'top',
							formatter: '{c}',
							color: '#5e7d8a',
							fontStyle: 'normal',
							fontWeight: 'normal',
							fontFamily: "inherit",
							fontSize: 12
						}
					},
				}]
			}, {
				series: [{
					'data': [45, 43, 64, 134, 188, 43, 109, 12]
				}]
			}, {
				series: [{
					'data': [110, 32, 111, 176, 73, 59, 181, 9]
				}]
			}, {
				series: [{
					'data': [94, 37, 64, 55, 56, 41, 70, 17]
				}]
			}, {
				series: [{
					'data': [5, 6, 5, 28, 8, 24, 11, 16]
				}]
			}, {
				series: [{
					'data': [45, 34, 64, 134, 188, 43, 109, 12]
				}]
			}, {
				series: [{
					'data': [5, 6, 34, 28, 8, 24, 11, 16]
				}]
			}, {
				series: [{
					'data': [94, 37, 64, 55, 56, 41, 70, 17]
				}]
			}, {
				series: [{
					'data': [45, 40, 64, 134, 188, 43, 109, 12]
				}]
			}, {
				series: [{
					'data': [5, 6, 10, 28, 8, 24, 11, 16]
				}]
			}, ]
		};
		eChart_3.setOption(option3);
		eChart_3.resize();
	}

	if( $('#e_chart_5').length > 0 ){
		var eChart_5 = echarts.init(document.getElementById('e_chart_5'));
		var option4 = {
			color: ['#7a5449', '#a58b84','#bca9a4','#d7cbc8','#f6f3f2'],
			tooltip: {
				show: true,
				trigger: 'axis',
				backgroundColor: '#fff',
				borderRadius:6,
				padding:6,
				axisPointer:{
					lineStyle:{
						width:0,
					}
				},
				textStyle: {
					color: '#324148',
					fontFamily: '"Roboto", sans-serif;',
					fontSize: 12
				}
			},

			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			xAxis : [
				{
					type : 'value',
					data : ['Female','Male'],
					axisLine: {
						show:false
					},
					axisTick: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					}
				}
			],
			yAxis : [
				{

					type : 'category',
					axisLine: {
						show:false
					},
					axisTick: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					},
					splitLine: {
						lineStyle: {
							color: '#eaecec',
						}
					}
				}
			],
			series : [
				{
					name:'1',
					type:'bar',
					barMaxWidth: 18,
					data:[320, 332],
					barGap:'70%',
				},
				{
					name:'2',
					type:'bar',
					barMaxWidth: 18,
					data:[120, 132],
					barGap:'70%',
				},
				{
					name:'3',
					type:'bar',
					barMaxWidth: 18,
					data:[220, 182],
					barGap:'70%',
				},
				{
					name:'4',
					type:'bar',
					barMaxWidth: 18,
					data:[150, 232],
					barGap:'70%',
				},
				{
					name:'5',
					type:'bar',
					barMaxWidth: 18,
					data:[170, 222],
					barGap:'70%',
				}
			]
		};

		eChart_5.setOption(option4);
		eChart_5.resize();
	}

	if( $('#e_chart_6').length > 0 ){
		var eChart_6 = echarts.init(document.getElementById('e_chart_6'));
		var option5 = {
			color: ['#d7cbc8'],
			tooltip: {
				show: true,
				trigger: 'axis',
				backgroundColor: '#fff',
				borderRadius:6,
				padding:6,
				axisPointer:{
					lineStyle:{
						width:0,
					}
				},
				textStyle: {
					color: '#324148',
					fontFamily: '"Roboto", sans-serif;',
					fontSize: 12
				}
			},

			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			xAxis : [
				{
					type : 'category',
					data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
					axisLine: {
						show:false
					},
					axisTick: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					}
				}
			],
			yAxis : [
				{
					type : 'value',
					axisLine: {
						show:false
					},
					axisTick: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					},
					splitLine: {
						lineStyle: {
							color: '#eaecec',
						}
					}
				}
			],

			series: [
				{
					data:[420, 332, 401, 334, 400, 330, 410],
					type: 'bar',
					barMaxWidth: 20,
				},
				{
					data: [120, 152, 251, 124, 250, 120, 110],
					type: 'line',
					symbolSize: 6,
					smooth: true,
					itemStyle: {
						color: '#7a5449',
					},
					lineStyle: {
						color: '#7a5449',
						width:2,
					}
				}
			]
		};
		eChart_6.setOption(option5);
		eChart_6.resize();
	}

}
/*****E-Charts function end*****/

var sparklineLogin = function() {
	if( $('#sparkline_1').length > 0 ){
		$("#sparkline_1").sparkline([2,4,4,6,8,5,6,4,8,6,6,2 ], {
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
	}
	if( $('#sparkline_2').length > 0 ){
		$("#sparkline_2").sparkline([2,7,7,5,8,5,4,4,3,4,6,1 ], {
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
	}
	if( $('#sparkline_3').length > 0 ){
		$("#sparkline_3").sparkline([9,3,3,2,8,6,4,3,3,2,6,1 ], {
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
	}
	if( $('#sparkline_4').length > 0 ){
		$("#sparkline_4").sparkline([5,3,3,2,1,6,2,3,5,2,2,1 ], {
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
	}
	if( $('#sparkline_5').length > 0 ){
		$("#sparkline_5").sparkline([5,3,3,2,1,6,2,3,5,2,2,1 ], {
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
	}
	if( $('#sparkline_6').length > 0 ){
		$("#sparkline_6").sparkline([5,3,3,2,1,6,2,3,5,2,2,1 ], {
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
	}
	if( $('#sparkline_7').length > 0 ){
		$("#sparkline_7").sparkline([5,3,3,2,1,6,2,3,5,2,2,1 ], {
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
	}
}
sparklineLogin();

/*****Resize function start*****/
var sparkResize,echartResize;
$(window).on("resize", function () {
	/*Sparkline Resize*/
	clearTimeout(sparkResize);
	sparkResize = setTimeout(sparklineLogin, 200);

	/*E-Chart Resize*/
	clearTimeout(echartResize);
	echartResize = setTimeout(echartsConfig, 200);
}).resize();
/*****Resize function end*****/

/*****Function Call start*****/
echartsConfig();
/*****Function Call end*****/
