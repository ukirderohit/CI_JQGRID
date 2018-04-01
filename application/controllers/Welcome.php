<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function index()
	{
		$this->load->view('welcome_message');

	}
    /**
     * This function is used to load the view
     */
    /**
    This function which called from jqGrid and it fetch the real data from database page by page, search, sort, no_of_records_per_page etc.
     */
    public function getCustomers()
    {
        $this->load->model('WelcomeModel');
        $search_field = $this->input->get('searchField'); // search field name
        $search_string = $this->input->get('searchString'); // search string
        $page = $this->input->get('page'); //page number
        $limit = $this->input->get('rows'); // number of rows fetch per page
        $sidx = $this->input->get('sidx'); // field name which you want to sort
        $sord = $this->input->get('sord'); // field data which you want to soft
        $lid = $this->input->get('id');
        $lto = $this->input->get('gender');
//        echo $lid;
        if(!$sidx) { $sidx = 1; } // if its empty set to 1
        $count = $this->WelcomeModel->getAllCustomerListCount($search_field, $search_string, $lid, $lto);
        $total_pages = 0;
        if($count > 0) { $total_pages = ceil($count/$limit); }
        if($page > $total_pages) { $page = $total_pages; }
        $start = ($limit * $page) - $limit;
        $data = array('page'=>$page,
            'total'=>$total_pages,
            'records'=>$count,
            'rows'=>$this->WelcomeModel->getAllCustomersList($sidx, $sord, $start, $limit, $search_field, $search_string,$lid, $lto)
        );
//        var_dump($data);
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($data));
    }
}
