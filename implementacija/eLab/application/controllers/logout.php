<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

	class Logout extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->library('session');
		}

		// logout user -- TODO
		public function index() {

			// Removing session data
			$session_data = array(
				'ime', 'prezime', 'email'
			);
			$this->session->unset_userdata('logged_in', $session_data);
			$data['message_display'] = 'Uspešno ste se odjavili.';
			$data['title'] = "eLab | Prijava";
			$data['main_title'] = "Prijava na sistem:";

			$this->load->view('/login/+html');
			$this->load->view('/login/head', $data);
			$this->load->view('/login/+body');
			$this->load->view('/login/header');
			$this->load->view('/login/menu');
			$this->load->view('/login/+main', $data);
			$this->load->view('/login/form');
			$this->load->view('/login/-main');
			$this->load->view('/login/-body');
			$this->load->view('/login/-html');
		}

	}

?>