<?php
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
class Ajaxcalls extends CI_Controller {
    function fetchSubCategoryDetails() {
        $categoryId = $this->input->post('categoryId');
        $this->load->model('Expertdetailsmodel');
        $subCategoryDetails = $this->Expertdetailsmodel->fetchExpertSubCategory($categoryId);
        echo json_encode($subCategoryDetails);
    }

    function checkEmailId() {
        $emailId = $this->input->post('emailId');
        $this->load->model('Verifymodel');
        $checkEmailResult['verificationResult'] = $this->Verifymodel->verifyEmail($emailId);
        echo json_encode($checkEmailResult);
    }

    function checkClientEmailId() {
        $emailId = $this->input->post('emailId');
        $this->load->model('Verifymodel');
        $checkEmailResult['verificationResult'] = $this->Verifymodel->verifyClientEmail($emailId);
        header('Content-Type: application/json');
        echo json_encode($checkEmailResult);
    }
    function checkEmployeeEmailId() {
        $emailId = $this->input->post('emailId');
        $userType = $this->input->post('userType');
        $this->load->model('Verifymodel');
        $checkEmailResult['verificationResult'] = $this->Verifymodel->verifyEmployeeEmail($emailId,$userType);
        echo json_encode($checkEmailResult);
    }

    function searchExpertCategory() {
        $search = $this->input->post('search');
        $Query = "SELECT `categoryId` FROM `expert_categories` where `categoryName` like '%$search%'";
        $data = $this->db->query($Query);
        if ($data->num_rows() == 0) {
            $Query = "SELECT categoryId FROM sub_categories WHERE subCategoryName LIKE '%$search%' limit 1";
            $data = $this->db->query($Query);
            $subCategoryName = $data->row();
        } else {
            $subCategoryName = $data->row();
        }
        header('Content-Type: application/json');
        echo json_encode($subCategoryName);
    }
    function  checkExpertAvailable()
    {
        $appointmentId=$_POST['appointmentId'];
        //echo $appointmentId;
        $query = $this -> db
           -> select('start_call')
           -> where('appointmentId',$appointmentId)
           -> get('appointment_details');
        $row = $query->row_array();
        //print_r($row['start_call']);
        if($row['start_call']=='')
        {
            echo "busy"; 
        }  
        else if($row['start_call']=='online')
        {
           echo "online"; 
        } 
    }
    function UpdateDataZoom($appointmentId)
    {
        //$appointmentId=$this->input->post('appointmentId');
        $data['start_call']='online';
        $this->db->where('appointmentId',$appointmentId);
        $this->db->update('appointment_details', $data);
        
        
    }

    function shareClientDocument() {
        if (!empty($_POST['expertId'])) {
            foreach ($_POST['expertId'] as $expertId) {
                $sharedFileData['expertId'] = $expertId;
                $sharedFileData['fileName'] = $this->input->post('fileName');
                $sharedFileData['filePath'] = 'clientdocuments/' . $this->session->userdata('clientId') . '/' . $this->input->post('path') . '/';
                $sharedFileData['clientId'] = $this->session->userdata('clientId');
                $sharedFileData['sharedBy'] = 2;
                $this->load->model('ShareDetailsModel');
                $shareResult = $this->ShareDetailsModel->shareClientDocument($sharedFileData);
                if ($shareResult > -1) {
                    $this->session->set_flashdata('ShareSuccessful', 'Your file has been shared succesfully');
//                    return true;
                }
            }
            $this->session->set_flashdata('ShareSuccessful', 'Your file has been shared succesfully');
        } else {
            $this->session->set_flashdata('FolderCreateErrorMessage', 'Please select atleast 1 expert to share the file');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    function addNoteExpert()
    {
        $data['clientId']=$this->input->post('clientId');
        $data['expertId']=$this->input->post('expertId');
        $data['messages']=$this->input->post('message');
        $data['shared']=$this->input->post('shared');
        $data['owner']="Expert-".$data['expertId'];
        $this->db->insert('notes', $data);
    
    }
    function addActionExpert(){
         $data['clientId']=$this->input->post('clientId');
        $data['expertId']=$this->input->post('expertId');
        $data['comment']=$this->input->post('comment');
        $data['payment_amount']=$this->input->post('payment_amount');
        $data['status']='pending';
        $data['created_date']=date("Y-m-d H:i:s");
        $this->db->insert('actions_taken', $data);


    }
    function addNoteClient()
    {
        $data['clientId']=$this->input->post('clientId');
        $data['expertId']=$this->input->post('expertId');
        $data['messages']=$this->input->post('message');
        $data['shared']=$this->input->post('shared');
        $data['owner']="Client-".$data['clientId'];
        $this->db->insert('notes', $data);
    
    }

    function shareExpertDocument() {
        $sharedFileData['expertId'] = $this->session->userdata('expertId');
        $clientId = $this->input->post('clientId');
        $sharedFileData['fileName'] = $this->input->post('fileName');
        $sharedFileData['filePath'] = 'expertdocuments/' . $sharedFileData['expertId'] . '/' . $this->input->post('path') . '/';
        $sharedFileData['clientId'] = $this->session->userdata('clientId');
        $sharedFileData['sharedBy'] = 1;
        $this->load->model('ShareDetailsModel');
        foreach ($clientId as $Id) {
            $sharedFileData['clientId'] = "";
            $sharedFileData['clientId'] = $Id;
            if (!empty(trim($sharedFileData['clientId'])))
                $shareResult = $this->ShareDetailsModel->shareClientDocument($sharedFileData);
        }
        if ($shareResult > -1) {
            $this->session->set_flashdata('ShareSuccessful', 'Your file has been shared succesfully');
            redirect(base_url() . 'ExpertDocument');
        } else {
            $this->session->set_flashdata('DeleteSuccessful', 'Your file could not be shared. Please check if you have selected atleast one client');
            redirect(base_url() . 'ExpertDocument');
        }
    }

    function deleteClientDocument() {
        $sharedFileData['expertId'] = $this->input->post('expertId');
        $sharedFileData['fileName'] = $this->input->post('fileName');
        $sharedFileData['filePath'] = 'clientdocuments/' . $this->session->userdata('clientId') . '/' . $this->input->post('path') . '/';
        $sharedFileData['clientId'] = $this->session->userdata('clientId');
        $sharedFileData['sharedBy'] = 2;
        $this->load->model('ShareDetailsModel');
        if (unlink($sharedFileData['filePath'] . $sharedFileData['fileName'])) {
            $shareResult = $this->ShareDetailsModel->deleteClientDocument($sharedFileData);
            if ($shareResult > -1) {
                $this->session->set_flashdata('DeleteSuccessful', 'Your file has been deleted succesfully');
                return true;
            } else {
                echo "error";
            }
        }
    }

    function deleteExpertDocument() {
        $sharedFileData['expertId'] = $this->input->post('expertId');
        $sharedFileData['fileName'] = $this->input->post('fileName');
        $sharedFileData['filePath'] = 'expertdocuments/' . $this->session->userdata('expertId') . '/' . $this->input->post('path') . '/';
        $sharedFileData['clientId'] = $this->session->userdata('clientId');
        $sharedFileData['sharedBy'] = 1;
        $this->load->model('ShareDetailsModel');
        if (unlink($sharedFileData['filePath'] . $sharedFileData['fileName'])) {
            $shareResult = $this->ShareDetailsModel->deleteClientDocument($sharedFileData);
            if ($shareResult > -1) {
                $this->session->set_flashdata('ShareSuccessful', 'Your file has been deleted succesfully');
                return true;
            } else {
                echo "error";
            }
        }
    }

    function fetchExistingClientList() {
        $expertId = $this->input->post('expertId');
        $this->load->model('ShareDetailsModel');
        $clientList = $this->ShareDetailsModel->fetchExistingClient($expertId);
        if (is_array($clientList)) {
            $client = json_encode($clientList);
            echo $client;
        } else {
            echo -1;
        }
    }

    function fetchExistingExpertList() {
        $clientId = $this->input->post('clientId');
        $this->load->model('ShareDetailsModel');
        $expertList = $this->ShareDetailsModel->fetchExistingExpert($clientId);
        if (is_array($expertList)) {
            $expert = json_encode($expertList);
            echo $expert;
        } else {
            echo -1;
        }
    }
function uploadExpertDocument() {
        if($this->input->post('subfolderName')!="NoSubfolder"){
          $target_dir = 'expertdocuments/' . $this->session->userdata('expertId') . '/' . $this->input->post('folderName') . '/'.$this->input->post('subfolderName').'/';  
        }
        else{
            $target_dir = 'expertdocuments/' . $this->session->userdata('expertId') . '/' . $this->input->post('folderName') . '/';
        }
       
        $filesCount = count($_FILES['fileName']['name']);
        for($i = 0; $i < $filesCount; $i++){
           
           $_FILES['file']['name'] = $_FILES['fileName']['name'][$i];
            $_FILES['file']['type'] = $_FILES['fileName']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['fileName']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['fileName']['error'][$i];
            $_FILES['file']['size'] = $_FILES['fileName']['size'][$i];
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
           
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "csv" && $imageFileType != "txt" && $imageFileType != "rtf" &&$imageFileType != "xlx" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
            $this->session->set_flashdata('DeleteSuccessful', 'Sorry, only Image/PDF/Word files are allowed.');
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
              $this->session->set_flashdata('DeleteSuccessful', 'Sorry, your file was not uploaded.');
           
        }
        else
        {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $this->session->set_flashdata('ShareSuccessful', "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.");
                //redirect(base_url() . 'ExpertDocument');
            }

        }

        }
        redirect(base_url() . 'ExpertDocument');
       
       

       
    }
    function uploadClientDocument() {
        $target_dir = 'clientdocuments/' . $this->session->userdata('clientId') . '/' . $this->input->post('folderName') . '/';
        $target_file = $target_dir . basename($_FILES["fileName"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "rtf") {
            $this->session->set_flashdata('DeleteSuccessful', 'Sorry, only Image/PDF/Word files are allowed.');
            redirect(base_url() . 'ClientDocument');
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $this->session->set_flashdata('DeleteSuccessful', 'Sorry, your file was not uploaded.');
            redirect(base_url() . 'ClientDocument');
        } else {
            if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
                $this->session->set_flashdata('ShareSuccessful', "The file " . basename($_FILES["fileName"]["name"]) . " has been uploaded.");
                redirect(base_url() . 'ClientDocument');
            } else {
                $this->session->set_flashdata('DeleteSuccessful', 'Sorry, there was an error uploading your file.');
                redirect(base_url() . 'ClientDocument');
            }
        }
    }

