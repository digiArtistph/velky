/* [ ---- Gebo Admin Panel - charts ---- ] */
	$(document).ready(function() {

        //* pie chart
		//gebo_charts.fl_a();
		//* multiple axes
		//gebo_charts.fl_b();
		//* bars
		gebo_charts.fl_c();
		//alert('here');
		//* combined
		//gebo_charts.fl_d();
		//* pyramid
		//gebo_charts.fl_e();
		
	});
	
	//* charts
    gebo_charts = {
				 		
		fl_c : function() {
			var elem = $('#fl_c');
		
		
            // add 2h to match utc+2
            for (var i = 0; i < d1.length; ++i) {d1[i][0] += 60 * 120 * 1000};
			for (var i = 0; i < d2.length; ++i) {d2[i][0] += 60 * 120 * 1000};
			for (var i = 0; i < d3.length; ++i) {d3[i][0] += 60 * 120 * 1000};
            
            var ds = new Array();
         
            ds.push({
                label: d1Label,
                data:d1,
                bars: {
                    show: true, 
                    barWidth: 60 * 220 * 1000, 
                    order: 1,
                    lineWidth : 2,
                    fill: 1
                }
            });
            ds.push({
                label: d2Label ,
                data:d2,
                bars: {
                    show: true, 
                    barWidth: 60 * 220 * 1000, 
                    order: 2,
                    fill: 1
                }
				
            });
            ds.push({
                label: d3Label ,
                data:d3,
                bars: {
                    show: true, 
                    barWidth: 60 * 220 * 1000, 
                    order: 3,
                    fill: 1
                }
            });
            
            var options = {
				legend: {position: "nw"},
                grid:{
                    hoverable:true
                },
                xaxis: {
					mode: "time",
					minTickSize: [1, "day"],
					autoscaleMargin: 0.10
				},
                colors: [ "#b4dbeb", "#8cc7e0", "#64b4d5", "#3ca0ca", "#2d83a6", "#22637e", "#174356", "#0c242e" ]
            };
            
            fl_c_plot = $.plot(elem, ds, options);
            
            // Create a tooltip on our chart
            elem.qtip({
                prerender: true,
                content: 'Loading...', // Use a loading message primarily
                position: {
                    viewport: $(window), // Keep it visible within the window if possible
                    target: 'mouse', // Position it in relation to the mouse
                    adjust: { x: 7 } // ...but adjust it a bit so it doesn't overlap it.
                },
                show: false, // We'll show it programatically, so no show event is needed
                style: {
                    classes: 'ui-tooltip-shadow ui-tooltip-tipsy',
                    tip: false // Remove the default tip.
                }
            });
         
            // Bind the plot hover
            elem.on('plothover', function(event, coords, item) {
                // Grab the API reference
                var self = $(this),
                    api = $(this).qtip(),
                    previousPoint, content,
         
                // Setup a visually pleasing rounding function
                round = function(x) { return Math.round(x * 1000) / 1000; };
         
                // If we weren't passed the item object, hide the tooltip and remove cached point data
                if(!item) {
                    api.cache.point = false;
                    return api.hide(event);
                }
				
                // Proceed only if the data point has changed
                previousPoint = api.cache.point;
                if(previousPoint !== item.seriesIndex)
                {
                    // Update the cached point data
                    api.cache.point = item.seriesIndex;
					
                    // Setup new content
                    content = item.series.label +': '+ round(item.datapoint[1]);
         
                    // Update the tooltip content
                    api.set('content.text', content);
         
                    // Make sure we don't get problems with animations
                    api.elements.tooltip.stop(1, 1);
         
                    // Show the tooltip, passing the coordinates
                    api.show(coords);
                }
            });
            
        }
    };