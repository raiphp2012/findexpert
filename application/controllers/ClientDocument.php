<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ClientDocument extends CI_Controller {

    function __construct() {
        parent::__construct();
        isClientLoggedIn();
    }

    function index() {
        $this->load->model('FetchDefaultValuesModel');
        $documentsData['sharedFileDetails'] = $this->FetchDefaultValuesModel->fetchSharedFiles();
        $this->load->helper('directory');
        $this->load->helper('download');
        $documentsData['foldersList'] = directory_map('./clientdocuments/' . $this->session->userdata('clientId'));
        $this->load->model('EdairyModelClient');
        $documentsData['dairy'] = $this->EdairyModelClient->eDairy_list();
        $this->load->view('ClientDocuments_view', $documentsData);
    }

    function createNewFolder() {
        $folderName = $this->input->post('folderName');
        $clientFolder = "clientdocuments/" . $this->session->userdata('clientId') . "/" . $folderName;

        if (!is_dir($clientFolder)) {
            if (mkdir($clientFolder, 0777, TRUE)) {
                $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your folder has been created successfully');
            } else {
                $this->session->set_flashdata('FolderCreateErrorMessage', 'Your folder could not be created');
            }
            redirect(base_url() . 'ClientDocument');
        } else {
            $this->session->set_flashdata('FolderCreateErrorMessage', 'Your folder could not be created');
        }
        redirect(base_url() . 'ClientDocument');
    }

    function eDairyList()
    {
        $this->load->model('EdairyModelClient');
        $dairy = $this->EdairyModelClient->eDairy_list();
        $this->load->view('ClientDocuments_view',['dairy'=>$dairy]);
        //$this->load->view('ClientDocuments_view', $dairy);
    }
   

    function addDairy()
    {
        $this->load->helper('form');
        $this->load->view('ClientDocuments_view');
       $post = $this->input->post();
       unset($post['submit']);
        $this->load->model('EdairyModelClient');
        if( $this->EdairyModelClient->add_eDairy($post) ) {
            $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your Note has been created successfully');
            redirect(base_url() . 'ClientDocument');
        }
        else 
        {
            //insert failed

        }



    }


    function editDairy($dairys)
    {
        $this->load->model('EdairyModelClient');
        $eDairy = $this->EdairyModelClient->find_eDairy($dairys);

        $this->load->view('clientDairy/Edit_Dairy.php',['edairy'=>$eDairy]);


        
    }

    public function updateDairy($dairysId)
    {
        $this->load->helper('form');
        $this->load->view('ClientDocuments_view');
       $post = $this->input->post();
       //$edairy = $post('eDairyId');
       unset($post['submit']);
        $this->load->model('EdairyModelClient');
        
        if( $this->EdairyModelClient->updateDairy($dairysId,$post) ) {
            $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your Note has been updated successfully');
            redirect(base_url() . 'ClientDocument');
        }
        else 
        {
            $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your Note has Not updated successfully');
            redirect(base_url() . 'ClientDocument');

        }
    }


    public function deleteDairy($eDairyId)
    {
        
        //$eDairyId = $this->input->post('eDairyId');
        $this->load->model('EdairyModelClient');
        
         if( $this->EdairyModelClient->deleteDairy($eDairyId) ) {
            $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your Note has been deleted successfully');
            redirect(base_url() . 'ClientDocument');
        }
        else 
        {
            $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your Note has Not deleted successfully');
            redirect(base_url() . 'ClientDocument');

        }
    }


}
