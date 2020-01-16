<?php

/*
 * @author Visheshagya
 */

class SaveExpertDetailsModel extends CI_Model {

    function saveExpertSignUpInformation($personalData, $professionalData) {
        if ($this->db->insert('expert_personal_details', $personalData)) {
            $expertId = $this->db->insert_id();
            $addressData['expertId'] = $expertId;
            $this->db->insert('expert_address_details', $addressData);

            $consultationData['expertId'] = $expertId;
            $consultationData['consultationTypeId'] = 1;
            $consultationData['consultationFees'] = 0;
            $consultationData['isActive'] = 1;
            $this->db->insert('expert_consultation_details_mapping', $consultationData);

            $professionalData['expertId'] = $expertId;
            $subCategoryData = $professionalData['subCategoryId'];
            unset($professionalData['subCategoryId']);
            $this->saveProfessionalDetails($professionalData, $expertId, $subCategoryData);
            return $expertId;
        }
    }

    function checkExpertInformation($personalData) {
        $expertCount = $this->db->get_where('expert_personal_details', $personalData)->num_rows();

        if ($expertCount == 0) {
            return 1;
        } else
            return -1;
    }

    function updateExpertPassword($expertEmailId, $password) {
        $this->db->where(['expertEmailId' => $expertEmailId]);
        if ($this->db->update('expert_personal_details', ['expertPassword' => $password])) {
            return 1;
        } else {
            return -1;
        }
    }

    function saveProfessionalDetails($professionalData, $expertId, $subCategoryData) {
        if ($this->db->insert('expert_professional_details', $professionalData)) {
            $expertProfessionalDetailsId = $this->db->insert_id();
            foreach ($subCategoryData as $subCategoryId) {
                $subCategoryData = array();
                $subCategoryData = ['subCategoryId' => $subCategoryId, 'expertId' => $expertId, 'expertProfessionalDetailsId' => $expertProfessionalDetailsId];
                $this->db->insert('expert_sub_category_mapping', $subCategoryData);
            }
            return true;
        }
    }

    function saveExpertProfessionalInformation($professionalData) {

        $subCategoryData = $professionalData['subCategoryId'];
        unset($professionalData['subCategoryId']);
        $expertId = $this->session->userdata('expertId');
        $professionalData['expertId'] = $expertId;
        if ($this->saveProfessionalDetails($professionalData, $expertId, $subCategoryData)) {
       
            return true;
        }
       
    }

    function updateExpertProfessionalInformation($professionalData) {
        $expertProfessionalDetailsId = $professionalData['expertProfessionalDetailsId'];
        unset($professionalData['expertProfessionalDetailsId']);

        $subCategoryData = $professionalData['subCategoryId'];
        unset($professionalData['subCategoryId']);

        $expertId = $this->session->userdata('expertId');
        $professionalData['expertId'] = $expertId;
        $this->db->where(['expertProfessionalDetailsId' => $expertProfessionalDetailsId]);
        $this->db->update('expert_professional_details', $professionalData);

        $this->db->where(['expertId' => $expertId]);
        $this->db->delete('expert_sub_category_mapping');

        foreach ($subCategoryData as $subCategoryId) {
            $subCategoryData = array();
            $subCategoryData = ['subCategoryId' => $subCategoryId, 'expertId' => $expertId, 'expertProfessionalDetailsId' => $expertProfessionalDetailsId];
            $this->db->insert('expert_sub_category_mapping', $subCategoryData);
        } {
            return true;
        }
    }

    function updateAndSaveExpertPersonalData($personalData, $addressData, $expertId) {
        $experEmailId = "";
        $expertEmailId = $personalData['expertEmailId'];
        unset($personalData['expertEmailId']);
        $flag = 1;
        $this->db->where('expertEmailId', $expertEmailId);
        if (!$this->db->update('expert_personal_details', $personalData)) {
            $flag = 0;
        }

        $addressQuery = $this->db->get_where('expert_address_details', ['expertId' => $expertId]);
        if ($addressQuery->num_rows() > 0) {
            if (!$this->db->update('expert_address_details', $addressData, ['expertId' => $expertId])) {
                $flag = 0;
            }
        } else {
            $addressData['expertId'] = $expertId;
            if (!$this->db->insert('expert_address_details', $addressData)) {
                $flag = 0;
            }
        }
        return $flag;
    }

    function updateConsultationDetails($consultationUpdateData) {
        $expertId = $consultationUpdateData['expertId'][0];
        $this->db->where('expertId', $expertId);
        $this->db->delete('expert_consultation_details_mapping');
        $flag = 0;
        for ($i = 0; $i < sizeof($consultationUpdateData['expertId']); $i++) {
            $consultationData = "";
            $consultationData['expertId'] = $consultationUpdateData['expertId'][$i];
            $consultationData['isActive'] = $consultationUpdateData['isActive'][$i];
            $consultationData['consultationFees'] = $consultationUpdateData['consultationFees'][$i];
            $consultationData['consultationTypeId'] = $consultationUpdateData['consultationTypeId'][$i];
            if ($this->db->insert('expert_consultation_details_mapping', $consultationData)) {
                $flag = 1;
            }
        }
        return $flag;
    }

    function saveExpertConsultationTimings($consultationData)
    {
        $consultationData['expertId'] = $this->session->userdata('expertId');

        
        $this->db->where('expertId', $consultationData['expertId']);
        $query = $this->db->get('expert_consultation_timing');
            if ($query->num_rows() == 0) 
            {
                
                if($this->db->insert('expert_consultation_timing',$consultationData))
                    unset ( $consultationData);
                return 1;

            }
            else
              {
                $this->db->where('expertId',$consultationData['expertId']);

                if($this->db->update('expert_consultation_timing', $consultationData))
                    unset ( $consultationData);
                     return 1;
              }         
    }
    function saveExpertBankAccountDetails($BankAccountDetails) {
        $BankAccountDetails['expertId'] = $this->session->userdata('expertId');
        $this->db->where('expertId', $BankAccountDetails['expertId']);
        $query = $this->db->get('expert_bank_account_details');
        if ($query->num_rows() == 0) {

            if ($this->db->insert('expert_bank_account_details', $BankAccountDetails))
                return 1;
        }
        else {
            $this->db->where('expertId', $BankAccountDetails['expertId']);

            if ($this->db->update('expert_bank_account_details', $BankAccountDetails))
                return 1;
        }
    }
	
	function update_teamMember_data($expertId,$personalData)
	{
		 if($personalData['expertPassword'] != '')
			 {
				 $expertPassword = $personalData['expertPassword'];
				 $expertMobileNumber = $personalData['expertMobileNumber'];
				 $personalData['expertPassword'] = md5($personalData['expertPassword']);
				if($this->db->update('expert_personal_details',$personalData,array("expertId"=>$expertId)))
				{
					 $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $msg="Your password has been changed. Your updated password is ".$expertPassword.". Please login to http://visheshagya.in/";
            $json = file_get_contents($url.urlencode($msg));
                $output = json_decode($json, TRUE);
					return 1;
				}
			 }
			 else
			 {
				 unset($personalData['expertPassword']);
				 if($this->db->update('expert_personal_details',$personalData,array("expertId"=>$expertId)))
				 {
					return 1;
				 }
			 }
				
	}

}