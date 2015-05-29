<?php

Class Login_Database extends CI_Model {

	function __construct() {
		parent::__construct();
		//$this->load->library('session');
		$this->load->database();
	}

	
	// Read data using username and password
	public function login($data) {

		// Hesira se sifra da bi se uporedila sa sifrom u bazi, algoritam je isti i daje istu hesiranu vrednost
		// $hash = password_hash($data['password'], PASSWORD_DEFAULT);
		// $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $hash . "'";

		// Resenje bez hesiranja
		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";

		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} 
		else {
			return false;
		}
	}

}

?>