/*Dashboard3 Init*/
 
"use strict"; 
$(document).ready(function() {
	/*Toaster Alert*/
	$.toast({
		heading: 'Welcome Back!',
		text: '<p>You have successfully completed level 1.</p><button class="btn btn-primary btn-sm mt-10">Play again</button>',
		position: 'top-right',
		loaderBg:'#7a5449',
		class: 'jq-toast-primary',
		hideAfter: 3500, 
		stack: 6,
		showHideTransition: 'fade'
	});
	
	/*Owl Carousel*/
	$('#owl_demo_1').owlCarousel({
		items: 1,
		animateOut: 'fadeOut',
		loop: true,
		margin: 10,
		autoplay: true,
		mouseDrag: false,
		dots:false

	});
});

/*****E-Charts function start*****/
var echartsConfig = function() { 
	if( $('#e_chart_3').length > 0 ){
		var e_chart_3 = echarts.init(document.getElementById('e_chart_3'));
		var option3 = {
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
			xAxis: {
				type: 'category',
				boundaryGap: false,
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
			},
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
			series: [
				{
					data: [820, 1132, 901, 934, 1290, 830, 1120,820, 932, 1001, 934],
					type: 'line',
					symbolSize: 6,
					lineStyle: {
						color: '#7a5449',
						width:2,
					},
					itemStyle: {
						color: '#7a5449',
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
				}
			]
		};
		e_chart_3.setOption(option3);
		e_chart_3.resize();
	}

}
/*****E-Charts function end*****/

/*****Resize function start*****/
var echartResize;
$(window).on("resize", function () {
	/*E-Chart Resize*/
	clearTimeout(echartResize);
	echartResize = setTimeout(echartsConfig, 200);
}).resize(); 
/*****Resize function end*****/

/*****Function Call start*****/
echartsConfig();
/*****Function Call end*****/