<?php

/*
 * @author Visheshagya
 */

class Loginmodel extends CI_Model {

    function validateUserLogin($loginData) {
        $tableName = $loginData['tableName'];
        unset($loginData['tableName']);
        $userValidationResult = $this->db->get_where($tableName, $loginData); //->result();
        if ($userValidationResult->num_rows() > 0) {
            return $userValidationResult->row()->clientId;
        } else {
            return 0;
        }
    }

    function validateExpertLogin($expertEmailId, $expertPassword) {
        $q = $this->db->where(['expertEmailId' => $expertEmailId, 'expertPassword' => $expertPassword])
                ->get('expert_personal_details');

        if ($q->num_rows()) {
            return $q->row();
        } else {
            return 0;
        }
    }
    function validateEmployeeLogin($expertEmailId, $expertPassword,$userType) {
        $q = $this->db->where(['expertEmailId' => $expertEmailId, 'expertPassword' => $expertPassword,'userType'=>$userType])
                ->get('expert_personal_details');

        if ($q->num_rows()) {
            return $q->row()->expertId;
        } else {
            return 0;
        }
    }

}
