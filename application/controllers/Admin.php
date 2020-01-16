<?php
class Admin extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('adminid') )
		{
			return redirect('AdminLogin');
		}
	}
	

	public function dashboard()
	{

		$this->load->model('AdminDashboard');
		$this->load->library('pagination');

		$config = [
		'base_url'  => base_url('Admin/dashboard'),
		'per_page'  => 5,
		'total_rows' => $this->AdminDashboard->num_rows(),
		'full_tag_open' => "<ul class='pagination'>",
		'full_tag_close' => "</ul>",
		'first_tag_open' => '<li>',
		'first_tag_close' => '</li>',
		'last_tag_open' => '<li>',
		'last_tag_close' => '</li>',
		'next_tag_open' => '<li>',
		'next_tag_close' => '</li>',
		'prev_tag_open' => '<li>',
		'prev_tag_close' => '</li>',
		'num_tag_open' => '<li>',
		'num_tag_close' => '</li>',
		'cur_tag_open' => "<li class='active'><a>",
		'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);


		
		$clients = $this->AdminDashboard->client_list( $config['per_page'], $this->uri->segment(3) );
		$this->load->view('admin/dashboard_view', ['clients'=>$clients]);
	}

	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Query','required');

		if ( ! $this->form_validation->run())
			$this->dashboard();

		$query = $this->input->post('query');
		return redirect("Admin/search_result/$query");

		

		
		

		
	}

	public function search_result( $query )
	{

		$this->load->model('AdminDashboard');
		$this->load->library('pagination');

		$config = [
		'base_url'  => base_url("Admin/search_result/$query"),
		'per_page'  => 5,
		'total_rows' => $this->AdminDashboard->count_search_results( $query ),
		'full_tag_open' => "<ul class='pagination'>",
		'full_tag_close' => "</ul>",
		'first_tag_open' => '<li>',
		'uri_segment' => 4,
		'first_tag_close' => '</li>',
		'last_tag_open' => '<li>',
		'last_tag_close' => '</li>',
		'next_tag_open' => '<li>',
		'next_tag_close' => '</li>',
		'prev_tag_open' => '<li>',
		'prev_tag_close' => '</li>',
		'num_tag_open' => '<li>',
		'num_tag_close' => '</li>',
		'cur_tag_open' => "<li class='active'><a>",
		'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);

		$clients =$this->AdminDashboard->search( $query, $config['per_page'], $this->uri->segment(4));

		$this->load->view('admin/Search_result',COMPACT('clients'));


	}
}