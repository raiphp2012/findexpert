<?php
function glogin()
{
	$CI =& get_instance();
	$CI->load->database(); 
	$CI->load->library('session');
	$CI->load->model('user');
	require 'gconfig.php';
	
}




?>
