<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class Saveappointment extends CI_Controller {
    function __construct() {
        parent::__construct();
        isExpertLoggedIn();
    }

    function index() {
        $appointmentDate = date("Y-m-d H:i:s", strtotime($this->input->post('appointmentDate')));
        $this->load->model('Expertdetailsmodel');
        $insertResponse = $this->Expertdetailsmodel->saveAppointment($appointmentDate);
//        if($insertResponse == 1)
//        return 
    }
}
