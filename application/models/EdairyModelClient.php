<?php
class EdairyModelClient extends CI_Model
{
	public function eDairy_list()
	{
		$client_id = $this->session->userdata('clientId');
		// echo "pre";
		// print_r($client_id);
		// exit();
		$query = $this->db
						 ->select(['eDairyTitle','eDairyId','eDairyBody','createDate'])
						 //->select('eDairyId')
						 ->from('clientdairy')
						 ->where('clientId', $client_id)
						 ->get();
						// print_r($query->result()); exit;
		

		return $query->result();
	}
	public function add_eDairy($array)
	{
		return $this->db->insert('clientdairy', $array );

	}

	public function find_eDairy($dairys)
	{
		$q = $this->db->select(['eDairyTitle','eDairyId','eDairyBody'])
				 ->where('eDairyId', $dairys)
				 ->get('clientdairy');

				 return $q->row();
	}

	public function updateDairy($dairysId, Array $dairy)
	{
		return $this->db
			->where('eDairyId', $dairysId)
			->update('clientdairy', $dairy);

	}

	public function deleteDairy($eDairyId)
	{
		return $this->db->delete('clientdairy',['eDairyId'=>$eDairyId]);
	}
}