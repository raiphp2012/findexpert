<?php

class ClientLogin extends CI_Model {

    public function validateClientLogin($clientEmailId, $clientPassword) {
        $q = $this->db->where(['clientEmailId' => $clientEmailId, 'clientPassword' => $clientPassword])
                ->get('client_personal_details');
                

        if ($q->num_rows()) {
        	return $q->row(); //return clientId for session            
        } else {
            return FALSE;
        }
    }
     public function validatefbClientLogin($clientEmailId) {
        $q = $this->db->where(['clientEmailId' => $clientEmailId])
                ->get('client_personal_details');

        if ($q->num_rows()) {
        	return $q->row()->clientId; //return clientId for session            
        } else {
            return FALSE;
        }
    }

}