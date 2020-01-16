<?php

class CommonDetailsModel extends CI_Model
{
	function changePassword($tableName,$existingData,$NewPassword)
	{
		if($this->db->get_where($tableName,$existingData)->num_rows() > 0)
		{
			if($tableName == "client_personal_details")
			{
				$this->db->where('clientId',$existingData['clientId']);
				if($this->db->update($tableName,['clientPassword'=>$NewPassword]))
				{
					// echo $this->db->last_query();
					// echo "hell";
					return 1;
				}
			}
			else if($tableName == "expert_personal_details")
			{
				$this->db->where('expertId',$existingData['expertId']);
				if($this->db->update($tableName,['expertPassword'=>$NewPassword]))
				{
					// echo $this->db->last_query();
					// echo "hello";
					return 1;
				}
			}
		}
		else
		{
			return -1;
		}
	}
}