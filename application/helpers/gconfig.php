<?php
require_once 'data/apiClient.php';
require_once 'data/contrib/apiOauth2Service.php';
session_start();
$client = new apiClient();
$client->setApplicationName("Login with Google");

$oauth2 = new apiOauth2Service($client);

if (isset($_GET['code'])) {

  $client->authenticate();
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  //header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) 
{
 	$client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) 
{
  unset($_SESSION['token']);
  unset($_SESSION['sessionBrought']);
  $client->revokeToken();
}

if ($client->getAccessToken()) 
{
	$access_token_info = json_decode($client->getAccessToken());
	$access_token=$access_token_info->access_token;

	$CI->session->set_userdata('access_token',$access_token);

		$url_settings = 'https://www.googleapis.com/calendar/v3/users/me/settings/timezone';
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_settings);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	
		$data = json_decode(curl_exec($ch), true); //echo '<pre>';print_r($data);echo '</pre>';exit;
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to get timezone');



		$event_timezone= $data['value']; 

		



  	$validData = $oauth2->userinfo->get();
 	//echo "<pre>";print_r($validData);exit;

$gid = $validData['id'];              
$email = $validData['email']; 
$name = $validData['name']; 
$full_name = explode(' ',$name);
$first_name = $full_name[0];
$last_name = $full_name[1];
$prof_image = $validData['picture']; 



$userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $gid;
            $userData['expertName'] = $first_name." ".$last_name;
            $userData['expertEmailId'] = $email;
            if($validData['gender']=="male")
            {
                $userData['expertGender'] =1;
            }
            if($validData['gender']=="female")
            {
                $userData['expertGender'] =2;
            }
            $userData['expertPersonalIdentificationNumberImageName'] = $gid;
            $userData['expertProfileImageName'] = $prof_image;
            
            $userID = $CI->user->checkExpertUser($userData);
            if(!empty($userID)){
                $data['expertId'] = $userID;
                $CI->session->set_userdata('expertId',$userID);
                $personalFolder = "expertdocuments/" . $userID . "/personal";
                $professionalFolder = "expertdocuments/" . $userID . "/professional";
                $clientFolder = "expertdocuments/" . $userID . "/client";

                 if (!is_dir($personalFolder)) { //create the Personal folder if it's not already exists
                     mkdir($personalFolder, 0777, TRUE);
                     mkdir($professionalFolder, 0777, TRUE);
                     mkdir($clientFolder, 0777, TRUE);
                 }
                 $_SESSION['userid']=$userID;
                    setcookie('cc_data', $userID, time() + (86400 * 30), "/");
                    setcookie('cc_role', '0', time() + (86400 * 30), "/");
                    setcookie('cc_email', $userData['expertEmailId'], time() + (86400 * 30), "/");         
                 $CI->session->set_userdata('isExpertLoggedIn', true);




        $expertId = $userID;

        $appointment_list = $CI->db->query("SELECT * FROM appointment_details WHERE expertId = '".$expertId."' AND event_id = ''")->result();
 $calendar_id = $email;

    foreach($appointment_list as $appointment){

$appointmentId = $appointment->appointmentId;
$appointmentDate = $appointment->appointmentDate;
$appointmentStartTime = $appointment->appointmentStartTime;
$appointmentEndTime = $appointment->appointmentEndTime;
$start = $appointmentDate."T".$appointmentStartTime;
$end = $appointmentDate."T".$appointmentEndTime;

$clientId = $appointment->clientId;

$client_info = $CI->db->query("SELECT * FROM client_personal_details WHERE clientId = '".$clientId."'")->row();

$consultationTypeId = $appointment->consultationTypeId;
if($consultationTypeId == "1"){$consultationType = "Video";}
elseif($consultationTypeId == "2"){$consultationType = "Telephonic";}
elseif($consultationTypeId == "3"){$consultationType = "Personal";}
$appointment_title = "Appointment with ".$client_info->clientName." for ".$consultationType." conversation";

    

		$url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events';

		$curlPost = array('summary' => $appointment_title);


		
			$curlPost['start'] = array('dateTime' => $start, 'timeZone' => $event_timezone);
			$curlPost['end'] = array('dateTime' => $end, 'timeZone' => $event_timezone);


	
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_events);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json'));	
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));	
		$data = json_decode(curl_exec($ch), true);
   

		$event_id = $data['id'];
    if($event_id != '')
		$CI->db->query("UPDATE appointment_details SET event_id = '".$event_id."' WHERE appointmentId = $appointmentId");

}
 

    }
            
     

redirect(base_url("ExpertProfile"));

		

		
  
 

	} 




	
?>