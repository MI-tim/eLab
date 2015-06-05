<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->helper('menu_helper');
	
?>

<aside id="aside" class="admin">
	<nav id="main_menu">
	    <ul>
	        <li class="<?php echo activate_menu('mod'); ?>"><a href="<?php echo site_url('mod');?>">Hardver</a></li>
	        <!-- <li class="<?php echo activate_menu('rm'); ?>"><a href="<?php echo site_url('rm');?>">Radna mesta</a></li> -->
	        <li class="<?php echo activate_menu('mprofile'); ?>"><a href="<?php echo site_url('mprofile');?>">Podešavanje naloga</a></li>
	        <li class="<?php echo activate_menu('logout'); ?>"><a href="<?php echo site_url('logout');?>">Kraj rada</a></li>
	  	</ul>
	</nav>
</aside>