$(document).ready(function(){
	
	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/";
	
	_disableattr(2);
	$('#add_report').submit(function(){
		
		input = {
				'accidenttype' : $('.select').val(),
				'barangay' : $('.textboxA').val(),
				'details' : $('.textareaA').val(),
				'caller' : $('.textboxB').val(),
				'acdntdate' : $('.textboxC').val(),
				'rptdate' : $('.textboxD').val()
		}
		
			$.post(base_url + "master/accident/validateaddreport", input)
				.success(function(data) {
					if(data == '1') {
						alert('Please fill up form correctly');
					} else {
						_disableattr(1);
						alert(data);
					}
			});
		
		
		return false;
	});	
	
	function _disableattr(param){
		if(param == 1){
			$(".checkbox").removeAttr('disabled');
			$(".textarea").removeAttr('disabled');
			$(".radiobtn").removeAttr('disabled');
			$("#sendsms").removeAttr('disabled');
		}else{

			$(".checkbox").attr("disabled", true);
			$(".textarea").attr("disabled", true);
			$(".radiobtn").attr("disabled", true);
			$("#sendsms").attr("disabled", true);
		}
	}

	
	$('#submitsms').submit(function(){
		
		 var bc = [];
		 $.each($('.checkbox:checked'), function() {
			 bc.push($(this).val()); 
		 });
		 
		 
		input2 = {
				'broadcastto' : bc,
				'message' : $('.textareaA').val(),
				'smstype' : $('input[name=smstype]:checked', '#submitsms').val()
		}
		
		
			$.post(base_url + "master/accident/validatesendsms", input2)
				.success(function(data) {
					if(data == '1') {
						alert('Please fill up form correctly');
					} else {
						alert(data);
					}
					
			});
		
		
		return false;
	});	
	
});