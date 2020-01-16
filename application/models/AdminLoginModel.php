<?php 
class AdminLoginModel extends CI_Model
{
	public function login_valid( $username, $password )

	{

		$q = $this->db->where(['username'=>$username,'password'=>$password])
						//->from('users')
						->get('admin');

		if ( $q->num_rows() )
		{
			// $row = $q->row();
			// return $row->adminid;
			return $q->row();
			//return TRUE;
		}
		else
		{
			return FALSE;
		}
		

	}
}