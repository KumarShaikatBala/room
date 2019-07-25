'use strict';
(function($){
	var color = Chart.helpers.color;
	var barChartData1 = {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
					type: 'bar',
					label: 'Dataset 1',
					backgroundColor: '#0092eb',
					borderColor: '#0092eb',
					data: [
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(),
						randomScalingFactor(), 
						randomScalingFactor()
					]
				}, {
					type: 'line',
					label: 'Dataset 2',
					backgroundColor: '#23c649',
					borderColor: '#23c649',
					data: [
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(),
						randomScalingFactor(), 
						randomScalingFactor()
					]
				}, {
					type: 'bar',
					label: 'Dataset 3',
					backgroundColor: '#ffa800',
					borderColor: '#ffa800',
					data: [
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(), 
						randomScalingFactor(),
						randomScalingFactor(), 
						randomScalingFactor()
					]
				}]
	};

	// Define a plugin to provide data labels
	
	if($('#data-labelling').length >0){
		var ctx = document.getElementById("data-labelling").getContext("2d");
			window.myBar = new Chart(ctx, {
				 type: 'bar',
				 data: barChartData1,
				 options: {
					  responsive: true,
					  title: {
							display: true,
							text: 'Chart.js Combo Bar Line Chart'
					  },
				 }
			});
	  }
})(jQuery);
(function($){
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 100);
	};

	var config = {
		type: 'doughnut',
		data: {
			datasets: [{
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
				],
				backgroundColor: [
					'#0a94ef',
					'#23c649',
					'#ffa800',
					'#fd5814',
					'#3747A0',
				],
				label: 'Dataset 1'
			}],
			labels: [
				"Blue",
				"Green",
				"Yellow",
				"Red",
				"Violet"
			]
		},
		options: {
			responsive: true,
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js Doughnut Chart'
			},
			animation: {
				animateScale: true,
				animateRotate: true
			}
		}
	};
	if($('#doughnut-chart').length >0){
		var ctx = document.getElementById("doughnut-chart").getContext("2d");
		window.myDoughnut = new Chart(ctx, config);
	}
})(jQuery);

/**
* Function written to load pie chartjs.
**/
(function($){
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 100);
	};

	var config = {
		type: 'pie',
		data: {
			datasets: [{
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
				],
				backgroundColor: [
					'#0a94ef',
					'#23c649',
					'#ffa800',
					'#fd5814',
					'#3747A0',
				],
				label: 'Dataset 1'
			}],
			labels: [
				"Blue",
				"Green",
				"Yellow",
				"Red",
				"Violet"
			]
		},
		options: {
			responsive: true
		}
	};
	if($('#pie-chart').length >0){
		var ctx = document.getElementById("pie-chart").getContext("2d");
		window.myPie = new Chart(ctx, config);
	}
})(jQuery);
	
/**
 * Function written to load polar area chartjs.
**/
(function($){
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 100);
	};

	var chartColors = window.chartColors;
	var color = Chart.helpers.color;
	var config = {
		data: {
			datasets: [{
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
				],
				backgroundColor: [
					color('#0092eb').alpha(0.5).rgbString(),
					color('#00c854').alpha(0.5).rgbString(),
					color('#ffa909').alpha(0.5).rgbString(),
					color('#ff5723').alpha(0.5).rgbString(),
					color('#3747A0').alpha(0.5).rgbString(),
				],
				label: 'My dataset' // for legend
			}],
			labels: [
				"Blue",
				"Green",
				"Yellow",
				"Red",
				"Violet"
			]
		},
		options: {
			responsive: true,
			legend: {
				position: 'right',
			},
			title: {
				display: true,
				text: 'Chart.js Polar Area Chart'
			},
			scale: {
			  ticks: {
				beginAtZero: true
			  },
			  reverse: false
			},
			animation: {
				animateRotate: false,
				animateScale: true
			}
		}
	};
	if($('#polar-area-chart').length >0){
		var ctx = document.getElementById("polar-area-chart");
		window.myPolarArea = Chart.PolarArea(ctx, config);
	}
})(jQuery);

