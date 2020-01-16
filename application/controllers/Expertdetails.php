<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class Expertdetails extends CI_Controller {

    function __construct() {
        parent::__construct();
       // isClientLoggedIn();
    }
    public function index()
            {
         $this->load->view('ClientHomeMenu_view');
        
            }
   public function offer() {
        
        $this->load->view('offerpage');
    }
    public function willoffer() {
        
        $this->load->view('willoffer_view');
    }

    public function search($categoryId) {
        $userData['categoryId'] = $categoryId;
        $this->load->library('pagination');
        $this->session->set_userdata('selectedCategoryId', $categoryId);
        $this->load->model('Expertdetailsmodel');
        $config = [
        'base_url'  => base_url('Expertdetails/search/'.$this->uri->segment(3)),
        'per_page'  => 20,
        'total_rows'   => $this->Expertdetailsmodel->defaultSearchNumOfRows($categoryId),
        'full_tag_open'=>"<ul class='pagination'>",
        'full_tag_close'=>"</ul>",
        'first_tag_open'=>"<li>",
        'first_tag_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tag_close'=>"</li>",
        'next_tag_open'=>"<li>",
        'next_tag_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tag_close'=>"</li>",
        'num_tag_open'=>"<li>",
        'num_tag_close'=>"</li>",
        'cur_tag_open'=>"<li clas='active'><a>",
        'cur_tag_close'=>"</a></li>",
        ];

        $this->pagination->initialize($config);
        $userData['subCategoryDetails'] = $this->Expertdetailsmodel->fetchExpertSubCategory($categoryId);
        $userData['expertPersonalData']=$this->Expertdetailsmodel->defaultSearchData($categoryId,$config['per_page'],$this->uri->segment(4,0));
        //$this->load->view('expert_details_view', $userData);

         $location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
        $userData['location_list'] = $location_list;
        
       $this->load->view('listing', $userData);
    }
    public function viewProfile($expertId)
    {
        $this->load->model('Expertdetailsmodel');
        $userData['expertPersonalData'] = $this->Expertdetailsmodel->fetchviewProfile($expertId);
        if($expertId==86)
        {
        $userData['expertTeamData']=$this -> db
           -> select('*')
           -> where('parent_id',656)
           -> get('expert_personal_details')->result();
           
     
        }
        else{
         $userData['expertTeamData']=$this -> db
           -> select('*')
           -> where('parent_id', $expertId)
           -> get('expert_personal_details')->result();
        }
        
           
       $this->load->view('viewProfile_view',$userData); 
    }

}
