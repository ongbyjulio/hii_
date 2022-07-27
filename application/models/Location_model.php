<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model
{
	private $_table = "post";
	public $id_post;
	public $latitude;
	public $langtitude; 

	public function getMaps()
	{
		return $this->db->get($this->_table)->result();
	}
}