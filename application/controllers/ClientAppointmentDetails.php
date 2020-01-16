<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ClientAppointmentDetails extends CI_Controller {

    function __construct() {
        parent::__construct();
        isClientLoggedIn();
    }

    function showExpertData() {
        $expertId = $this->input->get('expertId');
        $clientId = $this->session->userdata('clientId');
        $this->load->model('FetchDefaultValuesModel');
        $appointmentDataSet['sharedFileDetails'] = $this->FetchDefaultValuesModel->fetchClientSharedFiles($expertId);
        $appointmentDataSet['appointmentData'] = $this->FetchDefaultValuesModel->fetchExpertAppointmentDetails($clientId, $expertId);
         $appointmentDataSet['appointmentDataNotes'] = $this->FetchDefaultValuesModel->appointmentClientDataNotes($clientId, $expertId);
        $appointmentDataSet['appointmentActionTakenData'] = $this->FetchDefaultValuesModel->appointmentActionTakenData($clientId, $expertId);
        $appointmentDataSet['consultationStatus'] = $this->FetchDefaultValuesModel->fetchConsultationStatusDetails();
        $this->load->view('ClientAppointmentDetails_view', $appointmentDataSet);
    }

    function rescheduleAppointment() {
        $appointmentId = $this->input->post('appointmentId');
        $newAppointmentDateTime = $this->input->post('newAppointmentDateTime');
        $this->load->model('AppointmentDetailsModel');
        $rescheduleStatus = $this->AppointmentDetailsModel->rescheduleAppointment($appointmentId, $newAppointmentDateTime);
        if ($rescheduleStatus == 1) {
            $this->session->set_userdata('rescheduleSuccess', 'Appointment has been rescheduled Successfully');
            redirect(base_url() . 'ClientAppointments');
        }
    }

    function cancelAppointment() {
        $appointmentId = $this->input->post('appointmentId');
        $this->load->model('AppointmentDetailsModel');
        $cancelStatus = $this->AppointmentDetailsModel->cancelAppointment($appointmentId);
        if ($cancelStatus == 1) {
            $this->session->set_flashdata('cancelSuccess', 'Appointment has been cancelled Successfully');
            redirect(base_url() . 'ClientAppointments');
        }
    }

}