<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

class Hw_table extends CI_Model {
	
	public function __construct() {
		// Call the CI_Model constructor
        $this->load->database();
	}
	


	// get all entries from db -- OK
	public function get_entries() {
		$this->db->select('proizvodjac, model, oznaka, ispravnost, testiran, rashodovan');
		$query = $this->db->get('uredjaji');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $temp) {
                $array[] = $temp;
            }
			return $array;
		}
	}

	// add entry into db -- OK
	public function add_row($proizvodjac, $model, $oznaka, $ispravnost, $testiran, $rashodovan) {
		$data = array(
               'proizvodjac' => $proizvodjac,
               'model' => $model,
               'oznaka' => $oznaka,
               'ispravnost' => $ispravnost,
               'testiran' => $testiran,
               'rashodovan' => $rashodovan
            );

		$this->db->insert('uredjaji', $data); //Note: All values are escaped automatically producing safer queries.
	}

	// remove entry from db -- OK
	public function remove_row($oznaka) {
		
		$this->db->where('oznaka', $oznaka); // email must be unique !
		$this->db->delete('uredjaji');
	}

}

?>