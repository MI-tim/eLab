<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

class Labs_table extends CI_Model {
	
	public function __construct() {
		// Call the CI_Model constructor
        $this->load->database();
	}
	


	// get all entries from db -- OK
	public function get_entries() {
		$this->db->select('oznaka, lokacija, brm');
		$query = $this->db->get('sale');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $temp) {
                $array[] = $temp;
            }
			return $array;
		}
	}

	// add entry into db -- OK
	public function add_row($mark, $location, $nwork) {
		$data = array(
               'oznaka' => $mark,
               'lokacija' => $location,
               'brm' => $nwork
            );

		$this->db->insert('sale', $data); //Note: All values are escaped automatically producing safer queries.
	}

	// remove entry from db -- OK
	public function remove_row($mark) {

		$this->db->where('oznaka', $mark); // email must be unique !
		$this->db->delete('sale');
	}

}

?>