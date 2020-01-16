<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ClientProfile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //function inside autoloaded helper, check if user is logged in, if not redirects to login page
        isClientLoggedIn();
    }

    function index() {
        $this->load->model('clientFetchDefaultValuesModel');
        $clientPersonalData['clientPersonalDetails'] = $this->clientFetchDefaultValuesModel->fetchPersonalDetails($this->session->userdata('clientId'));
        $this->load->view('ClientPersonalDetails_view', $clientPersonalData);
    }

    function updatePersonalDetails() {
        $message = '';
        $target_dir = 'clientdocuments/' . $this->session->userdata('clientId') . '/personal';
        if($_FILES["clientPanNumberImageName"]["name"] != ""){
            // $message = "PAN Image";
            // if ( ! is_dir($target_dir)) {
            //     mkdir($target_dir);
            // }
            $pan_file = $target_dir .'/'. basename($_FILES["clientPanNumberImageName"]["name"]);
            $panFileType = pathinfo($pan_file, PATHINFO_EXTENSION);
            $fileName = $target_dir .'/'. "pan." . $panFileType;
            //echo $fileName;exit;
            if (!move_uploaded_file($_FILES["clientPanNumberImageName"]["tmp_name"], $fileName)) {
                $message = "PAN Image";
            } 
        }
        if($_FILES["clientAddressProofImageName"]["name"] != ""){
            // $message = $message." and Address Proof";
            // //echo $message;
            // if ( ! is_dir($target_dir)) {
            //     mkdir($target_dir);
            // }
            $address_file = $target_dir .'/'. basename($_FILES["clientAddressProofImageName"]["name"]);
            $addressFileType = pathinfo($address_file, PATHINFO_EXTENSION);
            $fileName = $target_dir .'/'. "address." . $addressFileType;
            //echo $fileName;exit;
            if (!move_uploaded_file($_FILES["clientAddressProofImageName"]["tmp_name"], $fileName)) {
                $message = $message." and Address Proof";
            }
        }
        
        $personalData['clientName'] = $this->input->post('clientName');
        $personalData['clientEmailId'] = $this->input->post('clientEmailId');
        $personalData['clientMobileNumber'] = $this->input->post('clientMobileNumber');
        $personalData['clientGender'] = $this->input->post('clientGender');
        $personalData['clientDOB'] = $this->input->post('clientDOB');
        $personalData['clientPanNumber'] = $this->input->post('clientPanNumber');

        // client Pan file. in updaion if blank no action if its uploade its replace.
        if (!empty(basename($_FILES["clientPanNumberImageName"]["name"]))) {
            $personalData['clientPanNumberImageName'] = $pan_file;
        }
        $addressData['clientAddressLine1'] = $this->input->post('clientAddressLine1');
        $addressData['clientAddressLine2'] = $this->input->post('clientAddressLine2');

        // client Adress file. in updation if blank no action. if its uploade its replace old.
        if (!empty(basename($_FILES["clientAddressProofImageName"]["name"]))) {
            $addressData['clientAddressProofImageName'] = $address_file;
        }
        $addressData['clientCity'] = $this->input->post('clientCity');
        $addressData['clientCountry'] = $this->input->post('clientCountry');
        $addressData['clientPincode'] = $this->input->post('clientPincode');
//        $personalData['clientProfileSummary'] = $this->input->post('clientProfileSummary');

        $this->load->model('SaveClientDetailsModel');
        $updateValue = $this->SaveClientDetailsModel->updateAndSaveClientPersonalData($personalData, $addressData, $this->session->userdata('clientId'));
        if ($updateValue == 1 && $message != "") {
            $this->session->set_flashdata('personalDetailsUpdateMessage', 'The personal data have been updated successfully but '.$message.' not updated.');
        } elseif($updateValue == 1 && $message == ''){
            $this->session->set_flashdata('personalDetailsUpdateMessage', 'The personal data have been updated successfully');
        }else{
            $this->session->set_flashdata('personalDetailsErrorMessage', 'The personal details could not be updated');
        }
        redirect(base_url() . 'clientProfile');
    }
    function updatefbPersonalDetails() {
        
        $personalData['clientName'] = $this->input->post('clientName');
        $personalData['clientEmailId'] = $this->input->post('clientEmailId');
        $personalData['clientMobileNumber'] = $this->input->post('clientMobileNumber');
        $personalData['clientGender'] = $this->input->post('clientGender');
        $personalData['Term&Condition'] = $this->input->post('TermCondition');
        
        $addressData['clientAddressLine1'] = $this->input->post('clientAddressLine1');

        $addressData['clientAddressLine2'] = $this->input->post('clientAddressLine2');

        // client Adress file. in updation if blank no action. if its uploade its replace old.
        if (!empty(basename($_FILES["clientAddressProofImageName"]["name"]))) {
            $addressData['clientAddressProofImageName'] = $address_file;
        }
        $addressData['clientCity'] = $this->input->post('clientCity');
        $addressData['clientCountry'] = $this->input->post('clientCountry');
        $addressData['clientPincode'] = $this->input->post('clientPincode');
        

        $this->load->model('SaveClientDetailsModel');
        $updateValue = $this->SaveClientDetailsModel->updateAndSaveClientPersonalData($personalData, $addressData, $this->session->userdata('clientId'));
        if ($updateValue == 1) {
            $this->session->set_flashdata('personalDetailsUpdateMessage', 'The personal details have been updated successfully');
        } else {
            $this->session->set_flashdata('personalDetailsErrorMessage', 'The personal details could not be updated');
        }
        redirect(base_url() . 'Expertdetails');
    }
}