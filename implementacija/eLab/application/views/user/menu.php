<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->helper('menu_helper');

?>

<aside id="aside" class="admin">
	<nav id="main_menu">
	    <ul>
	        <li class="<?php echo activate_menu('user'); ?>"><a href="<?php echo site_url('user');?>">Sale</a></li>
	        <li class="<?php echo activate_menu('uprofile'); ?>"><a href="<?php echo site_url('uprofile');?>">Podešavanje naloga</a></li>
	        <li class="<?php echo activate_menu('logout'); ?>"><a href="<?php echo site_url('logout');?>">Kraj rada</a></li>
	  	</ul>
	</nav>
</aside>