/**
 * Function written to load bubble chartjs.
**/
(function($){
	var DEFAULT_DATASET_SIZE = 7;
	var addedCount = 0;
	var color = Chart.helpers.color;
	var bubbleChartData = {
		animation: {
			duration: 10000
		},
		datasets: [{
			label: "My First dataset",
			backgroundColor: color('#0092eb').alpha(0.5).rgbString(),
			borderColor: '#0092eb',
			borderWidth: 1,
			data: [{
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}]
		}, {
			label: "My Second dataset",
			backgroundColor: color('#00c854').alpha(0.5).rgbString(),
			borderColor: '#00c854',
			borderWidth: 1,
			data: [{
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}, {
				x: randomScalingFactor(),
				y: randomScalingFactor(),
				r: Math.abs(randomScalingFactor()) / 5,
			}]
		}]
	};

	if($('#bubble-chart').length >0){
		var ctx = document.getElementById("bubble-chart").getContext("2d");
			window.myChart = new Chart(ctx, {
				 type: 'bubble',
				 data: bubbleChartData,
				 options: {
					  responsive: true,
					  title:{
							display:true,
							text:'Chart.js Bubble Chart'
					  },
					  tooltips: {
							mode: 'point'
					  }
				 }
			});
	}
})(jQuery);
		
/**
* Function written to load combo line and bar chart.
**/
(function($){
	var chartData = {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
			type: 'line',
			label: 'Dataset 1',
			borderColor: '#0092eb',
			borderWidth: 2,
			fill: false,
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}, {
			type: 'bar',
			label: 'Dataset 2',
			backgroundColor: '#23c649',
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			],
			borderColor: 'white',
			borderWidth: 2
		}, {
			type: 'bar',
			label: 'Dataset 3',
			backgroundColor: '#ffa800',
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}]
	};

	if($('#combo-chartjs').length >0){
		var ctx = document.getElementById("combo-chartjs").getContext("2d");
			window.myMixedChart = new Chart(ctx, {
				 type: 'bar',
				 data: chartData,
				 options: {
					  responsive: true,
					  title: {
							display: true,
							text: 'Chart.js Combo Bar Line Chart'
					  },
					  tooltips: {
							mode: 'index',
							intersect: true
					  }
				 }
			});
	  }
})(jQuery);

/**
 * Function written to load suggested min/max settings chartjs.
**/
(function($){
	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				backgroundColor: '#0092eb',
				borderColor: '#0092eb',
				data: [10, 30, 39, 20, 25, 34, -10],
				fill: false,
			}, {
				label: "My Second dataset",
				fill: false,
				backgroundColor: '#23c649',
				borderColor: '#23c649',
				data: [18, 33, 22, 19, 11, 39, 30],
			}]
		},
		options: {
			responsive: true,
			title:{
				display: true,
				text: 'Grid Line Settings'
			},
			scales: {
				yAxes: [{
					gridLines: {
						drawBorder: false,
						color: ['pink', 'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'purple']
					},
					ticks: {
						min: 0,
						max: 100,
						stepSize: 10
					}
				}]
			}
		}
	};

	if($('#min-max-settings').length >0){
		var ctx = document.getElementById("min-max-settings").getContext("2d");
			window.myLine = new Chart(ctx, config);
	  }
})(jQuery);
		
/**
  * Function written to load xaxies filtering chartjs.
 **/
(function($){
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 50 * (Math.random() > 0.5 ? 1 : 1)) + 50;
	};

	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				fill: false,
				borderColor: '#0092eb',
				backgroundColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				]
			}, {
				label: "My Second dataset",
				fill: false,
				borderColor: '#23c649',
				backgroundColor: '#23c649',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				]
			}]
		},
		options: {
			responsive: true,
			title:{
				display:true,
				text:"Chart.js Line Chart - X-Axis Filter"
			},
			scales: {
				xAxes: [{
					display: true,
					ticks: {
						callback: function(dataLabel, index) {
							// Hide the label of every 2nd dataset. return null to hide the grid line too
							return index % 2 === 0 ? dataLabel : '';
						}
					}
				}],
				yAxes: [{
					display: true,
					beginAtZero: false
				}]
			}
		}
	};

	if($('#chart-with-xaxis-filter').length >0){
		var ctx = document.getElementById("chart-with-xaxis-filter").getContext("2d");
			window.myLine = new Chart(ctx, config);
	  }
})(jQuery);