    function fetchConsultationTypes() {
        $data = array('ConsultationTypesid' => $this->input->post('expertId'),
            'expertId' => $this->input->post('expertId'));
        print_r($data);
        exit;
    }

    function fetchAvailableConsultationSlots() {
        $date = date('Y-m-d', strtotime($this->input->post('selectedDate')));
        $expertId = $this->input->post('expertId');
        $currentDay = strtolower(date("l", strtotime($date)));
        $startTime = $currentDay . "Start";
        $endTime = $currentDay . "End";
        $startTimeSlot1 = $currentDay . "Start_slot1";
        $endTimeSlot1 = $currentDay . "End_slot1";
        $startTimeSlot2 = $currentDay . "Start_slot2";
        $endTimeSlot2 = $currentDay . "End_slot2";
        $dates = $this->db->query("select startDate,endDate from expert_consultation_timing where expertId = $expertId")->row();

        $consultationTimings = $this->db->query("SELECT $startTime,$endTime,$startTimeSlot1,$endTimeSlot1,$startTimeSlot2,$endTimeSlot2 from expert_consultation_timing where expertId = $expertId AND endDate >= $date ")->row();
        $consultationSlots = "";
        if (!empty($consultationTimings)) {

            $arr = array();
            $merge = array();
            $a = $this->splitTimeIntoIntervals($consultationTimings->$startTime, $consultationTimings->$endTime);

            $b = $this->splitTimeIntoIntervals($consultationTimings->$startTimeSlot1, $consultationTimings->$endTimeSlot1);
            $merge = array_merge($a, $b);
            $c = $this->splitTimeIntoIntervals($consultationTimings->$startTimeSlot2, $consultationTimings->$endTimeSlot2);
            $arr = array_merge($merge, $c);
            $Currentdate = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
             for($i=0;$i<count($arr);$i++)
             {
                 if($date==$Currentdate->format('Y-m-d'))
                 {
                  if(strtotime($arr[$i]['starts'])<strtotime($Currentdate->format('H:i')))
                  {
                     unset($arr[$i]['starts']);
                     unset($arr[$i]['ends']);
                  }    
                 }
             }


            $expertAvailabilitySlot['consultationSlots'] = $arr;
        } else
            $expertAvailabilitySlot['consultationSlots'] = "No available time slots";

        //$this->db->select('appointmentStartTime,appointmentEndTime');
        $this->db->select('appointmentStartTime');

        $previouslyBookedAppointments = $this->db->get_where('appointment_details', ['expertId' => $expertId, 'appointmentDate' => $date,'status'=>'success'])->result();
        $bookedAppointments = array();
        if (!empty($previouslyBookedAppointments)) {
            foreach ($previouslyBookedAppointments as $app) {
                $bookedAppointments[] = date('H:i', strtotime($app->appointmentStartTime));
            }
            $expertAvailabilitySlot['previouslyBookedAppointments'] = $bookedAppointments;
        } else
            $expertAvailabilitySlot['previouslyBookedAppointments'] = "No previous booked appointments";

        header('Content-Type: application/json');
        echo json_encode($expertAvailabilitySlot);
    }

