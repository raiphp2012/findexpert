<?php
	/* get a global option */
	function popuppro_get_option( $option ) {
		$popuppro_default_options = popuppro_default_options();
		$settings = get_option('popuppro');
		switch($option){
		
			default:
				if (isset($settings[$option])){
					return $settings[$option];
				} else {
					return $popuppro_default_options[$option];
				}
				break;
	
		}
	}
	
	
	/* default options */
	function popuppro_default_options(){
		$array['enabledpopup']='1';
		$array['rounded_corner']='1';
		$array['popup_box_content']='<h2>Welcome to popuppro <br/>of Abcdefg Gfrt Members Today</h2>';
	        $array['popuppro_mailchimp_integration']='0';
		$array['popuppro_mailchimp_api_key']='';
	       $array['popuppro_mailchimp_list_id']='';	
		$array['popuppro_background_color']='#FFFCFC';
		$array['popuppro_border_color']='#170304';
		$array['popuppro_font_color']='#2a1720';
		$array['popuppro_delay']='1000';
		$array['popuppro_campaignmonitor_integration']='0';
		$array['popuppro_campaignmonitor_key']='';
		$array['popuppro_campaignmonitor_list_id']='';
		$array['popuppro_facebook']='';
		$array['popuppro_twitter']='';
		$array['popuppro_linkedin']='';
		$array['popuppro_google']='';
		$array['popuppro_instagram']='';
		
		

			
		return  $array;
	}
?>
