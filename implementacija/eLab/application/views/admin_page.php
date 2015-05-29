<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			<?php echo base_url() ?>
			Korisnici
		</title>

		<link href="<?php echo base_url('assets/images/favicon.png')?>" rel="shortcut icon" type="image/png"/>
		<link href="<?php echo base_url('assets/css/style.css')?>" rel='stylesheet' type='text/css'/>
		<link href="<?php echo base_url('assets/css/modal.css')?>" rel='stylesheet' type='text/css'/>
		<link href="<?php echo base_url('assets/js/datatables/media/css/jquery.dataTables.css')?>" rel='stylesheet' type='text/css'/>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui/jquery-ui.min.js')?>"></script>
		
		<script src="<?php echo base_url('assets/js/add_row.js')?>"></script>
		
	</head>
	<body>
		<div class="page"> <!-- Cela stranica -->

			<header id="header" class="admin">
			</header>

			<aside id="aside" class="admin"> <!-- Meni -->
				<div>
				<nav id="main_menu">
					<ul>
						<li><a href="<?php echo site_url(); ?>">Korisnici sistema</a></li>
						<li><a href="<?php echo site_url(); ?>">Laboratorijske sale</a></li>
						<li><a href="<?php echo site_url(); ?>">Podešavanje naloga</a></li>
						<li><a href="logout">Kraj rada</a></li>
					</ul>
				</nav>
				</div>
			</aside>

			<main id="main" class="admin"> <!-- Ceo glavni deo -->
				<h1>
					<!--<?php echo $main_title ?>-->
					Korisnici sistema
				</h1>
				
				<div class="panel"> <!-- Samo dugmence -->
	       			<a href="#add_row" id="add_row_pop">Dodaj korisnika</a>
	            </div>

				<div> <!-- Popup formica -->

					<a href="#x" class="overlay" id="add_row"></a>
			        <div class="popup">
			            <h3>Novi korisnik</h3>
			            <p>Unesite podatke o novom korisniku:</p>

						<form id="add_row_form" action="#" method="post">
				            <div>
				            	<input type="text" id="name" class="form-control" placeholder="Ime" required>
				            </div>
				            <div>
				                <input type="text" id="surname" class="form-control" placeholder="Prezime" required>
				            </div>
				            <div>
				                <input type="email" id="email" class="form-control" placeholder="eMail" required pattern=".*@(student\.)?etf\.(rs|bg\.ac\.rs)">
				            </div>
				            <div>
				                <select name="privilege" id="privilege" class="form-control">
				                    <option value="Korisnik" selected>Korisnik</option>
				                    <option value="Moderator">Moderator</option>
				                    <option value="Administrator">Administrator</option>
				                </select>
				            </div>
				            <button type="submit" id="add_row_btn" class="elab">Dodaj</button>
			            </form>

			            <a class="close" href="#close"></a>
        			</div>

				</div>

				<div class="main-content"> <!-- Ceo donji deo ispod dugmenceta -->
					<div class="table-responsive"> <!-- Tabela -->
						<table id="users" class="display table" style="width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>Ime</th>
									<th>Prezime</th>
									<th>eMail</th>
									<th>Privilegija</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Ime</th>
									<th>Prezime</th>
									<th>eMail</th>
									<th>Privilegija</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</main>

		</div>

		

		<script src="<?php echo base_url('assets/js/datatables/media/js/jquery.js')?>"></script>
		<script src="<?php echo base_url('assets/js/datatables/media/js/jquery.dataTables.js')?>"></script>
		<script src="<?php echo base_url('assets/js/utconfig.js')?>"></script> <!-- datatables custom config -->
		<script src="<?php echo base_url('assets/js/populate_rows.js')?>"></script> 
		<script src="<?php echo base_url('assets/js/remove_row.js')?>"></script>
		<script src="<?php echo base_url('assets/js/reset_pass.js')?>"></script>
		<script src="<?php echo base_url('assets/js/update_row.js')?>"></script>

		
		<!-- add row-->
		

	</body>
</html>