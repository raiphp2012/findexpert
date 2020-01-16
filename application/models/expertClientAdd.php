<?php


class ExpertClientAdd extends CI_Model {

    function saveClientSignUpInformation($personalData,$mapData) {
        if ($this->db->insert('client_personal_details', $personalData)) {
        
            $clientId = $this->db->insert_id();
            $addressData['clientId'] = $clientId;
            $this->db->insert('client_address_details', $addressData);           
            for ($i=0; $i<count($mapData); $i++) { 
                echo  $mapData[$i];
                $data['clientId']=$clientId;
                $data['date']=date('Y-m-d');
                $data['expertId']=$this->session->userdata('expertId');
                $data['serviceId']=$mapData[$i];
                $this->db->insert('servicemaping', $data);
                
            }

            return $clientId;
        }
    }

    function checkClientInformation($personalData) {
        $clientCount = $this->db->get_where('client_personal_details', $personalData)->num_rows();

        if ($clientCount == 0) {
            return 1;
        } else
            return -1;
    }

    function updateClientPassword($clientEmailId, $password) {
        $this->db->where(['clientEmailId' => $clientEmailId]);
        if ($this->db->update('client_personal_details', ['clientPassword' => $password])) {
            return 1;
        } else {
            return -1;
        }
    }

    function updateAndSaveClientPersonalData($personalData, $addressData, $clientId) {
        $clientEmailId = $personalData['clientEmailId'];
        unset($personalData['clientEmailId']);
        $flag = 1;
        $this->db->where('clientEmailId', $clientEmailId);
        if (!$this->db->update('client_personal_details', $personalData)) {
            $flag = 0;
        }

        $addressQuery = $this->db->get_where('expert_client_address_details', ['clientId' => $clientId]);
        if ($addressQuery->num_rows() > 0) {
            if (!$this->db->update('expert_client_address_details', $addressData, ['clientId' => $clientId])) {
                $flag = 0;
            }
        } else {
            $addressData['clientId'] = $clientId;
            if (!$this->db->insert('expert_client_address_details', $addressData)) {
                $flag = 0;
            }
        }
        return $flag;
    }

}
