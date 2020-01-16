<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
	function __construct() {
		
	}
	public function checkUser($data = array()){
		$this->tableName = 'users1';
        $this->primaryKey = 'id';
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
    public function checkExpertUser($data = array()){


		$this->db->select('expertId');
		$this->db->from('expert_personal_details');
               
		$this->db->where(array('expertEmailId'=>$data['expertEmailId']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			
			$data['modified_date'] = date("Y-m-d H:i:s");
			$update = $this->db->update('expert_personal_details',$data,array('expertId'=>$prevResult['expertId']));
			$userID = $prevResult['expertId'];
		}else{
			$data['registered_date'] = date("Y-m-d H:i:s");
			$data['modified_date'] = date("Y-m-d H:i:s");
                        $data['userType'] = "Expert";

			$insert = $this->db->insert('expert_personal_details',$data);
			$userID = $this->db->insert_id();
			$addressData['expertId'] = $this->db->insert_id();
                         $this->db->insert('expert_address_details', $addressData);
                             $consultationData['expertId'] = $userID;
                            $consultationData['consultationTypeId'] = 1;
                            $consultationData['consultationFees'] = 0;
                             $consultationData['isActive'] = 1;
                         $this->db->insert('expert_consultation_details_mapping', $consultationData);
		}

		return $userID?$userID:FALSE;
    }
}
