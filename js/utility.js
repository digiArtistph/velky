$(document).ready(function(){
	
	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/";
	
	
	//global vars
	var form = $("#add_report");
	
	var barangay = $(".textboxA");
	var barangayInfo = $(".barangayInfo");
	var details = $(".textareaA");
	var detailsInfo = $(".detailsInfo");
	var caller = $(".textboxB");
	var callersInfo = $(".callersInfo");
	var accdate = $(".textboxC");
	var accdatesInfo = $(".accdatesInfo");
	var rptdate = $(".textboxD");
	var rptdatesInfo = $(".rptdatesInfo");
	var message = $(".textarea");
	var messagesInfo = $(".messagesInfo");
	var checkboxinfo = $(".checkboxinfo"); 
	var radioinfo = $(".radioinfo"); 
	
	//On blur
	barangay.blur(validatebarangay);
	details.blur(validatedetails);
	caller.blur(validatecaller);
	accdate.blur(validateaccdate);
	rptdate.blur(validaterptdate);
	message.blur(validatemessage);
	
	//On key press
	barangay.keyup(validatebarangay);
	details.keyup(validatedetails);
	caller.keyup(validatecaller);
	accdate.keyup(validateaccdate);
	rptdate.keyup(validaterptdate);
	message.blur(validatemessage);
	
	_disableattr(2);
	
	//On Submitting
	$("#add_report").submit(function(){
		if( validatebarangay() & validatedetails() & validatecaller() & validateaccdate() & validaterptdate() ){
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
		}
		else
			return false;
	});

	$('#submitsms').submit(function(){

		if( validatemessage() & validatecheckbox() & validateradio() ){ 
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
		}
		else{
			return false;
		}
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
	
	function validatebarangay(){
		//if it's NOT valid
		if(barangay.val().length < 1){
			barangay.addClass("error");
			barangayInfo.text("*required");
			barangayInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			barangay.removeClass("error");
			barangayInfo.text("");
			barangayInfo.removeClass("error");
			return true;
		}
	}
	
	function validatedetails(){
		//it's NOT valid
		if(details.val().length <1){
			details.addClass("error");
			detailsInfo.text("* Required");
			detailsInfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			details.removeClass("error");
			detailsInfo.text("");
			detailsInfo.removeClass("error");
			return true;
		}
	}
	
	function validatecaller(){
		//it's NOT valid
		if(caller.val().length <1){
			caller.addClass("error");
			callersInfo.text("* Required");
			callersInfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			caller.removeClass("error");
			callersInfo.text("");
			callersInfo.removeClass("error");
			return true;
		}
	}
	
	function validateaccdate(){
		//it's NOT valid
		if(accdate.val().length <1){
			accdate.addClass("error");
			accdatesInfo.text("* Required");
			accdatesInfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			accdate.removeClass("error");
			accdatesInfo.text("");
			accdatesInfo.removeClass("error");
			return true;
		}
	}
	
	function validaterptdate(){
		//it's NOT valid
		if(rptdate.val().length <1){
			rptdate.addClass("error");
			rptdatesInfo.text("* Required");
			rptdatesInfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			rptdate.removeClass("error");
			rptdatesInfo.text("");
			rptdatesInfo.removeClass("error");
			return true;
		}
	}
	
	function validatemessage(){
		//it's NOT valid
		if(message.val().length <1){
			message.addClass("error");
			messagesInfo.text("* Required");
			messagesInfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			message.removeClass("error");
			messagesInfo.text("");
			messagesInfo.removeClass("error");
			return true;
		}
	}
	
	function validatecheckbox(){
		if($('.checkbox:checkbox:checked').length <1){
			checkboxinfo.text("Please check 1 of the checkbox");
			checkboxinfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			checkboxinfo.text("");
			checkboxinfo.removeClass("error");
			return true;
		}
	}
	
	function validateradio(){
		if($('.radiobtn:checked').length <1){
			radioinfo.text("Please check 1 of the SMS type");
			radioinfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
			radioinfo.text("");
			radioinfo.removeClass("error");
			return true;
		}
	}
	
});