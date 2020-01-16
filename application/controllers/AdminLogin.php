<?php
class AdminLogin extends CI_Controller
{
	public function index()
	{
		$this->load->view('adminpublic/AdminLogin_view');
	}

	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|alpha');
		$this->form_validation->set_rules('password',' Password', 'required');

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");


		if($this->form_validation->run())
		{
			//success
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$this->load->model('AdminLoginModel');
			$login_id = $this->AdminLoginModel->login_valid( $username, $password );
			//echo "<pre>";
			//print_r($login_id->adminid);
			//print_r($login_id->mobileNumber);
			//exit();
			if( $login_id->adminid)
			{
				$this->load->library('session');
				$this->session->set_userdata('adminid', $login_id->adminid);
				$this->session->set_userdata('mobileNumber', $login_id->mobileNumber);
				//$this->load->view('admin/Dashboard');
				return redirect('Admin/dashboard');
				
				//credentials valid, 
			}
			else
			{
				echo "Password don't match.";
				//credentials unvalid
			}
		}
		else
		{
			//failed
			//echo validation_errors();
			$this->load->view('adminpublic/AdminLogin_view');
			
		}
	}

	public function admin_logout()
	{
		$this->session->unset_userdata('adminid');
		return redirect('AdminLogin');
	}
}