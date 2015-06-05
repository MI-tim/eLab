<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

		<?php

			$this->load->helper('url');
			$this->load->helper('form');

			if (isset($this->session->userdata['logged_in'])) {

				header("location: http://localhost/eLab/index.php/user_authentication/user_login_process");
			}
		?>
		
<!-- Message -->
		<?php
		if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
		}
		?>

		<div id="main">
			<div id="login">
				
				<!-- <h2>Prijava</h2>
				<hr/> -->

				<?php
				echo form_open('user_authentication/user_login_process');
				?>
				
				<?php
				echo "<div class='error_msg'>";
				if (isset($error_message)) {
					echo $error_message;
				}
				echo validation_errors();
				echo "</div>";
				?>

				<label>Email</label>
				<input type="text" name="email" id="email" placeholder="" required pattern=".*@(student\.)?etf\.(rs|bg\.ac\.rs)"/><br /><br />
				<label>Lozinka</label>
				<input type="password" name="password" id="password" placeholder=""/><br/><br />
				<input type="submit" value="Prijavi se" name="submit"/><br />
								
				<?php echo form_close(); ?>

			</div>
		</div>
