<?php

class ClientUser_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_user() {
        $data = array(
            'clientName' => $this->input->post('clientName'),
            'clientEmailId' => $this->input->post('clientEmailId'),
            'clientMobileNumber' => $this->input->post('clientMobileNumber')
        );
        $this->db->insert('client_personal_details', $data);
        return true;
    }

}
