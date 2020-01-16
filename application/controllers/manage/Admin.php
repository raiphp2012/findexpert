<?php
class Admin extends CI_Controller {
	public $data 	= 	array();
    public function __construct()
	   {
		parent::__construct();
		$this->load->model('manage_admin');
		$this->load->model('common');
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('general'); 
		$this->load->helper('url'); //You should autoload this one ;)
     }

	 public function index()
	{
		$this->manage_admin->check_login();


		$total_ca = $this->manage_admin->num_ca();
		$total_cs = $this->manage_admin->num_cs();
		$total_cma = $this->manage_admin->num_cma();
		$total_lawyer = $this->manage_admin->num_lawyer();

		$total_experts = $total_ca + $total_cs + $total_cma + $total_lawyer;

		$data['total_experts'] = $total_experts;
		$data['total_ca'] = $total_ca;
		$data['total_cs'] = $total_cs;
		$data['total_cma'] = $total_cma;
		$data['total_lawyer'] = $total_lawyer;
		$data['page_title'] = "Visheshagya Dashboard";
		$this->load->view('manage/dashboard',$data);
	}

	public function login()
	{
		$data['page_title'] = "Admin Login";
		$data['username'] = "";
		$data['password'] = "";
		$data['form_error'] = "";
		$data['errMsg'] = "";
		$this->load->view('manage/login',$data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		redirect(base_url('manage/admin/login'));
	}

    public function authenticate() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['errMsg'] = "";
			$this->load->view('manage/login',$data);
		}
		else
		{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->manage_admin->admin_authenticate($username,$password); //print_r($result);die;
		if(isset($result) && !empty($result))	
		{
			if (count($result) > 0) { 
				$this->session->set_userdata(array('username' => $username,'name'=>$result[0]->name,'user_id'=>$result[0]->user_id));
        	}
        	redirect(base_url('manage/admin'));
		}
		else
		{
			$data['errMsg'] = "Invalid credential!";
			$this->load->view('manage/login',$data);
		}
		}
    }

	
	public function ca_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		$expertName = $this->input->get('expertName');
		if(!empty($expertName))
			$search_filter['expertName'] = $expertName;
		else
		$search_filter['expertName'] = '';		
		$data['expertName'] = $search_filter['expertName'];	

		$expertEmailId = $this->input->get('expertEmailId');
		if(!empty($expertEmailId))
			$search_filter['expertEmailId'] = $expertEmailId;
		else
		$search_filter['expertEmailId'] = '';		
		$data['expertEmailId'] = $search_filter['expertEmailId'];	

		$expertMobileNumber = $this->input->get('expertMobileNumber');
		if(!empty($expertMobileNumber))
			$search_filter['expertMobileNumber'] = $expertMobileNumber;
		else
		$search_filter['expertMobileNumber'] = '';		
		$data['expertMobileNumber'] = $search_filter['expertMobileNumber'];	

		$locationId = $this->input->get('locationId');
		if(!empty($locationId))
			$search_filter['locationId'] = $locationId;
		else
		$search_filter['locationId'] = '';		
		$data['locationId'] = $search_filter['locationId'];	

		$data['page_title'] = "CA List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/ca_list");
        $config["total_rows"] = $this->manage_admin->num_ca($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->ca_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
        $data['location_list'] = $this->common->select_all("location");
		$this->load->view('manage/ca_list',$data);
	}



	public function cs_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		$expertName = $this->input->get('expertName');
		if(!empty($expertName))
			$search_filter['expertName'] = $expertName;
		else
		$search_filter['expertName'] = '';		
		$data['expertName'] = $search_filter['expertName'];	

		$expertEmailId = $this->input->get('expertEmailId');
		if(!empty($expertEmailId))
			$search_filter['expertEmailId'] = $expertEmailId;
		else
		$search_filter['expertEmailId'] = '';		
		$data['expertEmailId'] = $search_filter['expertEmailId'];	

		$expertMobileNumber = $this->input->get('expertMobileNumber');
		if(!empty($expertMobileNumber))
			$search_filter['expertMobileNumber'] = $expertMobileNumber;
		else
		$search_filter['expertMobileNumber'] = '';		
		$data['expertMobileNumber'] = $search_filter['expertMobileNumber'];	

		$locationId = $this->input->get('locationId');
		if(!empty($locationId))
			$search_filter['locationId'] = $locationId;
		else
		$search_filter['locationId'] = '';		
		$data['locationId'] = $search_filter['locationId'];		
		$data['page_title'] = "CS List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/cs_list");
        $config["total_rows"] = $this->manage_admin->num_cs($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->cs_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
         $data['location_list'] = $this->common->select_all("location");
		$this->load->view('manage/cs_list',$data);
	}



	public function cma_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		$expertName = $this->input->get('expertName');
		if(!empty($expertName))
			$search_filter['expertName'] = $expertName;
		else
		$search_filter['expertName'] = '';		
		$data['expertName'] = $search_filter['expertName'];	

		$expertEmailId = $this->input->get('expertEmailId');
		if(!empty($expertEmailId))
			$search_filter['expertEmailId'] = $expertEmailId;
		else
		$search_filter['expertEmailId'] = '';		
		$data['expertEmailId'] = $search_filter['expertEmailId'];	

		$expertMobileNumber = $this->input->get('expertMobileNumber');
		if(!empty($expertMobileNumber))
			$search_filter['expertMobileNumber'] = $expertMobileNumber;
		else
		$search_filter['expertMobileNumber'] = '';		
		$data['expertMobileNumber'] = $search_filter['expertMobileNumber'];	

		$locationId = $this->input->get('locationId');
		if(!empty($locationId))
			$search_filter['locationId'] = $locationId;
		else
		$search_filter['locationId'] = '';		
		$data['locationId'] = $search_filter['locationId'];	
		$data['page_title'] = "CMA List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/cma_list");
        $config["total_rows"] = $this->manage_admin->num_cma($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->cma_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
         $data['location_list'] = $this->common->select_all("location");
		$this->load->view('manage/cma_list',$data);
	}


	public function lawyer_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		$expertName = $this->input->get('expertName');
		if(!empty($expertName))
			$search_filter['expertName'] = $expertName;
		else
		$search_filter['expertName'] = '';		
		$data['expertName'] = $search_filter['expertName'];	

		$expertEmailId = $this->input->get('expertEmailId');
		if(!empty($expertEmailId))
			$search_filter['expertEmailId'] = $expertEmailId;
		else
		$search_filter['expertEmailId'] = '';		
		$data['expertEmailId'] = $search_filter['expertEmailId'];	

		$expertMobileNumber = $this->input->get('expertMobileNumber');
		if(!empty($expertMobileNumber))
			$search_filter['expertMobileNumber'] = $expertMobileNumber;
		else
		$search_filter['expertMobileNumber'] = '';		
		$data['expertMobileNumber'] = $search_filter['expertMobileNumber'];	

		$locationId = $this->input->get('locationId');
		if(!empty($locationId))
			$search_filter['locationId'] = $locationId;
		else
		$search_filter['locationId'] = '';		
		$data['locationId'] = $search_filter['locationId'];	
		$data['page_title'] = "Lawyer List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/lawyer_list");
        $config["total_rows"] = $this->manage_admin->num_lawyer($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->lawyer_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
         $data['location_list'] = $this->common->select_all("location");
		$this->load->view('manage/lawyer_list',$data);
	}

	

	public function delete_ca()
	{
	 	$expertId = $this->uri->segment(5);
		if($expertId)
		{
			$this->common->delete_record('expert_personal_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_professional_details',array('expertId'=>$expertId));
			$this->common->delete_record('appointment_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_address_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_bank_account_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_login_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_sub_category_mapping',array('expertId'=>$expertId));	
			$this->common->delete_record('expert_consultation_details_mapping',array('expertId'=>$expertId));
			$this->session->set_flashdata('save_record', 'CA deleted successfully!');
			redirect(base_url('manage/admin/ca_list'));	
		}
	}

	public function delete_cs()
	{
		$expertId = $this->uri->segment(5);
		if($expertId)
		{
			$this->common->delete_record('expert_personal_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_professional_details',array('expertId'=>$expertId));
			$this->common->delete_record('appointment_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_address_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_bank_account_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_login_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_sub_category_mapping',array('expertId'=>$expertId));	
			$this->common->delete_record('expert_consultation_details_mapping',array('expertId'=>$expertId));
			$this->session->set_flashdata('save_record', 'CS deleted successfully!');
			redirect(base_url('manage/admin/cs_list'));	
		}
	}

	public function delete_cma()
	{
		$expertId = $this->uri->segment(5);
		if($expertId)
		{
			$this->common->delete_record('expert_personal_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_professional_details',array('expertId'=>$expertId));
			$this->common->delete_record('appointment_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_address_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_bank_account_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_login_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_sub_category_mapping',array('expertId'=>$expertId));	
			$this->common->delete_record('expert_consultation_details_mapping',array('expertId'=>$expertId));
			$this->session->set_flashdata('save_record', 'CMA deleted successfully!');
			redirect(base_url('manage/admin/cma_list'));		
		}
	}

	public function delete_lawyer()
	{
		$expertId = $this->uri->segment(5);
		if($expertId)
		{
			$this->common->delete_record('expert_personal_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_professional_details',array('expertId'=>$expertId));
			$this->common->delete_record('appointment_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_address_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_bank_account_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_login_details',array('expertId'=>$expertId));
			$this->common->delete_record('expert_sub_category_mapping',array('expertId'=>$expertId));	
			$this->common->delete_record('expert_consultation_details_mapping',array('expertId'=>$expertId));
			$this->session->set_flashdata('save_record', 'Lawyer deleted successfully!');
			redirect(base_url('manage/admin/lawyer_list'));	
		}
	}



	public function expert_detail()
	{
		$expertId = $this->uri->segment(5);
		if($expertId)
		{
			$expert_personal_info = $this->common->select_scaler_where("expert_personal_details",array("expertId"=>$expertId));
			$expert_professional_info = $this->common->select_scaler_where("expert_professional_details",array("expertId"=>$expertId));
			$expert_sub_category_list = $this->common->select_scaler_where("expert_sub_category_mapping",array("expertId"=>$expertId));
			$expert_bank_account_info = $this->common->select_scaler_where("expert_bank_account_details",array("expertId"=>$expertId));
			$expert_address_info = $this->common->select_scaler_where("expert_address_details",array("expertId"=>$expertId));
			$location_list = $this->common->select_all("location");	
			$expert_category_info = $this->common->select_scaler_where("expert_categories",array("categoryId"=>$expert_professional_info->expertCategoryId));

			$service_list = $this->common->select_all_where("sub_categories",array("categoryId"=>$expert_professional_info->expertCategoryId));

			$expert_service_list = $this->common->select_all_where("expert_sub_category_mapping",array("expertId"=>$expertId));
			foreach($expert_service_list as $expert_service)
			{
				$expert_services[] = $expert_service->subCategoryId;
			}
			$data['service_list'] = $service_list;
			$data['expert_services'] = $expert_services;
			$data['expert_category_info'] = $expert_category_info;

			$data['page_title'] = "Expert Detail";
			$data['expertPersonalDetails'] = $expert_personal_info;
			$data['expert_professional_info'] = $expert_professional_info;
			$data['expert_sub_category_list'] = $expert_sub_category_list;
			$data['expert_bank_account_info'] = $expert_bank_account_info;
			$data['expert_address_info'] = $expert_address_info;
			$data['location_list'] = $location_list;
			$this->load->view('manage/expert_detail',$data);
		}

	}


	public function appointment_list()
	{
		$this->manage_admin->check_login();
		$expertId = $this->input->get('expertId');
		$expert_info = $this->manage_admin->expert_info($expertId);
		
		$search_filter = array();
		$search_filter['expertId'] = $expertId;
		$data['expertId'] = $search_filter['expertId'];	
		$data['page_title'] = $expert_info->expertName." Appointment List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/appointment_list/");
        $config["total_rows"] = $this->manage_admin->num_appointment($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->appointment_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
		//echo "<pre>";print_r($data['results']);exit;
        $data["links"] = $this->pagination->create_links();
		$this->load->view('manage/appointment_list',$data);
	}


	public function client_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		$clientName = $this->input->get('clientName');
		if(!empty($clientName))
			$search_filter['clientName'] = $clientName;
		else
		$search_filter['clientName'] = '';		
		$data['clientName'] = $search_filter['clientName'];	

		$clientEmailId = $this->input->get('clientEmailId');
		if(!empty($clientEmailId))
			$search_filter['clientEmailId'] = $clientEmailId;
		else
		$search_filter['clientEmailId'] = '';		
		$data['clientEmailId'] = $search_filter['clientEmailId'];	

		$clientMobileNumber = $this->input->get('clientMobileNumber');
		if(!empty($clientMobileNumber))
			$search_filter['clientMobileNumber'] = $clientMobileNumber;
		else
		$search_filter['clientMobileNumber'] = '';		
		$data['clientMobileNumber'] = $search_filter['clientMobileNumber'];	

		
		$data['page_title'] = "Client List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/client_list");
        $config["total_rows"] = $this->manage_admin->num_client($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->client_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
		$this->load->view('manage/client_list',$data);
	}


	public function delete_client()
	{
		$clientId = $this->uri->segment(5);
		if($clientId)
		{
			$this->common->delete_record('client_personal_details',array('clientId'=>$clientId));
			$this->common->delete_record('client_address_details',array('clientId'=>$clientId));
			$this->common->delete_record('client_login_details',array('clientId'=>$clientId));
			$this->session->set_flashdata('save_record', 'Client deleted successfully!');
			redirect(base_url('manage/admin/client_list'));	
		}
	}


	public function profession_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		

		
		$data['page_title'] = "Profession List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/profession_list");
        $config["total_rows"] = $this->manage_admin->num_profession($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->profession_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
		$this->load->view('manage/profession_list',$data);
	}


		public function profession()
	{
		$this->manage_admin->check_login();
		$categoryId = $this->uri->segment(5);
		if($this->input->post('submit'))
		{
			$action = $this->input->post('submit');
			$categoryId = $this->input->post('categoryId');
			if(!empty($categoryId))
			{
				$page_title = "Edit Profession";
			}
			else
			{
				$page_title = "Add Profession";
			}
			$categoryName = $this->input->post('categoryName');
			$action = $this->input->post('submit');
			if($status){$status_checked = " checked";}else{$status_checked = "";}
			$this->form_validation->set_rules('categoryName', 'Profession Name', 'required');
			if ($this->form_validation->run() == TRUE)
			{
			if($this->input->post('submit') == 'Add')
			{
				$data = array("categoryName"=>$categoryName,"createdDateTime"=>date("Y-m-d H:i:s"));
				$categoryId = $this->common->insert_record('expert_categories',$data);
			}
			else if($this->input->post('submit') == 'Save')
			{
				$this->common->update_record('expert_categories',array("categoryId"=>$categoryId),array("categoryName"=>$categoryName));
			}
			$this->session->set_flashdata('save_record', 'Profession saved successfully!');
			redirect(base_url('manage/admin/profession_list'));
		}
		}
		if($categoryId && empty($action))
		{
			$action = "Save";
			$page_title = "Edit Profession";
			$profession_info = $this->common->select_scaler_where('expert_categories',array('categoryId'=>$categoryId));
			$categoryName = $profession_info->categoryName;
					}
		else if(empty($action))
		{
			$action = "Add";
			$page_title = "Add Profession";
			$categoryId = "";
			$categoryName = "";
		}
		if(empty($pages_title))
			$pages_title = "Add Profession";
			$data['action'] = $action;
			$data['page_title'] = $page_title;
			$data['categoryId'] = $categoryId;
			$data['categoryName'] = $categoryName;
			$this->load->view('manage/profession',$data);
	}


	public function delete_profession()
	{
		$categoryId = $this->uri->segment(5);
		if($categoryId)
		{
			$this->common->delete_record('expert_categories',array('categoryId'=>$clientId));
			$this->common->delete_record('sub_categories',array('categoryId'=>$clientId));
			$this->session->set_flashdata('save_record', 'Profession deleted successfully!');
			redirect(base_url('manage/admin/profession_list'));	
		}
	}


	public function service_list()
	{
		$this->manage_admin->check_login();
		$categoryId = $this->input->get('categoryId');
		$profession_info = $this->common->select_scaler_where("expert_categories",array("categoryId"=>$categoryId));
		
		$search_filter = array();
		$search_filter['categoryId'] = $categoryId;
		$data['categoryId'] = $search_filter['categoryId'];	
		$data['page_title'] = $profession_info->categoryName." Service List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/service_list/");
        $config["total_rows"] = $this->manage_admin->num_service($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->service_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
		$this->load->view('manage/service_list',$data);
	}

	public function change_password()
	{
		$this->manage_admin->check_login();
		$page_title = "Change Password";
		if($this->input->post('submit'))
		{
				
			$action = $this->input->post('submit');
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			$this->form_validation->set_rules('old_password', 'Current Password', 'required');
			$this->form_validation->set_rules('new_password', 'New Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
			if ($this->form_validation->run() == TRUE)
			{
				if($new_password != $confirm_password)
				{
					$this->session->set_flashdata('save_record', 'Mismatch confirm password!');
				}
				if($this->common->num_rows_where('tbl_admin',array('user_id'=>$this->session->userdata('user_id'),'password'=>md5($old_password))))
				{
					$data = array("password"=>md5($new_password));
					$this->common->update_record('tbl_admin',array('user_id'=>$this->session->userdata('user_id')),$data);
					$this->session->set_flashdata('save_record', 'Password Changed Successfully!');
				}	
				else
				{
					$this->session->set_flashdata('save_record', 'Invalid current password!');
				}
			redirect(base_url('manage/admin/change_password'));
		}
		}
		$data['page_title'] = $page_title;
		$this->load->view('manage/change_password',$data);
	}	

	public function location_list()
	{
		$this->manage_admin->check_login();
		$search_filter = array();
		$keyword = $this->input->get('keyword');
		if(!empty($keyword))
			$search_filter['keyword'] = $keyword;
		else
		$search_filter['keyword'] = '';		
		$data['keyword'] = $search_filter['keyword'];	
		$data['page_title'] = "Location List";
		$this->load->library('pagination');
		$config = array();
        $config["base_url"] = base_url("manage/admin/location_list");
        $config["total_rows"] = $this->manage_admin->num_location($search_filter);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $data['total_rows'] = $config["total_rows"];
		if(isSet($_GET))
		{
		$config['enable_query_string'] = TRUE;
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");	
		$config['first_url'] = $config["base_url"].$config['suffix'];
        }
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		$data['page_no']=$page;
		$last_record_per_page = $config["per_page"]+($data['page_no']);
		if($data['total_rows'] < $last_record_per_page)
		{
			$last_record_per_page = $data['total_rows'];
		}
		$data["last_record_per_page"] = $last_record_per_page;
        if($data['total_rows']>0)
		{
		$data['results'] = $this->manage_admin->location_list($search_filter,$config["per_page"], $page);
		}
		else
		{
		$data["results"] = array();
		}
        $data["links"] = $this->pagination->create_links();
		$this->load->view('manage/location_list',$data);
	}


	public function delete_location()
	{
		$locationId = $this->uri->segment(5);
		if($locationId)
		{
			$this->common->delete_record('location',array('locationId'=>$locationId));
			$this->session->set_flashdata('save_record', 'Location deleted successfully!');
			redirect(base_url('manage/admin/location_list'));		
		}
	}


	public function location()
	{
		$this->manage_admin->check_login();
		$locationId = $this->uri->segment(5);
		if($this->input->post('submit'))
		{
			$action = $this->input->post('submit');
			$locationId = $this->input->post('locationId');
			if(!empty($locationId))
			{
				$page_title = "Edit Location";
			}
			else
			{
				$page_title = "Add Location";
			}
			$locationName = $this->input->post('locationName');
			$sortOrder = $this->input->post('sortOrder');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			$action = $this->input->post('submit');
			if($status){$status_checked = " checked";}else{$status_checked = "";}
			$this->form_validation->set_rules('locationName', 'Location Name', 'required');
			if ($this->form_validation->run() == TRUE)
			{
			if(empty($slug)){
				$slug = slugify($locationName);
			}
			if($this->input->post('submit') == 'Add')
			{
				$data = array("locationName"=>$locationName,"slug"=>$slug,"sortOrder"=>$sortOrder,"latitude"=>$latitude,"longitude"=>$longitude,"date_added"=>date("Y-m-d H:i:s"));
				$locationId = $this->common->insert_record('location',$data);
			}
			else if($this->input->post('submit') == 'Save')
			{
				$this->common->update_record('location',array("locationId"=>$locationId),array("locationName"=>$locationName,"slug"=>$slug,"sortOrder"=>$sortOrder,"latitude"=>$latitude,"longitude"=>$longitude,"date_modified"=>date("Y-m-d H:i:s")));
			}
			$this->session->set_flashdata('save_record', 'Location saved successfully!');
			redirect(base_url('manage/admin/location_list'));
		}
		}
		if($locationId && empty($action))
		{
			$action = "Save";
			$page_title = "Edit Location";
			$location_info = $this->common->select_scaler_where('location',array('locationId'=>$locationId));
			$locationName = $location_info->locationName;
			$sortOrder = $location_info->sortOrder;
			$latitude = $location_info->latitude;
			$longitude = $location_info->longitude;
			$slug = $location_info->slug;
		}
		else if(empty($action))
		{
			$action = "Add";
			$page_title = "Add Location";
			$locationName = "";
			$slug = "";
			$sortOrder = "";
			$locationId = "";
			$latitude = "";
			$longitude = "";
		}
		if(empty($pages_title))
			$pages_title = "Add Location";
			$data['action'] = $action;
			$data['page_title'] = $page_title;
			$data['locationId'] = $locationId;
			$data['locationName'] = $locationName;
			$data['slug'] = $slug;
			$data['latitude'] = $latitude;
			$data['longitude'] = $longitude;
			$data['sortOrder'] = $sortOrder;
			$this->load->view('manage/location',$data);
	}

		public function update_expert_sort_order()
		{
			$expertId = $this->input->post('expertId');
			$sortBy = $this->input->post('sortBy');
			$this->common->update_record("expert_professional_details",array("expertId"=>$expertId),array("sortBy"=>$sortBy));
			echo json_encode(array("status"=>true));

		}

		public function update_service_sort_order()
		{
			$subCategoryId = $this->input->post('subCategoryId');
			$sortOrder = $this->input->post('sortOrder');
			$this->common->update_record("sub_categories",array("subCategoryId"=>$subCategoryId),array("sortOrder"=>$sortOrder));
			echo json_encode(array("status"=>true));

		}


		public function update_expert_status()
		{
			$expertId = $this->input->post('expertId');
			$isVerified = $this->input->post('isVerified');
			if(empty($isVerified))
			{
				$isVerified = 0;
			}
			$this->common->update_record("expert_professional_details",array("expertId"=>$expertId),array("isVerified"=>$isVerified));
			echo json_encode(array("status"=>true));

		} 

		public function book_appointment()
		{
			if($this->input->post('submit'))
			{
			
			$this->load->model('AppointmentDetailsModel');
        $appointmentData['appointmentDate'] = $this->input->post('appointmentDate');
        $PaymentMode = $this->input->post('PaymentMode');
        $this->session->set_userdata('appointmentDate', $appointmentData['appointmentDate']);
        if(isset($_POST['appointmentNotes']))
        $appointmentData['appointmentNotes'] = $this->input->post('appointmentNotes');
        $appointmentStartTime=$this->input->post('appointmentStartTime');
        $clientId=$this->input->post('clientId');
        $expertId=$this->input->post('expertId');

         $appointmentData['clientId']=$clientId;
        $this->session->set_userdata('clientId', $appointmentData['clientId']);
       // $url="http://visheshagya.in/webservices/InstantTest.php?clientId=$clientId&time=$appointmentStartTime";
        //$expert=file_get_contents($url);
      //  $expertName=json_decode($expert)->expertName; 
        //$expertId=json_decode($expert)->expertId;
        
        $appointmentData['expertId']=$expertId;
        $this->session->set_userdata('expertId', $appointmentData['expertId']);
        $this->session->set_userdata('expertName',$expertName);
        $this->session->set_userdata('type',$this->input->post('type'));
        $appointmentData['clientId'] = $this->session->userdata('clientId');
        $appointmentData['appointmentBookingDate'] = date('Y-m-d');
        $this->session->set_userdata('appointmentBookingDate', $appointmentData['appointmentBookingDate']);

        $appointmentData['appointmentStartTime'] = $this->input->post('appointmentStartTime');
        $this->session->set_userdata('appointmentStartTime', $appointmentData['appointmentStartTime']);

        $appointmentData['appointmentEndTime'] = date("H:i", strtotime('+30 minutes', strtotime($appointmentData['appointmentStartTime'])));
        $this->session->set_userdata('appointmentEndTime', $appointmentData['appointmentEndTime']);

        $appointmentData['consultationStatusId'] = 1;
        $this->session->set_userdata('consultationStatusId', 1);

        $appointmentData['consultationTypeId'] = $this->input->post('categoryId');

        $expert_consultation_details = $this->common->select_scaler_where("expert_consultation_details_mapping",array("expertId"=>$expertId,"consultationTypeId"=>$appointmentData['consultationTypeId']));
        $consultationFees = $expert_consultation_details->consultationFees;

        $this->session->set_userdata('consultationTypeId', $appointmentData['consultationTypeId']);
        $consultationTypeIdByName = $this->input->post('categoryId');
        $sql = "SELECT `consultationTypeName` FROM `consultation_types` where `consultationTypeId` = $consultationTypeIdByName";
        $query = $this->db->query($sql);
        $consultationTypeIdByName = $query->row();
        $this->session->set_userdata('consultationTypeName', $consultationTypeIdByName->consultationTypeName);

        $appointmentData['amountPaid'] = $consultationFees;
        $this->session->set_userdata('ConsultationFees',$appointmentData['amountPaid']);
        $appointmentData['status'] = 'success';
        $appointmentId = $this->AppointmentDetailsModel->saveAppointmentData($appointmentData);
        $this->session->set_userdata('appointmentId',$appointmentId);



				

				 $hostId='';
       $this->db->select('user_id');
       $query = $this->db->get('zoom_users')->result_array();
       for($i=0;$i<count($query);$i++)
       {
           $userId=$query[$i]['user_id'];
             $appointmentStartTime=$this->session->userdata('appointmentStartTime');
             $appointmentDate=$this->session->userdata('appointmentDate'); 
           $chechHostId="SELECT * FROM `appointment_details` WHERE `host_id`='$userId' and `appointmentDate`='$appointmentDate' and 
`appointmentStartTime`<='$appointmentStartTime'  and `appointmentEndTime`>='$appointmentStartTime' and `status`='success'";
           $chechHostIdQuery =$this->db->query($chechHostId);
           $count = $chechHostIdQuery->num_rows();
          if($count==0)
          {
              $hostId=$userId; 
          }
          else{
               
              continue;
          }
       }
       $validate = 1;

				if($validate)
				{
					 $data=$this->manage_admin->createAMeeting($hostId);    
        $data['status']='success';
        $data['host_id']=$hostId;
        $this->db->where('appointmentId',$this->session->userdata('appointmentId'));
        $this->db->update('appointment_details', $data);

        $expertName =$this->session->userdata('expertName');
        $appointmentDate =$this->session->userdata('appointmentDate');
        $clientMobileNumber=$this->session->userdata('clientMobileNumber');
        $clientName=$this->session->userdata('clientName');
        $expertMobileNumber=$this->session->userdata('expertMobileNumber');
        $appointmentTime=$this->session->userdata('appointmentTime');
        $clientEmailId=$this->session->userdata('clientEmailId');
        $expertEmailId=$this->session->userdata('expertEmailId');
        $appointmentId=$this->session->userdata('appointmentId');
        $appointmentBookingDate=$this->session->userdata('appointmentBookingDate');
        $consultationTypeName=$this->session->userdata('consultationTypeName');
        $appointmentStartTime=$this->session->userdata('appointmentStartTime');
        $appointmentEndTime=$this->session->userdata('appointmentEndTime');
         //-------------------- To send email
            $this->load->library('email');
            $config['priority'] = 1;
            $config['mailtype'] = 'html';
            
            
            $this->email->initialize($config);
            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($clientEmailId);
            $data = array(
                'consultingExpert'=>$expertName,
                'appointmentId'=>$appointmentId,
                'appointmentBookingDate'=>$appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/clientBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            $this->email->initialize($config);

            $this->email->from('expert@visheshagya.in', 'Team Visheshagya');
            $this->email->to($expertEmailId);
            $data = array(
                'consultingExpert' => $clientName,
                'appointmentId' => $appointmentId,
                'appointmentBookingDate' => $appointmentBookingDate,
                'consultationTime' => $appointmentTime,
                'consultationType' => $consultationTypeName,
                'appointmentDate' => $appointmentDate,
                'appointmentTime' => $appointmentTime 
            );
            $this->email->subject('Appointment booking Confirmation');
            $body = $this->load->view('emails/expertBooking.php', $data, TRUE);
            $this->email->message($body);
            $this->email->host = 'localhost';
            $this->email->send();

            /*
             * To SEND SMS
             */
            
            $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$clientMobileNumber&sms_Type=trans&msg=";
            $msg = "Dear " . $clientName . ", Your appointment with Mr/Ms $expertName is confirmed for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime ." Free Cancellation upto 24hrs. before appointment.Team Visheshagya";

            $json = file_get_contents($url . urlencode($msg));
            /*
             * TO SEND SMS TO EXPERT
             */
            $expertSMSUrl = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
            $expertSMS = "Dear " . $expertName . ", Your appointment with Mr/Ms $clientName is booked for Date :" . date("d-m-Y", strtotime($appointmentDate)) . " and time - ".$appointmentTime." Team Visheshagya";
            $json = file_get_contents($expertSMSUrl . urlencode($expertSMS));
            $output = json_decode($json, TRUE);

            $this->session->set_flashdata('save_record', 'Appointment has been booked!');
			redirect(base_url('manage/admin/appointment_list?expertId='.$expertId));

        
				}

			}

			$data['page_title'] = "Book Appointment";
			$profession_list = $this->common->select_all("expert_categories");
			$client_list = $this->db->query("SELECT p.clientId,p.clientName,p.clientEmailId FROM client_personal_details p GROUP BY p.clientId ORDER BY p.clientId DESC")->result();
			$data['profession_list'] = $profession_list;
			$data['client_list'] = $client_list;
			$this->load->view('manage/book_appointment',$data);

		}

		public function expert_list_by_profession()
		{
			$categoryId = $this->input->post("categoryId");
			$expert_list = $this->db->query("SELECT p.expertId,p.expertName,p.expertEmailId FROM expert_personal_details p, expert_professional_details c WHERE p.expertId=c.expertId AND c.expertCategoryId='".$categoryId."' GROUP BY p.expertId ORDER BY c.sortBy DESC")->result();

			echo @json_encode($expert_list);

		}
}
?>