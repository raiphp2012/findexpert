<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Visheshagya
 */

class ExpertDocument extends CI_Controller {

    function __construct() {
 
        parent::__construct();
        isExpertLoggedIn();
    }
       
        function index() {
        $this->load->helper('directory');
        $this->load->helper('download');
        $documentsData['foldersList'] = directory_map('./expertdocuments/' . $this->session->userdata('expertId'));
      
        $this->load->model('EDairyModel');
        $documentsData['dairy'] =$this->EDairyModel->eDairy_list();  
        $documentsData['post'] = $this->input->post(); 
        $units = explode(' ', 'B KB MB GB TB PB');
         $SIZE_LIMIT = 5368709120/25; // 5 GB
         $path="./expertdocuments/".$this->session->userdata('expertId');
         $disk_used = $this->foldersize($path);
         $disk_remaining = $SIZE_LIMIT - $disk_used;
	$documentsData['disk_used']=round(($disk_used * 100)/$SIZE_LIMIT);
	$documentsData['disk_remaining']=100-$documentsData['disk_used'];
        $documentsData['SIZE_LIMIT']=$SIZE_LIMIT;
        $length = 6;        
        $numbers = range('0', '9');
        $otp ='';

        while ($length--) {
            $key = array_rand($numbers);
            $otp .= $numbers[$key];
        }
		
		$this->session->set_userdata('OTP',$otp);
		
		//if($this->session->userdata('isExpertVerified')==0)
		//{
		//echo $this->session->userdata('expertMobileNumber');	
		//die();
		$expertMobileNumber= $this->session->userdata('expertMobileNumber');
		
        $url = "http://bsms.chat2friend.co.in/SendSms?user_ID=carashmmi@gmail.com&user_Pwd=9810101449&sender_ID=EXPERT&MOB_NO=$expertMobileNumber&sms_Type=trans&msg=";
        $msg="Your OTP is  $otp .Please login to http://www.visheshagya.in/";
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, "$url.urlencode($msg)");
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);
        curl_close($ch);
        //$json = file_get_contents($url.urlencode($msg));
		//} 
        $this->load->view('ExpertsDocuments_view', $documentsData);
    }
    function otpVerification(){
		$otp=$this->input->post('otp');
		if($otp==$this->session->userdata('OTP'))
		{
			$this->session->set_userdata('isExpertVerified',1);
			
		}
		redirect(base_url('ExpertDocument'));
			
	}
    
    
    
    function foldersize($path) {
			$total_size = 0;
			$files = scandir($path);
			$cleanPath = rtrim($path, '/'). '/';

			foreach($files as $t) {
				if ($t<>"." && $t<>"..") {
					$currentFile = $cleanPath . $t;
					if (is_dir($currentFile)) {
						$size = $this->foldersize($currentFile);
						$total_size += $size;
					}
					else {
						$size = filesize($currentFile);
						$total_size += $size;
					}
				}   
			}

			return $total_size;
		}
		function format_size($size) {
			 global $units;

		  $mod = 1024;

		 for ($i = 0; $size > $mod; $i++) {
			$size /= $mod;
		}

		$endIndex = strpos($size, ".")+3;

		return substr( $size, 0, $endIndex).' '.$units[$i];
	  }

    function createNewFolder() {
        $folderName = $this->input->post('folderName');
        $subfolder=$this->input->post('subFolder');
        if($subfolder=="No")
        {
         $expertFolder = "expertdocuments/" . $this->session->userdata('expertId') . "/" .$folderName;   
        }  
        else{
        $expertFolder = "expertdocuments/" . $this->session->userdata('expertId') . "/".$subfolder."/" .$folderName;    
        }
        //echo $expertFolder;
        //exit();

        if (!is_dir($expertFolder)) {
            if (mkdir($expertFolder, 0777, TRUE)) {
                $this->session->set_flashdata('FolderCreateSuccessMessage', 'Your folder has been created successfully');
            } else {
                $this->session->set_flashdata('FolderCreateErrorMessage', 'Your folder could not be created');
            }
            redirect(base_url() . 'ExpertDocument');
        } else {
            $this->session->set_flashdata('FolderCreateErrorMessage', 'Your folder could not be created');
        }
        redirect(base_url() . 'ExpertDocument');
    }
     function eDairyList()
    {
        $this->load->model('EDairyModel');
        $dairy = $this->EDairyModel->eDairy_list();
        $this->load->view('ExpertsDocuments_view',['dairy'=>$dairy]);
    }

    function addDairy()
    {
        $this->load->helper('form');
        $this->load->view('ExpertsDocuments_view');
       $post = $this->input->post();
       $post['createDate'] =date('Y-m-d H:i:s');
       $post['updateId'] = date('Y-m-d H:i:s');
       unset($post['submit']);
        $this->load->model('EDairyModel');
        if( $this->EDairyModel->add_eDairy($post) ) {
            //flash message insert successful.
            redirect(base_url() . 'ExpertDocument');
        }
        else 
        {
            //insert failed

        }
    }

}
