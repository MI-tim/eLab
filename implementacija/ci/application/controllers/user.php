<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

	class User extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// labs table
		public function index() {
			$data['title'] = "eLab | Sale";
			$data['main_title'] = "Pregled sala i radnih mesta:";

			$this->load->view('/user/+html');
			$this->load->view('/user/labs/head', $data);
			$this->load->view('/user/+body');
			$this->load->view('/user/header');
			$this->load->view('/user/menu');
			$this->load->view('/user/+main', $data);
			$this->load->view('/user/labs/datatable', $data);
			$this->load->view('/user/-main');
			$this->load->view('/user/labs/-body');
			$this->load->view('/user/-html');
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


	}

?>
