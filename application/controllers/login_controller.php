<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();		
		$this->load->helper("url");		
		$this->load->library("Wurfl");
		$this->load->helper("wurfl");
	}

	function index()
	{
		$data['brand'] = wurfl_get_brand();
		$data['model'] = wurfl_get_model();
		$this->load->helper(array("form"));
		$this->load->view("admin/login_view", $data);
	}
}

?>