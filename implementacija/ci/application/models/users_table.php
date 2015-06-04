<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

class Users_table extends CI_Model {
	
	public function __construct() {
		// Call the CI_Model constructor
        $this->load->database();
	}
	


	// get all entries from db -- OK
	public function get_entries() {
		$this->db->select('ime, prezime, email, privilegija');
		$query = $this->db->get('korisnici');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $temp) {
                $array[] = $temp;
            }
			return $array;
		}
	}

	// add entry into db -- OK
	public function add_row($name, $surname, $email, $pass, $privilege) {
		$data = array(
               'ime' => $name,
               'prezime' => $surname,
               'email' => $email,
               'password' => $pass,
               'privilegija' => $privilege
            );

		$this->db->insert('korisnici', $data); //Note: All values are escaped automatically producing safer queries.
	}

	// remove entry from db -- OK
	public function remove_row($email) {
		
		/* // delete by IDkor from db
		$query = $this->db->get_where('korisnici', array('email' => $email));
		
		if ($query->num_rows() > 0) {
			 $row = $query->row();
			 $id =  $row->IDkor;
		}
		
		$this->db->where('IDkor', $id);
		$this->db->delete('korisnici');
		*/

		$this->db->where('email', $email); // email must be unique !
		$this->db->delete('korisnici');
	}

	// change users privilege -- OK
	public function change_privilege($email, $privilege) {
		$data = array(
				'privilegija' => $privilege
			);

		$this->db->where('email', $email); // email must be unique !
		$this->db->update('korisnici', $data); //Note: All values are escaped automatically producing safer queries.

	}

	// update user password -- OK
	public function update_password($email, $password) {
		$data = array(
				'password' => $password,
			);

		$this->db->where('email', $email); // email must be unique !
		$this->db->update('korisnici', $data); //Note: All values are escaped automatically producing safer queries.
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

}

?>