<?php

/*
 * @author Visheshagya
 */

class ClientFetchDefaultValuesModel extends CI_Model {

    function fetchPersonalDetails($clientId) {
        $this->db->select('*', 'client_address_details');
        $this->db->from('client_personal_details');
        $this->db->join('client_address_details', 'client_address_details.clientId = client_personal_details.clientId');
        $this->db->where(['client_personal_details.clientId' => $clientId]);
        $personalDetails = $this->db->get();
        if ($personalDetails->num_rows() > 0) {
            return $personalDetails->row();
        } else {
            return 0;
        }
    }

}
