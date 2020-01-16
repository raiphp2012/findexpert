<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertSignup extends CI_Controller {

    public function index() {
        $this->load->model('Expertdetailsmodel');
        $userData['expertCategories'] = $this->Expertdetailsmodel->fetchExpertCategory();
        $location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
        $userData['location_list'] = $location_list;
        $this->load->view('ExpertSignUp_view', $userData);
    }

    public function addExpert() {
//        Password Generator
        $length = 8;
        $alphabets = range('A', 'Z');
        $smallAlphabets = range('a', 'z');
        $numbers = range('0', '9');
        $additional_characters = array('_', '@', '$', '#');
        $final_array = array_merge($alphabets, $numbers, $additional_characters, $smallAlphabets);

        $password = '';

        while ($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }

        $personalData['expertName'] = $this->input->post('expertName');
        $personalData['expertEmailId'] = $this->input->post('expertEmailId');
        $personalData['expertMobileNumber'] = $this->input->post('expertMobileNumber');
         $personalData['locationId'] = $this->input->post('locationId');
        $personalData['expertPassword'] = md5($password);
        $personalData['registered_date'] = date('Y-m-d H:i:s');
         $personalData['userType'] = "Expert";
        $professionalData['expertCategoryId'] = $this->input->post('categoryId');
        $professionalData['expertMembershipNumber'] = $this->input->post('expertMembershipNumber');
        $professionalData['expertProfessionalCareerStartYear'] = $this->input->post('expertProfessionalCareerStartYear');
        $professionalData['expertInstituteName'] = $this->input->post('expertInstitueName');
        $professionalData['subCategoryId'] = $this->input->post('subCategoryId');
        $this->form_validation->set_rules('expertEmailId', 'expertEmailId', 'required|valid_email|is_unique[expert_personal_details.expertEmailId]');
         $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run() == FALSE)
         {
            //$this->session->set_flashdata('expertSignUpError', 'Please Try again');
            redirect(base_url() . 'ExpertSignup');
         }
         else{   
        $this->load->model('SaveExpertDetailsModel');
        $expertId = $this->SaveExpertDetailsModel->saveExpertSignUpInformation($personalData, $professionalData);
        if ($expertId > 0) {
            $personalFolder = "expertdocuments/" . $expertId . "/personal";
            $professionalFolder = "expertdocuments/" . $expertId . "/professional";
            $clientFolder = "expertdocuments/" . $expertId . "/client";

            if (!is_dir($personalFolder)) { //create the Personal folder if it's not already exists
                mkdir($personalFolder, 0777, TRUE);
                mkdir($professionalFolder, 0777, TRUE);
                mkdir($clientFolder, 0777, TRUE);
            }
//            To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($personalData['expertEmailId']);
            $data = array(
                'expertName' => $personalData['expertName'],
                'expertEmail' => $personalData['expertEmailId'],
                'expertPassword' => $password,
                'url' => 'http://visheshagya.in/Expert'
            );
            $this->email->subject('Visheshagya Password');
            $body = $this->load->view('emails/expertSignup.php', $data, TRUE);
            $this->email->message($body);
            /*
             * To SEND SMS
             */
            
/*http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=
7808294271&msg=TestAvinashForSMS&sms_Type=trans*/
           
            $expertMobileNumber= $personalData['expertMobileNumber'];
	$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
	$msg="Thank you for signing with Visheshagya, Services Redefined. Your password has been sent to your registered email Id .Kindly check your junk 
& spam folder also. Please login by using Password $password  to http://visheshagya.in/";
	$json = file_get_contents($url.urlencode($msg));
    	$output = json_decode($json, TRUE);
            
            if (!$this->email->send()) {
//                echo"<script>alert('Email not sent')";
//                exit;
            }
            $this->session->set_flashdata('expertSignUpSuccess', 'You have been registerd successfully please check your email for the login credentials');
            redirect(base_url() . 'Expert');
        } else {
            $this->session->set_flashdata('expertSignUpError', 'Please Try again');
            redirect(base_url() . 'Expert');
        }
    }
    }
}