    //-------------------------------------divide the time interval--------------------------------------------
    public function splitTimeIntoIntervals($work_starts, $work_ends, $break_starts = null, $break_ends = null, $minutes_per_interval = 30) {
        $intervals = array();
        $time = date("H:i", strtotime($work_starts));
        $first_after_break = false;
        while (strtotime($time) < strtotime($work_ends)) {
            // if at least one of the arguments associated with breaks is mising - act like there is no break
            if ($break_starts == null || $break_starts == null) {
                $time_starts = date("H:i", strtotime($time));
                $time_ends = date("H:i", strtotime($time_starts . "+$minutes_per_interval minutes"));
            }
            // if the break start/end time is specified
            else {
                if ($first_after_break == true) {//first start time after break
                    $time = (date("H:i", strtotime($break_ends)));
                    $first_after_break = false;
                }
                $time_starts = (date("H:i", strtotime($time)));
                $time_ends = date("H:i", strtotime($time_starts . "+$minutes_per_interval minutes"));
                //if end_time intersects break_start and break_end times
                if ($this->timesIntersects($time_starts, $time_ends, $break_starts, $break_ends)) {
                    $time_ends = date("H:i", strtotime($break_starts));
                    $first_after_break = true;
                }
            }

            if (date("H:i", strtotime($time_ends)) > date("H:i", strtotime($work_ends))) {
                $time_ends = date("H:i", strtotime($work_ends));
            }
            $intervals[] = array('starts' => $time_starts, 'ends' => $time_ends);
            $time = $time_ends;
        }
        return $intervals;
    }

    public function timesIntersects($time1_from, $time1_till, $time2_from, $time2_till) {
        $out;
        $time1_st = strtotime($time1_from);
        $time1_end = strtotime($time1_till);
        $time2_st = strtotime($time2_from);
        $time2_end = strtotime($time2_till);
        $duration1 = $time1_end - $time1_st;
        $duration2 = $time2_end - $time2_st;
        $time1_length = date("i", strtotime($time1_till . "-$time1_from"));
        if (
                (($time1_st <= $time2_st && $time2_st <= $time1_end && $time1_end <= $time2_end) ||
                ($time1_st <= $time2_st && $time2_st <= $time2_end && $time2_end <= $time1_end) &&
                ($duration1 >= $duration2)
                ) ||
                ( $time1_st <= $time2_st && $time2_st <= $time1_end && $time1_end <= $time2_end) &&
                ($duration1 < $duration2)
        ) {
            return true;
        }
        return false;
    }

    function fetchConsultationFee() {
        $consultationTypeId = $this->input->post('ConsultationTypesid');
        $expertId = $this->input->post('expertId');
        $this->load->model('FetchDefaultValuesModel');
        $consultationFees = $this->FetchDefaultValuesModel->fetchExpertFees($consultationTypeId, $expertId);
        echo $consultationFees;
    }

     function saveAppointmentDetails() {

        $this->load->model('AppointmentDetailsModel');
        $appointmentData['appointmentDate'] = $this->input->post('appointmentDate');
        $this->session->set_userdata('appointmentDate', $appointmentData['appointmentDate']);
        
        $appointmentData['appointmentNotes'] = $this->input->post('appointmentNotes');
        $PaymentMode = $this->input->post('PaymentMode');
        $appointmentData['expertId'] = $this->input->post('teamMember');
        $expertId= $this->input->post('teamMember');
        $this->session->set_userdata('expertId', $appointmentData['expertId']);
        $this->session->set_userdata('expertName', $this->input->post('expertName'));
        $this->session->set_userdata('type', $this->input->post('type'));

        $appointmentData['clientId'] = $this->session->userdata('clientId');
        

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
        $consultationTypeIdByName = $this->input->post('categoryId');
        $sql = "SELECT `consultationTypeName` FROM `consultation_types` where `consultationTypeId` = $consultationTypeIdByName";
        $query = $this->db->query($sql);
        $consultationTypeIdByName = $query->row();
        $this->session->set_userdata('consultationTypeName', $consultationTypeIdByName->consultationTypeName);

        $appointmentData['amountPaid'] = $this->input->post('amountPaid');
        $appointmentData['status'] = 'Pending';
        $this->session->set_userdata('amountPaid', $this->input->post('amountPaid'));
        $this->session->set_userdata('ConsultationFees', $this->input->post('amountPaid'));
        $transcation['amount']= $this->input->post('amountPaid');
      


        $appointmentId = $this->AppointmentDetailsModel->saveAppointmentData($appointmentData);
                    $appointmentTime = 
            date('h:i A', strtotime($appointmentData['appointmentStartTime']))."-".
             date('h:i A', strtotime($appointmentData['appointmentEndTime']));
            $this->session->set_userdata('appointmentTime', $appointmentTime);
        //-------------------------------getExpertEmailId 
        $sqlExpertEmailId = "select expertEmailId,expertName,expertMobileNumber from expert_personal_details  where expertId='$expertId'";
        $queryExpertEmailId = $this->db->query($sqlExpertEmailId);
        $expertEmailId = $queryExpertEmailId->row();
        $this->session->set_userdata('expertEmailId',$expertEmailId->expertEmailId);
        $this->session->set_userdata('expertMobileNumber',$expertEmailId->expertMobileNumber);

        //------------------------get ClientEmail id
        $clientId = $this->session->userdata('clientId');
        $sqlCliientEmailId = "select clientEmailId,clientName,clientMobileNumber from client_personal_details  where clientId='$clientId'";
        $queryCliientEmailId = $this->db->query($sqlCliientEmailId);
        $CliientEmailId = $queryCliientEmailId->row();
        $this->session->set_userdata('clientMobileNumber',$CliientEmailId->clientMobileNumber);
        $this->session->set_userdata('clientEmailId',$CliientEmailId->clientEmailId);
        $this->session->set_userdata('clientName',$CliientEmailId->clientName);
        $transcation['clientEmailId']=$CliientEmailId->clientEmailId;
        $transcation['clientName']=$this->input->post('expertName');
        $transcation['clientMobileNumber']=$CliientEmailId->clientMobileNumber;
        $clientMobileNumber = $this->AppointmentDetailsModel->fetchClientMobileNumber($appointmentData['clientId']);
       
        $this->session->set_userdata('appointmentId', $appointmentId);
        //echo print_r($transcation);exit;
        //redirect(base_url() . 'BookingStatus');
        if($PaymentMode=="Paytm")
        {
           $this->load->view('TxnTest',$transcation); 
        }   
        else if($PaymentMode=="PayU")
        {
          $this->load->view('transcation',$transcation);  
        }   
         
    }
    function makePaymentViaTaken(){
       
    
        $actionTakenData['comment'] = $this->input->post('comment');
        $actionTakenData['amount'] = $this->input->post('amount');
        $actionTakenData['txn_id'] = $this->input->post('txn_id');
        $actionTakenData['clientEmailId'] = "support@visheshagya.in";
        $actionTakenData['clientName'] = "Visheshagya";
        $PaymentMode = $this->input->post('PaymentMode');
        $this->session->set_userdata('txn_id', $actionTakenData['txn_id']);
        $this->session->set_userdata('amount', $actionTakenData['amount']);
        if($PaymentMode=="Paytm")
        {

         $this->load->view('action_txn_test',$actionTakenData); 
        }   
        else if($PaymentMode=="PayU")
        {
          $this->load->view('action_taken_transcation',$actionTakenData);  
        }

        
    }

