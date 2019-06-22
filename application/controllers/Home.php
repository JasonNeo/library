<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Home controller
 * To control all visitors (non-members) operations.
 */
class Home extends BaseController {

	function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->load->library('session');
	}

	public function index()
	{
		// $this->loadViewsHome("about", $this->global, NULL, NULL);
		$page_data['page_name'] = "index";
    	$this->load->view('front/index', $page_data);
	}
	public function about()
	{
		$page_data['page_name'] = "about";
    	$this->load->view('front/index', $page_data);
	}
	public function harvard()
	{
		$page_data['page_name'] = "harvard";
    	$this->load->view('front/index', $page_data);
	}
	
	function book($type = 'all', $bookId = '')
	{
		$searchText = '';
		if ($type == 'search') {
			if ($this->input->post('searchText')) {
				$searchText = $this->input->post('searchText');
				$this->db->like('title', $searchText);
			}
		}

		if ($type == 'detail') {
			$page_data['page_name'] = "book_detail";
			$page_data['userId'] = $this->session->userdata ( 'userId' );
			$this->db->where('bookId', $bookId);
			// return only one record in array form
			$page_data['book'] = $this->db->get('tbl_books')->row_array();
			$page_data['subjects'] = $this->db->get('tbl_subjects')->result_array();
		} else {
			// $type == search || all
			$this->load->model('book_model');
			$this->db->where('isDeleted', 0);

			$page_data['page_name'] = "book_catalogue";
			$page_data['books'] = $this->db->get('tbl_books')->result_array();
			$page_data['subjects'] = $this->db->get('tbl_subjects')->result_array();
			$page_data['count'] = $this->book_model->bookListingCount($searchText);

		}

		$this->load->view('front/index', $page_data);
	}
	
	    /**
     * This function is used to add new user to the system
     */
    public function register()
    {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('register-fname','Full Name','trim|required|max_length[40]');
		$this->form_validation->set_rules('register-mobile','Mobile Number','required|min_length[10]');
		$this->form_validation->set_rules('register-email','Email','trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('register-password','Password','required|max_length[20]');
		$this->form_validation->set_rules('register-cpassword','Confirm Password','trim|required|matches[register-password]|max_length[20]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', 'Account register failed!');
			redirect(base_url());
		}
		else
		{
			$name = $this->security->xss_clean($this->input->post('register-fname'));
			$mobile = $this->security->xss_clean($this->input->post('register-mobile'));
			$email = strtolower($this->security->xss_clean($this->input->post('register-email')));
			$password = $this->input->post('register-password');
			
			$userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>4, 'name'=> $name,
								'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
			
			$this->load->model('user_model');
			$result = $this->user_model->addNewUser($userInfo);
			
			if($result > 0)
			{
				$this->session->set_flashdata('success', 'New User created successfully');
			}
			else
			{
				$this->session->set_flashdata('error', 'User creation failed');
			}
			
			redirect(base_url());
		}
	}

}
