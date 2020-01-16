<?php

/* 
 * @author Visheshagya
 */
class Logout extends CI_Controller
{
    function index()
    {
        $CI = & get_instance();
        $CI->session->unset_userdata('isExpertLoggedIn');
        $this->session->sess_destroy();
        $this->session->unset_userdata('expertId');
        unset($_SESSION['userid']);
        redirect(base_url()."Expert");
    }
    
    function clientLogout()
    {
        $CI = & get_instance();
        $CI->session->unset_userdata('isClientLoggedIn');
        $this->session->unset_userdata('clientId');
	setcookie('cc_data', '', time() + (86400 * 30), "/");
	setcookie('cc_role', '', time() + (86400 * 30), "/");
	setcookie('cc_email', '', time() + (86400 * 30), "/");
        unset($_SESSION['userid']);
        redirect(base_url()."ClientHome");
    }
}