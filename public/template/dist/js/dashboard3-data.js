/*Dashboard3 Init*/
 
"use strict"; 
$(document).ready(function() {
	if( $('.peity-line').length > 0 ){
		/*line*/
		$('.peity-line').each(function() {
			$(this).peity("line", $(this).data());
		});
	}
	if( $('#pie_chart_1').length > 0 ){
		$('#pie_chart_1').easyPieChart({
			barColor : '#7a5449',
			lineWidth: 3,
			animate: 3000,
			size:	50,
			lineCap: 'square',
			scaleColor: '#f5f5f6',
			trackColor: '#f5f5f6',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
	}
});

var sparklineLogin = function() { 
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
	if( $('#e_chart_11').length > 0 ){
		var eChart_11 = echarts.init(document.getElementById('e_chart_11'));
		var option10= {
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
			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			color: ['#7a5449', '#bca9a4'],		
			legend: {
				show : false,
				data:['Latest transaction price', 'Order'],
				x : 'left',
				y : 'bottom'
			},
			toolbox: {
				show: false,
				feature: {
					dataView: {readOnly: false},
					restore: {},
					saveAsImage: {}
				}
			},
			dataZoom: {
				show: false,
				start: 0,
				end: 100
			},
			xAxis: [
				{
					type: 'category',
					axisLine: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					},
					boundaryGap: true,
					data: (function (){
						var now = new Date();
						var res = [];
						var len = 10;
						while (len--) {
							res.unshift(now.toLocaleTimeString().replace(/^\D*/,''));
							now = new Date(now - 2000);
						}
						return res;
					})()
				},
				{
					type: 'category',
					axisLine: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#5e7d8a'
						}
					},
					boundaryGap: true,
					data: (function (){
						var res = [];
						var len = 10;
						while (len--) {
							res.push(len + 1);
						}
						return res;
					})()
				}
			],
			yAxis: [
				{
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
					},
					type: 'value',
					scale: true,
					name: '',
					max: 30,
					min: 0,
					boundaryGap: [0.2, 0.2]
				},
				{
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
					},
					type: 'value',
					scale: false,
					name: '',
					max: 1200,
					min: 0,
					boundaryGap: [0.2, 0.2]
				}
			],
			series: [
				{
					name:'Order',
					type:'bar',
					barMaxWidth: 30,
					xAxisIndex: 1,
					yAxisIndex: 1,
					data:(function (){
						var res = [];
						var len = 10;
						while (len--) {
							res.push(Math.round(Math.random() * 1000));
						}
						return res;
					})()
				},
				{
					name:'Latest transaction price',
					type:'line',
					data:(function (){
						var res = [];
						var len = 0;
						while (len < 10) {
							res.push((Math.random()*10 + 5).toFixed(1) - 0);
							len++;
						}
						return res;
					})()
				}
			],
			textStyle: {
				fontStyle: 'normal',
				fontWeight: 'normal',
			},
			
		};
		var app = [];
		app.count = 11;
		setInterval(function (){
			var axisData = (new Date()).toLocaleTimeString().replace(/^\D*/,'');
			var data0 = option10.series[0].data;
			var data1 = option10.series[1].data;
			data0.shift();
			data0.push(Math.round(Math.random() * 1000));
			data1.shift();
			data1.push((Math.random() * 10 + 5).toFixed(1) - 0);

			option10.xAxis[0].data.shift();
			option10.xAxis[0].data.push(axisData);
			option10.xAxis[1].data.shift();
			option10.xAxis[1].data.push(app.count++);
			eChart_11.setOption(option10);
		}, 2100);
		eChart_11.setOption(option10);
		eChart_11.resize();
	}
	if( $('#e_chart_12').length > 0 ){
		var eChart_12 = echarts.init(document.getElementById('e_chart_12'));
		var option11 = {
			color: ['#7a5449'],
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
					fontStyle: 'normal',
					fontWeight: 'normal',
					fontFamily: 'inherit',
					fontSize: 12
				}	
			},
			
			xAxis: [{
				type: 'category',
				data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun','Mon', 'Tue', 'Wed', 'Thu'],
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
			}],
			yAxis: {
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
			},
			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			series: [{
				data: [20, 100, 150, 90, 170, 210, 130,20, 100, 150, 90],
				type: 'bar',
				barMaxWidth: 30,
				itemStyle: {
					normal: {
						barBorderRadius: [2, 2, 0, 0] ,
					}
				},
				label: {
					normal: {
						show: true,
						position: 'inside'
					}
				},
			}]
		};
		eChart_12.setOption(option11);
		eChart_12.resize();
	}
	if( $('#e_chart_13').length > 0 ){
		var eChart_13 = echarts.init(document.getElementById('e_chart_13'));
		var option12 = {
			color: ['#7a5449'],
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
			
			xAxis: [{
				type: 'category',
				data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun','Mon', 'Tue', 'Wed', 'Thu'],
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
			}],
			yAxis: {
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
			},
			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			series: [{
				data: [100, 110, 50, 90, 70, 110, 130,100, 110, 50, 90],
				type: 'bar',
				barMaxWidth: 30,
				itemStyle: {
					normal: {
						barBorderRadius: [2, 2, 0, 0] ,
					}
				},
				label: {
					normal: {
						show: true,
						position: 'inside'
					}
				},
			}]
		};
		eChart_13.setOption(option12);
		eChart_13.resize();
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