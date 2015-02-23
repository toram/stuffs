<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("usuarios_model", "usuarios", TRUE);		
	}

	function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username","Username", "trim|required|xss_clean");
		$this->form_validation->set_rules("password","Password", "trim|required|xss_clean|callback_check_database");

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("admin/login_view");
		}
		else
		{
			redirect('admin','refresh');
		}
	}

	function check_database($password)
	{
		$username= $this->input->post("username");

		$result = $this->usuarios->login($username, $password);

		if ($result) 
		{
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array('id'=> $row->id, 'usuario'=>$row->usuario);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
}

?>