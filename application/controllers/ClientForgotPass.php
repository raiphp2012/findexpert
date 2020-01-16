<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Avinash Raj
 */

class ClientForgotPass extends CI_Controller {

    public function clientChangePassword()
    {
        $clientOldPassword = $this->input->post('clientOldPassword');
        $clientNewPassword = $this->input->post('clientNewPassword');
        $personalData['clientConfirmPassword'] = $this->input->post('clientConfirmPassword');
        $this->load->model('SaveClientDetailsModel');
        if($personalData['clientNewPassword']==$personalData['clientConfirmPassword'])
        {

        $clientId = $this->SaveClientDetailsModel->checkClientInformation($personalData);
        print_r($personalData);
        exit();
        }


    }

    public function clientPasswordRecover() {
        $personalData['clientEmailId'] = $this->input->post('clientEmailId');
        $personalData['clientMobileNumber'] = $this->input->post('clientMobileNumber');
        
        $this->load->model('SaveClientDetailsModel');
        $clientId = $this->SaveClientDetailsModel->checkClientInformation($personalData);
        if ($clientId == -1) 
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
          
        if($this->SaveClientDetailsModel->updateClientPassword($personalData['clientEmailId'],md5($password)) == 1)
        {       
           
//            To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($personalData['clientEmailId']);
            $data = array(
                'clientName' => $personalData['clientName'],
                'clientEmail' => $personalData['clientEmailId'],
                'clientPassword' => $password,
                'url' => 'http://visheshagya.in/Client'
            );
            $this->email->subject('Reset Visheshagya Password');
            $body = $this->load->view('emails/clientResetPassword.php', $data, TRUE);
            $this->email->message($body);
            /*
             * To SEND SMS
             */
            $clientMobileNumber= $personalData['clientMobileNumber'];
		$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
		$msg="Your Password reset Successfully. Your password is $password  has been sent to your registered email Id. Kindly check your junk & spam folder also. Please login to http://visheshagya.in/";
		$json = file_get_contents($url.urlencode($msg));
	    	$output = json_decode($json, TRUE);
            
            

            if (!$this->email->send()) {
//                echo"<script>alert('Email not sent')";
//                exit;
            }
            $this->session->set_flashdata('clientResetPasswordSuccess', 'Your password has been  successfully changed. please check your email for the new password');
            redirect(base_url() . 'ClientHome');
        } else {
            $this->session->set_flashdata('clientResetPasswordError', 'Your email id and mobile number combination is not found in our system. Please re-check');
            redirect(base_url() . 'ClientHome');
        }
    }
     else {
            $this->session->set_flashdata('clientResetPasswordError', 'Your email id and mobile number combination is not found in our system. Please re-check');
            redirect(base_url() . 'ClientHome');
        }
}
}