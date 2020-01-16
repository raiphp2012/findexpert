<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @author Visheshagya
 */

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('welcome_message');
    }

    function checkClientLogin() {
//        $loginData['tableName'] = "client_personal_details";
//        $loginData['clientEmailId'] = $this->input->post('emailId');
//        $loginData['clientPassword'] = md5($this->input->post('password'));
//        $this->load->model('Loginmodel');
//        $userValidationResult = $this->Loginmodel->validateUserLogin($loginData);
//
//        if ($userValidationResult > 0) {
//            $this->session->set_userdata('clientId', $userValidationResult);
//            $this->session->set_flashdata('ClientLoginSuccess','Welcome');
//            redirect(base_url().'ClientProfile');
//        }
//        else
//        {
//            $this->session->set_flashdata('ClientLoginError','Please verify the entered email id and password');
//            redirect(base_url().'Welcome');
//        }
        
        $this->form_validation->set_rules('clientEmailId', 'email is required', 'required');
        $this->form_validation->set_rules('clientPassword', 'required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
        $loginData['tableName'] = "client_personal_details";
        $loginData['clientEmailId'] = $this->input->post('clientEmailId');
        $loginData['clientPassword'] = md5($this->input->post('password'));
        $this->load->model('Loginmodel');
        $clientLoginId = $this->Loginmodel->validateUserLogin($loginData);
//        echo $clientLoginId;
//        exit;
        if ($clientLoginId) {
            $this->session->set_userdata('clientId', $clientLoginId);
            $this->session->set_userdata('isClientLoggedIn', true);
//            $this->load->view('User/clientDashboard');
            redirect(base_url().'ClientDocument');
        } else {
            $this->session->set_flashdata('ClientLoginError', 'Please verify the entered email id and password');
            redirect(base_url() . 'Welcome');
        }
    }
}