<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	// Autor: Miloš Pivić
	
	class Proba extends CI_Controller {

		public function __construct() {
			parent::__construct();

		}

		public function index() {
			echo '<script language="javascript">';
			echo 'alert("message successfully sent")';
			echo '</script>';
		}

	}

?>