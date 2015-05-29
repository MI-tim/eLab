<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	// Autor: Miloš Pivić
	
	class Uprofile extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// profile page
		public function index() {
			$data['title'] = "eLab | Profil";
			$data['main_title'] = "Promena lozinke:";
			
			$this->load->view('/user/+html');
			$this->load->view('/user/profile/head.php', $data);
			$this->load->view('/user/+body.php');
			$this->load->view('/user/header.php');
			$this->load->view('/user/menu.php');
			$this->load->view('/user/+main.php', $data);
			$this->load->view('/user/profile/form.php');
			$this->load->view('/user/-main.php');
			$this->load->view('/user/profile/-body.php');
			$this->load->view('/user/-html');

		}


		// reset users pass -- NOT TESTED -- TODO
		public function reset_pass() {
			$oldp = $this->input->post('old_pass');
			$newp = $this->input->post('new_pass');
			$rnpass = $this->input->post('rn_pass');

			// read email from active session

			// get users pass

			// check pass // if (hash_equals ( string $uhash , string $oldp )) { }

			// check oldp and users pass

			// check newp and rnpass

			// check if oldp is equal to newp
			if( $oldp != $newp) {
				$hash = password_hash($newp, PASSWORD_DEFAULT);

				$this->load->model('profile_table');
				$data = $this->profile_table->update_password($email, $hash);
			}
			else {
				// "Lozinka nije promenjena - stara i nova su identične."
			}

		}

	}

?>