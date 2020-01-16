<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ClientAppointments extends CI_Controller {

    function __construct() {
        parent::__construct();
        isClientLoggedIn();
    }

    function index() {
        $this->load->model('FetchDefaultValuesModel');
        $appointmentDataSet['appointmentData'] = $this->FetchDefaultValuesModel->fetchClientAppointments();
     
        $appointmentDataSet['consultationStatus'] = $this->FetchDefaultValuesModel->fetchConsultationStatusDetails();
        $this->load->view('ClientAppointments_view', $appointmentDataSet);
    }

}
