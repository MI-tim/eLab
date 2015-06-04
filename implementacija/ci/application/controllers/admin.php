<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Autor: Miloš Pivić

	class Admin extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		// users table page
		public function index() {
			$data['title'] = "eLab | Korisnici";
			$data['main_title'] = "Korisnici sistema:";

			$this->load->view('/admin/+html');
			$this->load->view('/admin/users/head', $data);
			$this->load->view('/admin/+body');
			$this->load->view('/admin/header');
			$this->load->view('/admin/menu');
			$this->load->view('/admin/+main', $data);
			$this->load->view('/admin/users/modal');
			$this->load->view('/admin/users/datatable', $data);
			$this->load->view('/admin/-main');
			$this->load->view('/admin/users/-body');
			$this->load->view('/admin/-html');
		}

		// populate users table rows from db -- OK
		private function populate_rows() {
			$this->load->model('users_table');
			$data = $this->users_table->get_entries(); //echo $data[0]->Ime; //echo $data[0]->Prezime;

	        return $data;
		}

		// ajax pass to datatable -- OK
		public function json_table() {
			echo json_encode($this->populate_rows());
		}

		// remove user row -- OK
		public function remove_row() {
			$email = $this->input->post('email');
			unset ($_POST);
			
			$this->load->model('users_table');
			$data = $this->users_table->remove_row($email);

			$this->output->append_output("success");
		}


		// generate users password -- OK
	    private function generate_pass($length = 9, $add_dashes = false, $available_sets = 'luds') {
	    	$sets = array();
	    	if(strpos($available_sets, 'l') !== false)
	    		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	    	if(strpos($available_sets, 'u') !== false)
	    		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	    	if(strpos($available_sets, 'd') !== false)
	    		$sets[] = '23456789';
	    	if(strpos($available_sets, 's') !== false)
	    		$sets[] = '!@#$%&*?';

	    	$all = '';
	    	$password = '';
	    	foreach($sets as $set) {
	    		$password .= $set[array_rand(str_split($set))];
	    		$all .= $set;
	    	}

	    	$all = str_split($all);
	    	for($i = 0; $i < $length - count($sets); $i++)
	    		$password .= $all[array_rand($all)];

	    	$password = str_shuffle($password);

	    	if(!$add_dashes)
	    		return $password;

	    	$dash_len = floor(sqrt($length));
	    	$dash_str = '';
	    	while(strlen($password) > $dash_len) {
	    		$dash_str .= substr($password, 0, $dash_len) . '-';
	    		$password = substr($password, $dash_len);
	    	}
	    	$dash_str .= $password;
	    	return $dash_str;

	    }

	    // sending email with new or reset pass -- OK
	 	private function send_email($t_email, $pass, $o) {
	    	$from_email = 'elab.etf@gmail.com';
	    	$to_email = $t_email;

	        if ($o === "1") {
	            $subject = "\n eLab | Dobrodošli";
	             $message =
	                "<p style='color: #a3a3a3'>--- <i>automatski generisana elektronska poruka</i> ---</p>"
	                . "<br>" . "<p>Zdravo,</p>"
	                . "<p>Vaši podaci za pristup eLab sistemu su:</p>"
	                . "<p>email: <b style='color: #c0392b'>" . $to_email . "</b><br>"
	                . "lozinka: <b style='color: #c0392b'>" . $pass . "</b></p>"
	                . "<br>" . "<p style='color: #a3a3a3'>--- <i>automatski generisana elektronska poruka</i> ---</p>";
	        }
	        else {
	            $subject = "\n eLab | Vaša nova lozinka";
	            $message =
	                "<p style='color: #a3a3a3'>--- <i>automatski generisana elektronska poruka</i> ---</p>"
	                . "<br>" . "<p>Zdravo,</p>"
	                . "<p>Vaša nova lozinka za pristup sistemu eLab je: <b style='color: #c0392b'>" . $pass
	                . "</b></p>"
	                . "<p>Lozinku možete promeniti, nakon pristupa sistemu, izborom opcije - Podešavanje naloga.</p>"
	                . "<br>" . "<p style='color: #a3a3a3'>--- <i>automatski generisana elektronska poruka</i> ---</p>";
	        }

			//email settings
	    	$config['protocol'] = 'smtp';
	    	$config['smtp_host'] = 'ssl://smtp.gmail.com';
	    	$config['smtp_port'] = '465';
	    	$config['smtp_user'] = 'elab.etf@gmail.com';
	    	$config['smtp_pass'] = 'milos123';
	    	$config['mailtype'] = 'html'; //text
			$config['charset'] = 'UTF-8';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			//load library
			$this->load->library('email', $config); //$this->email->initialize($config);

			//send mail
			$this->email->from($from_email);
			$this->email->to($to_email);
			$this->email->subject($subject);
			$this->email->message($message);
			if ($this->email->send()) {
				//email sent -- DO NOTHING
			}
			else {
				//error
				//redirect('index');
			}
		}

		 // reset users password -- OK
    	public function reset_pass() {
    		$email = $this->input->post('email');
    		unset ($_POST);

	        $pass = $this->generate_pass(16);
	        $hash = password_hash($pass, PASSWORD_BCRYPT); // http://php.net/manual/en/function.password-hash.php

	        $this->load->model('users_table');
	        $this->users_table->update_password($email, $hash);

	        $this->send_email($email, $pass, "2");

	        $this->output->append_output("success");
    	}

    	// add user -- OK
    	public function add_row() {
    		$name = $this->input->post('name');
    		$surname = $this->input->post('surname');
    		$email = $this->input->post('email');
    		$privilege = $this->input->post('privilege');
    		unset ($_POST);

    		if (($name !== '') || ( ($surname !== '') || ($email !== '') )) {
    			if ( (!ctype_digit($name)) && (!ctype_digit($surname)) ) {
	    			if (preg_match("#^.*@(student\.)?etf\.(rs|bg\.ac\.rs)$#", $email) === 1) {
						$pass = $this->generate_pass(16);
				        $hash = password_hash($pass, PASSWORD_BCRYPT);

				        $this->load->model('users_table');
				        $this->users_table->add_row($name, $surname, $email, $hash, $privilege);

				        $this->send_email($email, $pass, "1");

				        $this->output->append_output("success");
			    	}
			    	else {
			    		$this->output->append_output("email");
			    	};
			    }
			    else {
			    	$this->output->append_output("number");
			    };
		    }
		    else {
		    	$this->output->append_output("empty");
		    };


    	}

	}
?>