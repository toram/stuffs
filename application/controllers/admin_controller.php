<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Admin_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("blog_model");
		$this->load->library("Datatables");

		$this->load->library("table");
		$this->load->database();		
	}

	function index()
	{
		if (!$this->session->userdata('logged_in')) {redirect('login', 'refresh');}

		$tbl = array('table_open' => '<table id="listado" border="1" cellpadding="2" cellspacing="1" class="listado">');
		$this->table->set_template($tbl);
		$this->table->set_heading("Id", "Título", "Fecha", "Publicada<br/><small>(no censurada)</small>");
		$this->load->view("admin/admin_view", $this->table);		
	}

	function datatable()
	{
		$this->datatables->select("id,title,date_published,visible")
						 ->unset_column('id')
						 ->from('posts');
		
		echo $this->datatables->generate();						 
	}

	function update($id, $status)
	{
		$this->blog_model->update($id, $status);
	}

	function logout()
	{
		$this->session->unset_userdata("logged_in");
		session_destroy();
		redirect('blog','refresh');
	}
}

?>