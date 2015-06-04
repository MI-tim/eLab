<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	// Autor: Miloš Pivić
	
	class Profile extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// profile page
		public function index() {
			$data['title'] = "eLab | Profil";
			$data['main_title'] = "Podešavanje profila:";
			
			$this->load->view('/admin/+html');
			$this->load->view('/admin/profile/head.php', $data);
			$this->load->view('/admin/+body.php');
			$this->load->view('/admin/header.php');
			$this->load->view('/admin/menu.php');
			$this->load->view('/admin/+main.php', $data);
			$this->load->view('/admin/profile/modal.php');
			$this->load->view('/admin/-main.php');
			$this->load->view('/admin/profile/-body.php');
			$this->load->view('/admin/-html');

		}


		// reset users pass -- OK -- NOT TESTED SESSIONS
		public function reset_pass() {
			$oldp = $this->input->post('old_p');
			$newp = $this->input->post('new_p');
			$rnpass = $this->input->post('rnew_p');
			unset ($_POST);

			// read email from active session
			/*$this->load->library('session');
			$email = $this->session->userdata('email');*/

			// get user pass
			$this->load->model('users_table');
			$u_pass = $this->users_table->get_password('pm100482d@student.etf.rs');
			$hashp = $u_pass[0]->password;

			if (password_verify($oldp, $hashp)) {
				// old pass - correct
				if ($newp === $rnpass) {
					// new and repeated new - correct
					$hash = password_hash($newp, PASSWORD_BCRYPT);
					$data = $this->users_table->update_password('pm100482d@student.etf.rs', $hash);
					
					$this->output->append_output("success");
				}
				else {
					$this->output->append_output("mismatch");
				};
			}
			else {
				$this->output->append_output("oldmismatch");
			}



		}

	}
?>