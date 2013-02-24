// JavaScript Document
(function($){
	
	$.fn.dataload = function() {
		var baseurl = $('meta[name*="url"]').attr('content');
		var elem = $(this);
		var output = '';
		//alert('Plugin called ' +  baseurl);	
		/*
		output = '<option value="bugo">Bugo</option>'
		$(output).appendTo(elem);
		 alert(elem.attr('class'));
		*/
		var myCallBack = function(data) {
			var parsedData = $.parseJSON(data);
			
			$.each(parsedData, function(key, val) {
				output += '<option value="' + val.b_id + '">' + val.name + '</option>';
			});
			
			$(output).appendTo(elem);
		}
		
		$.ajax({
			url: baseurl +  'ajaxcalls/dataload',
			success: myCallBack
		});
		
		
		
	}
	
})(jQuery);