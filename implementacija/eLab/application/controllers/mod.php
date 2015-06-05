<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

	class Mod extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// users table page
		public function index() {
			$data['title'] = "eLab | Hardver";
			$data['main_title'] = "Hardver:";

			$this->load->view('/mod/+html');
			$this->load->view('/mod/hw/head', $data);
			$this->load->view('/mod/+body');
			$this->load->view('/mod/header');
			$this->load->view('/mod/menu');
			$this->load->view('/mod/+main', $data);
			$this->load->view('/mod/hw/modal');
			$this->load->view('/mod/hw/datatable', $data);
			$this->load->view('/mod/-main');
			$this->load->view('/mod/hw/-body');
			$this->load->view('/mod/-html');
		}

		// populate users table rows from db -- OK
		private function populate_rows() {
			$this->load->model('hw_table');
			$data = $this->hw_table->get_entries(); //echo $data[0]->Proizvodjac; //echo $data[0]->Model;

	        return $data;
		}

		// ajax pass to datatable -- OK
		public function json_table() {
			echo json_encode($this->populate_rows());
		}

		// remove user row -- OK
		public function remove_row() {
			$oznaka = $this->input->post('oznaka');

			$this->load->model('hw_table');
			$data = $this->hw_table->remove_row($oznaka);
		}


    	// add hardware -- OK
    	public function add_row() {
    		$proizvodjac = $this->input->post('proizvodjac');
    		$model = $this->input->post('model');
    		$oznaka = $this->input->post('oznaka');
    		$ispravnost = $this->input->post('ispravnost');
    		$testiran = $this->input->post('testiran');
    		$rashodovan = $this->input->post('rashodovan');

		    $this->load->model('hw_table');
	        $this->hw_table->add_row($proizvodjac, $model, $oznaka, $ispravnost, $testiran, $rashodovan);
    	}

    	public function proba() {
    		$this->load->database();
    		$this->load->model('hw_table');
			$this->db->select('proizvodjac, model, oznaka, ispravnost, testiran, rashodovan');
			$query = $this->db->get('uredjaji');
			if ($query->num_rows() > 0) {
	            foreach ($query->result() as $temp) {
	                echo $temp->proizvodjac;
	                echo $temp->model;
	                echo $temp->oznaka;
	                echo $temp->ispravnost;
	                echo $temp->testiran;
	                echo $temp->rashodovan;
	            }
				
			}
		}

	}
?>