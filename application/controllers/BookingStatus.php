<?php

/*
 * @author Avinash Raj
 */

class Bookingstatus extends CI_Controller {

     function __construct() 
     {
        parent::__construct();
        isExpertLoggedIn();
    }
    

    function index() {
        $this->load->view('BookingStatus_view');
    }

}
