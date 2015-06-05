<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_Database extends CI_Model {

	function __construct() {
		parent::__construct();
		//$this->load->library('session');
		$this->load->database();
	}

	// Read data using username and password
	public function login($data) {

		// Hash verify
		// $pass = $data['password'];
		// $condition = "email =" . "'" . $data['email'] . "'";
		// $this->db->select('password');
		// $this->db->from('korisnici');
		// $this->db->where($condition);
		// $this->db->limit(1);
		// $query = $this->db->get();

		// if ($query->num_rows() == 1) {
		// 	$result = $query->row();
		// 	if (password_verify($pass, $result->password)) {
		// 		return $query->row();
		// 	}
		// 	else return false;
		// } 
		// else {
		// 	return false;
		// }
		
		// // Resenje bez hesiranja
		$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";

		$this->db->select('*');
		$this->db->from('korisnici');
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
	public function read_user_information($data) {

		$condition = "email =" . "'" . $data['email'] . "'";
		$this->db->select('*');
		$this->db->from('korisnici');
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