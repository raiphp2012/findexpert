/**
 * 
 */
var email = '';
function subscribeMailchimp(btn) {
	
	if(email != '') {
	var data = {
			
			'action': 'popuppro_subscribe_user' ,
			'email': email
		};
	jQuery.post(ajaxurl, data, function(response) {
		
		jQuery('.login_frm').html('Thank you for subscribing! Please check your email for further instruction')
	});
	}
	return false;
}

function changeEmail(emaillocal) {
	email = emaillocal.value;
}
