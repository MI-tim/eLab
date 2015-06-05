<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	// Autor: Miloš Pivić
	
	class Profile extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// profile page
		public function index() {
			$data['title'] = "eLab | Profil";
			$data['main_title'] = "Promena lozinke:";
			
			$this->load->view('/admin/+html');
			$this->load->view('/admin/profile/head.php', $data);
			$this->load->view('/admin/+body.php');
			$this->load->view('/admin/header.php');
			$this->load->view('/admin/menu.php');
			$this->load->view('/admin/+main.php', $data);
			$this->load->view('/admin/profile/form.php');
			$this->load->view('/admin/-main.php');
			$this->load->view('/admin/profile/-body.php');
			$this->load->view('/admin/-html');

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