/**
  * Function written to load radar chart chart.
**/
(function($){
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 100);
	};
	var color = Chart.helpers.color;
	var config = {
		type: 'radar',
		data: {
			labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
			datasets: [{
				label: "My First dataset",
				backgroundColor: color('#0092eb').alpha(0.5).rgbString(),
				borderColor: '#0092eb',
				pointBackgroundColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				]
			}, {
				label: "My Second dataset",
				backgroundColor: color('#23c649').alpha(0.5).rgbString(),
				borderColor: '#23c649',
				pointBackgroundColor: '#23c649',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				]
			},]
		},
		options: {
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js Radar Chart'
			},
			scale: {
			  ticks: {
				beginAtZero: true
			  }
			}
		}
	};

	if($('#radar-chart').length >0){
		window.myRadar = new Chart(document.getElementById("radar-chart"), config);
	}
})(jQuery);

/**
  * Function written to load line styles chartjs.
**/
(function($){
	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "Unfilled",
				fill: false,
				backgroundColor: '#0092eb',
				borderColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}, {
				label: "Dashed",
				fill: false,
				backgroundColor: '#23c649',
				borderColor: '#23c649',
				borderDash: [5, 5],
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}, {
				label: "Filled",
				backgroundColor: '#ffa800',
				borderColor: '#ffa800',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				fill: true,
			}]
		},
		options: {
			responsive: true,
			title:{
				display:true,
				text:'Chart.js Line Chart'
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Month'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Value'
					}
				}]
			}
		}
	};

	if($('#line-styles').length >0){
		var ctx = document.getElementById("line-styles").getContext("2d");
			window.myLine = new Chart(ctx, config);
	  }
})(jQuery);

/**
  * Function written to load stepped line chartjs.
 **/
(function($){
	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				borderColor: '#0092eb',
				backgroundColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				fill: false,
				steppedLine: true,
			}, {
				label: "My Second dataset",
				steppedLine: true,
				borderColor: '#23c649',
				backgroundColor: '#23c649',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				fill: false,
			}]
		},
		options: {
			responsive: true,
			title:{
				display:true,
				text:'Chart.js Line Chart'
			},
			tooltips: {
				mode: 'index',
			},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Month'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Value'
					},
				}]
			}
		}
	};

	if($('#stepped-line-chart').length >0){
		var ctx = document.getElementById("stepped-line-chart").getContext("2d");
			window.myLine = new Chart(ctx, config);
	  }
})(jQuery);
		
/**
  * Function written to load line stacked bar chartjs.
 **/
(function($){
	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				borderColor: '#0092eb',
				backgroundColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}, {
				label: "My Second dataset",
				borderColor: '#23c649',
				backgroundColor: '#23c649',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}, {
				label: "My Third dataset",
				borderColor: '#ffa800',
				backgroundColor: '#ffa800',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}, {
				label: "My Third dataset",
				borderColor: '#fd5814',
				backgroundColor: '#fd5814',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}]
		},
		options: {
			responsive: true,
			title:{
				display:true,
				text:"Chart.js Line Chart - Stacked Area"
			},
			tooltips: {
				mode: 'index',
			},
			hover: {
				mode: 'index'
			},
			scales: {
				xAxes: [{
					scaleLabel: {
						display: true,
						labelString: 'Month'
					}
				}],
				yAxes: [{
					stacked: true,
					scaleLabel: {
						display: true,
						labelString: 'Value'
					}
				}]
			}
		}
	};

	if($('#line-stacked-bar-chart').length >0){
		var ctx = document.getElementById("line-stacked-bar-chart").getContext("2d");
		window.myLine = new Chart(ctx, config);
	}
})(jQuery);
		
/**
  * Function written to load line chartjs.
 **/
