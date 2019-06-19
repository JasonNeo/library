<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Home page
 */
class Home extends BaseController {

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
	public function catalogue()
	{
		$page_data['page_name'] = "catalogue";
    	$this->load->view('front/index', $page_data);
	}
	public function harvard()
	{
		$page_data['page_name'] = "harvard";
    	$this->load->view('front/index', $page_data);
	}
	public function result()
	{
		$page_data['page_name'] = "result";
    	$this->load->view('front/index', $page_data);
	}

	function book_search($param = '', $bookID)
    {
		$this->db->select('*')->from('books');
		$this->db->where('book_id', $bookID);


        $category = $this->input->post('category');
		$this->session->set_userdata('searched_cat', $category);
		
		if ($this->input->post('filter'))
			$filter = $this->input->post('filter');

        if ($param !== 'top') {
            $subject = $this->input->post('subject');
            $range        = $this->input->post('price');
        	$brand 		  = $this->input->post('brand');
        	$query 		  = $this->input->post('query');
            $p            = explode(';', $range);
            $this->session->set_flashdata('query',$query);
            redirect(base_url() . 'index.php/front/category/' . $category . '/' . $sub_category . '-'.$brand.'/' . $p[0] . '/' . $p[1] . '/' . $query, 'refresh');
        } else if ($param == 'top') {
            redirect(base_url() . 'index.php/front/category/' . $category, 'refresh');
        }
	}
	
	function book_view($bookID)
	{
		$page_data['page_name'] = "about";

		$this->db->where('book_id', $bookID);
		$page_data['all_books'] = $this->db->get('books')->result_array();
		$this->load->view('back/admin/blog_list', $page_data);
	}
}
