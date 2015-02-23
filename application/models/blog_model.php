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
		$data = array('title' => $title, 'content' => $content, 'visible'=>1);
		$this->db->insert('posts', $data);
	}

	function get_visible_posts()
	{
		$qry = $this->db->get_where("posts", array("visible" => 1));
		return $qry->result();
	}

	function update($id, $status)
	{
		$data = array("visible" => ($status==1) ? true : false );
		$this->db->where("id", $id);
		$this->db->update("posts", $data);		
	}
}

?>