<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class GLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('ghelper');
    }

    function index() {
        glogin();
    }

    
}