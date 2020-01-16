<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class UserRegistration extends CI_Controller {

    public function index() {
        $this->load->view('User/UserRegistration');
    }

    public function clientRegistration() {
        echo 'Registration successfull';
    }

}
