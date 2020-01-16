<?php
class Search_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

   public function expert_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*,c.*');
			if($search_filter['expertCategoryId'] != '')
			{
				$this->db->where("c.expertCategoryId",$search_filter['expertCategoryId']);
			}
			// if($search_filter['expertName'] !='')
			// {
			// 	$this->db->like("p.expertName",$search_filter['expertName']);
			// }
			// if($search_filter['expertEmailId'] !='')
			// {
			// 	$this->db->like("p.expertEmailId",$search_filter['expertEmailId']);
			// }
			// if($search_filter['expertMobileNumber'] !='')
			// {
			// 	$this->db->where("p.expertMobileNumber",$search_filter['expertMobileNumber']);
			// }
			// if($search_filter['locationId'] !='')
			// {
			// 	$this->db->where_in("p.locationId",$search_filter['locationId']);
			// }
			// if($search_filter['subCategoryIds'] !='')
			// {
			// 	$this->db->where_in("ec.subCategoryId",$search_filter['subCategoryIds']);
			// }
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->join('expert_consultation_details_mapping f', 'p.expertId = f.expertId', 'left');
			$this->db->join('expert_sub_category_mapping ec', 'p.expertId = ec.expertId', 'left');
			$this->db->group_by('p.expertId');
			$this->db->order_by('c.sortBy','DESC');
			$query = $this->db->get('expert_professional_details c',$limit,$start); 
			//echo $this->db->last_query();exit;
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_expert($search_filter)
   {
		try
		{
			$this->db->select('p.*,c.*');
			if($search_filter['expertCategoryId'] != '')
			{
				$this->db->where("c.expertCategoryId",$search_filter['expertCategoryId']);
			}
			if($search_filter['expertName'] !='')
			{
				$this->db->like("p.expertName",$search_filter['expertName']);
			}
			if($search_filter['expertEmailId'] !='')
			{
				$this->db->like("p.expertEmailId",$search_filter['expertEmailId']);
			}
			if($search_filter['expertMobileNumber'] !='')
			{
				$this->db->where("p.expertMobileNumber",$search_filter['expertMobileNumber']);
			}
			if($search_filter['locationId'] !='')
			{
				$this->db->where_in("p.locationId",$search_filter['locationId']);
			}
			if($search_filter['subCategoryIds'] !='')
			{
				$this->db->where_in("ec.subCategoryId",$search_filter['subCategoryIds']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->join('expert_consultation_details_mapping f', 'p.expertId = f.expertId', 'left');
			$this->db->join('expert_sub_category_mapping ec', 'p.expertId = ec.expertId', 'left');
			$this->db->group_by('p.expertId');
			$this->db->order_by('c.sortBy','DESC');
			$query = $this->db->get('expert_professional_details c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

	public function service_list($categoryId = 0)
	{
		try
		{
			$this->db->select('c.*');
			$this->db->where("c.categoryId",$categoryId);
			$query = $this->db->get('sub_categories c'); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
	}
  
 }