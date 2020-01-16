<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */
class Searchexpertdetails extends CI_Controller {

   function __construct() {
        parent::__construct();
        //isClientLoggedIn();
    }
    function index($selectedCategoryId) {
    $this->load->library('pagination');
        $this->load->model('Expertdetailsmodel');
       $this->session->unset_userdata('subCategoryIds');
        $this->session->unset_userdata('locationIds');
         $this->session->unset_userdata('selectedCategoryId');
        $userData = "";
        $locationIds = $this->input->post('locationId') ? $this->input->post('locationId') : "";
        $subCategoryIds = $this->input->post('subCategoryIds') ? $this->input->post('subCategoryIds') : "";
        $experinceInYear = $this->input->post('experinceInYear') ? $this->input->post('experinceInYear') : "";
        $userData['categoryId'] = $selectedCategoryId;

        if (($selectedCategoryId == 'css') || ($selectedCategoryId == 'js')) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        if(!empty($locationIds) )
          {

                $this->session->set_userdata('locationIds',$locationIds);
          }  
           if(!empty($subCategoryIds) )
          {

                $this->session->set_userdata('subCategoryIds',$subCategoryIds);
          }  
          if(!empty($experinceInYear))
          {

                $this->session->set_userdata('experience',$experinceInYear);
          }
          if(!empty($selectedCategoryId))
          {

                $this->session->set_userdata('selectedCategoryId',$selectedCategoryId);
          }
          if(empty($subCategoryIds) )
          {

               $subCategoryIds= $this->session->userdata('subCategoryIds');
          }  
          if(empty($experinceInYear))
          {

              $experinceInYear= $this->session->userdata('experinceInYear');
          }
          

          if(empty($selectedCategoryId))
          {

                $selectedCategoryId=$this->session->userdata('selectedCategoryId');
          }
          
        $this->load->model('Expertdetailsmodel');
        $userData['subCategoryDetails'] = $this->Expertdetailsmodel->fetchExpertSubCategory($selectedCategoryId);

        $userData['selectedlocationIds'] = $this->input->post('locationId');
        $selectedlocationId= $userData['selectedlocationIds'];

         $userData['selectedSubCategoryIds'] = $this->input->post('subCategoryIds');
        $userData['selectedexperinceInYear'] = $this->input->post('experinceInYear');
        $experience = array();
        $this->load->model('Expertdetailsmodel');  
        if (!empty($experinceInYear)) {
            foreach ($_POST['experinceInYear'] as $exp) {
                $experience[] = [5 * (intval($exp) - 1), 5 * (intval($exp))];
            }

             $config = [
        'base_url'  => base_url('Searchexpertdetails/index/'.$this->uri->segment(3)),
        'per_page'  => 20,
        'total_rows'   => $this->Expertdetailsmodel->num_rows($subCategoryIds, $experience,$selectedCategoryId,$locationIds),
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
            $userData['expertPersonalData'] = $this->Expertdetailsmodel->fetchExpertPersonalData($subCategoryIds, $experience, $selectedCategoryId,$locationIds,$config['per_page'],$this->uri->segment(4,0));
        } else {
            $config = [
        'base_url'  => base_url('Searchexpertdetails/index/'.$this->uri->segment(3)),
        'per_page'  => 20,
        'total_rows'   => $this->Expertdetailsmodel->num_rows($subCategoryIds, $experience,$selectedCategoryId,$locationIds),
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
        'cur_tag_open'=>"<li class='active'><a>",
        'cur_tag_close'=>"</a></li>",
        ];

        $this->pagination->initialize($config);
        
          $userData['expertPersonalData'] = $this->Expertdetailsmodel->fetchExpertPersonalData($subCategoryIds, $experinceInYear, $selectedCategoryId,$locationIds,$config['per_page'],$this->uri->segment(4,0));}

        if (empty($userData['expertPersonalData'])) {
            $this->session->set_flashdata('searchExpertError', 'No Records found. Please try changing the search criteria');
            //redirect($_SERVER['HTTP_REFERER']);
        }

        $userData['SubCategoryName'] = array();
        if (!empty($userData['subCategoryDetails'])) {
            foreach ($userData['subCategoryDetails'] as $subCategory) {
            if(!empty($userData['selectedSubCategoryIds']))
            {
                foreach ($userData['selectedSubCategoryIds'] as $key => $value) {
                    if ($subCategory->subCategoryId == $value) {
                        $userData['SubCategoryName'][] = $subCategory->subCategoryName;
                    }
                }
                }
            }
        }
//        $userData['categoryName'] = $this->Expertdetailsmodel->fetchCategoryName($this->session->userdata('selectedCategoryId'));
        //$this->load->view('search_expert_details_view', $userData);

         $location_list = $this->db->query("SELECT * FROM location WHERE status = 1 AND parentId =0")->result();
        $userData['location_list'] = $location_list;
        
        $this->load->view('listing', $userData);
    }
    

    function clientBookingAppointment($expertId, $expertName, $type) {
        $expertAvailabilitySlot = array();
        $expertAvailabilitySlot['expertName'] = rawurldecode($expertName);
        $expertAvailabilitySlot['type'] = $type;
        
        $this->db->select("consultationTypeName,consultationTypeId");
        $consultationtypes = $this->db->get('consultation_types')->result();
        if (!empty($consultationtypes))
            $expertAvailabilitySlot['consultationtypes'] = $consultationtypes;
        else
            $expertAvailabilitySlot['consultationtypes'] = "No Consultation Types";
        $expertAvailabilitySlot['TeamMember'] = $this -> db
           -> select(' `expertId`,`expertName`')
           -> where('parent_id', $expertId)
           -> get('expert_personal_details')->result();    
       

        $expertAvailabilitySlot['expertId'] = $expertId;

        $this->load->view('bookingAppointment_view', $expertAvailabilitySlot);
    }
    function clientMakePayment($id,$expertId,$clientId,$comment,$amount) {
        $data=array();
        $data['id']=$id;
        $data['expertId']=$expertId;
        $data['clientId']=$clientId;
        $data['expertName']='Rashmmi khetrapal';
        $data['comment']=urldecode($comment);
        $data['amount']=$amount;
        $this->load->view('action_payment_section_view',$data);
    }
    function clientBookingAppointmentInstant() {
        
        $expertAvailabilitySlot['type']='CA';
        
        $this->db->select("consultationTypeName,consultationTypeId");
        $consultationtypes = $this->db->get('consultation_types')->result();
        if (!empty($consultationtypes))
            $expertAvailabilitySlot['consultationtypes'] = $consultationtypes;
        else
            $expertAvailabilitySlot['consultationtypes'] = "No Consultation Types";
        
        $expertAvailabilitySlot['expertData'] = $this -> db
           -> select('`expertId`,`expertName`')
           -> where('operateBy','Instant')
           -> get('expert_personal_details')->row();
$expertAvailabilitySlot['expertId']=$expertAvailabilitySlot['expertData']->expertId;
 $expertAvailabilitySlot['expertName']=$expertAvailabilitySlot['expertData']->expertName;
$expertId= $expertAvailabilitySlot['expertId'];
        $expertAvailabilitySlot['TeamMember'] = $this -> db
           -> select(' `expertId`,`expertName`')
           -> where('parent_id',$expertId)
           -> get('expert_personal_details')->result();
        $this->load->view('clientBookingAppointmentInstant_view', $expertAvailabilitySlot);
    }
    function clientBookingAppointmentOffer($amount,$options) {
        
        $expertAvailabilitySlot['type']='CA';
        
        $this->db->select("consultationTypeName,consultationTypeId");
        $consultationtypes = $this->db->get('consultation_types')->result();
        if (!empty($consultationtypes))
            $expertAvailabilitySlot['consultationtypes'] = $consultationtypes;
        else
            $expertAvailabilitySlot['consultationtypes'] = "No Consultation Types";
        
        $expertAvailabilitySlot['expertData'] = $this -> db
           -> select('`expertId`,`expertName`')
           -> where('operateBy','Instant')
           -> get('expert_personal_details')->row();
$expertAvailabilitySlot['expertId']=$expertAvailabilitySlot['expertData']->expertId;
 $expertAvailabilitySlot['expertName']=$expertAvailabilitySlot['expertData']->expertName;
$expertId= $expertAvailabilitySlot['expertId'];
        $expertAvailabilitySlot['TeamMember'] = $this -> db
           -> select(' `expertId`,`expertName`')
           -> where('parent_id',$expertId)
           -> get('expert_personal_details')->result();
        $expertAvailabilitySlot['fees']=$amount;
        $this->load->view('clientBookingAppointmentOffer_view', $expertAvailabilitySlot);
    }

}