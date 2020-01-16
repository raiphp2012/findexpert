<?php
add_shortcode('popuppro_subscribe','popuppro_subscribe',16);
function popuppro_subscribe()
{
	if(popuppro_get_option('popuppro_mailchimp_integration')=='1')
	{		
	echo '<div class="popuppro_main">
	<div id="logo"><img src="'.popuppro_url.'/images/logo.png" /></div>
  	<div class="login_frm"><input type="email" id="email-sub" name="email" onchange="changeEmail(this);" placeholder="Your Email">
    	<input type="submit" name="Submit" onclick="subscribeMailchimp(this);" id="subscribe-mailchimp" class="login login-submit" value="Subscribe">
			</div>';

	}
}
?>
