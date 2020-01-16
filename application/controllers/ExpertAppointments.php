<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertAppointments extends CI_Controller {

    function __construct() {
        parent::__construct();
        isExpertLoggedIn();
    }

    function index() {
        $this->load->model('FetchDefaultValuesModel');
        $appointmentDataSet['appointmentData'] = $this->FetchDefaultValuesModel->fetchAppointmentDetails();
        $appointmentDataSet['consultationStatus'] = $this->FetchDefaultValuesModel->fetchConsultationStatusDetails();
        $this->load->view('ExpertAppointments_view', $appointmentDataSet);
    }

}
