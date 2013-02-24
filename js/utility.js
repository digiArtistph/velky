$(document).ready(function(){
	/*
	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/";
	var domainName = $('meta[name*="url"]').attr('content');
	*/
	var base_url = $('meta[name*="url"]').attr('content');
	
	
	//global vars
	var form = $("#add_report");
	
	var stationInfo = $('.velkyStationValidation');
	var mobileInfo = $('.velkyMobileNumValidation');
	var details = $("textarea[name=details]");
	var detailsInfo = $(".detailsInfo");
	var caller = $("input[name=caller]");
	var callersInfo = $(".callersInfo");
	var accdate = $("input[name=acdntdate]");
	var accdatesInfo = $(".accdatesInfo");
	var rptdate = $("input[name=rptdate]");
	var rptdatesInfo = $(".rptdatesInfo");
	var message = $("textarea[name=message]");
	var messagesInfo = $(".messagesInfo");
	var checkboxinfo = $(".checkboxinfo"); 
	var radioinfo = $(".radioinfo"); 
	
	//On blur
	details.blur(validatedetails);
	caller.blur(validatecaller);
	accdate.blur(validateaccdate);
	rptdate.blur(validaterptdate);
	message.blur(validatemessage);
	
	//On key press
	details.keyup(validatedetails);
	caller.keyup(validatecaller);
	accdate.keyup(validateaccdate);
	rptdate.keyup(validaterptdate);
	message.blur(validatemessage);
	
	_disableattr(2);

	//submit form validation
	
	
	$('.caller').click(function(){
		$('.modal-body table thead').empty().html('<tr><th>Message Id</th><th>Number</th><th>Message</th><th>Date</th></th><th>Mark as</th></tr>');
		$('.modal-body table tbody').empty();
		$('.modal-body table tbody').append('<p>Gathering Data</p>');
		$.post(base_url + "response/inbox/viewNewMessage")
		.success(function(data) {
			$('.modal-body table tbody').empty().html(data);
			
		});
		
		
	});
	
	$('.entity').click(function(){
		$('.modal-body table thead').empty().html('<tr><th>Message Id</th><th>Number</th><th>Message</th><th>Date</th><th>Mark as</th></tr>');
		$('.modal-body table tbody').empty();
		$('.modal-body table tbody').append('<p>Gathering Data</p>');
		$.post(base_url + "response/inbox/viewEntityMessage")
		.success(function(data) {
			$('.modal-body table tbody').empty().html(data);
			
		});
		
		
	});
	
	/*setInterval(function() { 
		$.post(base_url + "response/inbox/getCallerCount")
		.success(function(data) {
			$('.caller').empty().append(data + '<i class="splashy-map"></i>');
		});
	}, 2000);
	
	setInterval(function() { 
		$.post(base_url + "response/inbox/getResponseCount")
		.success(function(data) {
			$('.entity').empty().append(data + '<i class="splashy-comments_reply"></i>');
		});
	}, 2000);*/
	
	/*setInterval(function() { 
		$.post(base_url + "response/inbox/autoResponse")
		.success(function(data) {
			
		});
	}, 2000);*/
	
	
	$("#add_report").submit(function(){
		//return true;
		if( validatedetails() & validatecaller() & validateaccdate() & validaterptdate() ){
			input = {
					'indexid' : $('input[name=indexid]').val(),
					'accidenttype' : $('select[name=accidenttype]').val(),
					'barangay' : $('select[name=barangay]').val(),
					'details' : $('textarea[name=details]').val(),
					'caller' : $('input[name=caller]').val(),
					'acdntdate' : $('input[name=acdntdate]').val(),
					'rptdate' : $('input[name=rptdate]').val()
			}
			
			$.post(base_url + "accident/accident/validateaddreport", input)
				.success(function(data) {
				
					if(data == '1') {
						alert('Please fill up form correctly');
					} else {
						_disableattr(1);
						//$('.span6').append('<input class="indexid" type="text" name="indexid" value="' + data + '" />  ');
						$('input[name=indexid]').val(data);
						$('#submitr').val('Update Record');
						alert('Record saved');
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
			 $.each($('.checkboxsms:checked'), function() {
				 bc.push($(this).val()); 
			 });
			 input2 = {
					 'lst_id' : $('input[name=indexid]').val(),
					'broadcastto' : bc,
					'message' : $('textarea[name=message]').val(),
					'smstype' : $('input[name=smstype]:checked', '#submitsms').val()
			 		}
			
			$.post(base_url + "accident/accident/validatesendsms", input2)
				.success(function(data) {
						alert('Broadcast Request: ' + data);
			});		
			return false;
		}
		else{
			return false;
		}
	});
	
	
	$('#velkyAddPolice').submit(function(){
		
		if( validateMobile() & validateStation() ){
			// valid add
			return true;
		}else{
			// invalid
			return false;
		}
	});
	
	//----function validation declaration
	function validateMobile(){
		var pattern = "/((09)[0-9]{9}),?/g";
		var mobile = $('input[name=mobile]').val();
		
		if( pattern.match(mobile) ){
			
			mobileInfo.text("* Required");
			mobileInfo.addClass("error");
			return false;
		}
		//it's valid
		else{
			mobileInfo.removeClass("error");
			mobileInfo.text("");
			mobileInfo.removeClass("error");
			return true;
			
		}
	}
	
	function validateStation(){
		var pattern = "/^[\d]+\b/";
		var station = $('input[name=station]').val();
		
		if( pattern.match(station) ){
			
			stationInfo.text("* Required");
			stationInfo.addClass("error");
			return false;
		}
		//it's valid
		else{
			stationInfo.removeClass("error");
			stationInfo.text("");
			stationInfo.removeClass("error");
			return true;
			
		}
	}
	
	function _disableattr(param){
		if(param == 1){
			$(".checkboxsms").removeAttr('disabled');
			$(".textarea").removeAttr('disabled');
			$(".radiobtn").removeAttr('disabled');
			$("#sendsms").removeAttr('disabled');
		}else{

			$(".checkboxsms").attr("disabled", true);
			$(".textarea").attr("disabled", true);
			$(".radiobtn").attr("disabled", true);
			$("#sendsms").attr("disabled", true);
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
		if($('.checkboxsms:checkbox:checked').length <1){
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
		
	/*  reports filtering AJAX calls */
	$('.velkyreportfilter.velkybydate').click(function(){
		var mDateFrom = $('input[name="acdntdatefrom"]').attr('value');
		var mDateTo = $('input[name="acdntdateto"]').attr('value');
		
		$.post(base_url + 'reports/accidents/accidentfilterbydate', {'acdntdatefrom' : mDateFrom, 'acdntdateto' : mDateTo})
		.success( function(data) {
			alert('mDateFrom ' + mDateFrom + ' ' + 'mDateTo ' +  mDateTo + ' ' + data);
		});		
	});
			
	$('.velkyFilteredReport').click(function() {
		var mdateFrom = $('input[name="datefrom"]').attr('value');
		var mdateTo = $('input[name="dateto"]').attr('value');
		var mbarangay = $('select[name="barangay"]').attr('value');
		var maccidenttype = $('select[name="accidenttype"]').attr('value');
		var elem = $(this);
		
		
		$.ajax({
			type: 'post',
			url: base_url + 'ajaxcalls/filteredreport',
			data: {dateFrom: mdateFrom, dateTo: mdateTo, barangay: mbarangay, accidenttype: maccidenttype},
			success: function(data) {
				//alert(data);
				$('.velkyreportcontainer').empty().append(data);
			}
		});
	
		//return false;
	});
	
});