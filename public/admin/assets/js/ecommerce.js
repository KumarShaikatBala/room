(function($) {
	'use strict';
        /*--------------- AREA EXAMPLE ---------------*/
      if ($(".ecomm-product-detail-morris").length > 0){
        Morris.Area({
              element: $('.ecomm-product-detail-morris'),
              behaveLikeLine: true,
              lineColors: ['#0092eb'],
              data: [
                { y: '2009', a: 0,},
                { y: '2010', a: 50,},
                { y: '2011', a: 100,},
                { y: '2012', a: 90,},
                { y: '2013', a: 170,},
                { y: '2014', a: 190,},
                { y: '2015', a: 160,}
              ],
              xkey: 'y',
              ykeys: ['a'],
              labels: ['Product A'],
              resize: true,
            }).on('click', function(i, row){
              //console.log(i, row);
            });
      }
	  
      if($(".ecomm-order-pie").length > 0){
        $('.ecomm-order-pie').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Orders'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Years',
                colorByPoint: true,
                data: [{
                    name: 'Complete',
                    color: '#00c854',
                    y: 52.33
                }, {
                    name: 'On Hold',
                    color: '#0092eb',
                    y: 26.03
                }, {
                    name: 'Cancelled',
                    color: '#ffa909',
                    y: 10.38
                }]
            }]
        });
    }
	

    if($(".ecomm-order-bar").length > 0){
	  Morris.Bar({
		  element: $('.ecomm-order-bar'),
		  resize: true,
		  data: [
			{x: '2013', y: 3, z: 2, a: 3},
			{x: '2014', y: 2, z: 3, a: 5},
			{x: '2015', y: 4, z: 2, a: 3},
			{x: '2016', y: 2, z: 4, a: 1}
		  ],
		  xkey: 'x',
		  ykeys: ['y', 'z', 'a'],
		  barColors:['#0092eb','#00c854','#ffa909'],
		  labels: ['Y', 'Z', 'A']
		}).on('click', function(i, row){
		  console.log(i, row);
		});
  }

})(jQuery);