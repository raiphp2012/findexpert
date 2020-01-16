<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertPersonalDetails extends CI_Controller {

    function __construct() {
        parent::__construct();
        isExpertLoggedIn();
    }

    function index() {
        $this->load->model('FetchDefaultValuesModel');
        $expertPersonalData['expertPersonalDetails'] = $this->FetchDefaultValuesModel->fetchPersonalDetails($this->session->userdata('expertId'));
        $this->load->view('ExpertPersonalDetails_view', $expertPersonalData);
    }

}
