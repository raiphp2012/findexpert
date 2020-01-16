<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertProfile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //function inside autoloaded helper, check if user is logged in, if not redirects to login page
        isExpertLoggedIn();
    }
    
     function import()
    {

    if (isset($_POST['Import'])) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['file']['name'] ." uploaded successfully." . "</h1>";
        echo "<h2>Displaying contents:</h2>";
        readfile($_FILES['file']['tmp_name']);

        }
        //exit();
        $handle = fopen($_FILES['file']['tmp_name'], "r");
        $i=0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            if($i==0)
            {
                $i++;
                continue;
            }
        $length = 8;
        $alphabets = range('A', 'Z');
        $smallAlphabets = range('a', 'z');
        $numbers = range('0', '9');
        $additional_characters = array('_', '@', '$', '#');
        $final_array = array_merge($alphabets, $numbers, $additional_characters, $smallAlphabets);
        $password ='';

        while ($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }
            $personalData['clientName'] = $data[0];
            $personalData['clientEmailId'] = $data[1];
            $clientEmailId=$data[1];
            $personalData['clientMobileNumber'] = $data[2];
            $personalData['expertId'] = $this->session->userdata('expertId');
            $personalData['clientPassword'] = md5($password);
            //echo "<pre>";
            $this->load->model('SaveClientDetailsModel');
            $clientId = $this->SaveClientDetailsModel->saveClientSignUpInformation($personalData);
            if ($clientId > 0) {
                $personalFolder = "clientdocuments/" . $clientId . "/personal";
                $expertFolder = "clientdocuments/" . $clientId . "/expert";

                if (!is_dir($personalFolder)) { 
                //create the Personal folder if it's not already exists
                    mkdir($personalFolder, 0777, TRUE);
                    mkdir($expertFolder, 0777, TRUE);
                }
            //    To send email
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
        $clientMobileNumber= $personalData['clientMobileNumber'];
        $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
        $msg="Thank you for signing with Visheshagya,Services Redefined. Your password has been sent to your registered email Id.Email Id=$clientEmailId and Password: $password Kindly check your junk & spam folder also. Please login to http://visheshagya.in/";
        $json = file_get_contents($url.urlencode($msg));
            $output = json_decode($json, TRUE);
            if (!$this->email->send()) {
                    $this->session->set_flashdata('clientSignUpError', 'Email could not be sent');
                   
                }
       
    }
    }
    fclose($handle);
    $this->session->set_flashdata('uploadedSuccess', 'uploaded successfully.');
    redirect(base_url() . 'MyOffice');
}


}


    function index() {
        $this->load->model('FetchDefaultValuesModel');
        $expertPersonalData['expertPersonalDetails'] = $this->FetchDefaultValuesModel->fetchPersonalDetails($this->session->userdata('expertId'));
        $this->session->set_userdata('expertMobileNumber',$expertPersonalData['expertPersonalDetails']->expertMobileNumber);
         $location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
        $expertPersonalData['location_list'] = $location_list;
        $this->load->view('ExpertPersonalDetails_view', $expertPersonalData);
    }

    function professional() {
        $this->load->model('Expertdetailsmodel');
        $professionalData['expertCategories'] = $this->Expertdetailsmodel->fetchExpertCategory();

        $this->load->model('FetchDefaultValuesModel');
        $professionalData['expertProfessionalDetails'] = $this->FetchDefaultValuesModel->fetchExpertProfessionalDetails($this->session->userdata('expertId'));
        $professionalData['expertExistingSubCategoryDetails'] = $this->FetchDefaultValuesModel->fetchExpertSubCategoriesDetails($this->session->userdata('expertId'));

        $this->load->view('Expert_professional_detail_view', $professionalData);
    }

    function consulting() {
        $this->load->model('FetchDefaultValuesModel');
        $consultationData = $this->FetchDefaultValuesModel->fetchConsultationData($this->session->userData('expertId'));
        $consultationExpertData = $consultationData['consultationData'];
        $consultationTypes = $consultationData['consultationTypes'];

        for ($j = 0; $j < sizeof($consultationTypes); $j++) {
            for ($i = 0; $i < sizeof($consultationExpertData); $i++) {
                if ($consultationTypes[$j]->consultationTypeId == $consultationExpertData[$i]->consultationTypeId) {
                    $consultationTypes[$j]->consultationFees = $consultationData['consultationData'][$i]->consultationFees;
                    $consultationTypes[$j]->consultationActiveStatus = $consultationData['consultationData'][$i]->isActive;
                }
            }
        }
        $consultationData['consultationTypes'] = "";
        $consultationData['consultationTypes'] = $consultationTypes;
        $this->load->view('Consulting_view', $consultationData);
    }

    function calendar() {
       

        $this->load->model('FetchDefaultValuesModel');
        //$consultationData = $this->FetchDefaultValuesModel->fetchConsultationTime($this->session->userData('expertId'));
        $access_token = $this->session->userdata('access_token');
        $expertId = $this->session->userData('expertId');
        $data['expertId'] = $expertId;
        $email = $_COOKIE['cc_email'];
        $data['email'] = $email;

         $calendar_id = $email;
          $max_results = 1000;
            $url = 'https://www.googleapis.com/calendar/v3/calendars/'.$calendar_id.'/events?showDeleted=false&$orderBy=email&maxResults='.$max_results.'&alt=json&v=3.0&oauth_token='.$access_token;
            $google_events = json_decode(file_get_contents($url), true);

          $event_list = $google_events['items'];
        //  echo "<pre>";print_r($event_list);exit;
          $data['event_list'] = $event_list;
        $this->load->view('calendar', $data);
    }

    function accounts() {
        $this->load->model('FetchDefaultValuesModel');
        $accountData = $this->FetchDefaultValuesModel->fetchAccountDetails($this->session->userData('expertId'));
        $this->load->view('ExpertAccounts_view', $accountData);
    }

    function addProfessionalDetails() {
        $target_dir = 'expertdocuments/' . $this->session->userdata('expertId') . '/professional/';
        $target_file = $target_dir . basename($_FILES["expertProfessionalFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
            echo "Sorry, only Image/PDF/Word files are allowed.";
            $uploadOk = 0;
        }

        // Check if $upload Ok is set to 0 by an error

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["expertProfessionalFile"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["expertProfessionalFile"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $professionalData['expertCategoryId'] = $this->input->post('categoryId');
        $professionalData['expertMembershipNumber'] = $this->input->post('expertMembershipNumber');
        $professionalData['expertProfessionalCareerStartYear'] = $this->input->post('expertProfessionalCareerStartYear');
        $professionalData['expertInstituteName'] = $this->input->post('expertInstituteName');
        $professionalData['subCategoryId'] = $this->input->post('subCategoryId');
        $professionalData['expertImageName'] = $target_file;

        $this->load->model('SaveExpertDetailsModel');

        if ($this->SaveExpertDetailsModel->saveExpertProfessionalInformation($professionalData)) {
            $this->session->set_flashdata('AddProfessionalDetailsSuccess', 'Your Professional details have been saved');
            redirect(base_url() . 'ExpertProfile/professional');
        } else {
            echo "insert failed";
        }
    }

    function updateProfessionalDetails() {

        if (file_exists($_FILES["expertProfessionalFile"]["tmp_name"])) {
            $target_dir = 'expertdocuments/' . $this->session->userdata('expertId') . '/professional/';
            $target_file = $target_dir . basename($_FILES["expertProfessionalFile"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
                echo "Sorry, only Image/PDF/Word files are allowed.";
                $uploadOk = 0;
            }

            // Check if $upload Ok is set to 0 by an error

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["expertProfessionalFile"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["expertProfessionalFile"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            $professionalData['expertImageName'] = $target_file;
        }

        $professionalData['expertCategoryId'] = $this->input->post('categoryId');
        $professionalData['expertMembershipNumber'] = $this->input->post('expertMembershipNumber');
        $professionalData['expertProfessionalCareerStartYear'] = $this->input->post('expertProfessionalCareerStartYear');
        $professionalData['expertInstituteName'] = $this->input->post('expertInstituteName');
        $professionalData['subCategoryId'] = $this->input->post('subCategoryId');
        $professionalData['expertProfessionalDetailsId'] = $this->input->post('expertProfessionalDetailsId');

        $this->load->model('SaveExpertDetailsModel');

        if ($this->SaveExpertDetailsModel->updateExpertProfessionalInformation($professionalData)) {
            $this->session->set_flashdata('expertSignUpSuccess', 'Your details have been updated');
            redirect(base_url() . 'ExpertProfile/professional');
        } else {
            echo "insert failed";
        }
    }

    function updatePersonalDetails() {
        
        $target_dir = 'expertdocuments/' . $this->session->userdata('expertId') . '/personal/';
        $pan_file = $target_dir . basename($_FILES["expertPanNumberImageName"]["name"]);
        $expertProfileImageName = 'expertdocuments/' . $this->session->userdata('expertId') . '/personal/' . basename($_FILES["expertProfileImageName"]["name"]);
        $address_file = $target_dir . basename($_FILES["expertAddressProofImageName"]["name"]);
        if (!file_exists($_FILES['expertProfileImageName']['tmp_name']) || !is_uploaded_file($_FILES['expertProfileImageName']['tmp_name'])) {
            
        } else {
            $personalData['expertProfileImageName'] = $expertProfileImageName;

	move_uploaded_file($_FILES["expertProfileImageName"]["tmp_name"], $expertProfileImageName);
        }
        if (!file_exists($_FILES['expertAddressProofImageName']['tmp_name']) || !is_uploaded_file($_FILES['expertAddressProofImageName']['tmp_name'])) {
            
        } else {
            $addressData['expertAddressProofImageName'] = $address_file;
        }
        if (!file_exists($_FILES['expertPanNumberImageName']['tmp_name']) || !is_uploaded_file($_FILES['expertPanNumberImageName']['tmp_name'])) {
            
        } else {
            $personalData['expertPanNumberImageName'] = $pan_file;
        }
        $uploadOk = 1;
        $panFileType = pathinfo($pan_file, PATHINFO_EXTENSION);
        $addressFileType = pathinfo($address_file, PATHINFO_EXTENSION);
        if ($panFileType != "jpg" && $panFileType != "png" && $panFileType != "jpeg" && $panFileType != "pdf" && $panFileType != "doc" && $panFileType != "docx" && $addressFileType != "jpg" && $addressFileType != "png" && $addressFileType != "jpeg" && $addressFileType != "pdf" && $addressFileType != "doc" && $addressFileType != "docx") {
//            echo "Sorry, only Image/PDF/Word files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["expertPanNumberImageName"]["tmp_name"], $pan_file)) {
                echo "The file " . basename($_FILES["expertPanNumberImageName"]["name"]) . " has been uploaded.";
            } else {
//                echo "Sorry, there was an error uploading your file.";
            }
        }
        if ($addressFileType != "jpg" && $addressFileType != "png" && $addressFileType != "jpeg" && $addressFileType != "pdf" && $addressFileType != "doc" && $addressFileType != "docx" && $addressFileType != "jpg" && $addressFileType != "png" && $addressFileType != "jpeg" && $addressFileType != "pdf" && $addressFileType != "doc" && $addressFileType != "docx") {
//            echo "Sorry, only Image/PDF/Word files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["expertAddressProofImageName"]["tmp_name"], $address_file)) {
//                echo "The file " . basename($_FILES["expertAddressProofImageName"]["name"]) . " has been uploaded.";
            } else {
//                echo "Sorry, there was an error uploading your file.";
            }
        }

        $personalData['locationId'] = $this->input->post('locationId');
        $personalData['expertName'] = $this->input->post('expertName');
        $personalData['expertEmailId'] = $this->input->post('expertEmailId');
        $personalData['expertMobileNumber'] = $this->input->post('expertMobileNumber');
        $personalData['expertGender'] = $this->input->post('expertGender');
        $personalData['expertDOB'] = $this->input->post('expertDOB');
        $personalData['expertPanNumber'] = $this->input->post('expertPanNumber');


        $addressData['expertAddressLine1'] = $this->input->post('expertAddressLine1');
        $addressData['expertAddressLine2'] = $this->input->post('expertAddressLine2');

        $addressData['expertCity'] = $this->input->post('expertCity');
        $addressData['expertCountry'] = $this->input->post('expertCountry');
        $addressData['expertPincode'] = $this->input->post('expertPincode');
        $personalData['expertProfileSummary'] = $this->input->post('expertProfileSummary');

        $this->load->model('SaveExpertDetailsModel');
        $updateValue = $this->SaveExpertDetailsModel->updateAndSaveExpertPersonalData($personalData, $addressData, $this->session->userdata('expertId'));
        if ($updateValue == 1) {
            $this->session->set_flashdata('personalDetailsUpdateMessage', 'The personal details have been updated successfully');
        } else {
            $this->session->set_flashdata('personalDetailsErrorMessage', 'The personal details could not be updated');
        }
        redirect(base_url() . 'ExpertProfile');
    }

    function updateConsultationDetails() {
        $this->load->model('SaveExpertDetailsModel');
        $consultationUpdateData['consultationTypeId'] = $this->input->post('consultationTypeId');
        $consultationUpdateData['consultationFees'] = $this->input->post('consultationFees');
        $consultationUpdateData['isActive'] = array();
        $consultationUpdateData['expertId'] = array();
        for ($i = 0; $i < sizeof($this->input->post('consultationTypeId')); $i++) {
            if ((null != $this->input->post("isActive$i"))) {
                $consultationUpdateData['isActive'][$i] = 1;
                $consultationUpdateData['expertId'][$i] = $this->session->userdata('expertId');
            } else {
                $consultationUpdateData['isActive'][$i] = 0;
                $consultationUpdateData['expertId'][$i] = $this->session->userdata('expertId');
            }
        }
        $updateStatus = $this->SaveExpertDetailsModel->updateConsultationDetails($consultationUpdateData);
        if ($updateStatus == 1) {
            $this->session->set_flashdata('consultationDetailsUpdateSatatus', 'Consultation details have been updated successfully');
            redirect(base_url() . 'ExpertProfile/consulting');
        }
    }

   function updateConsultationTimings()
    {
	 if (!empty(trim($this->input->post('mondayStart')))) {
    
	$consultationTimingData['mondayStart'] =(trim($this->input->post('mondayStart')) == "" ) ? '': date("H:i", strtotime($this->input->post('mondayStart')));
}
	if (!empty(trim($this->input->post('mondayEnd')))) {
    
    $consultationTimingData['mondayEnd'] =(trim($this->input->post('mondayEnd'))=="") ? '': date("H:i", strtotime($this->input->post('mondayEnd')));
}
if (!empty(trim($this->input->post('mondayStart_slot1')))) {
    
	$consultationTimingData['mondayStart_slot1'] =(trim($this->input->post('mondayStart_slot1')) == "" ) ? '': date("H:i", strtotime($this->input->post('mondayStart_slot1')));
}
	if (!empty(trim($this->input->post('mondayEnd_slot1')))) {
    
    $consultationTimingData['mondayEnd_slot1'] =(trim($this->input->post('mondayEnd_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('mondayEnd_slot1')));
}
if (!empty(trim($this->input->post('mondayStart_slot2')))) {
    
	$consultationTimingData['mondayStart_slot2'] =(trim($this->input->post('mondayStart_slot2')) == "" ) ? '': date("H:i", strtotime($this->input->post('mondayStart_slot2')));
}
	if (!empty(trim($this->input->post('mondayEnd_slot2')))) {
    
    $consultationTimingData['mondayEnd_slot2'] =(trim($this->input->post('mondayEnd_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('mondayEnd_slot2')));
}
//------------------------------------------------
	if (!empty(trim($this->input->post('tuesdayStart')))) {
    
	$consultationTimingData['tuesdayStart'] =(trim($this->input->post('tuesdayStart')) == "" ) ? '': date("H:i", strtotime($this->input->post('tuesdayStart')));
}
	if (!empty(trim($this->input->post('tuesdayEnd')))) {
    
    $consultationTimingData['tuesdayEnd'] =(trim($this->input->post('tuesdayEnd'))=="") ? '': date("H:i", strtotime($this->input->post('tuesdayEnd')));
}
if (!empty(trim($this->input->post('tuesdayStart_slot1')))) {
    
	$consultationTimingData['tuesdayStart_slot1'] =(trim($this->input->post('tuesdayStart_slot1')) == "" ) ? '': date("H:i", strtotime($this->input->post('tuesdayStart_slot1')));
}
	if (!empty(trim($this->input->post('tuesdayEnd_slot1')))) {
    
    $consultationTimingData['tuesdayEnd_slot1'] =(trim($this->input->post('tuesdayEnd_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('tuesdayEnd_slot1')));
}
if (!empty(trim($this->input->post('tuesdayStart_slot2')))) {
    
	$consultationTimingData['tuesdayStart_slot2'] =(trim($this->input->post('tuesdayStart_slot2')) == "" ) ? '': date("H:i", strtotime($this->input->post('	tuesdayStart_slot2')));
}
	if (!empty(trim($this->input->post('tuesdayEnd_slot2')))) {
    
    $consultationTimingData['tuesdayEnd_slot2'] =(trim($this->input->post('tuesdayEnd_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('tuesdayEnd_slot2')));
}
	//------------------------------------------------
	if (!empty(trim($this->input->post('wednesdayStart')))) {
    # code...
    $consultationTimingData['wednesdayStart'] =(trim($this->input->post('wednesdayStart'))=="") ? '': date("H:i", strtotime($this->input->post('wednesdayStart')));
}
	if (!empty(trim($this->input->post('wednesdayEnd')))) {
    
    $consultationTimingData['wednesdayEnd'] = (trim($this->input->post('wednesdayEnd'))=="") ? '':date("H:i", strtotime($this->input->post('wednesdayEnd')));
}
if (!empty(trim($this->input->post('wednesdayStart_slot1')))) {
    # code...
    $consultationTimingData['wednesdayStart_slot1'] =(trim($this->input->post('wednesdayStart_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('wednesdayStart_slot1')));
}
	if (!empty(trim($this->input->post('wednesdayEnd_slot1')))) {
    
    $consultationTimingData['wednesdayEnd_slot1'] = (trim($this->input->post('wednesdayEnd_slot1'))=="") ? '':date("H:i", strtotime($this->input->post('wednesdayEnd_slot1')));
}
if (!empty(trim($this->input->post('wednesdayStart_slot2')))) {
    # code...
    $consultationTimingData['wednesdayStart_slot2'] =(trim($this->input->post('wednesdayStart_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('wednesdayStart_slot2')));
}
	if (!empty(trim($this->input->post('wednesdayEnd_slot2')))) {
    
    $consultationTimingData['wednesdayEnd_slot2'] = (trim($this->input->post('wednesdayEnd_slot2'))=="") ? '':date("H:i", strtotime($this->input->post('wednesdayEnd_slot2')));
}
//---------------------------------------------------
if (!empty(trim($this->input->post('thursdayStart')))) {
    # code...
	$consultationTimingData['thursdayStart'] =(trim($this->input->post('thursdayStart'))=="") ? '': date("H:i", strtotime($this->input->post('thursdayStart')));
}
if (!empty(trim($this->input->post('thursdayEnd')))) {
    # code...
	$consultationTimingData['thursdayEnd'] =(trim($this->input->post('thursdayEnd'))=="") ? '': date("H:i", strtotime($this->input->post('thursdayEnd')));
}
//---------------------------------------------------
if (!empty(trim($this->input->post('thursdayStart_slot1')))) {
    # code...
	$consultationTimingData['thursdayStart_slot1'] =(trim($this->input->post('thursdayStart_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('thursdayStart_slot1')));
}
if (!empty(trim($this->input->post('thursdayEnd_slot1')))) {
    # code...
	$consultationTimingData['thursdayEnd_slot1'] =(trim($this->input->post('thursdayEnd_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('thursdayEnd_slot1')));
}
//---------------------------------------------------
if (!empty(trim($this->input->post('thursdayStart_slot2')))) {
    # code...
	$consultationTimingData['thursdayStart_slot2'] =(trim($this->input->post('thursdayStart_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('thursdayStart_slot2')));
}
if (!empty(trim($this->input->post('thursdayEnd_slot2')))) {
    # code...
	$consultationTimingData['thursdayEnd_slot2'] =(trim($this->input->post('thursdayEnd_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('thursdayEnd_slot2')));
}
//--------------------------------------------------
if (!empty(trim($this->input->post('fridayStart')))) {
    # code...
	$consultationTimingData['fridayStart'] =(trim($this->input->post('fridayStart'))=="") ? '' : date("H:i", strtotime($this->input->post('fridayStart')));
}
    
if (!empty(trim($this->input->post('fridayEnd')))) {
    # code...
	$consultationTimingData['fridayEnd'] =(trim($this->input->post('fridayEnd'))=="") ? '': date("H:i", strtotime($this->input->post('fridayEnd')));
}
//------------------------------------------------
if (!empty(trim($this->input->post('fridayStart_slot1')))) {
    # code...
	$consultationTimingData['fridayStart_slot1'] =(trim($this->input->post('fridayStart_slot1'))=="") ? '' : date("H:i", strtotime($this->input->post('fridayStart_slot1')));
}
    
if (!empty(trim($this->input->post('fridayEnd_slot1')))) {
    # code...
	$consultationTimingData['fridayEnd_slot1'] =(trim($this->input->post('fridayEnd_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('fridayEnd_slot1')));
}
//----------------------------------
if (!empty(trim($this->input->post('fridayStart_slot2')))) {
    # code...
	$consultationTimingData['fridayStart_slot2'] =(trim($this->input->post('fridayStart_slot2'))=="") ? '' : date("H:i", strtotime($this->input->post('fridayStart_slot2')));
}
    
if (!empty(trim($this->input->post('fridayEnd_slot2')))) {
    # code...
	$consultationTimingData['fridayEnd_slot2'] =(trim($this->input->post('fridayEnd_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('fridayEnd_slot2')));
}
//-------------------------------------------
if (!empty(trim($this->input->post('saturdayStart')))) {
    # code...
	$consultationTimingData['saturdayStart'] =(trim($this->input->post('saturdayStart'))=="") ? '': date("H:i", strtotime($this->input->post('saturdayStart')));
}
if (!empty(trim($this->input->post('saturdayEnd')))) {
    # code...
	$consultationTimingData['saturdayEnd'] =(trim($this->input->post('saturdayEnd'))=="") ? '': date("H:i", strtotime($this->input->post('saturdayEnd')));
}
//--------------------------
if (!empty(trim($this->input->post('saturdayStart_slot1')))) {
   
	$consultationTimingData['saturdayStart_slot1'] =(trim($this->input->post('saturdayStart_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('saturdayStart_slot2')));
}
if (!empty(trim($this->input->post('saturdayEnd_slot1')))) {
    
	$consultationTimingData['saturdayEnd_slot1'] =(trim($this->input->post('saturdayEnd_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('saturdayEnd_slot1')));
}
//----------------------------
if (!empty(trim($this->input->post('saturdayStart_slot2')))) {
    # code...
	$consultationTimingData['saturdayStart_slot2'] =(trim($this->input->post('saturdayStart_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('saturdayStart_slot2')));
}
if (!empty(trim($this->input->post('saturdayEnd_slot2')))) {
    # code...
	$consultationTimingData['saturdayEnd_slot2'] =(trim($this->input->post('saturdayEnd_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('saturdayEnd_slot2')));
}
//---------------------------
if (!empty(trim($this->input->post('sundayStart')))) {
    # code...
	$consultationTimingData['sundayStart'] = (trim($this->input->post('sundayStart'))=="") ? '': date("H:i", strtotime($this->input->post('sundayStart')));
}
	if (!empty(trim($this->input->post('sundayEnd')))) {
    
    $consultationTimingData['sundayEnd'] = (trim($this->input->post('sundayEnd'))=="") ? '':date("H:i", strtotime($this->input->post('sundayEnd')));
}
//---------------------
if (!empty(trim($this->input->post('sundayStart_slot1')))) {
    # code...
	$consultationTimingData['sundayStart_slot1'] = (trim($this->input->post('sundayStart_slot1'))=="") ? '': date("H:i", strtotime($this->input->post('sundayStart_slot1')));
}
	if (!empty(trim($this->input->post('sundayEnd_slot1')))) {
    
    $consultationTimingData['sundayEnd_slot1'] = (trim($this->input->post('sundayEnd_slot1'))=="") ? '':date("H:i", strtotime($this->input->post('sundayEnd_slot1')));
}
//------------------------------------
if (!empty(trim($this->input->post('sundayStart_slot2')))) {
    # code...
	$consultationTimingData['sundayStart_slot2'] = (trim($this->input->post('sundayStart_slot2'))=="") ? '': date("H:i", strtotime($this->input->post('sundayStart_slot2')));
}
	if (!empty(trim($this->input->post('sundayEnd_slot2')))) {
    
    $consultationTimingData['sundayEnd_slot2'] = (trim($this->input->post('sundayEnd_slot2'))=="") ? '':date("H:i", strtotime($this->input->post('sundayEnd_slot2')));
}
//---------------------------------
        $consultationTimingData['startDate'] = $this->input->post('startDate');
        $consultationTimingData['endDate'] = $this->input->post('endDate');

       // print_r($consultationTimingData);
       // exit;
        $this->load->model('SaveExpertDetailsModel');
        $saveConsultation = $this->SaveExpertDetailsModel->saveExpertConsultationTimings($consultationTimingData);
        if($saveConsultation)
        {
            $this->session->set_flashdata('consultationDetailsSuccess','Consultation timing details have been updated');
            redirect(base_url().'ExpertProfile/calendar');
        }
    }
    function updateBankAccountDetails() {

        $BankAccountDetails['accountNumber'] = $this->input->post('accountNumber');
        $BankAccountDetails['ifscCode'] = $this->input->post('ifscCode');
        $BankAccountDetails['bankName'] = $this->input->post('bankName');
        $BankAccountDetails['micrCode'] = $this->input->post('micrCode');
        $BankAccountDetails['nameAsPerRecords'] = $this->input->post('nameAsPerRecords');
        $BankAccountDetails['bankAddress'] = $this->input->post('bankAddress');
        $BankAccountDetails['accountType'] = $this->input->post('accountType');
        $this->load->model('SaveExpertDetailsModel');
        $saveBankAccountDetails = $this->SaveExpertDetailsModel->saveExpertBankAccountDetails($BankAccountDetails);

        if ($saveBankAccountDetails) {
            $this->session->set_flashdata('BankAccountDetailsSuccess', 'Bank Account details have been updated');
            redirect(base_url() . 'ExpertProfile/accounts');
        }
    }
    function updateMyMember()
    {
        
        if($this->session->userdata('parent_id')==0){
        $this->load->model('FetchDefaultValuesModel');
        $expertPersonalData['expertPersonalDetails'] = $this->FetchDefaultValuesModel->fetchMemberDetails($this->session->userdata('expertId'));
        $this->load->view('ExpertTeamDetails_view',$expertPersonalData);
        }
        else {
             redirect(base_url() . 'ExpertProfile');
        
        }
         
        
    }
    function addMemberDetails()
    {
        $personalData['expertName'] = $this->input->post('expertName');
        $personalData['expertEmailId'] = $this->input->post('expertEmailId');
        $personalData['expertMobileNumber'] = $this->input->post('expertMobileNumber');
        $personalData['registered_date'] = date('Y-m-d H:i:s');
        $personalData['userType'] = "Team-Memeber";
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
        $personalData['expertPassword'] = md5($password);
        $personalData['parent_id'] = $this->session->userdata('expertId');
        $personalData['status'] = 'active';
       if($this->db->insert('expert_personal_details', $personalData))
       {
           
           $expertId = $this->db->insert_id();
            $addressData['expertId'] = $expertId;
            $this->db->insert('expert_address_details', $addressData);
        // To send email
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
            $expertMobileNumber= $personalData['expertMobileNumber'];
            $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $msg="Thank you for signing with Visheshagya, Services Redefined. Your password is".$password.". Please login to http://visheshagya.in/";
            $json = file_get_contents($url.urlencode($msg));
                $output = json_decode($json, TRUE);
				
				 
              
            $this->session->set_flashdata('expertSignUpSuccess', 'You have been registerd successfully please check your email for the login credentials');
       }
       redirect(base_url() . 'ExpertProfile/updateMyMember');
        
    }
    function UpdateMemberDetails()
    {
        
        $expertId = $this->input->post('ExpertId');
		if($this->input->post('updateExpertPassword') != '')
		{
		$personalData['expertPassword'] = $this->input->post('updateExpertPassword');
		}
        $personalData['expertName'] = $this->input->post('updateExpertName');
        //$personalData['expertEmailId'] = $this->input->post('updateExpertEmailId');
        $personalData['expertMobileNumber'] = $this->input->post('updateExpertMobileNumber');
        $personalData['status'] = $this->input->post('status');   
        $this->load->model('SaveExpertDetailsModel');
         if ($this->SaveExpertDetailsModel->update_teamMember_data($expertId,$personalData)) {
			
            $this->session->set_flashdata('TeamMemberDetailsSuccess', 'Team Member details have been saved');
            
        } else {
            $this->session->set_flashdata('TeamMemberDetailsSuccess', 'Sorry.Team Member details  is not saved.');
            
        }
         redirect(base_url() . 'ExpertProfile/updateMyMember');
        
        
    }

    

public function edit_event($event_id) {
    $event_id = $this->input->post('event_id');
    if($event_id != ''){
    $appointment_detail = $this->db->query("SELECT * FROM appointment_details WHERE event_id = '".$event_id."'")->row();
   echo @json_encode($appointment_detail);
   exit;
}
    }

    public function reschedule_appointment()
    {

        $consultationDateValue = $this->input->post('consultationDateValue');
        $slots = $this->input->post('slots');
        $event_id = $this->input->post('event_id');
        if($event_id != '' && $slots != '' && $consultationDateValue != '')
        {
            $appointment_detail = $this->db->query("SELECT * FROM appointment_details WHERE event_id = '".$event_id."'")->row();


$clientId = $appointment_detail->clientId;

$client_info = $this->db->query("SELECT * FROM client_personal_details WHERE clientId = '".$clientId."'")->row();
$appointmentId = $appointment_detail->appointmentId;
$consultationTypeId = $appointment_detail->consultationTypeId;
if($consultationTypeId == "1"){$consultationType = "Video";}
elseif($consultationTypeId == "2"){$consultationType = "Telephonic";}
elseif($consultationTypeId == "3"){$consultationType = "Personal";}
$appointment_title = "Appointment with ".$client_info->clientName." for ".$consultationType." conversation";

    



            $appointmentStartTime = $slots;
             $appointmentEndTime = date("H:i", strtotime('+30 minutes', strtotime($appointmentStartTime)));
$this->db->query("UPDATE appointment_details SET appointmentDate = '".$consultationDateValue."',appointmentStartTime = '".$appointmentStartTime."',appointmentEndTime = '".$appointmentEndTime."' WHERE event_id = '".$event_id."'");


$access_token = $this->session->userdata('access_token');

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

$APIKEY = 'AIzaSyBFuRrO0yh5OnejCXazIOwAKeZqd2ZqOEQ';

        $event_timezone= $data['value']; 

$calendar_id = $_COOKIE['cc_email'];
 $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events/'.$event_id.'?key=' . $APIKEY;


$curlPost = array();
$curlPost = array('summary' => "Test Appointment");
$start = $consultationDateValue."T".$appointmentStartTime.":00";
$end = $consultationDateValue."T".$appointmentEndTime.":00";
        
         
//echo "<pre>";print_r($curlPost);exit;
    
        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url_events);     
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_POST, 1);      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));   
        $data = (curl_exec($ch));
        



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
   //echo "<pre>";print_r($data);

        $event_id = $data['id'];
    if($event_id != '')
        $this->db->query("UPDATE appointment_details SET event_id = '".$event_id."' WHERE appointmentId = $appointmentId");

echo @json_encode(array("status"=>true));
        } 
    }

public function delete_appointment()
{

$APIKEY = 'AIzaSyBFuRrO0yh5OnejCXazIOwAKeZqd2ZqOEQ';
$access_token = $this->session->userdata('access_token');
$event_id = $this->input->post('event_id');
$calendar_id = $_COOKIE['cc_email'];
 $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events/'.$event_id.'?key=' . $APIKEY;

    $curlPost = array();
    
        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url_events);     
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_POST, 1);      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));   
        $data = (curl_exec($ch));
echo @json_encode(array("status"=>true));
}

public function delete_member()
{
	$expertId = $this->session->userdata('expertId');
	$member_id = $this->input->get('member_id');
	$this->load->model('common');
	$member_info = $this->common->select_scaler_where("expert_personal_details",array("expertId"=>$member_id));
	if($member_info->parent_id == $expertId)
	{
		if($member_id != '')
		{
			$this->common->delete_record("expert_personal_details",array("expertId"=>$member_id));
			$this->common->delete_record("expert_professional_details",array("expertId"=>$member_id));
			$this->common->delete_record("expert_sub_category_mapping",array("expertId"=>$member_id));
			$this->common->delete_record("expert_consultation_details_mapping",array("expertId"=>$member_id));
		}
		redirect(base_url("ExpertProfile/updateMyMember"));
	}
}

public function test()
{
	$result = $this->db->query("SELECT * FROM expert_personal_details_bk")->result();
		foreach($result as $r)
		{
			if($r->expertId != '')
			{
				$this->db->query("UPDATE expert_personal_details SET expertName = '".$r->expertName."',expertMobileNumber = '".$r->expertMobileNumber."',expertPassword = '".$r->expertPassword."',expertEmailId = '".$r->expertEmailId."',status = '".$r->status."' WHERE expertId = '".$r->expertId."'");
			}
		}
}

}