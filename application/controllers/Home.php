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

	function book_search($param = '')
    {
        // $category = $this->input->post('category');
		// $this->session->set_userdata('searched_cat', $category);
		
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$this->db->like('title', $query);
		}

		$page_data['books'] = $this->db->get('tbl_books')->result_array();
		
		$this->session->set_flashdata('page_data', $page_data);
		redirect(base_url() . 'book/search', 'refresh');
	}
	
	function book($type = 'all', $bookId = '')
	{
		if ($type == 'detail') {
			$page_data['page_name'] = "book_detail";
			$this->db->where('bookId', $bookId);
			// return only one record in array form
			$page_data['book'] = $this->db->get('tbl_books')->row_array();
		}

		if ($type == 'search') {
			$page_data['page_name'] = "book_catalogue";
			if ($this->input->post('query')) {
				$query = $this->input->post('query');
				$this->db->like('title', $query);
			}
	
			$page_data['books'] = $this->db->get('tbl_books')->result_array();
			// $page_data['books'] = $this->session->flashdata();
		}
		
		if ($type == 'all') {
			$page_data['page_name'] = "book_catalogue";
			$page_data['books'] = $this->db->get('tbl_books')->result_array();	
		}

		$this->load->view('front/index', $page_data);
	}
}
