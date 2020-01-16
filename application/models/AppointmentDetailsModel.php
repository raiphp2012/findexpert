<?php

/*
 * @author Visheshagya
 */

class AppointmentDetailsModel extends CI_Model {

    function rescheduleAppointment($appointmentId, $newAppointmentDateTime) {
        $flag = 0;
        $oldAppointmentData = $this->db->get_where('appointment_details', ['appointmentId' => $appointmentId])->row();
        $oldAppointmentData = json_decode(json_encode($oldAppointmentData), TRUE);

        $dt = strtotime($newAppointmentDateTime);
        $date = date('Y-m-d', $dt);
        $startTime = date('H:i:s', $dt);
        $endTime = date("H:i:s", strtotime('+30 minutes', strtotime($startTime)));

        unset($oldAppointmentData['appointmentId']);

        $oldAppointmentData['appointmentBookingDate'] = date('Y-m-d H:i:s');
        $oldAppointmentData['appointmentDate'] = $date;
        $oldAppointmentData['appointmentStartTime'] = $startTime;
        $oldAppointmentData['appointmentEndTime'] = $endTime;
        if ($this->db->insert('appointment_details', $oldAppointmentData)) {
            $flag = 1;
        }

        $data = array(
            'consultationStatusId' => 3
        );

        $this->db->where('appointmentId', $appointmentId);
        if ($this->db->update('appointment_details', $data)) {
            $flag = 1;
        }
        return $flag;
    }

    function cancelAppointment($appointmentId) {
        $flag = 0;
        $data = array(
            'consultationStatusId' => 4
        );

        $this->db->where('appointmentId', $appointmentId);
        if ($this->db->update('appointment_details', $data)) {
            $flag = 1;
        }
        return $flag;
    }

    function fetchClientDetails($clientId) {
        $this->db->select('clientName,clientEmailId,clientMobileNumber');
        $this->db->where('clientId', $clientId);
        return($this->db->get('client_personal_details')->row());
}

    function saveAppointmentData($appointmentData) {

        if ($this->db->insert('appointment_details', $appointmentData)) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }
    function updateSessionAndToken($session, $token, $appointmentId) {
        $updatedData = ['sessionId' => $session, 'token' => $token];
        $this->db->where('appointmentId', $appointmentId);
        if ($this->db->update('appointment_details', $updatedData)) {
            return 1;
        } else
            return -1;
    }
    
    function fetchClientMobileNumber($clientId)
    {
        $this->db->select('clientMobileNumber');
        $client = $this->db->get_where('client_personal_details',['clientId'=>$clientId])->row();
        return $client->clientMobileNumber;
    }
    function checkExistingSessionAndToken($appointmentId)
    {
        $this->db->select('sessionId,token');
        $result = $this->db->get_where('appointment_details',['appointmentId'=>$appointmentId]);
        if($result->num_rows() > 0)
        {
            return $result->row();
        }
        else
            return -1;
    }

}