<?php
class Manage_Admin extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

   public function ca_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*,c.sortBy,c.isVerified');
			$this->db->where("c.expertCategoryId",1);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$this->db->order_by('c.sortBy','DESC');
			$query = $this->db->get('expert_professional_details c',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_ca($search_filter)
   {
		try
		{
   			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",1);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$query = $this->db->get('expert_professional_details c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }


   public function cs_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",2);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$this->db->order_by('c.sortBy','DESC');
			$query = $this->db->get('expert_professional_details c',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_cs($search_filter)
   {
		try
		{
   			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",2);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$query = $this->db->get('expert_professional_details c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }



   public function cma_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",4);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$this->db->order_by('c.sortBy','DESC');
			$query = $this->db->get('expert_professional_details c',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_cma($search_filter)
   {
		try
		{
   			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",4);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$query = $this->db->get('expert_professional_details c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

public function lawyer_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",3);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$this->db->order_by('c.sortBy','DESC');
			$query = $this->db->get('expert_professional_details c',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_lawyer($search_filter)
   {
		try
		{
   			$this->db->select('p.*,c.sortBy');
			$this->db->where("c.expertCategoryId",3);
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
				$this->db->where("p.locationId",$search_filter['locationId']);
			}
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$query = $this->db->get('expert_professional_details c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }



    public function client_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*');
			if($search_filter['clientName'] !='')
			{
				$this->db->like("p.clientName",$search_filter['clientName']);
			}
			if($search_filter['clientEmailId'] !='')
			{
				$this->db->like("p.clientEmailId",$search_filter['clientEmailId']);
			}
			if($search_filter['clientMobileNumber'] !='')
			{
				$this->db->where("p.clientMobileNumber",$search_filter['clientMobileNumber']);
			}
			$this->db->order_by('p.clientId','DESC');
			$query = $this->db->get('client_personal_details p',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_client($search_filter)
   {
		try
		{
   			$this->db->select('p.*');
			if($search_filter['clientName'] !='')
			{
				$this->db->like("p.clientName",$search_filter['clientName']);
			}
			if($search_filter['clientEmailId'] !='')
			{
				$this->db->like("p.clientEmailId",$search_filter['clientEmailId']);
			}
			if($search_filter['clientMobileNumber'] !='')
			{
				$this->db->where("p.clientMobileNumber",$search_filter['clientMobileNumber']);
			}
			$query = $this->db->get('client_personal_details p'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }


    public function appointment_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*');
			$this->db->where("p.expertId",$search_filter['expertId']);
			$this->db->group_by('p.appointmentId');
			$this->db->order_by('p.appointmentId','DESC');
			$query = $this->db->get('appointment_details p',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

    public function num_appointment($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*');
			$this->db->where("p.expertId",$search_filter['expertId']);
			$this->db->group_by('p.appointmentId');
			$query = $this->db->get('appointment_details p'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }


    public function service_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*');
			$this->db->where("p.categoryId",$search_filter['categoryId']);
			$this->db->order_by('p.sortOrder','DESC');
			$query = $this->db->get('sub_categories p',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

    public function num_service($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('p.*');
			$this->db->where("p.categoryId",$search_filter['categoryId']);
			$query = $this->db->get('sub_categories p'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

 public function admin_authenticate($username, $password) {
			$data = array("username"=>$username,"password"=>md5($password),"status"=>"1");
			try {
				$query = $this->db->get_where('tbl_admin', $data);
				if ($query->num_rows() > 0)
				{
					$result_data = $query->result();
					return $result_data;
				}
			}
			catch (Exception $exc) {
			  $this->exceptionhandler->handle($exc);
			}
		
		
		return 0;
    }

    public function expert_info($expertId)
    {

    	try
		{
			$this->db->select('p.expertName,p.expertEmailId,p.expertMobileNumber,c.expertCategoryId');
			$this->db->where('c.expertId',$expertId);
			$this->db->join('expert_personal_details p', 'p.expertId = c.expertId', 'left');
			$this->db->group_by('p.expertId');
			$query = $this->db->get('expert_professional_details c',$limit,$start); 
			return $query->row();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
    }


    public function location_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('c.*');
			$this->db->where("c.parentId",0);
			$query = $this->db->get('location c',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_location($search_filter)
   {
		try
		{
   			$this->db->select('c.*');
			$this->db->where("c.parentId",0);
			$query = $this->db->get('location c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }



   public function profession_list($search_filter,$limit,$start)
   {
   		try
		{
			$this->db->select('c.*');
			$query = $this->db->get('expert_categories c',$limit,$start); 
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

   public function num_profession($search_filter)
   {
		try
		{
   			$this->db->select('c.*');
			$query = $this->db->get('expert_categories c'); 
			return $query->num_rows();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
   }

    public function check_login()
    {
    	$user_id = $this->session->userdata('user_id');
    	if(empty($user_id))
    	{
    		redirect(base_url("manage/admin/login"));
    	}
    }


    function createAMeeting($hostId){
          
	  $createAMeetingArray = array();
	  $createAMeetingArray['host_id'] =$hostId;
	  $createAMeetingArray['topic'] = 'Appointment Booking with Legal Expert';
	  $createAMeetingArray['type'] = 1;
	  $data=$this->sendRequest('meeting/create', $createAMeetingArray);

          $arr=json_decode($data);
          $updateData['start_url']=$arr->start_url;
          $updateData['join_url']=$arr->join_url;
          $updateData['meeting_id']=$arr->id;
          return $updateData;
	}


	 /* Zoom Video Confernceing Inetgration */
    function sendRequest($calledFunction, $data){
       
		/*Creates the endpoint URL*/
		$request_url = 'https://api.zoom.us/v1/'.$calledFunction;

		/*Adds the Key, Secret, & Datatype to the passed array*/
		$data['api_key'] ='2QV3ek0_TRqf-EQl98-OAA';
		$data['api_secret'] ='pwgHZGPR4hVzAmbfjzdV2rYL1LeaQkDLomwK';
		$data['data_type'] = 'JSON';

		$postFields = http_build_query($data);
		/*Check to see queried fields*/
		/*Preparing Query...*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$response = curl_exec($ch);
		/*Check for any errors*/
		$errorMessage = curl_exec($ch);
		//echo $errorMessage;
		curl_close($ch);
		if(!$response){
			return false;
		}
		/*Return the data in JSON format*/
               // header('Content-Type: application/json');	
		 return $response ;
	}
 }