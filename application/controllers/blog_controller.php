<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("blog_model");
		$this->load->helper("url");
		$this->load->library("Wurfl");
		$this->load->helper("wurfl");
	}


	function index()
	{		
		$data['brand'] = wurfl_get_brand();
		$data['model'] = wurfl_get_model();
		$data['qry']=$this->blog_model->get_visible_posts();
		$this->load->view("blog/index", $data);
	}

	function add_post()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Titulo", "required|xss_clean");
		$this->form_validation->set_rules("contenido", "Contenido", "required|xss_clean");
		
		$data['brand'] = wurfl_get_brand();
		$data['model'] = wurfl_get_model();
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("blog/add_post", $data);	
		}
		else
		{
			$title = $this->input->post('title');
			$contenido = $this->input->post('contenido');

			$this->blog_model->add_post($title, $contenido);
			$this->load->view('blog/posted', $data);
		}	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */