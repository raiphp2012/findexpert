<?php

//session_start();

class SearchexpertdetailsTmp extends CI_Controller {

    function index() {

        $subCategoryIds = $this->input->post('subCategoryIds');
        $experinceInYear = $this->input->post('experinceInYear');
        

        $this->load->model('Expertdetailsmodel');
         $userData['subCategoryDetails'] =$this->Expertdetailsmodel->fetchExpertSubCategory($_SESSION['categoryId']);
         $userData['categoryId'] = $_SESSION['categoryId'];



        $this->load->model('Expertdetailsmodel');
 $userData['expertPersonalData']= $this->Expertdetailsmodel->fetchExpertPersonalData($subCategoryIds,$experinceInYear);
         $userData['selectedSubCategoryName'] = $this->input->post('subCategoryIds');
         $userData['selectedexperinceInYear'] = $this->input->post('experinceInYear');

        $userData['SubCategoryName']=array();
        if( !empty($userData['subCategoryDetails']) ) {
        foreach ($userData['subCategoryDetails'] as $subCategory ) {
                    foreach ($userData['selectedSubCategoryName'] as $key => $value) {
                        if($subCategory->subCategoryId==$value)
                        {
                            $userData['SubCategoryName'][]= $subCategory->subCategoryName;
                        }
                    }
                } 
                } 
            
        $userData['categoryName'] = $this->Expertdetailsmodel->fetchCategoryName($_SESSION['categoryId']);

        
        //print_r($userData['subCategoryDetails']);
        //exit();
        $this->load->view('search_expert_details_view', $userData);
    }


}