<?php defined('BASEPATH') OR exit('No direct script access allowed');


class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->helper('url');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');
	}

	// Show login page
	public function index() {
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

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_form');
		}
		
		else {
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			
			if ($result == TRUE) {

				//$email = $this->input->post('email');
				$result = $this->login_database->read_user_information($data);
				
				if ($result != false) {
					$session_data = array(
						'ime' => $result[0]->ime,
						'prezime' => $result[0]->prezime,
						'email' => $result[0]->email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);

					// Redirect based on privilege
					switch ($result[0]->privilegija) {
						case 'Korisnik':
							redirect('user/index');
							break;
						case 'Moderator':
							redirect('mod/index');
							break;
						case 'Administrator':
							redirect('admin/index');
							break;
						
						default:
							$data = array(
							'error_message' => 'Greška u bazi.'
							);
							$this->load->view('login_page', $data);
							break;
					}
				}
			}
			else {
				$data = array(
					'error_message' => 'Pogrešno ste uneli email ili lozinku.'
				);
				$this->load->view('login_form', $data);
			}
		}
	}

	// Logout from admin page
	// public function logout() {

	// 	// Removing session data
	// 	$session_data = array(
	// 		'ime', 'prezime', 'email'
	// 	);
	// 	$this->session->unset_userdata('logged_in', $session_data);
	// 	$data['message_display'] = 'Uspešno ste se odjavili.';
	// 	$this->load->view('login_form', $data);
	// }

}

?>