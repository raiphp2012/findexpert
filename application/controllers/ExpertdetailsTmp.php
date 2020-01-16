<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertdetailsTmp extends CI_Controller
{
    public function search($categoryId)
    {
    	$this->load->library('pagination');
        $_SESSION['categoryId'] = $categoryId;
        $userData['categoryId'] = $categoryId;
        $this->load->model('Expertdetailsmodel');
        $userData['subCategoryDetails'] = $this->Expertdetailsmodel->fetchExpertSubCategory($categoryId);
        $userData['cityDetails'] = $this->Expertdetailsmodel->fetchExpertCity($categoryId);
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
       $this->load->view('listing', $userData);
        //$this->load->view('expert_details_viewTmp',$userData);
    }
}