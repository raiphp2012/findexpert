<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
         $this->load->model('search_model');
         $this->load->model('common');
    }

 
public function index()   
{


}

public function expert_list()
{
	$start = $this->input->post('start');
	$expertCategoryId = $this->input->post('expertCategoryId');
	$subCategoryIds = $this->input->post('subCategoryIds');
	$locationId = $this->input->post('locationId');
	

	$search_filter['subCategoryIds'] = $subCategoryIds;
	$search_filter['locationId'] = $locationId;
	
	$search_filter['expertCategoryId'] = $expertCategoryId;
	$expertPersonalData = $this->search_model->expert_list($search_filter,20,$start);
	$data['expertPersonalData'] = $expertPersonalData;
	$this->load->view('list',$data);
}

public function ca()   
{
	$search_filter = array();
	$expertCategoryId = 1;
	$search_filter['expertCategoryId'] = $expertCategoryId;
	$data['expertCategoryId'] = $expertCategoryId;
	$expertPersonalData = $this->search_model->expert_list($search_filter,20,0);
	$service_list = $this->search_model->service_list($expertCategoryId);
	$data['subCategoryDetails'] = $service_list;
	$data['expertPersonalData'] = $expertPersonalData;
	$location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
    $data['location_list'] = $location_list;
	$page_title = "Chatered Accountant";
	$data['page_title'] = $page_title;
	$this->load->view('listing',$data);
}

public function cs()   
{
	$search_filter = array();
	$expertCategoryId = 2;
	$search_filter['expertCategoryId'] = $expertCategoryId;
	$data['expertCategoryId'] = $expertCategoryId;
	$expertPersonalData = $this->search_model->expert_list($search_filter,20,0);
	$service_list = $this->search_model->service_list($expertCategoryId);
	$data['subCategoryDetails'] = $service_list;
	$data['expertPersonalData'] = $expertPersonalData;
	$location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
    $data['location_list'] = $location_list;
	$page_title = "Company Secretary";
	$data['page_title'] = $page_title;
	$this->load->view('listing',$data);
}

public function cma()   
{
	$search_filter = array();
	$expertCategoryId = 4;
	$search_filter['expertCategoryId'] = $expertCategoryId;
	$data['expertCategoryId'] = $expertCategoryId;
	$expertPersonalData = $this->search_model->expert_list($search_filter,20,0);
	$service_list = $this->search_model->service_list($expertCategoryId);
	$data['subCategoryDetails'] = $service_list;
	$data['expertPersonalData'] = $expertPersonalData;
	$location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
    $data['location_list'] = $location_list;
	$page_title = "Certified Management Accountant";
	$data['page_title'] = $page_title;
	$this->load->view('listing',$data);
}

public function lawyer()   
{
	$search_filter = array();
	$expertCategoryId = 3;
	$search_filter['expertCategoryId'] = $expertCategoryId;
	$data['expertCategoryId'] = $expertCategoryId;
	$expertPersonalData = $this->search_model->expert_list($search_filter,20,0);
	$service_list = $this->search_model->service_list($expertCategoryId);
	$data['subCategoryDetails'] = $service_list;
	$data['expertPersonalData'] = $expertPersonalData;
	$location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
    $data['location_list'] = $location_list;
	$page_title = "Lawyer";
	$data['page_title'] = $page_title;
	$this->load->view('listing',$data);
}



public function test()
{
$expert_list = 	$this->common->select_all("expert_personal_details");
foreach($expert_list as $expert)
{
	if($expert->expertId)
	{
		$expert_service_list = $this->common->select_all_where("expert_sub_category_mapping",array("expertId"=>$expert->expertId));
		$service_name = array();
		foreach($expert_service_list as $expert_service)
		{
			$service_info = $this->common->select_scaler_where("sub_categories",array("subCategoryId"=>$expert_service->subCategoryId));
			$subCategoryName = $service_info->subCategoryName;
			$service_name[] = trim($subCategoryName);
		}
		$service_name_text = implode(",",$service_name);
		$this->common->update_record("expert_personal_details",array("expertId"=>$expert->expertId),array("expertSearchText"=>$service_name_text));
	}
}
}



}