<?php
add_action( 'wp_ajax_popuppro_subscribe_user','popuppro_subscribe_user');
add_action( 'wp_ajax_nopriv_popuppro_subscribe_user',' popuppro_subscribe_user');
function popuppro_subscribe_user()
{

  if(popuppro_get_option('popuppro_mailchimp_integration')=='1' &&  popuppro_get_option('popuppro_mailchimp_api_key')!='')	
  {		
  	$MailChimp = new MailChimp(popuppro_get_option('popuppro_mailchimp_api_key'));
   	$args =  array(
   	'id'                => popuppro_get_option('popuppro_mailchimp_list_id'),
   	'email'             => array('email'=>sanitize_email($_POST['email'])),
   	'double_optin'      => false,
   	'update_existing'   => true,
   	'replace_interests' => false,
   	'send_welcome'      => false,
   	);
  	$result = $MailChimp->call('lists/subscribe',$args);
  }	
  
  if(popuppro_get_option('popuppro_campaignmonitor_integration')=='1' &&  popuppro_get_option('popuppro_campaignmonitor_key')!='')
  {
	$email = array('email'=>sanitize_email($_POST['email']));
		include(popuppro_path.'lib/campaignmonitor/csrest_subscribers.php');
	
		$list_id=popuppro_get_option('popuppro_campaignmonitor_list_id');
		
		$auth_details=array('api_key' => popuppro_get_option('popuppro_campaignmonitor_key'));
	
		$api=new CS_REST_Subscribers($list_id,$auth_details);
	
		$subscriber=array ('EmailAddress' => $email);
		$api->add($subscriber);


  }
	

		
   die();
}
?>
