<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel">
		<a href="#add_row" id="add_row_pop">Dodaj salu</a>
</div>

<div>

	<a href="#x" class="overlay" id="add_row"></a>
    <div class="popup">
        <h3>Nova sala</h3>
        <p>Unesite podatke o novoj sali:</p>

		<form id="add_row_form" action="#" method="post">
            <div>
            	<input type="text" id="mark" class="form-control" placeholder="Oznaka" required>
            </div>
            <div>
                <input type="text" id="location" class="form-control" placeholder="Lokacija" required>
            </div>
            <div>
                <input type="number" id="nwork" class="form-control" placeholder="Broj radnih mesta" required>
            </div>
            
            <button type="submit" id="add_row_btn" class="elab">Dodaj</button>
        </form>

        <a class="close" id="close_btn" href="#close"></a>
	</div>

</div>