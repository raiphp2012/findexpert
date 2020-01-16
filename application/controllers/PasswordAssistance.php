<?php

class PasswordAssistance extends CI_Controller {

    function __construct() {
        parent::__construct();
        //isClientLoggedIn();
        
    }

    function changePassword() {
        
        $existingData = "";
        $NewPassword = md5(trim($this->input->post('NewPassword')));

        if (NULL != $this->session->userdata('expertId')) {
            $expertConfirmPassword = md5(trim($this->input->post('expertConfirmPassword')));
            if ($expertConfirmPassword != $NewPassword) {
                $this->session->set_flashdata('expertChangePasswordError', 'Your New Password and Confirm Password does not match');
                redirect($_SERVER['HTTP_REFERER']);
            }
            $tableName = "expert_personal_details";
            $existingData['expertPassword'] = md5(trim($this->input->post('OldPassword')));
            $existingData['expertId'] = $this->session->userdata('expertId');
        } else if (NULL != $this->session->userdata('clientId')) {
            $clientConfirmPassword = md5(trim($this->input->post('clientConfirmPassword')));
            if ($clientConfirmPassword != $NewPassword) {
                $this->session->set_flashdata('expertChangePasswordError', 'Your New Password and Confirm Password does not match');
                redirect($_SERVER['HTTP_REFERER']);
            }
            $tableName = "client_personal_details";
            $existingData['clientPassword'] = md5(trim($this->input->post('OldPassword')));
            $existingData['clientId'] = $this->session->userdata('clientId');
        }

        $this->load->model('CommonDetailsModel');
        $changePasswordResponse = $this->CommonDetailsModel->changePassword($tableName, $existingData, $NewPassword);
        if ($changePasswordResponse == 1) {
            if (NULL != $this->session->userdata('expertId')) {
                $this->session->set_flashdata('expertChangePasswordSuccess', 'Your password has been successfully changed. please check your email for the new password');
                redirect($_SERVER['HTTP_REFERER']);
            }
            if (NULL != $this->session->userdata('clientId')) {
                $this->session->set_flashdata('clientChangePasswordSuccess', 'Your password has been  successfully changed. please check your email for the new password');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {

            if (NULL != $this->session->userdata('expertId')) {
                $this->session->set_flashdata('expertChangePasswordError', 'Your Old Password is not Match. Please re-check');
                redirect($_SERVER['HTTP_REFERER']);
            }
            if (NULL != $this->session->userdata('clientId')) {
                $this->session->set_flashdata('clientChangePasswordError', 'Your Old Password is not Marth. Please re-check');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}
