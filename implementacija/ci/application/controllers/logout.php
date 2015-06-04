<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

	class Logout extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// logout user -- TODO
		public function index() {
			$this->load->library('session');
			$this->session->sess_destroy();

			$this->load->view('login');
		}

	}

?>