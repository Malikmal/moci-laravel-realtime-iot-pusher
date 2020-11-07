/*Dashboard3 Init*/
 
"use strict"; 
$(document).ready(function() {
	if( $('#m_chart_3').length > 0 ){
		// Line Chart
		var data=[{ y: '100', a: 10, b: 20},
				  { y: '200', a: 30, b: 50},
				  { y: '300', a: 20, b: 40},
				  { y: '400', a: 50, b: 70},
				  { y: '500', a: 10, b: 40},
				  
				];
		var lineChart = Morris.Line({
				element: 'm_chart_3',
				data: data,
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['Total Income', 'Total Outcome'],
				gridLineColor: '#eaecec',
				resize: true,
				gridTextColor:'#5e7d8a',
				gridTextFamily:"Inherit",
				hideHover: 'auto',
				behaveLikeLine: true,
				smooth:false,
				pointSize: 0,
				lineWidth:2,
				pointFillColors:['#7a5449','#bca9a4'],
				pointStrokeColors: ['#7a5449','#bca9a4'],
				lineColors: ['#7a5449','#bca9a4'],
			});	
	}
});

var sparklineLogin = function() { 
	if( $('#sparkline_1').length > 0 ){
		$("#sparkline_1").sparkline([2,4,4,6,8,5,6,4,8,6,6,2 ], {
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
	if( $('#sparkline_2').length > 0 ){
		$("#sparkline_2").sparkline([7,4,5,6,8,5,6,4,9,6,6,2 ], {
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
	if( $('#sparkline_3').length > 0 ){
		$("#sparkline_3").sparkline([5,4,5,5,8,5,6,4,5,6,6,2 ], {
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
	if( $('#sparkline_4').length > 0 ){
		$("#sparkline_4").sparkline([20,4,4], {
			type: 'pie',
			width: '50',
			height: '50',
			resize: true,
			sliceColors: ['#7a5449', '#bca9a4', '#a58b84']
		});
	}
	if( $('#sparkline_5').length > 0 ){
		$("#sparkline_5").sparkline([10,30,20], {
			type: 'pie',
			width: '50',
			height: '50',
			resize: true,
			sliceColors: ['#7a5449', '#bca9a4', '#a58b84']
		});
	}
}

/*****E-Charts function start*****/
var echartsConfig = function() { 
	if( $('#e_chart_1').length > 0 ){
		var eChart_1 = echarts.init(document.getElementById('e_chart_1'));
		var option = {
			tooltip: {
				show: true,
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
			series: [
				{
					name:'',
					type:'pie',
					radius : '80%',
					color: ['#7a5449', '#bca9a4', '#a58b84','#d7cbc8'],
					data:[
						{value:435, name:''},
						{value:679, name:''},
						{value:848, name:''},
						{value:348, name:''},
					],
					label: {
						normal: {
							formatter: '{b}\n{d}%'
						},
				  
					}
				}
			]
		};
		eChart_1.setOption(option);
		eChart_1.resize();
	}
	if( $('#e_chart_6').length > 0 ){
		var eChart_6 = echarts.init(document.getElementById('e_chart_6'));
		var dataStyle = {
			normal: {
				label: {
					show: false
				},
				labelLine: {
					show: false
				},
				shadowBlur: 40,
				borderWidth: 10,
				shadowColor: 'rgba(0, 0, 0, 0)' //边框阴影
			}
		};
		var placeHolderStyle = {
			normal: {
				color: '#d6d9da',
				label: {
					show: false
				},
				labelLine: {
					show: false
				}
			},
			emphasis: {
				color: '#d6d9da'
			}
		};
		var option5 = {
			backgroundColor: '#fff',
			title: {
				text: '',
				x: 'center',
				y: 'center',
				textStyle: {
					color: '#324148',
					fontFamily: '"Roboto", sans-serif',
					fontSize: 12
				}	
			},
			tooltip: {
				show: true,
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
			series: [{
					name: 'Line 1',
					type: 'pie',
					clockWise: false,
					radius: ['60%', '65%'],
					center:['50%','50%'],
					itemStyle: dataStyle,
					hoverAnimation: false,
					startAngle: 90,
					label:{
						borderRadius:'10',
					},
					data: [{
							value: 30,
							name: 'b',
							itemStyle: {
								normal: {
									color: '#7a5449'
								}
							}
						},
						{
							value: 70,
							name: '',
							tooltip: {
								show: false
							},
							itemStyle: placeHolderStyle
						},
					]
				},
				{
					name: 'Line 2',
					type: 'pie',
					clockWise: false,
					radius: ['70%', '75%'],
					center:['50%','50%'],
					itemStyle: dataStyle,
					hoverAnimation: false,
					startAngle: 90,
					data: [{
							value: 40,
							name: 'a',
							itemStyle: {
								normal: {
									color: '#bca9a4'
								}
							}
						},
						{
							value: 60,
							name: '',
							tooltip: {
								show: false
							},
							itemStyle: placeHolderStyle
						},
					]
				},
				{
					name: 'Line 3',
					type: 'pie',
					clockWise: false,
					radius: ['80%', '85%'],
					center:['50%','50%'],
					itemStyle: dataStyle,
					hoverAnimation: false,
					startAngle: 90,
					data: [{
							value: 56.7,
							name: 'a',
							itemStyle: {
								normal: {
									color: '#a58b84'
								}
							}
						},
						{
							value: 43.3,
							name: '',
							tooltip: {
								show: false
							},
							itemStyle: placeHolderStyle
						},
					]
				},
			]
		};
		eChart_6.setOption(option5);
		eChart_6.resize();
	}
}
/*****E-Charts function end*****/
$('#dash-tab a').on('click', function (e) {
	clearTimeout(echartResize);
	echartResize = setTimeout(echartsConfig, 200);
})

/*****Resize function start*****/
var sparkResize,echartResize;
$(window).on("resize", function () {
	/*Sparkline-Chart Resize*/
	clearTimeout(sparkResize);
	sparkResize = setTimeout(sparklineLogin, 200);
	
	/*E-Chart Resize*/
	clearTimeout(echartResize);
	echartResize = setTimeout(echartsConfig, 200);
}).resize(); 
/*****Resize function end*****/

/*****Function Call start*****/
echartsConfig();
sparklineLogin();
/*****Function Call end*****/