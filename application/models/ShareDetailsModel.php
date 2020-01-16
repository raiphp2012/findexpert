<?php

/*
 * @author Visheshagya
 */

class ShareDetailsModel extends CI_Model {

    function shareClientDocument($sharedFileData) {

        if ($this->db->insert('shared_file_details', $sharedFileData)) {
            return $this->db->insert_id();
        }
    }

    function deleteClientDocument($deletedFileData) {
        $this->db->where('clientId', $deletedFileData['clientId']);
        $this->db->where('expertId', $deletedFileData['expertId']);
        $this->db->where('sharedBy', 2);
        $updateData = ['isCurrentlyShared' => 2];
        if ($this->db->update('shared_file_details', $updateData)) {
            return 1;
        }
    }

    function fetchExistingClient($expertId) {
        $this->db->select('*,client_personal_details.clientName');
        $this->db->group_by("appointment_details.clientId");
        $this->db->join('client_personal_details', 'client_personal_details.clientId = appointment_details.clientId');
        $clientListQuery = $this->db->get_where('appointment_details', ['appointment_details.expertId' => $expertId]);
        if ($clientListQuery->num_rows() > 0) {
            return $clientListQuery->result();
        } else {
            return 0;
        }
    }

    function fetchExistingExpert($clientId) {
        $this->db->select('*,expert_personal_details.expertName');
        $this->db->group_by("appointment_details.expertId");
        $this->db->join('expert_personal_details', 'expert_personal_details.expertId = appointment_details.expertId');
        $clientListQuery = $this->db->get_where('appointment_details', ['appointment_details.clientId' => $clientId]);
        if ($clientListQuery->num_rows() > 0) {
            return $clientListQuery->result();
        } else {
            return 0;
        }
    }

}
