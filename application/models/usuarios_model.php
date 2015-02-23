<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model 
{

	function login($username, $password)
	{
		$this->db->select('id, usuario, clave');
		$this->db->from('usuarios');
		$this->db->where('usuario',$username);
		$this->db->where('clave',MD5($password));
		$this->db->limit(1);

		$qry = $this->db->get();

		if($qry->num_rows() == 1)
		{
			return $qry->result();
		}
		else
		{
			return false;
		}
	}

}

?>