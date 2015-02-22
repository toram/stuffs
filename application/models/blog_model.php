<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_all_posts()
	{
		$qry = $this->db->get("posts");
		return $qry->result();
	}

	function add_post($title, $content)
	{
		$data = array('title' => $title, 'content' => $content);
		$this->db->insert('posts', $data);
	}
}

?>