    function payu_action_taken_success()
    {
        
        $data['status']='success';
        $this->db->where('id',$this->session->userdata('txn_id'));
        $this->db->update('actions_taken', $data);
         $this->load->view('payu_action_taken_success');
    }
    function payu_action_taken_failed()
    {
         $this->load->view('action_failure_view');
    }

   
   function  response_action_taken(){
      $id=explode("-",$_POST['ORDERID'])[1]; 
      $data['status']='success';
     $this->db->where('id',$id);
    $this->db->update('actions_taken',$data);
     $this->load->view('paytm_action_taken_success');




   }
   function PayUSucces(){
    
      if( $data['status']=='success')
        { 
         $appointmentId=$this->session->userdata('appointmentId');
         $appointment_info = $this->db->query("SELECT * FROM appointment_details WHERE appointmentId = '".$appointmentId."'")->row();
         if($appointment_info->consultationTypeId == '1')
         {

         $hostId='';
       $this->db->select('user_id');
       $query = $this->db->get('zoom_users')->result_array();
        $success="TXN_SUCCESS";
       for($i=0;$i<count($query);$i++)
       {
           $userId=$query[$i]['user_id'];
             $appointmentStartTime=$this->session->userdata('appointmentStartTime');
             $appointmentDate=$this->session->userdata('appointmentDate'); 
           $chechHostId="SELECT * FROM `appointment_details` WHERE `host_id`='$userId' and `appointmentDate`='$appointmentDate' and 
`appointmentStartTime`<='$appointmentStartTime'  and `appointmentEndTime`>='$appointmentStartTime' and `status`='success'";
           $chechHostIdQuery =$this->db->query($chechHostId);
           $count = $chechHostIdQuery->num_rows();
          if($count==0)
          {
              $hostId=$userId; 
          }
          else{
               
              continue;
          }
       }

        $data=$this->createAMeeting($hostId);    
        $data['status']='success';
        $data['host_id']=$hostId;
        $this->db->where('appointmentId',$this->session->userdata('appointmentId'));
        $this->db->update('appointment_details', $data);
        $expertName =$this->session->userdata('expertName');
        $appointmentDate =$this->session->userdata('appointmentDate');
        $clientMobileNumber=$this->session->userdata('clientMobileNumber');
        $clientName=$this->session->userdata('clientName');
        $expertMobileNumber=$this->session->userdata('expertMobileNumber');
        $appointmentTime=$this->session->userdata('appointmentTime');
        $clientEmailId=$this->session->userdata('clientEmailId');
        $expertEmailId=$this->session->userdata('expertEmailId');
        $appointmentId=$this->session->userdata('appointmentId');
        $appointmentBookingDate=$this->session->userdata('appointmentBookingDate');
        $consultationTypeName=$this->session->userdata('consultationTypeName');
        $appointmentStartTime=$this->session->userdata('appointmentStartTime');
        $appointmentEndTime=$this->session->userdata('appointmentEndTime');
         //-------------------- To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            
            
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($clientEmailId);
            $data = array(
                'consultingExpert'=>$expertName,
                'appointmentId'=>$appointmentId,
                'appointmentBookingDate'=>$appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/clientBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            $this->email->initialize($config);

            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($expertEmailId);
            $data = array(
                'consultingExpert' => $clientName,
                'appointmentId' => $appointmentId,
                'appointmentBookingDate' => $appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/expertBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            /*
             * To SEND SMS
             */
            
            $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
            $msg = "Dear " . $clientName . ", Your appointment with Mr/Ms $expertName is confirmed for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime ." Free Cancellation upto 24hrs. before appointment.Team Visheshagya";

            $json = file_get_contents($url . urlencode($msg));
            /*
             * TO SEND SMS TO EXPERT
             */
            $expertSMSUrl = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $expertSMS = "Dear " . $expertName . ", Your appointment with Mr/Ms $clientName is booked for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime." Team Visheshagya";
            $json = file_get_contents($expertSMSUrl . urlencode($expertSMS));
            $output = json_decode($json, TRUE);
            $this->load->view('success_view');
         }
         elseif($appointment_info->consultationTypeId == '2')
         {

       $expertName =$this->session->userdata('expertName');

        $expertMobileNumber =$this->session->userdata('expertMobileNumber');
        $clientMobileNumber=$this->session->userdata('clientMobileNumber');
        $clientName=$this->session->userdata('clientName');
        $extension = "";
        $operator_user_info = $this->createAudioUser($clientMobileNumber,$clientName,$extension);
        $operator_user_info = json_decode($operator_user_info);
         $uuid = $operator_user_info->uuid;
        
        $this->db->query("UPDATE appointment_details SET uuid = '".$uuid."' WHERE appointmentId = '".$appointmentId."'");
        
        $data['status']='success';
        $data['host_id']=$hostId;
        $this->db->where('appointmentId',$this->session->userdata('appointmentId'));
        $this->db->update('appointment_details', $data);
        $expertName =$this->session->userdata('expertName');
        $appointmentDate =$this->session->userdata('appointmentDate');
        $clientMobileNumber=$this->session->userdata('clientMobileNumber');
        $clientName=$this->session->userdata('clientName');
        $expertMobileNumber=$this->session->userdata('expertMobileNumber');
        $appointmentTime=$this->session->userdata('appointmentTime');
        $clientEmailId=$this->session->userdata('clientEmailId');
        $expertEmailId=$this->session->userdata('expertEmailId');
        $appointmentId=$this->session->userdata('appointmentId');
        $appointmentBookingDate=$this->session->userdata('appointmentBookingDate');
        $consultationTypeName=$this->session->userdata('consultationTypeName');
        $appointmentStartTime=$this->session->userdata('appointmentStartTime');
        $appointmentEndTime=$this->session->userdata('appointmentEndTime');
         //-------------------- To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            
            
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($clientEmailId);
            $data = array(
                'consultingExpert'=>$expertName,
                'appointmentId'=>$appointmentId,
                'appointmentBookingDate'=>$appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/clientBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            $this->email->initialize($config);

            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($expertEmailId);
            $data = array(
                'consultingExpert' => $clientName,
                'appointmentId' => $appointmentId,
                'appointmentBookingDate' => $appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/expertBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            /*
             * To SEND SMS
             */
            
            $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
            $msg = "Dear " . $clientName . ", Your appointment with Mr/Ms $expertName is confirmed for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime ." Free Cancellation upto 24hrs. before appointment.Team Visheshagya";

            $json = file_get_contents($url . urlencode($msg));
            /*
             * TO SEND SMS TO EXPERT
             */
            $expertSMSUrl = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $expertSMS = "Dear " . $expertName . ", Your appointment with Mr/Ms $clientName is booked for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime." Team Visheshagya";
            $json = file_get_contents($expertSMSUrl . urlencode($expertSMS));
            $output = json_decode($json, TRUE);
            $this->load->view('success_view');
         }
         else
         {
             
         }

        } 
     $data['status']='success';
     $this->db->where('appointmentId',$this->session->userdata('appointmentId'));
    $this->db->update('appointment_details', $data);
     $this->load->view('success_view');
    }
     function PayUfailure(){
        $this->load->view('failure_view');
 
    }

      function saveAppointmentInstantDetails() {

        $this->load->model('AppointmentDetailsModel');
        $appointmentData['appointmentDate'] = $this->input->post('appointmentDate');
        $PaymentMode = $this->input->post('PaymentMode');
        $this->session->set_userdata('appointmentDate', $appointmentData['appointmentDate']);
        if(isset($_POST['appointmentNotes']))
        $appointmentData['appointmentNotes'] = $this->input->post('appointmentNotes');
        $appointmentStartTime=$this->input->post('appointmentStartTime');
        $clientId=$this->session->userdata('clientId');
        $url="http://visheshagya.in/webservices/InstantTest.php?clientId=$clientId&time=$appointmentStartTime";
        $expert=file_get_contents($url);
        if($expert=="null")
         {
         	$data['title']="All our experts are busy";
            $this->load->view('NoexpertAvailable',$data);
            
         }
         else{
        $expertName=json_decode($expert)->expertName; 
        $expertId=json_decode($expert)->expertId;
        
        $appointmentData['expertId']=json_decode($expert)->expertId;
        $this->session->set_userdata('expertId', $appointmentData['expertId']);
        $this->session->set_userdata('expertName',$expertName);
        $this->session->set_userdata('type',$this->input->post('type'));
        $appointmentData['clientId'] = $this->session->userdata('clientId');
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
        $consultationTypeIdByName = $this->input->post('categoryId');
        $sql = "SELECT `consultationTypeName` FROM `consultation_types` where `consultationTypeId` = $consultationTypeIdByName";
        $query = $this->db->query($sql);
        $consultationTypeIdByName = $query->row();
        $this->session->set_userdata('consultationTypeName', $consultationTypeIdByName->consultationTypeName);

        $appointmentData['amountPaid'] = $this->input->post('amountPaid');
        $this->session->set_userdata('ConsultationFees',$appointmentData['amountPaid']);
        if($this->input->post('ConsultationFees')=="Free") 
        {
        $this->session->set_userdata('amountPaid', $this->input->post('amountPaid'));
        $transcation['amount']= $this->input->post('amountPaid');
        }
        else{
        $appointmentData['status'] = 'Pending';
        $this->session->set_userdata('amountPaid', $this->input->post('amountPaid'));
        $transcation['amount']= $this->input->post('amountPaid');
        }
        $appointmentId = $this->AppointmentDetailsModel->saveAppointmentData($appointmentData);
        $appointmentTime = date('h:i A', strtotime($appointmentData['appointmentStartTime'])) . "-" . date('h:i ', strtotime($appointmentData['appointmentEndTime']));
        $this->session->set_userdata('appointmentTime',$appointmentTime);
        //$expertId = $this->input->post('expertId');
        $sqlExpertEmailId = "select expertEmailId,expertName,expertMobileNumber from expert_personal_details  where expertId='$expertId'";
        $queryExpertEmailId = $this->db->query($sqlExpertEmailId);
        $expertEmailId = $queryExpertEmailId->row();
        $this->session->set_userdata('expertMobileNumber',$expertEmailId->expertMobileNumber);
        $this->session->set_userdata('expertEmailId',$expertEmailId->expertEmailId);
        //------------------------get ClientEmail id
        $clientId = $this->session->userdata('clientId');
        $sqlCliientEmailId = "select clientEmailId,clientName,clientMobileNumber from client_personal_details  where clientId='$clientId'";
        $queryCliientEmailId = $this->db->query($sqlCliientEmailId);
        $CliientEmailId = $queryCliientEmailId->row();
        $this->session->set_userdata('clientMobileNumber',$CliientEmailId->clientMobileNumber);
        $this->session->set_userdata('clientEmailId',$CliientEmailId->clientEmailId);
        $this->session->set_userdata('clientName',$CliientEmailId->clientName);
        $transcation['clientEmailId']=$CliientEmailId->clientEmailId;
        $transcation['clientName']=$this->input->post('expertName');
        $transcation['clientMobileNumber']=$CliientEmailId->clientMobileNumber;
     

        $clientMobileNumber = $this->AppointmentDetailsModel->fetchClientMobileNumber($appointmentData['clientId']);
       //------clientAppoiment booking----

        $this->session->set_userdata('appointmentId', $appointmentId);
        if($PaymentMode=="Paytm")
        {
           $this->load->view('TxnTestInstantOffer',$transcation); 
        }   
        else if($PaymentMode=="PayU")
        {
          $this->load->view('transcationInstantOffer',$transcation);  
        }
        elseif($this->input->post('ConsultationFees')=="Free")
         {
           $_POST['STATUS']="TXN_SUCCESS";
            $_POST['TXNAMOUNT']="Free";
            $_POST['ORDERID']=$appointmentId;
            $this->session->set_userdata('ConsultationFees','Free');
            redirect(base_url() .'Ajaxcalls/Response');
         }
         }
           
        }        
    
 function updateAppointmentStatus($appointmentId) {
        $updateData = array(
            'consultationStatusId' => 2
        );
        $this->db->where('appointmentId', $appointmentId);
        $this->db->update('appointment_details', $updateData);
    }
    function fetchAppointmentDetails() {
        $consultationId = $this->input->post('consultationId');
        $clientId = $this->session->userdata('clientId');

        $this->db->select('*', 'expert_personal_details.expertName');
        $this->db->from('appointment_details');
        $this->db->join('expert_personal_details', 'expert_personal_details.expertId = appointment_details.expertId', 'left');
        $this->db->join('consultation_types', 'consultation_types.consultationTypeId = appointment_details.consultationTypeId', 'left');
        $this->db->join('consultation_status', 'consultation_status.consultationStatusId=appointment_details.consultationStatusId', 'left');
        $this->db->join('expert_professional_details', 'expert_professional_details.expertId= appointment_details.expertId', 'left');
        $this->db->join('expert_categories', 'expert_categories.categoryId=expert_professional_details.expertCategoryId', 'left');
        $this->db->where([ 'appointment_details.clientId' => $clientId, 'consultation_status.consultationStatusId' => $consultationId]);
        $this->db->order_by("appointmentId", "desc");
        $appointmentDetailsQuery = $this->db->get();
        if ($appointmentDetailsQuery->num_rows() > 0) {
            $appointmentDataSet['appointmentData'] = $appointmentDetailsQuery->result();
        } else {
            $appointmentDataSet['appointmentData'] = "No Data Found";
        }
        $this->load->model('FetchDefaultValuesModel');
        $appointmentDataSet['consultationStatus'] = $this->FetchDefaultValuesModel->fetchConsultationStatusDetails();
        header('Content-Type: application/json');
        echo json_encode($appointmentDataSet);
    }
    function fetchExpertAppointmentDetails()
    {
         $consultationId=$this->input->post('consultationId');
         $expertId=$this->session->userdata('expertId');
        
       $this->db->select('*','client_personal_details.clientName');
        $this->db->from('appointment_details');
        $this->db->join('client_personal_details', 'client_personal_details.clientId = appointment_details.clientId', 'left');
        $this->db->join('consultation_types', 'consultation_types.consultationTypeId = appointment_details.consultationTypeId', 'left');
        $this->db->join('consultation_status', 'consultation_status.consultationStatusId=appointment_details.consultationStatusId', 'left');
        $this->db->where(['expertId' => $this->session->userData('expertId'),'consultation_status.consultationStatusId'=>$consultationId]);
         $this->db->order_by("appointmentId", "DESC");

        $this->db->order_by("appointmentId", "desc");
        $appointmentDetailsQuery = $this->db->get();
         if ($appointmentDetailsQuery->num_rows() > 0) {
           $appointmentDataSet['appointmentData']=$appointmentDetailsQuery->result();
        } else {
            $appointmentDataSet['appointmentData']="No Data Found";
        }
        $this->load->model('FetchDefaultValuesModel');
        $appointmentDataSet['consultationStatus'] = $this->FetchDefaultValuesModel->fetchConsultationStatusDetails();
        //print_r($appointmentDataSet['appointmentData']);
        header('Content-Type: application/json');
        echo json_encode($appointmentDataSet);
        
    }
    function paytmpost() {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        // following files need to be included
        require_once(APPPATH . "/third_party/paytmlib/config_paytm.php");
        require_once(APPPATH . "/third_party/paytmlib/encdec_paytm.php");

        $checkSum = "";
        $paramList = array();

        $ORDER_ID = $_POST["ORDER_ID"];
        $CUST_ID = $_POST["CUST_ID"];
        $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
        $CHANNEL_ID = $_POST["CHANNEL_ID"];
        $TXN_AMOUNT = $_POST["TXN_AMOUNT"];
        $CALLBACK_URL = $_POST["CALLBACK_URL"];

// Create an array having all required parameters for creating checksum.
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        $paramList["CALLBACK_URL"] = $CALLBACK_URL;
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
        echo "<html><head><title>Merchant Check Out Page</title></head><body><center><h1>Please do not refresh this page...</h1></center>
        <form method='post' action='" . PAYTM_TXN_URL . "' name='f1'>
<table border='1'>
 <tbody>";

        foreach ($paramList as $name => $value) {
            echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
        }

        echo "<input type='hidden' name='CHECKSUMHASH' value='" . $checkSum . "'></tbody></table>
            <script type='text/javascript'>
             document.f1.submit();
            </script>
            </form>
            </body>
            </html>";
    }

    
    function Response()
    {
      //check host 
       $hostId='';
       $this->db->select('user_id');
       $query = $this->db->get('zoom_users')->result_array();
        $success="TXN_SUCCESS";
       
       	
       	
        if($success=="TXN_SUCCESS")
        { 
		 $appointmentId=$this->session->userdata('appointmentId');
		 $appointment_info = $this->db->query("SELECT * FROM appointment_details WHERE appointmentId = '".$appointmentId."'")->row();
		 if($appointment_info->consultationTypeId == '1')
		 {
        $data=$this->createAMeeting($hostId);    
        $data['status']='success';
        $data['host_id']=$hostId;
        $this->db->where('appointmentId',$this->session->userdata('appointmentId'));
        $this->db->update('appointment_details', $data);
        $expertName =$this->session->userdata('expertName');
        $appointmentDate =$this->session->userdata('appointmentDate');
        $clientMobileNumber=$this->session->userdata('clientMobileNumber');
        $clientName=$this->session->userdata('clientName');
        $expertMobileNumber=$this->session->userdata('expertMobileNumber');
        $appointmentTime=$this->session->userdata('appointmentTime');
        $clientEmailId=$this->session->userdata('clientEmailId');
        $expertEmailId=$this->session->userdata('expertEmailId');
        $appointmentId=$this->session->userdata('appointmentId');
        $appointmentBookingDate=$this->session->userdata('appointmentBookingDate');
        $consultationTypeName=$this->session->userdata('consultationTypeName');
        $appointmentStartTime=$this->session->userdata('appointmentStartTime');
        $appointmentEndTime=$this->session->userdata('appointmentEndTime');
         //-------------------- To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            
            
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($clientEmailId);
            $data = array(
                'consultingExpert'=>$expertName,
                'appointmentId'=>$appointmentId,
                'appointmentBookingDate'=>$appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/clientBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            $this->email->initialize($config);

            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($expertEmailId);
            $data = array(
                'consultingExpert' => $clientName,
                'appointmentId' => $appointmentId,
                'appointmentBookingDate' => $appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/expertBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            /*
             * To SEND SMS
             */
            
            $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
            $msg = "Dear " . $clientName . ", Your appointment with Mr/Ms $expertName is confirmed for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime ." Free Cancellation upto 24hrs. before appointment.Team Visheshagya";

            $json = file_get_contents($url . urlencode($msg));
            /*
             * TO SEND SMS TO EXPERT
             */
            $expertSMSUrl = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $expertSMS = "Dear " . $expertName . ", Your appointment with Mr/Ms $clientName is booked for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime." Team Visheshagya";
            $json = file_get_contents($expertSMSUrl . urlencode($expertSMS));
            $output = json_decode($json, TRUE);
		 }
		 elseif($appointment_info->consultationTypeId == '2')
		 {
		$expertName =$this->session->userdata('expertName');
		$expertMobileNumber =$this->session->userdata('expertMobileNumber');
		$extension = "20";
		$operator_user_info = $this->createAudioUser($expertMobileNumber,$expertName,$extension);
		echo $uuid = $operator_user_info->uuid;exit;
		
		$this->db->query("UPDATE appointment_details SET uuid = '".$uuid."' WHERE appointmentId = '".$appointmentId."'");
		
        $data['status']='success';
        $data['host_id']=$hostId;
        $this->db->where('appointmentId',$this->session->userdata('appointmentId'));
        $this->db->update('appointment_details', $data);
        $expertName =$this->session->userdata('expertName');
        $appointmentDate =$this->session->userdata('appointmentDate');
        $clientMobileNumber=$this->session->userdata('clientMobileNumber');
        $clientName=$this->session->userdata('clientName');
        $expertMobileNumber=$this->session->userdata('expertMobileNumber');
        $appointmentTime=$this->session->userdata('appointmentTime');
        $clientEmailId=$this->session->userdata('clientEmailId');
        $expertEmailId=$this->session->userdata('expertEmailId');
        $appointmentId=$this->session->userdata('appointmentId');
        $appointmentBookingDate=$this->session->userdata('appointmentBookingDate');
        $consultationTypeName=$this->session->userdata('consultationTypeName');
        $appointmentStartTime=$this->session->userdata('appointmentStartTime');
        $appointmentEndTime=$this->session->userdata('appointmentEndTime');
         //-------------------- To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            
            
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($clientEmailId);
            $data = array(
                'consultingExpert'=>$expertName,
                'appointmentId'=>$appointmentId,
                'appointmentBookingDate'=>$appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/clientBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            $this->email->initialize($config);

            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($expertEmailId);
            $data = array(
                'consultingExpert' => $clientName,
                'appointmentId' => $appointmentId,
                'appointmentBookingDate' => $appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/expertBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            /*
             * To SEND SMS
             */
            
            $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
            $msg = "Dear " . $clientName . ", Your appointment with Mr/Ms $expertName is confirmed for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime ." Free Cancellation upto 24hrs. before appointment.Team Visheshagya";

            $json = file_get_contents($url . urlencode($msg));
            /*
             * TO SEND SMS TO EXPERT
             */
            $expertSMSUrl = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $expertSMS = "Dear " . $expertName . ", Your appointment with Mr/Ms $clientName is booked for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime." Team Visheshagya";
            $json = file_get_contents($expertSMSUrl . urlencode($expertSMS));
            $output = json_decode($json, TRUE);
		 }
		 else
		 {
			 
		 }

        } 
        

        $this->load->view('paytm_success_view');
        
    }
    function Zoom()
    {
      
        //$this->load->view('Zoom_view');
        $res=$this->createAMeeting();
        print_r($res);
        
    }
    /* Zoom Video Confernceing Inetgration */
    function sendRequest($calledFunction, $data){
       
		/*Creates the endpoint URL*/
		$request_url = 'https://api.zoom.us/v1/'.$calledFunction;

		/*Adds the Key, Secret, & Datatype to the passed array*/
		$data['api_key'] ='2QV3ek0_TRqf-EQl98-OAA';
		$data['api_secret'] ='pwgHZGPR4hVzAmbfjzdV2rYL1LeaQkDLomwK';
		//$data['api_key'] ='hxMw91jVTamalS2y9krx9w';
		//$data['api_secret'] ='7sZ1EBNCic3KNzDYEzZb0DtGOJVNuyDOYeAk';
		$data['data_type'] = 'JSON';

		$postFields = http_build_query($data);
		/*Check to see queried fields*/
		/*Preparing Query...*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$response = curl_exec($ch);
		/*Check for any errors*/
		$errorMessage = curl_exec($ch);
		//echo $errorMessage;
		curl_close($ch);
		if(!$response){
			return false;
		}
		/*Return the data in JSON format*/
               // header('Content-Type: application/json');	
		 return $response ;
	}
	/*Functions for management of users*/

  function createAUser(){		
		$createAUserArray = array();
		$createAUserArray['email'] = $_POST['userEmail'];
		$createAUserArray['type'] = $_POST['userType'];
		header('Content-Type: application/json');
		return $this->sendRequest('user/create', $createAUserArray);
	}   

	function autoCreateAUser(){
	  $autoCreateAUserArray = array();
	  $autoCreateAUserArray['email'] = $_POST['userEmail'];
	  $autoCreateAUserArray['type'] = $_POST['userType'];
	  $autoCreateAUserArray['password'] = $_POST['userPassword'];
	  header('Content-Type: application/json');
	  return $this->sendRequest('user/autocreate', $autoCreateAUserArray);
	}

	function custCreateAUser(){
	  $custCreateAUserArray = array();
	  $custCreateAUserArray['email'] = $_POST['userEmail'];
	  $custCreateAUserArray['type'] = $_POST['userType'];
	  header('Content-Type: application/json');
	  return $this->sendRequest('user/custcreate', $custCreateAUserArray);
	}  

	function deleteAUser(){
	  $deleteAUserArray = array();
	  $deleteAUserArray['id'] = $_POST['userId'];
	  return $this->sendRequest('user/delete', $deleteUserArray);
	}     

	function listUsers(){
	  $listUsersArray = array();
	  return $this->sendRequest('user/list', $listUsersArray);
	}   

	function listPendingUsers(){
	  $listPendingUsersArray = array();
	  return $this->sendRequest('user/pending', $listPendingUsersArray);
	}    

	function getUserInfo(){
	  $getUserInfoArray = array();
	  $getUserInfoArray['id'] = $_POST['userId'];
	  return $this->sendRequest('user/get',$getUserInfoArray);
	}   

	function getUserInfoByEmail(){
	  $getUserInfoByEmailArray = array();
	  $getUserInfoByEmailArray['email'] = $_POST['userEmail'];
	  $getUserInfoByEmailArray['login_type'] = $_POST['userLoginType'];
	  return $this->sendRequest('user/getbyemail',$getUserInfoByEmailArray);
	}  

	function updateUserInfo(){
	  $updateUserInfoArray = array();
	  $updateUserInfoArray['id'] = $_POST['userId'];
	  return $this->sendRequest('user/update',$updateUserInfoArray);
	}  

	function updateUserPassword(){
	  $updateUserPasswordArray = array();
	  $updateUserPasswordArray['id'] = $_POST['userId'];
	  $updateUserPasswordArray['password'] = $_POST['userNewPassword'];
	  return $this->sendRequest('user/updatepassword', $updateUserPasswordArray);
	}      

	/*Functions for management of meetings*/
	function createAMeeting($hostId){
          
	  $createAMeetingArray = array();
	  $createAMeetingArray['host_id'] =$hostId;
	  $createAMeetingArray['topic'] = 'Appointment Booking with Legal Expert';
	  /*$createAMeetingArray['type'] = 1;
	  $createAMeetingArray['option_jbh'] = true;
	  $createAMeetingArray['option_audio']='both';
	  $createAMeetingArray['registration_type']=1;*/
	  $createAMeetingArray['type'] = 2;
	  $createAMeetingArray['duration'] = 30;
	  $createAMeetingArray['timezone'] = 'Asia/Kolkata';
	  $createAMeetingArray['option_jbh'] = true;
	  $createAMeetingArray['option_audio']='both';
	  $data=$this->sendRequest('meeting/create', $createAMeetingArray);
          $arr=json_decode($data);
          $updateData['start_url']=$arr->start_url;
          $updateData['join_url']=$arr->join_url;
          $updateData['meeting_id']=$arr->id;
          return $updateData;
	}
	function createScheduleMeeting($hostId){
	  $createAMeetingArray = array();
	  $createAMeetingArray['host_id'] =$hostId;
	  $createAMeetingArray['topic'] = 'Appointment Booking with Legal Expert';
	  $createAMeetingArray['type'] = 2;
	  $createAMeetingArray['duration'] = 60;
	  $createAMeetingArray['timezone'] = 'Asia/Kolkata';
	  $createAMeetingArray['option_jbh'] = true;
	  $createAMeetingArray['option_audio']='both';
	   $data=$this->sendRequest('meeting/create', $createAMeetingArray);
	  $arr=json_decode($data);
          $updateData['start_url']=$arr->start_url;
          $updateData['join_url']=$arr->join_url;
          $updateData['meeting_id']=$arr->id;
          return $updateData;
	}

	function deleteAMeeting(){
	  $deleteAMeetingArray = array();
	  $deleteAMeetingArray['id'] = $_POST['meetingId'];
	  $deleteAMeetingArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('meeting/delete', $deleteAMeetingArray);
	}

	function listMeetings(){
	  $listMeetingsArray = array();
	  $listMeetingsArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('meeting/list',$listMeetingsArray);
	}

	function getMeetingInfo(){
      $getMeetingInfoArray = array();
	  $getMeetingInfoArray['id'] = $_POST['meetingId'];
	  $getMeetingInfoArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('meeting/get', $getMeetingInfoArray);
	}

	function updateMeetingInfo(){
	  $updateMeetingInfoArray = array();
	  $updateMeetingInfoArray['id'] = $_POST['meetingId'];
	  $updateMeetingInfoArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('meeting/update', $updateMeetingInfoArray);
	}

	function endAMeeting(){
      $endAMeetingArray = array();
	  $endAMeetingArray['id'] = $_POST['meetingId'];
	  $endAMeetingArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('meeting/end', $endAMeetingArray);
	}

	function listRecording(){
      $listRecordingArray = array();
	  $listRecordingArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('recording/list', $listRecordingArray);
	}
	/*Functions for management of reports*/
	function getDailyReport(){
	  $getDailyReportArray = array();
	  $getDailyReportArray['year'] = $_POST['year'];
	  $getDailyReportArray['month'] = $_POST['month'];
	  return $this->sendRequest('report/getdailyreport', $getDailyReportArray);
	}

	function getAccountReport(){
	  $getAccountReportArray = array();
	  $getAccountReportArray['from'] = $_POST['from'];
	  $getAccountReportArray['to'] = $_POST['to'];
	  return $this->sendRequest('report/getaccountreport', $getAccountReportArray);
	}

	function getUserReport(){
	  $getUserReportArray = array();
	  $getUserReportArray['user_id'] = $_POST['userId'];
	  $getUserReportArray['from'] = $_POST['from'];
	  $getUserReportArray['to'] = $_POST['to'];
	  return $this->sendRequest('report/getuserreport', $getUserReportArray);
	}
	/*Functions for management of webinars*/
	function createAWebinar(){
	  $createAWebinarArray = array();
	  $createAWebinarArray['host_id'] = $_POST['userId'];
	  $createAWebinarArray['topic'] = $_POST['topic'];
	  return $this->sendRequest('webinar/create',$createAWebinarArray);
	}

	function deleteAWebinar(){
	  $deleteAWebinarArray = array();
	  $deleteAWebinarArray['id'] = $_POST['webinarId'];
	  $deleteAWebinarArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('webinar/delete',$deleteAWebinarArray);
	}

	function listWebinars(){
	  $listWebinarsArray = array();
	  $listWebinarsArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('webinar/list',$listWebinarsArray);
	}

	function getWebinarInfo(){
	  $getWebinarInfoArray = array();
	  $getWebinarInfoArray['id'] = $_POST['webinarId'];
	  $getWebinarInfoArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('webinar/get',$getWebinarInfoArray);
	}

	function updateWebinarInfo(){
	  $updateWebinarInfoArray = array();
	  $updateWebinarInfoArray['id'] = $_POST['webinarId'];
	  $updateWebinarInfoArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('webinar/update',$updateWebinarInfoArray);
	}

	function endAWebinar(){
	  $endAWebinarArray = array();
	  $endAWebinarArray['id'] = $_POST['webinarId'];
	  $endAWebinarArray['host_id'] = $_POST['userId'];
	  return $this->sendRequest('webinar/end',$endAWebinarArray);
	}
	function  updateExpertStatus($status)
        {
            $expertId=$this->session->userdata('expertId');
            $data['status']=$status;
             $this->db->where('expertId',$expertId);
             if($this->db->update('expert_personal_details', $data))
             {
                $this->session->set_userdata('status',$status);
             }
            redirect($_SERVER['HTTP_REFERER']);
            
        }
  function createQuery()
    {
     $this->load->helper('form');
     $this->load->library('form_validation');
     $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phonenumber', 'Phone number', 'required');
    $this->form_validation->set_rules('query', 'Query', 'required');
    
    if ($this->form_validation->run() === FALSE)
    {
       $data['title']="All our experts are busy";    
        $this->load->view('NoexpertAvailable',$data);

    }
    else
    {
      $data = array(
        'name' => $this->input->post('name'),
        'Note' => $this->input->post('query'),
        'mobile_number' => $this->input->post('phonenumber'),
        'created_date'=>date('Y-m-d')
       );
     if($this->db->insert('instantQuery', $data))
        {
            $data['title']="All our experts are busy";	
            $this->session->set_flashdata('message','We will get back to you soon sortly');
        }
        
        $this->load->view('NoexpertAvailable',$data);
    }

    }
    function timeOver(){
    $data['title']="No Expert Available";
    $this->load->view('NoexpertAvailable',$data);
    }
    function getSubFolderList()
       {
          $FolderName=$this->input->post('FolderName');
          
          $dirRef=opendir('./expertdocuments/' . $this->session->userdata('expertId').'/'.$FolderName);
            while($res=readdir($dirRef))
            {
                    if($res!="." and $res!=".." and (is_dir('./expertdocuments/' . $this->session->userdata('expertId').'/'.$FolderName.'/'.$res)))
                    {
                    $subfolder[]=array('subfolder'=>$res);
                    }
            }
            header('Content-Type: application/json');
            echo json_encode($subfolder);


       }
       
       function renameExpertDocument(){

        
        $old_folder_name=$this->input->post('old_folder_name');
        $new_folder_name=$this->input->post('new_folder_name');
        $path=$this->input->post('path');

        rename($path.'/'.$old_folder_name, $path.'/'. $new_folder_name);
        echo "success";





       }
    
	
	public function createAudioUser($contact_number,$name,$extension)
	{
		$url = 'https://developers.myoperator.co/user';

		//data
		$data = array(
		"token" => "df654414958cce7f1e5bad3b9fcb4ba4",
		"name"=>$name,
		"contact_number"=>$contact_number,
		"country_code"=>"91",
		"extension"=>$extension
		);

		try {
			$ch = curl_init($url);
			$data_string = json_encode($data);

			if (FALSE === $ch)
				throw new Exception('failed to initialize');

				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
				curl_setopt($ch, CURLOPT_TIMEOUT, 5);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

				$output = curl_exec($ch);

				
		return $output;
			// ...process $output now
		} catch(Exception $e) {

		}
	}

    public function clickocall()
    {

        $appointmentId = $this->input->post('appointmentId');
        $appointment_info = $this->db->query("SELECT * FROM appointment_details WHERE appointmentId = '".$appointmentId."'")->row();
        $clientId = $appointment_info->clientId;

         $client_info = $this->db->query("SELECT * FROM client_personal_details WHERE clientId = '".$clientId."'")->row();

        $uuid = $appointment_info->uuid;

        $url = 'https://developers.myoperator.co/clickOcall';

		//data
		$data = array(
		"token" => "df654414958cce7f1e5bad3b9fcb4ba4",
		"customer_number"=>$client_info->clientMobileNumber,
		"customer_cc"=>"91",
		"support_user_id"=>"$uuid"
		);

		try {
			$ch = curl_init($url);
			$data_string = json_encode($data);

			if (FALSE === $ch)
				throw new Exception('failed to initialize');

				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
				curl_setopt($ch, CURLOPT_TIMEOUT, 5);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

				$output = curl_exec($ch);

			if (FALSE === $output)
				throw new Exception(curl_error($ch), curl_errno($ch));
			
			echo "<pre>";print_r($output);exit;

			// ...process $output now
		} catch(Exception $e) {

         trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);
		}


    }

}