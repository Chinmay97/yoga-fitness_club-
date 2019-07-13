// JavaScript Document
$('form').submit(function(e) {
	$(".error-message").remove();
	$(".error").removeClass('error');
	
    return validate_form();
});
function getAlert(message_text){
	return '<div class="alert-danger alert-dismissible error-message" style="padding:5px">'+
	  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
	  '<strong>Error ! </strong> '+ message_text+
	  '</div>';
}
function validate_form(){
	var valid_form = true;
	$(".required").each(function(index, element) {
		if($(this).val()=='' ||$(this).val()=='0'){
			var msg_text = $(this).attr("data-message");
			if (msg_text == null){
				msg_text = "This field required";
			}
		    $(this).parent("div").append(getAlert(msg_text));
			$(this).addClass('error');
			valid_form =false;
			return false;
		}
    }); 
	$(".phone-number").each(function(index, element) {
		var ph_no = $(this).val();
		if(IsMobile(ph_no)==false){
			var msg_text = $(this).attr("data-message");
			if (msg_text == null){
				msg_text = "This is not a valid phone number";
			}
			$(this).parent("div").append(getAlert(msg_text));
			$(this).addClass('error');
			valid_form =false;
			return false;
		}
    });
	
	
	$(".email").each(function(index, element) {
		var email_id = $(this).val();
		if(email_id !=''){
			if(isMail(email_id)==false){
				var msg_text = $(this).attr("data-message");
				if (msg_text == null){
					msg_text = "This is not a valid email number";
				}
				$(this).parent("div").append(getAlert(msg_text));
				$(this).addClass('error');
				valid_form =false;
				return false;
			} 
		}
    }); 
	
	$(".numeric").each(function(index, element) {
		var num_val = $(this).val();
		if(num_val !='' && $.isNumeric(num_val)==false){
			var msg_text = $(this).attr("data-message");
			if (msg_text == null){
				msg_text = "This filed only allow numbers";
			}
			$(this).parent("div").append(getAlert(msg_text));
			$(this).addClass('error');
			valid_form = false;
			return false;
		}
    }); 
	
	$(".letter_only").each(function(index, element) {
		var input_text = $(this).val();
		if(!/^[a-zA-Z ]*$/g.test(input_text))
		{
			var msg_text = $(this).attr("data-message");
			if (msg_text == null){
				msg_text = "The fields only allow letters";
			}
			$(this).parent("div").append(getAlert(msg_text));
			$(this).addClass('error');
			valid_form = false;
			return false;
		}
		
    }); 
	
	$(".fixed-length").each(function(index, element) {
		var dataText = $(this).val();
		if(dataText !==''){
			var dataLength = $(this).attr("data-length");
			if(parseInt(dataText.length)!= parseInt(dataLength)){
				var msg_text = $(this).attr("data-message");
				if (msg_text == null){
					msg_text = "The field must have  " +dataLength+ " Characters";
				}
				$(this).parent("div").append(getAlert(msg_text));
				$(this).addClass('error');
				valid_form =false;
				return false;
			} 
		}
    });
	$(".error:first").focus()
	return valid_form;
}

function IsMobile(txtMobile) {
	var mob = /^[1-9]{1}[0-9]{9}$/;
	//var txtMobile = document.getElementById(txtMobId);
	if (mob.test(txtMobile) == false) {
		
		return false;
	}
	
	return true;
	
}
function isMail(email) {
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		//var address = document.getElementById[email].value;
		if (reg.test(email) == false) 
		{
			return false;
		}
		return true;
}
function isDate(txtDate){
var currVal = txtDate;
	if(currVal == '')return false;
	var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
	var dtArray = currVal.match(rxDatePattern); // is format OK?
	if (dtArray == null)return false;
	 //Checks for mm/dd/yyyy format.
	  dtDay = dtArray[1];
	  dtMonth= dtArray[3];
	  dtYear = dtArray[5];
	  if (dtMonth < 1 || dtMonth > 12) return false;
	  else if (dtDay < 1 || dtDay> 31) return false;
	  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) return false;
	  else if (dtMonth == 2){
		 var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
		 if (dtDay> 29 || (dtDay ==29 && !isleap))
		  return false;
	  }
	  return true;
}
function compareDate() {
	var dateEntered = $("#purchaedate").val();
	var date = dateEntered.substring(0, 2);
	var month = dateEntered.substring(3, 5);
	var year = dateEntered.substring(6, 10);
	var dateToCompare = new Date(year, month - 1, date);
	var currentDate = new Date();
	if (dateToCompare > currentDate) {
		alert("Date Entered is greater than Current Date ");
	}
}


