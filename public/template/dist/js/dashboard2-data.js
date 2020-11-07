/*Dashboard3 Init*/
 
"use strict"; 
$(document).ready(function() {
	/*Toaster Alert*/
	$.toast({
		heading: 'Oh snap!',
		text: '<p>Change a few things and try submitting again.</p>',
		position: 'bottom-right',
		loaderBg:'#7a5449',
		class: 'jq-toast-danger',
		hideAfter: 3500, 
		stack: 6,
		showHideTransition: 'fade'
	});
	
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
	if( $('#pie_chart_2').length > 0 ){
		$('#pie_chart_2').easyPieChart({
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
		var dataNew = [{
            period: 'Jan',
            iphone: 10,
            ipad: 60,
            itouch: 20
        }, 
		{
            period: 'Feb',
            iphone: 110,
            ipad: 100,
            itouch: 80
        },
		{
            period: 'March',
            iphone: 120,
            ipad: 100,
            itouch: 80
        },
		{
            period: 'April',
            iphone: 110,
            ipad: 100,
            itouch: 80
        },
		{
            period: 'May',
            iphone: 170,
            ipad: 100,
            itouch: 80
        },
		{
            period: 'June',
            iphone: 120,
            ipad: 150,
            itouch: 80
        },
		{
            period: 'July',
            iphone: 120,
            ipad: 150,
            itouch: 80
        },
		{
            period: 'Aug',
            iphone: 190,
            ipad: 120,
            itouch: 80
        },
		{
            period: 'Sep',
            iphone: 110,
            ipad: 120,
            itouch: 80
        },
		{
            period: 'Oct',
            iphone: 10,
            ipad: 170,
            itouch: 10
        },
		{
            period: 'Nov',
            iphone: 10,
            ipad: 470,
            itouch: 10
        },
		{
            period: 'Dec',
            iphone: 30,
            ipad: 170,
            itouch: 10
        }
		];
		
		var lineChart = Morris.Area({
        element: 'area_chart',
        data: data ,
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iphone', 'ipad', 'itouch'],
        pointSize: 2,
        lineWidth:2,
		fillOpacity: 0.1,
		pointStrokeColors:['#7a5449', '#d7cbc8', '#a58b84'],
		behaveLikeLine: true,
		grid: false,
		hideHover: 'auto',
		lineColors: ['#7a5449', '#d7cbc8', '#a58b84'],
		resize: true,
		redraw: true,
		smooth: true,
		gridTextColor:'#878787',
		gridTextFamily:"Poppins",
        parseTime: false
    });
	}
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
		setInterval(function updateRandom() {
			fill_line_chart_data = getRandomData();
			$.plot($("#flot_line_chart_moving"), [fill_line_chart_data], fill_line_chartop)
		}, 40);	
	}

	/***Line Chart***/
	if( $('.risk-switch').length > 0 )
		$('.risk-switch').toggles({
			drag: true, // allow dragging the toggle between positions
			click: true, // allow clicking on the toggle
			text: {
			on: '', // text for the ON position
			off: '' // and off
			},
			on: false, // is the toggle ON on init
			animate: 250, // animation time (ms)
			easing: 'swing', // animation transition easing function
			checkbox: null, // the checkbox to toggle (for use in forms)
			clicker: null, // element that can be clicked on to toggle. removes binding from the toggle itself (use nesting)
			
			type: 'compact' // if this is set to 'select' then the select style toggle will be used
		});
});

/*****E-Charts function start*****/
var echartsConfig = function() { 
	if( $('#e_chart_4').length > 0 ){
		var eChart_4 = echarts.init(document.getElementById('e_chart_4'));
		var option4 = {
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
			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			xAxis: [{
				type: 'category',
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
			}],
			yAxis: {
				type: 'value',
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
				},
				splitLine: {
					lineStyle: {
						color: '#eaecec',
					}
				}
			},
			series: [{
					name:'1',
					type:'bar',
					barMaxWidth: 7.5,
					data:[320, 332, 301, 334, 390, 330, 320,334, 390, 330, 320],
				}]
		};
		eChart_4.setOption(option4);
		eChart_4.resize();
	}
	
	if( $('#e_chart_5').length > 0 ){
		var eChart_5 = echarts.init(document.getElementById('e_chart_5'));
		var option5 = {
			color: ['#7a5449', '#d7cbc8'],		
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
			xAxis : [
				{
					type : 'category',
					data : ['2011','2012','2013','2014','2015','2016','2017','2018'],
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
			series : [
				{
					name:'1',
					type:'bar',
					barMaxWidth: 30,
					data:[320, 332, 301, 334, 390, 330, 320,200],
				},
				{
					name:'2',
					type:'bar',
					barMaxWidth: 30,
					data:[120, 132, 101, 134, 90, 230, 210,180],
				}
			]
		};

		eChart_5.setOption(option5);
		eChart_5.resize();
	}

	if( $('#e_chart_9').length > 0 ){
		var eChart_9 = echarts.init(document.getElementById('e_chart_9'));
		
		var option8 = {
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
					radius : '60%',
					center : ['50%', '50%'],
					roseType : 'radius',
					color: ['#7a5449', '#a58b84', '#bca9a4', '#f6f3f2'],
					data:[
						{value:735, name:''},
						{value:479, name:''},
						{value:548, name:''},
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
		eChart_9.setOption(option8);
		eChart_9.resize();
	}

	if( $('#e_chart_10').length > 0 ){
		var eChart_10 = echarts.init(document.getElementById('e_chart_10'));
		
		var option9 = {
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
					radius: ['0', '50%'],
					color: ['#7a5449', '#d7cbc8', '#bca9a4', '#a58b84'],
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
		eChart_10.setOption(option9);
		eChart_10.resize();
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