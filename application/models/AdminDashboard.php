<?php
class AdminDashboard extends CI_Model
{
	public function client_list( $limit, $offset)
	{
		//$admin_id = $this->session->userdata('adminid');
		$query = $this->db
						->select('*')
						->from('client_personal_details')
						->limit( $limit, $offset )
						->get();

						

						return $query->result();

	}

	public function num_rows()
	{
		//$admin_id = $this->session->userdata('adminid');

		$query = $this->db
						->select('*')
						->from('client_personal_details')
						->get();

						

						return $query->num_rows();

	}

	public function search( $query, $limit, $offset )
	{
		$q = $this->db->from('client_personal_details')
		->like('clientName', $query )
		->limit($limit, $offset )
		->get();

		return $q->result();

	}

	public function count_search_results( $query )
	{
		$q = $this->db->from('client_personal_details')
		->like('clientName', $query )
		->get();

		return $q->num_rows();

	}
}