<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<aside id="aside" class="admin">
	<nav id="main_menu">
	    <ul>
	        <li class="<?php echo activate_menu(''); ?>"><a href="<?php echo site_url();?>">Korisnici sistema</a></li>
	        <li class="<?php echo activate_menu('labs'); ?>"><a href="<?php echo site_url('labs');?>">Laboratorijske sale</a></li>
	        <li class="<?php echo activate_menu('profile'); ?>"><a href="<?php echo site_url('profile');?>">Podešavanje naloga</a></li>
	        <li class="<?php echo activate_menu('logout'); ?>"><a href="<?php echo site_url('logout');?>">Kraj rada</a></li>
	  	</ul>
	</nav>
</aside>