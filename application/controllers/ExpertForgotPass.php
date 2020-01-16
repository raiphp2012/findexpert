<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Avinash Raj
 */

class ExpertForgotPass extends CI_Controller {

    public function expertChangePassword()
    {
        $expertOldPassword = $this->input->post('expertOldPassword');
        $expertNewPassword = $this->input->post('expertNewPassword');
        $personalData['expertConfirmPassword'] = $this->input->post('expertConfirmPassword');
        $this->load->model('SaveExpertDetailsModel');
        if($personalData['expertNewPassword']==$personalData['expertConfirmPassword'])
        {

        $expertId = $this->SaveExpertDetailsModel->checkExpertInformation($personalData);
        print_r($personalData);
        exit();
        }


    }

    public function expertPasswordRecover() {
        $personalData['expertEmailId'] = $this->input->post('expertEmailId');
        $personalData['expertMobileNumber'] = $this->input->post('expertMobileNumber');
        
        $this->load->model('SaveExpertDetailsModel');
        $expertId = $this->SaveExpertDetailsModel->checkExpertInformation($personalData);
        if ($expertId == -1) 
        {
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
        	$pass = $password;
          
        if($this->SaveExpertDetailsModel->updateExpertPassword($personalData['expertEmailId'],md5($password)) == 1)
        {       
           
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
            $this->email->subject('Reset Visheshagya Password');
            $body = $this->load->view('emails/expertResetPassword.php', $data, TRUE);
            $this->email->message($body);
            /*
             * To SEND SMS
             */
             $expertMobileNumber= $personalData['expertMobileNumber'];
		$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
		$msg="Your Password reset Successfully. Your password has been sent to your registered email Id. Kindly check your junk & spam folder also. Please login to http://visheshagya.in/";
		$json = file_get_contents($url.urlencode($msg));
	    	$output = json_decode($json, TRUE);

            if (!$this->email->send()) {
//                echo"<script>alert('Email not sent')";
//                exit;
            }
            $this->session->set_flashdata('expertResetPasswordSuccess', 'Your password has been  successfully changed. please check your email for the new password');
            redirect(base_url() . 'Expert');
        } else {
            $this->session->set_flashdata('expertResetPasswordError', 'Your email id and mobile number combination is not found in our system. Please re-check');
            redirect(base_url() . 'Expert');
        }
    }
     else {
            $this->session->set_flashdata('expertResetPasswordError', 'Your email id and mobile number combination is not found in our system. Please re-check');
            redirect(base_url() . 'Expert');
        }
}
}