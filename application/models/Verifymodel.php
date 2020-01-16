<?php

/*
 * @author Visheshagya
 */

class Verifymodel extends CI_Model {

    function verifyEmail($emailId) {
        $checkEmailResult = $this->db->get_where('expert_personal_details', ['expertEmailId' => $emailId]);
        if ($checkEmailResult->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
     function verifyEmployeeEmail($emailId,$usertype) {
        $checkEmailResult = $this->db->get_where('expert_personal_details', ['expertEmailId' => $emailId,'userType'=>$usertype]);
        if ($checkEmailResult->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function verifyClientEmail($emailId) {
        $checkEmailResult = $this->db->get_where('client_personal_details', ['clientEmailId' => $emailId]);
        if ($checkEmailResult->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
