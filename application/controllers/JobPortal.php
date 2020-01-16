<?php

class JobPortal extends CI_Controller{

 function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        if (null != $this->session->userdata('expertId')) {
            redirect(base_url() . 'ExpertProfile');
        }
        $this->load->view('JobPortalHome_view');
    }
    function EmploypeeSignup()
    {
    	echo "EmploypeeSignup";
    	 $this->load->model('Expertdetailsmodel');
        $userData['expertCategories'] = $this->Expertdetailsmodel->fetchExpertCategory();
        $this->load->view('EmployeeSignup_view', $userData);
    }
    function addEmployee()
    {
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
        $personalData['userType'] = $this->input->post('userType');
        $personalData['expertPassword'] = md5($password);
        //-----------------------------------------
        $professionalData['totalYearWorkExperience'] = $this->input->post('totalYearWorkExperience');
        $professionalData['Industry'] = $this->input->post('Industry');
        $professionalData['current_Location'] = $this->input->post('current_Location');
         $personalData['registered_date'] = date('Y-m-d H:i:s');
         if(empty($this->input->post('relocated'))){
         $professionalData['relocated'] =0; 
    	 }
     	else{
     	$professionalData['relocated'] =$this->input->post('relocated');

        }
        $professionalData['expertCategoryId'] = $this->input->post('categoryId');
        $professionalData['expertMembershipNumber'] = $this->input->post('expertMembershipNumber');
        $professionalData['expertProfessionalCareerStartYear'] = 
        $this->input->post('expertProfessionalCareerStartYear');
        $professionalData['expertInstituteName'] = $this->input->post('expertInstitueName');
        $professionalData['subCategoryId'] = $this->input->post('subCategoryId');
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
& spam folder also. Please login to http://visheshagya.in/";
	$json = file_get_contents($url.urlencode($msg));
    	$output = json_decode($json, TRUE);
            
            if (!$this->email->send()) {
//                echo"<script>alert('Email not sent')";
//                exit;
            }
            $this->session->set_flashdata('expertSignUpSuccess', 'You have been registerd successfully please check your email for the login credentials');
            redirect(base_url() . 'JobPortal');
        } else {
            $this->session->set_flashdata('expertSignUpError', 'Please Try again');
            redirect(base_url() . 'JobPortal');
        }

    }
    function checkEmployeeLogin() {
        $this->form_validation->set_rules('expertEmailId', 'email Id is required', 'required');
        $this->form_validation->set_rules('expertPassword', 'required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

        $expertEmailId = $this->input->post('expertEmailId');
        $expertPassword = $this->input->post('expertPassword');
        $userType="employee";

        $this->load->model('Loginmodel');

        $expertId = $this->Loginmodel->validateEmployeeLogin($expertEmailId, md5($expertPassword), $userType);

        if ($expertId > 0) {
            $this->session->set_userdata('expertId', $expertId);
            $_SESSION['userid']="1".$expertId;
            setcookie('cc_data', $expertId, time() + (86400 * 30), "/");
            setcookie('cc_role', '1', time() + (86400 * 30), "/");
            setcookie('cc_email', $expertEmailId, time() + (86400 * 30), "/");
            $this->session->set_userdata('isExpertLoggedIn', true);
            redirect(base_url() . 'JobPortal/AccountView');
        } else {
            $this->session->set_flashdata('expertLoginError', 'Email and password combnation not found in our records. Please recheck');
            redirect(base_url() . 'JobPortal');
        }
    }

    function AccountView()
    {

    	$this->load->model('FetchDefaultValuesModel');
        $expertPersonalData['expertPersonalDetails'] = $this->FetchDefaultValuesModel->fetchPersonalDetails($this->session->userdata('expertId'));
        $this->load->view('EmployeePersonalDetails_view', $expertPersonalData);
    }
    function professional() {
        $this->load->model('Expertdetailsmodel');
        $professionalData['expertCategories'] = $this->Expertdetailsmodel->fetchExpertCategory();

        $this->load->model('FetchDefaultValuesModel');
        $professionalData['expertProfessionalDetails'] = $this->FetchDefaultValuesModel->fetchExpertProfessionalDetails($this->session->userdata('expertId'));
        $professionalData['expertExistingSubCategoryDetails'] = $this->FetchDefaultValuesModel->fetchExpertSubCategoriesDetails($this->session->userdata('expertId'));

        $this->load->view('Employee_professional_detail_view', $professionalData);
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
            redirect(base_url() . 'JobPortal/professional');
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
            redirect(base_url() . 'JobPortal/professional');
        } else {
            echo "insert failed";
        }
    }

    function updatePersonalDetails() {
        
        $target_dir = 'expertdocuments/' . $this->session->userdata('expertId') . '/personal/';
        $pan_file = $target_dir . basename($_FILES["expertPanNumberImageName"]["name"]);
        $address_file = $target_dir . basename($_FILES["expertAddressProofImageName"]["name"]);
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
        redirect(base_url() . 'JobPortal/AccountView');
    }




} 


?>
