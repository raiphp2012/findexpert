<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertAppointmentDetails extends CI_Controller {

    function __construct() {
        parent::__construct();
        isExpertLoggedIn();
    }

    function showClientData() {
        $clientId = $this->input->get('clientId');
        $expertId = $this->session->userdata('expertId');
        $this->load->model('FetchDefaultValuesModel');
        $appointmentDataSet['sharedFileDetails'] = $this->FetchDefaultValuesModel->fetchExpertSharedFiles($clientId);
        $appointmentDataSet['appointmentData'] = $this->FetchDefaultValuesModel->fetchClientAppointmentDetails($clientId, $expertId);
        $appointmentDataSet['appointmentDataNotes'] = $this->FetchDefaultValuesModel->appointmentDataNotes($clientId, $expertId);
        $appointmentDataSet['appointmentActionTakenData'] = $this->FetchDefaultValuesModel->appointmentActionTakenData($clientId, $expertId);
        $appointmentDataSet['consultationStatus'] = $this->FetchDefaultValuesModel->fetchConsultationStatusDetails();
        $appointmentDataSet['clientId'] = $clientId;
        $this->load->view('ExpertAppointmentDetails_view', $appointmentDataSet);

    }

    function rescheduleAppointment() {
        $appointmentId = $this->input->post('appointmentId');
        $newAppointmentDateTime = $this->input->post('newAppointmentDateTime');
        $this->load->model('AppointmentDetailsModel');
        $rescheduleStatus = $this->AppointmentDetailsModel->rescheduleAppointment($appointmentId, $newAppointmentDateTime);
        if ($rescheduleStatus == 1) {
            $this->session->set_userdata('rescheduleSuccess', 'Appointment has been rescheduled Successfully');
            redirect(base_url() . 'ExpertAppointments');
        }
    }

    function cancelAppointment() {
        $appointmentId = $this->input->post('appointmentId');
        $this->load->model('AppointmentDetailsModel');
        $cancelStatus = $this->AppointmentDetailsModel->cancelAppointment($appointmentId);
        if ($cancelStatus == 1) {
            $this->session->set_flashdata('cancelSuccess', 'Appointment has been cancelled Successfully');
            redirect(base_url() . 'ExpertAppointments');
        }
    }

}