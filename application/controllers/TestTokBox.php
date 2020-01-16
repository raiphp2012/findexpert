<?php

/* 
 * @author Avinash Raj
 */
class TestTokBox extends CI_Controller
{
    function index()
    {
        $this->load->view('TestTokBox_view');
    }
    function testAudioCall()
    {
        $expertContact = $this->input->post('expertNumber');
        $clientContact = $this->input->post('clientNumber');
         $ch = curl_init();

            $url = "http://demo.client.knowlarity.com/api/voice/quickCall/?username=enterprisesouth&password=south@123&ivr_id=1000003681&format=json&phone_book=";
            $url .= $expertContact.",".$clientContact;
            echo $url;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            echo "<pre>";
            print_r($output);
            exit;
    }
}
