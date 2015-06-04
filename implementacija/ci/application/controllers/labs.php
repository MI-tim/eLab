<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

	class Labs extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		public function index() {
			$data['title'] = "eLab | Sale";
			$data['main_title'] = "Laboratorijske sale:";

			$this->load->view('/admin/+html');
			$this->load->view('/admin/labs/head', $data);
			$this->load->view('/admin/+body');
			$this->load->view('/admin/header');
			$this->load->view('/admin/menu');
			$this->load->view('/admin/+main', $data);
			$this->load->view('/admin/labs/modal');
			$this->load->view('/admin/labs/datatable', $data);
			$this->load->view('/admin/-main');
			$this->load->view('/admin/labs/-body');
			$this->load->view('/admin/-html');
		}

		// populate labs table rows from db -- OK
		private function populate_rows() {
			$this->load->model('labs_table');
			$data = $this->labs_table->get_entries();

	        return $data;
		}

		// ajax pass to datatable -- OK
		public function json_table() {
			echo json_encode($this->populate_rows());
		}

		// remove lab row -- OK
		public function remove_row() {
			$mark = $this->input->post('mark');
			unset ($_POST);

			$this->load->model('labs_table');
			$data = $this->labs_table->remove_row($mark);

			$this->output->append_output("success");
		}

		// add lab -- OK
    	public function add_row() {
    		$mark = $this->input->post('mark');
    		$location = $this->input->post('location');
    		$numwp = $this->input->post('numwp');
    		unset ($_POST);

    		if ( ($mark !== '') || ($numwp !== '') ) {
		        if ( (ctype_digit($numwp)) && ( ((int)$numwp > 0) && ((int)$numwp < 151) ) ) {
			        $this->load->model('labs_table');
			        $this->labs_table->add_row($mark, $location, $numwp);

			        $this->output->append_output("success");
			    }
			    else {
			    	$this->output->append_output("format");
			    };
		    }
		    else {
		    	$this->output->append_output("empty");
		    };

    	}
	}

?>