(function($){
	var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				backgroundColor: '#0092eb',
				borderColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				fill: false,
			}, {
				label: "My Second dataset",
				fill: false,
				backgroundColor: '#23c649',
				borderColor: '#23c649',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
			}]
		},
		options: {
			responsive: true,
			title:{
				display:true,
				text:'Chart.js Line Chart'
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Month'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Value'
					}
				}]
			}
		}
	};

	if($('#line-chart').length >0){
		var ctx = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(ctx, config);
	  }
})(jQuery);

/**
  * Function written to load area different point positions chartjs.
 **/
(function($){
	var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	var config = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "dataset - big points",
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				backgroundColor: '#0092eb',
				borderColor: '#0092eb',
				fill: false,
				borderDash: [5, 5],
				pointRadius: 15,
				pointHoverRadius: 10,
			}, {
				label: "dataset - individual point sizes",
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				backgroundColor: '#23c649',
				borderColor: '#23c649',
				fill: false,
				borderDash: [5, 5],
				pointRadius: [2, 4, 6, 18, 0, 12, 20],
			}, {
				label: "dataset - large pointHoverRadius",
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				backgroundColor: '#ffa800',
				borderColor: '#ffa800',
				fill: false,
				pointHoverRadius: 30,
			}, {
				label: "dataset - large pointHitRadius",
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				],
				backgroundColor: '#fd5814',
				borderColor: '#fd5814',
				fill: false,
				pointHitRadius: 20,
			}]
		},
		options: {
			responsive: true,
			legend: {
				position: 'bottom',
			},
			hover: {
				mode: 'index'
			},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Month'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Value'
					}
				}]
			},
			title: {
				display: true,
				text: 'Chart.js Line Chart - Different point sizes'
			}
		}
	};

	if($('#different-points').length >0){
		var ctx = document.getElementById("different-points").getContext("2d");
			window.myLine = new Chart(ctx, config);
	  }
})(jQuery);
		
/**
  * Function written to load legend normal and pointstyle chartjs.
 **/
(function($){
	if($('#chart-legend-normal').length >0){
		var color = Chart.helpers.color;
		var createConfig = function(colorName) {
			return {
				type: 'line',
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July"],
					datasets: [{
						label: "My First dataset",
						data: [
							randomScalingFactor(), 
							randomScalingFactor(), 
							randomScalingFactor(), 
							randomScalingFactor(), 
							randomScalingFactor(), 
							randomScalingFactor(), 
							randomScalingFactor()
						],
						backgroundColor: color('#0092eb').alpha(0.5).rgbString(),
						borderColor: '#0092eb',
						borderWidth: 1,
						pointStyle: 'rectRot',
						pointRadius: 5,
						pointBorderColor: 'rgb(0, 0, 0)'
					}]
				},
				options: {
					responsive: true,
					legend: {
						labels: {
							usePointStyle: false
						}
					},
					scales: {
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Month'
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Value'
							}
						}]
					},
					title: {
						display: true,
						text: 'Normal Legend'
					}
				}
			};
		}

		var createPointStyleConfig = function(colorName) {
			var config = createConfig(colorName);
			config.options.legend.labels.usePointStyle = true;
			config.options.title.text = 'Point Style Legend';
			return config;
		}
		var config = createConfig(color);
	                var ctx = document.getElementById('chart-legend-normal').getContext('2d');
	                new Chart(ctx,config)
	  }
})(jQuery);

/**
  * Function written to load stacked bar chartjs.
 **/
(function($){
	var barChartData = {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: '#0092eb',
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}, {
			label: 'Dataset 2',
			backgroundColor: '#23c649',
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}, {
			label: 'Dataset 3',
			backgroundColor: '#ffa800',
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}]

	};

	if($('#stacked-bar-chart').length >0){
		var ctx = document.getElementById("stacked-bar-chart").getContext("2d");
			window.myBar = new Chart(ctx, {
				 type: 'bar',
				 data: barChartData,
				 options: {
					  title:{
							display:true,
							text:"Chart.js Bar Chart - Stacked"
					  },
					  tooltips: {
							mode: 'index',
							intersect: false
					  },
					  responsive: true,
					  scales: {
							xAxes: [{
								 stacked: true,
							}],
							yAxes: [{
								 stacked: true
							}]
					  }
				 }
			});
	  }
})(jQuery);

