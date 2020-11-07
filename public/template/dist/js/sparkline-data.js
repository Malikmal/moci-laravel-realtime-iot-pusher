/*Sparkline Init*/
"use strict";
var sparklineLogin = function() { 
	if( $('#sparkline_1').length > 0 ){
		$("#sparkline_1").sparkline([2,4,4,6,8,5,6,4,8,6,6,2 ], {
			type: 'line',
			width: '100%',
			height: '50',
			resize: true,
			lineWidth: '1',
			lineColor: '#7a5449',
			fillColor: '#f6f3f2',
			spotColor:'#7a5449',
			spotRadius:'2',
			minSpotColor: '#7a5449',
			maxSpotColor: '#7a5449',
			highlightLineColor: 'rgba(0, 0, 0, 0)',
			highlightSpotColor: '#7a5449'
		});
	}	
	if( $('#sparkline_2').length > 0 ){
		$("#sparkline_2").sparkline([0,2,8,6,8,5,6,4,8,6,6,2 ], {
			type: 'bar',
			width: '100%',
			height: '50',
			barWidth: '5',
			resize: true,
			barSpacing: '5',
			barColor: '#7a5449',	
			highlightSpotColor: '#7a5449'
		});
	}	
	if( $('#sparkline_3').length > 0 ){
		$("#sparkline_3").sparkline([20,4,4], {
			type: 'pie',
			width: '50',
			height: '50',
			resize: true,
			sliceColors: ['#7a5449', '#bca9a4', 'a58b84']
		});
	}
	if( $('#sparkline_7').length > 0 ){
		$('#sparkline_7').sparkline([15, 23, 55, 35, 54, 45, 66, 47, 30], {
			type: 'line',
			width: '100%',
			height: '50',
			chartRangeMax: 50,
			resize: true,
			lineWidth: '1',
			lineColor: '#7a5449',
			fillColor: '#f6f3f2',
			spotColor:'#7a5449',
			spotRadius:'2',
			minSpotColor: '#7a5449',
			maxSpotColor: '#7a5449',
			highlightLineColor: 'rgba(0, 0, 0, 0)',
			highlightSpotColor: '#7a5449'
		});
		$('#sparkline_7').sparkline([0, 13, 10, 14, 15, 10, 18, 20, 0], {
			type: 'line',
			width: '100%',
			height: '50',
			chartRangeMax: 40,
			lineWidth: '1',
			lineColor: '#7a5449',
			fillColor: '#f6f3f2',
			spotColor:'#7a5449',
			composite: true,
			spotRadius:'2',
			minSpotColor: '#7a5449',
			maxSpotColor: '#7a5449',
			highlightLineColor: 'rgba(0, 0, 0, 0)',
			highlightSpotColor: '#7a5449'
		});
	}	
}
sparklineLogin();
 
var sparkResize;
$(window).on("resize",function(){
	clearTimeout(sparkResize);
	sparkResize = setTimeout(sparklineLogin, 200);
});
