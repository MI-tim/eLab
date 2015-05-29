<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

class Users_table extends CI_Model {
	
	public function __construct() {
		// Call the CI_Model constructor
        $this->load->database();
	}

	// find user hashed pass -- NOT TESTED
	public function get_password($email){
		$this->db->select('password');
		$this->db->where('email', $email);
		$query = $this->db->get('korisnici');

		if ($query->num_rows() > 0) {
            foreach ($query->result() as $temp) {
                $array[] = $temp;
            }
			return $array;
		}
	}

	// update user password -- OK
	public function update_password($email, $password) {
		$data = array(
				'password' => $password,
			);

		$this->db->where('email', $email); // email must be unique !
		$this->db->update('korisnici', $data); //Note: All values are escaped automatically producing safer queries.
	}

}

?>