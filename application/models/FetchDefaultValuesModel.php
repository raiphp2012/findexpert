<?php

/*
 * @author Visheshagya
 */

class FetchDefaultValuesModel extends CI_Model {

    function fetchConsultationData($expertId) {
    	$this->updateAppointmentsData();
        $response['consultationTypes'] = $this->db->get('consultation_types')->result();
        $consultationData = $this->db->get_where('expert_consultation_details_mapping', ['expertId' => $expertId]);
        if ($consultationData->num_rows() > 0)
            $response['consultationData'] = $consultationData->result();
        else {
            $response['consultationData'] = 0;
        }
        return $response;
    }

    function fetchAppointmentDetails() {
   	 $this->updateAppointmentsData();

        $this->db->select('*', 'client_personal_details.clientName');
        $this->db->from('appointment_details');
        $this->db->join('client_personal_details', 'client_personal_details.clientId = appointment_details.clientId', 'left');
        $this->db->join('consultation_types', 'consultation_types.consultationTypeId = appointment_details.consultationTypeId', 'left');
        $this->db->join('consultation_status', 'consultation_status.consultationStatusId=appointment_details.consultationStatusId', 'left');
        $this->db->where(['appointment_details.expertId' => $this->session->userData('expertId'),'appointment_details.status' => 'success']);
         $this->db->order_by("appointmentId", "DESC");

        $appointmentDetailsQuery = $this->db->get();
       
        if ($appointmentDetailsQuery->num_rows() > 0) {
            return $appointmentDetailsQuery->result();
        } else {
            return 0;
        }
    }

    
        function fetchClientAppointments() {
        $this->updateAppointmentsData();
        $this->db->select('appointment_details.*,expert_personal_details.expertName,consultation_types.consultationTypeName,consultation_status.consultationStatusName,expert_categories.	categoryName');
        $this->db->from('appointment_details');
        $this->db->join('expert_personal_details', 'expert_personal_details.expertId = appointment_details.expertId', 'left');
        $this->db->join('consultation_types', 'consultation_types.consultationTypeId = appointment_details.consultationTypeId', 'left');
        $this->db->join('consultation_status', 'consultation_status.consultationStatusId=appointment_details.consultationStatusId', 'left');
        $this->db->join('expert_professional_details', 'expert_professional_details.expertId= appointment_details.expertId', 'left');
        $this->db->join('expert_categories', 'expert_categories.categoryId=expert_professional_details.expertCategoryId', 'left');
        $this->db->where(['appointment_details.clientId' => $this->session->userData('clientId'),'appointment_details.status' => 'success']);
        $this->db->group_by("appointmentId");
        $this->db->order_by("appointmentId", "DESC");

        $appointmentDetailsQuery = $this->db->get();
        
        if ($appointmentDetailsQuery->num_rows() > 0) {
            return $appointmentDetailsQuery->result();
        } else {
            return 0;
        }
    }

    function fetchConsultationStatusDetails() {
    $this->updateAppointmentsData();
        $consultationStatus = $this->db->get('consultation_status');
        if ($consultationStatus->num_rows() > 0) {
            return $consultationStatus->result();
        } else {
            return 0;
        }
    }
     function updateAppointmentsData()
    {
        $sql=" update `appointment_details` set `consultationStatusId`= 4  where `consultationStatusId`=1 and `appointmentDate`< curdate()";
        $this->db->query($sql);
    }

    function fetchPersonalDetails($expertId) {
    $this->updateAppointmentsData();
        $this->db->select('*', 'expert_address_details');
        $this->db->from('expert_personal_details');
        $this->db->join('expert_address_details', 'expert_address_details.expertId = expert_personal_details.expertId');
        $this->db->where(['expert_personal_details.expertId' => $expertId]);
        $personalDetails = $this->db->get();
        if ($personalDetails->num_rows() > 0) {
            return $personalDetails->row();
        } else {
            return 0;
        }
    }

    function fetchExpertSubCategoriesDetails($expertId) {
    $this->updateAppointmentsData();
        $subCategoryDetails = $this->db->get_where('expert_sub_category_mapping', ['expertId' => $expertId])->result();
        return $subCategoryDetails;
    }

