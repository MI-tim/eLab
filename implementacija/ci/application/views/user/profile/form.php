<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<form id="reset_pass_form" action="#" method="post">
	<div>
		<input type="password" id="old_pass" class="form-control" placeholder="Stara lozinka" required>
	</div>
	<div>
	    <input type="password" id="new_pass" class="form-control" placeholder="Nova lozinka" required>
	</div>
	<div>
	    <input type="password" id="rn_pass" class="form-control" placeholder="Ponovite novu lozinka" required>
	</div>
	<button type="submit" id="reset_pass_btn" class="elab">Promeni</button>
</form>