/**
  * Function written to load bar multi axix chartjs.
 **/
(function($){
	var barChartData = {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: [
				'#0092eb',
			],
			yAxisID: "y-axis-1",
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}, {
			label: 'Dataset 2',
			backgroundColor: '#23c649',
			yAxisID: "y-axis-2",
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}]
	};

	if($('#bar-chart-multi-axis').length >0){
		var ctx = document.getElementById("bar-chart-multi-axis").getContext("2d");
		window.myBar = new Chart(ctx, {
			type: 'bar',
			data: barChartData, 
			options: {
				responsive: true,
				title:{
					display:true,
					text:"Chart.js Bar Chart - Multi Axis"
				},
				tooltips: {
					mode: 'index',
					intersect: true
				},
				scales: {
					yAxes: [{
						type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
						display: true,
						position: "left",
						id: "y-axis-1",
					}, {
						type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
						display: true,
						position: "right",
						id: "y-axis-2",
						gridLines: {
							drawOnChartArea: false
						}
					}],
				}
			}
		});
	}
})(jQuery);

/**
  * Function written to load horizontal bar chart.
 **/
(function($){
	var color = Chart.helpers.color;
	var horizontalBarChartData = {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: '#0092eb',
			borderColor: '#0092eb',
			borderWidth: 1,
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}, {
			label: 'Dataset 2',
			backgroundColor: '#23c649',
			borderColor: '#23c649',
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}]
	};

	if($('#hori-bar-chart').length >0){
		var ctx = document.getElementById("hori-bar-chart").getContext("2d");
			window.myHorizontalBar = new Chart(ctx, {
				 type: 'horizontalBar',
				 data: horizontalBarChartData,
				 options: {
					  // Elements options apply to all of the options unless overridden in a dataset
					  // In this case, we are setting the border of each horizontal bar to be 2px wide
					  elements: {
							rectangle: {
								 borderWidth: 2,
							}
					  },
					  responsive: true,
					  legend: {
							position: 'right',
					  },
					  title: {
							display: true,
							text: 'Chart.js Horizontal Bar Chart'
					  }
				 }
			});
	  }
})(jQuery);

/**
 * Function written to load progress bar chartjs.
**/
(function($){
	var progress = document.getElementById('animationProgress');
	var config1 = {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				fill: false,
				borderColor: '#0092eb',
				backgroundColor: '#0092eb',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				]
			}, {
				label: "My Second dataset ",
				fill: false,
				borderColor: '#23c649',
				backgroundColor: '#23c649',
				data: [
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor(), 
					randomScalingFactor()
				]
			}]
		},
		options: {
			title:{
				display:true,
				text: "Chart.js Line Chart - Animation Progress Bar"
			},
			animation: {
				duration: 2000,
				onProgress: function(animation) {
					progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
				},
				onComplete: function(animation) {
					window.setTimeout(function() {
						progress.value = 0;
					}, 2000);
				}
			}
		}
	};

	if($('#canvas').length >0){
		var ctx1 = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx1, config1);
	}
})(jQuery);

		/**
	     * Function written to load bar chartjs.
	    **/
(function($){
	var color = Chart.helpers.color;
	var barChartData = {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: '#0092eb',
			borderColor: '#0092eb',
			borderWidth: 1,
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}, {
			label: 'Dataset 2',
			backgroundColor: '#23c649',
			borderColor: '#23c649',
			borderWidth: 1,
			data: [
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor(), 
				randomScalingFactor()
			]
		}]

	};

	if($('#bar-chart').length >0){
		var ctx = document.getElementById("bar-chart").getContext("2d");
		window.myBar = new Chart(ctx, {
			type: 'bar',
			data: barChartData,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Chart.js Bar Chart'
				}
			}
		});
	}
})(jQuery);