    function fetchExpertProfessionalDetails($expertId) {
    $this->updateAppointmentsData();
        $professionalDetails = $this->db->query("SELECT expert_categories.*,expert_professional_details.* FROM expert_professional_details 
JOIN expert_categories ON expert_categories.categoryId = expert_professional_details.expertCategoryId 
WHERE expertId = $expertId")->result();
        return $professionalDetails;
    }

     function fetchClientAppointmentDetails($clientId, $expertId) {
     $this->updateAppointmentsData();
        $this->db->select('*', 'client_personal_details.clientName,consultation_status.consultationStatusName,expert_personal_details.expertMobileNumber');
        $this->db->from('appointment_details');
        $this->db->join('client_personal_details', 'client_personal_details.clientId = appointment_details.clientId', 'left');
        $this->db->join('consultation_types', 'consultation_types.consultationTypeId = appointment_details.consultationTypeId', 'left');
        $this->db->join('consultation_status', 'consultation_status.consultationStatusId = appointment_details.consultationStatusId', 'left');
        $this->db->join('expert_personal_details','expert_personal_details.expertId = appointment_details.expertId');
        $this->db->where(['expert_personal_details.expertId' => $expertId, 'appointment_details.clientId' => $clientId,'appointment_details.status' => 'success']);
         $this->db->order_by("appointmentId", "DESC");

        $appointmentDetailsQuery = $this->db->get();
        if ($appointmentDetailsQuery->num_rows() > 0) {
            return $appointmentDetailsQuery->result();
        } else {
            return 0;
        }
    }
    

    function fetchExpertAppointmentDetails($clientId, $expertId) {
    $this->updateAppointmentsData();
        $this->db->select('*', 'expert_personal_details.expertName,consultation_status.consultationStatusName');
        $this->db->from('appointment_details');
        $this->db->join('expert_personal_details', 'expert_personal_details.expertId = appointment_details.expertId', 'left');
        $this->db->join('consultation_types', 'consultation_types.consultationTypeId = appointment_details.consultationTypeId', 'left');
        $this->db->join('consultation_status', 'consultation_status.consultationStatusId = appointment_details.consultationStatusId', 'left');
        $this->db->where(['clientId' => $clientId, 'appointment_details.expertId' => $expertId,'appointment_details.status' => 'success']);
        $this->db->order_by("appointmentId", "DESC");
        $appointmentDetailsQuery = $this->db->get();
        if ($appointmentDetailsQuery->num_rows() > 0) {
            return $appointmentDetailsQuery->result();
        } else {
            return 0;
        }
    }

    function fetchSharedFiles() {
    $this->updateAppointmentsData();
        $sharedFileDetails = $this->db->get_where('shared_file_details', ['clientId' => $this->session->userdata('clientId'), 'expertId' => 1, 'isCurrentlyShared' => 1]);
        if ($sharedFileDetails->num_rows()) {
            return $sharedFileDetails->result();
        } else {
            return -1;
        }
    }






    function fetchExpertSharedFiles($clientId) {
    $this->updateAppointmentsData();
        $sharedFileDetails = $this->db->get_where('shared_file_details', ['clientId' => $clientId, 'expertId' => $this->session->userdata('expertId'), 'isCurrentlyShared' => 1]);
        if ($sharedFileDetails->num_rows()) {
            return $sharedFileDetails->result();
        } else {
            return -1;
        }
    }

    function fetchClientSharedFiles($expertId) {
    $this->updateAppointmentsData();
        $sharedFileDetails = $this->db->get_where('shared_file_details', ['expertId' => $expertId, 'clientId' => $this->session->userdata('clientId'), 'isCurrentlyShared' => 1]);
        if ($sharedFileDetails->num_rows()) {
            return $sharedFileDetails->result();
        } else {
            return -1;
        }
    }

    function fetchConsultationTime($expertId) {
    $this->updateAppointmentsData();

        $consultationData = $this->db->get_where('expert_consultation_timing', ['expertId' => $expertId]);
        if ($consultationData->num_rows() > 0)
            $response['consultationData'] = $consultationData->row();
        else {
            $response['consultationData'] = 0;
        }
        return $response;
    }

    function fetchAccountDetails($expertId) {
    $this->updateAppointmentsData();

        $accountData = $this->db->get_where('expert_bank_account_details', ['expertId' => $expertId]);
        if ($accountData->num_rows() > 0)
            $response['accountData'] = $accountData->row();
        else {
            $response['accountData'] = 0;
        }
        return $response;
    }

    function fetchExpertFees($consultationTypeId, $expertId) {
    $this->updateAppointmentsData();
    $parentId=$this -> db->select('parent_id')
           -> where('expertId', $expertId)
           -> get('expert_personal_details')->row();
          
         if( $parentId->parent_id!=0)
         {
           $expertId=$parentId->parent_id; 
         } 
         else{
             $expertId= $expertId;
         } 
        $this->db->select('consultationFees');
        $consultationFees = $this->db->get_where('expert_consultation_details_mapping', ['expertId' => $expertId, 'consultationTypeId' => $consultationTypeId])->row();
        if (is_object($consultationFees))
            return $consultationFees->consultationFees;
        else
            return -1;
    }

    function fetchCallingDetails($callingData) {
    $this->updateAppointmentsData();
        $this->db->select('clientMobileNumber');
        $client = $this->db->get_where('client_personal_details', ['clientId' => $callingData['clientId']])->row();
        $returnData['clientMobileNumber'] = $client->clientMobileNumber;
        $this->db->select('expertMobileNumber');
        $expert = $this->db->get_where('expert_personal_details', ['expertId' => $callingData['expertId']])->row();
        $returnData['expertMobileNumber'] = $expert->expertMobileNumber;
        return $returnData;
    }
     function appointmentDataNotes($clientId,$expertId)
    {
        $this->updateAppointmentsData();
        $con="(expertId ='$expertId' and shared=1 and clientId='$clientId' ) or (owner ='Expert-$expertId'  and clientId='$clientId' ) ";
        $this->db->select('*');
        $this->db->from('notes');
        $this->db->where($con);
        $this->db->order_by("chat_id", "DESC");
         $appointmentDataNotes = $this->db->get();
        
        if ($appointmentDataNotes->num_rows()) {
            return $appointmentDataNotes->result();
        } else {
            return $appointmentDataNotes='No Note Available';
        }



    }
    function appointmentActionTakenData($clientId,$expertId){
        $con=" expertId ='$expertId' and clientId='$clientId' ";
        $this->db->select('*');
        $this->db->from('actions_taken');
        $this->db->where($con);
        $this->db->order_by("id", "DESC");
         $appointmentActionTakenData = $this->db->get();
        
        if ($appointmentActionTakenData->num_rows()) {
            return $appointmentActionTakenData->result();
        } else {
            return $appointmentActionTakenData='No Action  taken by Expert';
        }        

    }
    function appointmentClientDataNotes($clientId,$expertId)
    {
        $this->updateAppointmentsData();
        $con="(expertId ='$expertId' and shared=1 and clientId='$clientId' ) or (owner ='Client-$clientId'  and expertId='$expertId' ) ";
        $this->db->select('*');
        $this->db->from('notes');
        $this->db->where($con);
        $this->db->order_by("chat_id", "DESC");
         $appointmentDataNotes = $this->db->get();
        
        if ($appointmentDataNotes->num_rows()) {
            return $appointmentDataNotes->result();
        } else {
            return $appointmentDataNotes='No Note Available';
        }



    }
     function fetchMemberDetails() {
       
        $this->db->select('*');
        $this->db->from('expert_personal_details');
        
        $this->db->where(['parent_id' => $this->session->userData('expertId'),'status'=>'active']);

        $appointmentDetailsQuery = $this->db->get();
        if ($appointmentDetailsQuery->num_rows() > 0) {
            return $appointmentDetailsQuery->result();
        } else {
            return 0;
        }
    }

}