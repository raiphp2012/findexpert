<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class Expert extends CI_Controller {

    function __construct() {
        parent::__construct();
         $this->load->model('user');
        $this->load->library('form_validation');
    }

    function mainexpertHome()
    {
      $this->load->view('ExpertHomeView');
    } 

    function index() {
         if (null != $this->session->userdata('expertId')) {
             
            $this->load->model('FetchDefaultValuesModel');
                $expertPersonalData['expertPersonalDetails'] = $this->FetchDefaultValuesModel->fetchPersonalDetails($this->session->userdata('expertId'));

                 $this->load->view('ExpertPersonalDetails_view', $expertPersonalData);
                /*if($expertPersonalData['expertPersonalDetails']->expertMobileNumber ==0)
                    {
                     //echo "Hi";
                     
                          $this->load->view('ExpertPersonalDetails_view', $expertPersonalData);
                          
                    }
                 
                 else{
                     echo "Hi1";
                     exit();
                    redirect(base_url() . 'ExpertProfile');
                   
                 }
                  
                  */
            //redirect(base_url() . 'ExpertProfile');
        }
      // $this->load->view('ExpertHome_view');
        else{

            $this->load->view('UpdateExpertHome_view');

        }
        
        
    }

    function checkExpertLogin() {
        $this->form_validation->set_rules('expertEmailId', 'email Id is required', 'required');
        $this->form_validation->set_rules('expertPassword', 'required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
        $expertEmailId = $this->input->post('expertEmailId');
        $expertPassword = $this->input->post('expertPassword');
        $this->load->model('Loginmodel');
       $data = $this->Loginmodel->validateExpertLogin($expertEmailId, md5($expertPassword));
         $expertId=$data->expertId;
        $parent_id=$data->parent_id;
        $status=$data->status;
        

        if ($expertId > 0) {
           $this->session->set_userdata('expertId', $expertId);
            $this->session->set_userdata('parent_id', $parent_id);
            $this->session->set_userdata('isExpertVerified',0);
            $this->session->set_userdata('status',$status);
            $_SESSION['userid']="1".$expertId;
            setcookie('cc_data', $expertId, time() + (86400 * 30), "/");
            setcookie('cc_role', '1', time() + (86400 * 30), "/");
            setcookie('cc_email', $expertEmailId, time() + (86400 * 30), "/");
            $this->session->set_userdata('isExpertLoggedIn', true);
            redirect(base_url() . 'ExpertProfile');
        } else {
            $this->session->set_flashdata('expertLoginError', 'Email and password combnation not found in our records. Please recheck');
            redirect(base_url() . 'Expert');
        }
    }

}