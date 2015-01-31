<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class home_model extends CI_Model{

	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	function loadData($user)
	{
		$sql = "select * from siswa A, user B where A.id_user = B.id and B.username='".$user."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}