<?php
class ClientHome extends CI_Controller {
  function __construct() {
    parent::__construct();
      //Load user model
      $this->load->model('user');
      $this->load->library('facebook');
  }

  /*function mainHome()
  {
    $this->load->view('clientHomePageView');
  } 
*/
  public function index() 
  {
   // include_once APPPATH."libraries/Facebook.php";
      if (null != $this->session->userdata('clientId')) {
        $this->load->model('clientFetchDefaultValuesModel');
        $clientPersonalData['clientPersonalDetails'] = $this->clientFetchDefaultValuesModel->fetchPersonalDetails($this->session->userdata('clientId'));
        if($clientPersonalData['clientPersonalDetails']->clientMobileNumber ==0){
          $this->load->view('fbClientPersonalDetails_view',$clientPersonalData);
        }else{
          redirect( $this->session->userdata('response'));
        }
      }else{
        $this->load->view('newWelcome');
      }
  }

  public function addClient() {
    //Password Generator
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

    $this->form_validation->set_rules('clientEmailId', 'clientEmailId', 'required|valid_email|is_unique[client_personal_details.clientEmailId]');
    $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('clientLoginError', 'Email Id already exists.');
      redirect(base_url() . 'clientHome');
    }else{
      $personalData['clientName'] = $this->input->post('clientName');
      $personalData['clientEmailId'] = $this->input->post('clientEmailId');
      $personalData['clientMobileNumber'] = $this->input->post('clientMobileNumber');
      $personalData['clientPassword'] = md5($password);
      $this->load->model('SaveClientDetailsModel');
      $clientId = $this->SaveClientDetailsModel->saveClientSignUpInformation($personalData);
      if ($clientId > 0) {
        $personalFolder = "clientdocuments/" . $clientId . "/personal";
        $expertFolder = "clientdocuments/" . $clientId . "/expert";
        if (!is_dir($personalFolder)) { //create the Personal folder if it's not already exists
          mkdir($personalFolder, 0777, TRUE);
          mkdir($expertFolder, 0777, TRUE);
        }
        //To send email
        $this->load->library('email');
        $config['priority'] = 1;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('client@visheshagya.in', 'Team Visheshagya');
        $this->email->to($personalData['clientEmailId']);
        $data = array(
                    'clientName' => $personalData['clientName'],
                    'clientEmail' => $personalData['clientEmailId'],
                    'clientPassword' => $password,
                    'url' => 'http://visheshagya.in/clientHome'
        );
        $this->email->subject('Visheshagya Password');
        $body = $this->load->view('emails/clientSignup.php', $data, TRUE);
        $this->email->message($body);
        /*
        * To SEND SMS
        */
        /* http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=7808294271&msg=TestAvinashForSMS&sms_Type=trans */
        $clientMobileNumber= $personalData['clientMobileNumber'];
    		$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
	      $msg="Thank you for signing with Visheshagya,TAX & LEGAL SERVICES REDEFINED. 
        Your password=$password has been sent to your registered email Id. 
        Kindly check your junk & spam folder also. Please login to http://visheshagya.in/";
	      $json = file_get_contents($url.urlencode($msg));
    	  $output = json_decode($json, TRUE);
        if (!$this->email->send()) {
          $this->session->set_flashdata('clientSignUpError', 'Email could not be sent');
          redirect(base_url() . 'ClientHome');
        }
        $this->session->set_flashdata('clientSignUpSuccess', 'You have been registerd successfully please check your email for the login credentials');
        redirect(base_url() . 'ClientHome');
      } else {
        $this->session->set_flashdata('clientSignUpError', 'Please Try again');
        redirect(base_url() . 'ClientHome');
      }
    }
  }

  public function ClientLogin() {
    $this->form_validation->set_rules('clientEmailId', 'email is required', 'required');
    $this->form_validation->set_rules('clientPassword', 'required');
    $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
    $clientEmailId = $this->input->post('clientEmailId');
    $clientPassword = $this->input->post('clientPassword');
    $frmLoginOfferType = $this->input->post('frmLoginOfferType');
    $this->load->model('clientlogin');
    $clientId = $this->clientlogin->validateClientLogin($clientEmailId, md5($clientPassword));
    //echo $clientId->clientId;exit;
    if ($clientId->clientId > 0) {
      $this->load->library('session');
      $this->session->set_userdata('clientId', $clientId->clientId);
      $_SESSION['userid']="0".$clientId->clientId;
	    setcookie('cc_data', $clientId->clientId, time() + (86400 * 30), "/");
	    setcookie('cc_role', '0', time() + (86400 * 30), "/");
	    setcookie('cc_email', $clientEmailId, time() + (86400 * 30), "/");         
      $this->session->set_userdata('isClientLoggedIn', true);
      //echo $frmLoginOfferType;exit;
      if($clientId->expertId==86)
      {  
        redirect(base_url() . 'Expertdetails/viewProfile/'.$clientId->expertId); 
      }   
      if($clientId->expertId!=86)
      {
        if($frmLoginOfferType ==="normal")
        {
          redirect(base_url() .'Expertdetails');
        } 
        else if($frmLoginOfferType ==="will")
        {
          redirect('Expertdetails/willoffer');
        } 
        else if($frmLoginOfferType ==="ITR")
        {
          redirect('Expertdetails/offer');
        }
        else{
          //echo "here";exit;
          redirect($frmLoginOfferType);
        }
      }  
      // redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('clientLoginError', 'Please enter valid Username and Password.');
      redirect(base_url() . 'clientHome');
    }
  }

    
  public function logout() {
    setcookie('cc_data', 0, time() - (86400 * 30), "/");
    setcookie('cc_role', '0', time() - (86400 * 30), "/");
    setcookie('cc_email', '', time() - (86400 * 30), "/");
    $this->session->unset_userdata('clientId');
    $this->session->sess_destroy();
    redirect(base_url().'clientHome');
  }
  
  public function notfound()
  {
	  $this->load->view('404');
  }


}