<?php
class MyOffice extends CI_Controller
{

 function __construct() {
        parent::__construct();
        isExpertLoggedIn();
        $this->checkExpertPackage();
        $this->load->library('form_validation');
		$this->load->helper('genral');
    }

    function checkExpertPackage(){

		if ($this->session->userdata('parent_id')!=0){
			 $expertId=$this->session->userdata('parent_id');
		}
		else if($this->session->userdata('parent_id')==0)
		{
			$expertId=$this->session->userdata('expertId');
		}			
         $this->db->where('expert_id',$expertId);
        $query = $this->db->get('subcriber_services');
            if ($query->num_rows() > 0){
                
                $this->session->set_userdata('package_details',$query->row()->package_details);
             //redirect($_SERVER['HTTP_REFERER']);
        }
    else{
            //redirect($_SERVER['HTTP_REFERER']);
    }

    }




    public function index(){
        $this->load->model('ClientListModel');
		
        $myOfficeData['clientList'] = $this->ClientListModel->client_list();
        $myOfficeData['ServicesList'] = $this->ClientListModel->getServiceslist(); 
        $myOfficeData['post'] = $this->input->post(); 
        $this->load->view('MyOffice_view', $myOfficeData);
        }

    public function addClient() {
        // Password Generator
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
            redirect(base_url() . 'Expert');
        } else {
            $personalData['clientName'] = $this->input->post('clientName');
            $mapData = $this->input->post('ServicesList');
            $personalData['clientEmailId'] = $this->input->post('clientEmailId');
            $personalData['clientMobileNumber'] = $this->input->post('clientMobileNumber');
            $personalData['expertId'] = $this->input->post('expertId');
            $personalData['clientPassword'] = md5($password);
           
            
            $this->load->model('expertClientAdd');
            $clientId = $this->expertClientAdd->saveClientSignUpInformation($personalData,$mapData);
            
            if ($clientId > 0) {
                $personalFolder = "clientdocuments/" . $clientId . "/personal";
                $expertFolder = "clientdocuments/" . $clientId . "/expert";

                if (!is_dir($personalFolder)) { //create the Personal folder if it's not already exists
                    mkdir($personalFolder, 0777, TRUE);
                    mkdir($expertFolder, 0777, TRUE);
                }
//            To send email
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
        $msg="Thank you for signing with Visheshagya,Services Redefined. Your password=$password has been sent to your registered email Id. Kindly check your junk & spam folder also. Please login to http://visheshagya.in/";
        
        $json = file_get_contents($url.urlencode($msg));
            $output = json_decode($json, TRUE);

                if (!$this->email->send()) {
                    $this->session->set_flashdata('clientSignUpError', 'Email could not be sent');
                    redirect(base_url() . 'MyOffice');
                }
                $this->session->set_flashdata('clientSignUpSuccess', 'You have been added successfully  login credentials send client email, you provde');
                redirect(base_url() . 'MyOffice');
            } else {
                $this->session->set_flashdata('clientSignUpError', 'Please Try again');
                redirect(base_url() . 'MyOffice');
            }
        }
    }

    public function delete_client($clientId)
    {
        //$clientId = $this->input->get('clientId');
        $this->load->model('ClientListModel');
        if( $this->ClientListModel->client_delete($clientId) ) {
        $this->session->set_flashdata('feedback', "Client deleted successfully");
        $this->session->set_flashdata('feedback_class','alert-success');
        } else {
            $this->session->set_flashdata('feedback',"Client Failed to delete");
            $this->session->set_flashdata('feedback_class','alert-danger');
        }
        return redirect('MyOffice');

    }

    public function client_store($clientId)
    {
        $this->load->model('ClientListModel');
        $clientEdit = $this->ClientListModel->client_edit($clientId);
        $ServicesList = $this->ClientListModel->getServiceslist(); 
        $SelectedServices = $this->ClientListModel->getSelectedServices($clientId);
        $this->load->view('editClient_view',['clientEdit'=>$clientEdit,'ServicesList'=>$ServicesList,'SelectedServices'=>$SelectedServices]);

    }


 
    public function client_update($clientId)
    {

        $this->load->library('form_validation');
        
        $post = $this->input->post();
        unset($post['submit']);
        $this->load->model('ClientListModel');
        

        if( $this->ClientListModel->update_client($clientId,$post))
        {
            $this->session->set_flashdata('feedback', "Client updated successfully");
            $this->session->set_flashdata('feedback_class','alert-success');
        }
        else {
            $this->session->set_flashdata('feedback', "Client updated failed");
            $this->session->set_flashdata('feedback_class','alert-danger');

        }
        return redirect('MyOffice');
        

    }
    function ExpertBookingAppointment($clinetId) {

        $expertAvailabilitySlot = array();
         $expertId=$this->session->userdata('expertId');
        
        $this->db->select("consultationTypeName,consultationTypeId");
        $consultationtypes = $this->db->get('consultation_types')->result();
        if (!empty($consultationtypes))
            $expertAvailabilitySlot['consultationtypes'] = $consultationtypes;
        else
            $expertAvailabilitySlot['consultationtypes'] = "No Consultation Types";
        $expertAvailabilitySlot['TeamMember'] = $this -> db
           -> select(' `expertId`,`expertName`')
           -> where('parent_id', $expertId)
           -> get('expert_personal_details')->result();    
        $expertAvailabilitySlot['expertId'] = $expertId;
        $expertAvailabilitySlot['clinetId'] = $clinetId;
        $this->load->view('bookingExpertAppointment', $expertAvailabilitySlot);
    }

    
    function saveExpertAppointmentDetails() {
        

        $this->load->model('AppointmentDetailsModel');
        $appointmentData['appointmentDate'] = $this->input->post('appointmentDate');
        $this->session->set_userdata('appointmentDate', $appointmentData['appointmentDate']);
        
        $appointmentData['appointmentNotes'] = $this->input->post('appointmentNotes');
        $appointmentData['expertId'] = $this->input->post('teamMember');
        //$this->session->set_flashdata('expertId', $appointmentData['expertId']);
        

        $appointmentData['clientId'] = $this->input->post('clientId');;
        $this->session->set_userdata('clientId', $appointmentData['clientId']);

        $appointmentData['appointmentBookingDate'] = date('Y-m-d');
        $this->session->set_userdata('appointmentBookingDate', $appointmentData['appointmentBookingDate']);

        $appointmentData['appointmentStartTime'] = $this->input->post('appointmentStartTime');
        $this->session->set_userdata('appointmentStartTime', $appointmentData['appointmentStartTime']);

        $appointmentData['appointmentEndTime'] = date("H:i", strtotime('+30 minutes', strtotime($appointmentData['appointmentStartTime'])));
        $this->session->set_userdata('appointmentEndTime', $appointmentData['appointmentEndTime']);
        $appointmentData['consultationStatusId'] = 1;
        $this->session->set_userdata('consultationStatusId', 1);
        $appointmentData['consultationTypeId'] = $this->input->post('categoryId');
        $this->session->set_userdata('consultationTypeId', $appointmentData['consultationTypeId']);
        $consultationTypeIdByName = $appointmentData['consultationTypeId'];
        
        $sql = "SELECT `consultationTypeName` FROM `consultation_types` where `consultationTypeId` = $consultationTypeIdByName";
        $query = $this->db->query($sql);
        $consultationTypeIdByName = $query->row();
        $this->session->set_userdata('consultationTypeName', $consultationTypeIdByName->consultationTypeName);

        $appointmentData['amountPaid'] = $this->input->post('amountPaid');
        $this->session->set_userdata('amountPaid',$appointmentData['amountPaid'] );
        $transcation['amount']= $appointmentData['amountPaid'] ;
       $appointmentData['status']='success';


        $appointmentId = $this->AppointmentDetailsModel->saveAppointmentData($appointmentData);

                    $appointmentTime = date('h:i A', strtotime($appointmentData['appointmentStartTime'])) . "-" . date('h:i A', strtotime($appointmentData['appointmentEndTime']));
        //-------------------------------getExpertEmailId 
        $expertId = $this->input->post('expertId');
        $sqlExpertEmailId = "select expertName,expertEmailId,expertMobileNumber from expert_personal_details  where expertId='$expertId'";
        $queryExpertEmailId = $this->db->query($sqlExpertEmailId);
        $expertEmailId = $queryExpertEmailId->row();

        //------------------------get ClientEmail id
        $clientId =  $this->input->post('clientId');
        $sqlCliientEmailId = "select clientEmailId,clientName,clientMobileNumber from client_personal_details  where clientId='$clientId'";
        $queryCliientEmailId = $this->db->query($sqlCliientEmailId);
        $CliientEmailId = $queryCliientEmailId->row();
        $transcation['clientEmailId']=$CliientEmailId->clientEmailId;
        $transcation['clientName']=$CliientEmailId->clientName;
        $transcation['clientMobileNumber']=$CliientEmailId->clientMobileNumber;

        $clientMobileNumber = $this->AppointmentDetailsModel->fetchClientMobileNumber($appointmentData['clientId']);
        if ($appointmentId > 0) {
            //-------------------- To send email
            // $this->load->library('email');
            // $config['priority'] = 1;
            // $config['mailtype'] = 'html';
            // $this->email->initialize($config);
            // $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            // $this->email->to($CliientEmailId->clientEmailId);
            // $data = array(
            //     'consultingExpert' => 'Tax and Legal Expert',
            //     'appointmentId' => $appointmentId,
            //     'appointmentBookingDate' => $appointmentData['appointmentBookingDate'],
            //     'consultationTime' => $appointmentData['appointmentStartTime'] . "-" . $appointmentData['appointmentEndTime'],
            //     'consultationType' => $consultationTypeIdByName->consultationTypeName,
            //     'appointmentDate' => $appointmentData['appointmentDate'],
            //     'appointmentTime' => $appointmentTime 
            // );
            // $this->email->subject('Appointment booking Confirmation');
            // $body = $this->load->view('emails/clientBooking.php', $data, TRUE);
            // $this->email->message($body);
            // $this->email->send();
            

            
        }
        $this->session->set_userdata('appointmentId', $appointmentId);

        redirect(base_url() . 'BookingStatus');
         //$this->load->view('transcation',$transcation);
    }
    function generateServicesRequestNumber()
    {
        $expertId=$this->session->userdata('expertId');
        $this->load->model('ClientListModel');
        $data['clientlist']=$this->ClientListModel->getClientList($expertId);
        $data['Servicelist']=$this->ClientListModel->getServiceslist();
        $data['teamMember']=$this->ClientListModel->getTeamMemberList($expertId);
        $this->load->view('add_service_request_number',$data);
    }

    function addServicesRequestNumber()
    {
        $shared_dir=$this->input->post('shared_dir');
		$shared_dir=serialize($shared_dir);
		$data['shared_dir']=$shared_dir;
        $data['client_id']=$this->input->post('clientId');
        $data['assign_member']=$this->input->post('assign_member');
        $data['SRN']=$this->input->post('serviceId');
        $data['task_details']=trim($this->input->post('task'));
        $data['status_id']=5;
        $data['mode_id']=2;
        $data['created_date']=date('Y-m-d');
        $this->load->model('ClientListModel');
        // $ischeck=$this->ClientListModel->checkServicesRequestNumber($data['assign_member'],$data['client_id'],$data['SRN']);
        $isInsert=$this->ClientListModel->saveServicesRequetNumber($data);
        if(!file_exists("clientdocuments/".$data['clientId']) && !is_dir("clientdocuments/".$data['clientId'])){
        mkdir("clientdocuments/".$data['clientId']);    
        }
        else{
        if(!file_exists("clientdocuments/".$data['clientId']."/offices") && !is_dir("clientdocuments/".$data['clientId']."/offices")){
           mkdir("clientdocuments/".$data['clientId']."/offices");    
        }
             
        }
        
        $target_dir = "clientdocuments/".$data['clientId']."/offices/";
       $target_file = $target_dir . basename($_FILES["filename"]["name"]);
       $uploadOk = 1;
       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
       // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["filename"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
       // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["filename"]["size"] > 1500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "PNG") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["filename"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        redirect(base_url()."MyOffice/getServicesDetails");
    }

    function getServicesDetails()
    {
        $this->load->model('ClientListModel');
        $data['ServicesDetails']=$this->ClientListModel->getServicesDetails();
        $this->load->view('ServicesDetails_view',$data);

    }
    function clientdoucument($clientId)
    {
        $this->load->helper('directory');
        $this->load->helper('download');
        $data['foldersList'] = directory_map('../clientdocuments/' . $clientId);

        $data['clientId']=$clientId;
        $this->load->view('officeAutomationDocument_view',$data);
    }
    function createNewFolder($clientId) {
        if($this->input->post('subFolder')=="No"){
         $folderName = $this->input->post('folderName');
         $clientFolder = "clientdocuments/" . $clientId . "/" . $folderName;  
        }
        if($this->input->post('subFolder')!="No"){
        $folderName = $this->input->post('folderName');
        $clientFolder = "clientdocuments/" . $clientId . "/".$this->input->post('subFolder')."/". $folderName;
        }
        if (!is_dir($clientFolder)) {
            if (mkdir($clientFolder, 0777, TRUE)) {
                $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your folder has been created successfully');
            } else {
                $this->session->set_flashdata('FolderCreateErrorMessage', 'Your folder could not be created');
            }
            redirect(base_url() .'MyOffice/clientdoucument/'.$clientId);
        } else {
            $this->session->set_flashdata('FolderCreateErrorMessage', 'Your folder could not be created');
        }
        redirect(base_url().'MyOffice/clientdoucument/'.$clientId);
    }  
     function getServicesRequestDetails($srid,$clientId='')
    {
       $expertId=$this->session->userdata('expertId');
       $this->load->model('ClientListModel');
      $data['requestDetails']=$this->ClientListModel->getServiceRequestDetails($srid);
	  $complete_segment = $data['requestDetails']->complete_segment;
	  $data['complete_segment'] = $complete_segment;
	  $shared_dir = $data['requestDetails']->shared_dir;
	  $shared_dir = unserialize($shared_dir);
	  if($shared_dir == ''){$shared_dir = array();}
	  $data['shared_dir'] = $shared_dir;
      $data['NoteDetails']=$this->ClientListModel->getNoteDetails($expertId,$clientId);  
      $data['teamMember']=$this->ClientListModel->getTeamMemberList($expertId);
      $data['status']=$this->ClientListModel->getStatusList();
	  $data['work_complete_status']=$this->config->item('work_complete_status');
       $data['srid']=$srid;
        $this->load->view('getServicesDetails_view',$data);
    }
    function get_staff_personal_details()
   {
        $data['expertId']=$this->session->userdata('expertId');
        $this->load->model('ClientListModel');
        $data['personalData']=$this->ClientListModel->get_stuff_personal_details($this->session->userdata('expertId'));
        $this->load->view('get_stuff_personnal_details',$data);
    
   }
   function staff_personal_detail(){
    $this->load->view('stuff_personal_view');
   }
   function add_stuff_personal_details(){
     
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('useremail', 'Useremail', 'required');
        $this->form_validation->set_rules('staff_type', 'Staff Type', 'required');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
        $this->form_validation->set_rules('salary', 'Salary', 'required');
        $this->form_validation->set_rules('doj', 'Date of Joining', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('stuff_personal_view');
        }
        else
        {
            $data['stuff_name']=$this->input->post('username');
            $data['stuff_email']=$this->input->post('useremail');
            $data['staff_type']=$this->input->post('staff_type');
            $data['contact_number']=$this->input->post('contact_number');
            $data['month_salary']=$this->input->post('salary');
            $data['date_joining']=$this->input->post('doj');
            $data['status']=1;
            $data['registered_date']=date('Y-m-d');
            $data['expert_id']=$this->session->userdata('expertId');
             $this->load->model('ClientListModel');
             $data['personalData']=$this->ClientListModel->save_office_stuff_details($data);
             redirect(base_url()."MyOffice/get_staff_personal_details");
        }
   

   }

   function edit_staff_personal_details($stuff_id){   
    $this->load->model('ClientListModel');
    $data['personalData']=$this->ClientListModel->get_particular_stuff_details($stuff_id); 
    $this->load->view('edit_stuff_personal_view',$data);
   }
   function update_stuff_personal_details()
   {       
    $data['stuff_name']=$this->input->post('username');
    $data['stuff_email']=$this->input->post('useremail');
    $data['staff_type']=$this->input->post('staff_type');
    $data['contact_number']=$this->input->post('contact_number');
    $data['month_salary']=$this->input->post('salary');
    $data['date_joining']=$this->input->post('doj');
    $data['status']=$this->input->post('staff_status');
    $stuff_id=$this->input->post('stuff_id');
    $this->load->model('ClientListModel');
    $data['personalData']=$this->ClientListModel->update_particular_stuff_details($stuff_id,$data); 
    redirect(base_url()."MyOffice/get_staff_personal_details");

   }
   
   function edit_stuff_leave_details($leave_id){
    $this->load->model('ClientListModel');
    $data['leaveData']=$this->ClientListModel->get_particular_stuff_leave_details($leave_id); 
    $this->load->view('update_leave_application_view',$data);
   }

   function update_leave_status(){
    $leave_id=$this->input->post('leave_id');
	$leave_info = $this->db->query("SELECT * FROM leave_details WHERE leave_id = $leave_id")->row();
	$stuff_id = $leave_info->stuff_id;
    $data['leave_status']=$this->input->post('leave_status');
	$leave_status=$data['leave_status'];
    $data['leave_start_date']=$this->input->post('leave_start_date');
    $data['leave_end_date']=$this->input->post('leave_end_date');
    $this->load->model('ClientListModel');
    $updateValue=$this->ClientListModel->update_particular_stuff_off_time_details($leave_id,$data);
    if ($updateValue == 1) {
         $this->session->set_flashdata('UpdateMessage', 'Leave Details has been  updated successfully');
			
		 $expertMobileNumber= $this->session->userdata('expertMobileNumber');
         $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
         $msg="Your leave Application has been $leave_status.Please check your Application status on http://www.visheshagya.in/";
        // $json = file_get_contents($url.urlencode($msg));
		 
		 $expertId = $this->session->userdata('expertId');
		 $expertPersonalDetailInfo = $this->db->query("SELECT * FROM expert_personal_details WHERE expertId = $stuff_id")->row();
		 $expertEmailId = $expertPersonalDetailInfo->expertEmailId;
		 $expertMobileNumber = $expertPersonalDetailInfo->expertMobileNumber;
		 $expertName = $expertPersonalDetailInfo->expertName;
		 $parent_id = $expertPersonalDetailInfo->parent_id;
		 $parentPersonalDetailInfo = $this->db->query("SELECT * FROM expert_personal_details WHERE expertId = $parent_id")->row();
		 $parentName = $parentPersonalDetailInfo->expertName;
		 $parentEexpertEmailId = $parentPersonalDetailInfo->expertEmailId;
		 $staffMobileNumber = $staffInfo->expertMobileNumber;
		 $email_data = array();
		 $email_data['expertEmailId'] = $expertEmailId;
		 $email_data['expertMobileNumber'] = $expertMobileNumber;
		 $email_data['expertName'] = $expertName;
		 $email_data['parentName'] = $parentName;
		 $email_data['leave_status'] = $leave_status;
		 
		 
		 $email_content = $this->load->view("emails/leaveNotificationExpert",$email_data,true);
		 
		 
		 $subject = "Leave Application By ".$expertName;
		 $to = $expertEmailId;
		 
			$this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($to);
            
            $this->email->subject($subject);
            $this->email->message($email_content);
			
			
			$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
			$msg="Your leave application has been ". $leave_status;
			$json = file_get_contents($url.urlencode($msg));
		 
		 
        } else {
            $this->session->set_flashdata('UpdateMessage', 'Leave Details could not be updated');
        }
	redirect(base_url()."MyOffice/get_user_time_off");
   }

   function apply_leave_form()
    {
        $this->load->model('ClientListModel');
        $data['staff_details']=$this->ClientListModel->get_stuff_personal_details($this->session->userdata('expertId'));
        $this->load->view('leave_application_from_view',$data);
    }

    function new_leave_details(){  

        $this->load->library('form_validation');
        $this->form_validation->set_rules('leave_start_date', 'Select leave Start Date', 'required');
        $this->form_validation->set_rules('leave_end_date', 'Select leave End  Date', 'required');
        $this->form_validation->set_rules('no_of_days', 'Enter the No of days', 'required');
       if ($this->form_validation->run() == FALSE)
        {
            $this->load->model('ClientListModel');
            $data['staff_details']=$this->ClientListModel->get_stuff_personal_details($this->session->userdata('expertId'));
            $this->load->view('leave_application_from_view',$data);
        }
        else
        {
            $data['leave_start_date']=$this->input->post('leave_start_date');
            $data['leave_end_date']=$this->input->post('leave_end_date');
            $data['no_of_days']=$this->input->post('no_of_days');
            $data['stuff_id']=$this->session->userdata('expertId');
            $data['leave_status']='Applied';
            $data['applied_date']=date('Y-m-d');
            $data['applied_date']=date('Y-m-d h:i:s');
            $this->load->model('ClientListModel');
            $updateValue=$this->ClientListModel->apply_for_leave($data);
			 if ($updateValue == 1) {
				 
				 
        $this->session->set_flashdata('UpdateMessage', 'Your leave Application  has been  Applied successfully.');				 
		$expertId = $this->session->userdata('expertId');
		$staffInfo = $this->db->query("SELECT * FROM expert_personal_details WHERE expertId = $expertId")->row();
		 $staffName = $staffInfo->expertName;
		 $staffMobileNumber = $staffInfo->expertMobileNumber;
		 $parent_id = $staffInfo->parent_id;
		 $parentPersonalDetailInfo = $this->db->query("SELECT * FROM expert_personal_details WHERE expertId = $parent_id")->row();
		 $expertName = $parentPersonalDetailInfo->expertName;
		 $parentEexpertEmailId = $parentPersonalDetailInfo->expertEmailId;
		 $parentMobileNumber = $parentPersonalDetailInfo->expertMobileNumber;
		 $email_data = array();
		 $email_data['staffName'] = $staffName;
		 $email_data['expertMobileNumber'] =$expertMobileNumber;
		 $email_data['expertName'] = $expertName;
		 $email_data['leave_start_date'] = $data['leave_start_date'];
		 $email_data['leave_end_date'] = $data['leave_end_date'];
		 $email_content = $this->load->view("emails/leaveNotificationStaff",$email_data,true);
		 $subject = "Leave Application By ".$expertName;
		    $to = $parentEexpertEmailId;
			$this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($email_content);
			
			$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$staffMobileNumber&sms_Type=trans&msg=";
			$msg="Your leave application has been applied.";
			$json = file_get_contents($url.urlencode($msg));
			
			$url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$parentMobileNumber&sms_Type=trans&msg=";
			$msg=$staffName." has applied leave application from ".$data['leave_start_date']." to ".$data['leave_end_date'].".";
			$json = file_get_contents($url.urlencode($msg));
			 
			 
			
			
			
        } else {
            $this->session->set_flashdata('UpdateMessage', 'Your leave Application could not be Applied.');
        }
            redirect(base_url()."MyOffice/get_user_time_off");
        }
    
    }
    function get_user_time_off()
   {
        $data['expertId']=$this->session->userdata('expertId');
        $this->load->model('ClientListModel');
        $data['leaveDetails']=$this->ClientListModel->get_user_time_off_details($this->session->userdata('expertId'));
        $this->load->view('get_stuff_leave_details_view',$data);

   }

   
   function reminder(){
    $this->load->view('reminder_view');
   }

   function add_reminder_details(){

    $data['services_type']=$this->input->post('services_type');
    $data['first_reminder_date']=$this->input->post('first_reminder_date');
    $data['first_reminder_type']=$this->input->post('first_reminder_type');
    $data['second_reminder_date']=$this->input->post('second_reminder_date');
    $data['second_reminder_type']=$this->input->post('second_reminder_type');
    $data['third_reminder_date']=$this->input->post('third_reminder_date');
    $data['third_reminder_type']=$this->input->post('third_reminder_type');
    $data['fourth_reminder_date']=$this->input->post('fourth_reminder_date');
    $data['fourth_reminder_type']=$this->input->post('fourth_reminder_type');
    $data['created_date']=date('Y-m-d');
    $data['expert_id']=$this->session->userdata('expertId');
    $this->load->model('ClientListModel');
    $this->ClientListModel->save_reminder_details($data);
    redirect(base_url().'MyOffice/reminder_details');
    
   }

   function reminder_details(){
    $this->load->model('ClientListModel');
	if($this->session->userdata('parent_id')==0){
	  $expertId=$this->session->userdata('expertId'); 	
	}
	else if($this->session->userdata('parent_id')!=0){
		$expertId=$this->session->userdata('parent_id');
	}
    
    $data['reminder_details']=$this->ClientListModel->fetch_reminder_details($expertId); 
    $this->load->view('reminder_list_view',$data);
   }

   function edit_reminder_details($id){
    
    $this->load->model('ClientListModel');
     $data['reminder_details']=$this->ClientListModel->fetch_reminder_detailsby_id($id); 
     $this->load->view('edit_reminder_view',$data);
   }
   function update_reminder_details()
   {
    
    $reminder_id=$this->input->post('reminder_id');
    $data['services_type']=$this->input->post('services_type');
    $data['first_reminder_date']=$this->input->post('first_reminder_date');
    $data['first_reminder_type']=$this->input->post('first_reminder_type');
    $data['second_reminder_date']=$this->input->post('second_reminder_date');
    $data['second_reminder_type']=$this->input->post('second_reminder_type');
    $data['third_reminder_date']=$this->input->post('third_reminder_date');
    $data['third_reminder_type']=$this->input->post('third_reminder_type');
    $data['fourth_reminder_date']=$this->input->post('fourth_reminder_date');
    $data['fourth_reminder_type']=$this->input->post('fourth_reminder_type');
    $this->load->model('ClientListModel');
    $this->ClientListModel->update_reminder_details($data,$reminder_id);
    redirect(base_url().'MyOffice/reminder_details');
   }
   function update_workstatus_details()
   {
    
    
    $srn_id=$this->input->post('srn_id');
	$complete_segment = $this->input->post('complete_segment');
	$this->db->query("UPDATE services_details SET complete_segment='".$complete_segment."' WHERE srn_id = '".$srn_id."'");
	
    $data['re_assign_member']=$this->input->post('re_assign_member');
    $data['re_assign_reason']=$this->input->post('re_assign_reason');
    $data['status_id']=$this->input->post('status_id');
    $this->load->model('ClientListModel');
    $this->ClientListModel->update_worked_status($data,$srn_id);
    redirect(base_url().'MyOffice/getServicesRequestDetails/'.$srn_id);
   }



  
} 

?>