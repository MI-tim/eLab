<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel">
		<a href="#add_row" id="add_row_pop">Dodaj hardver</a>
</div>

<div>

	<a href="#x" class="overlay" id="add_row"></a>
    <div class="popup">
        <h3>Novi hardver</h3>
        <p>Unesite podatke o novom hardveru:</p>

		<form id="add_row_form" action="#" method="post">
            <div>
            	<input type="text" id="proizvodjac" class="form-control" placeholder="Proizvođač" required>
            </div>
            <div>
                <input type="text" id="model" class="form-control" placeholder="Model" required>
            </div>
            <div>
                <input type="text" id="oznaka" class="form-control" placeholder="Oznaka" required>
            </div>
            <!-- <div>
                <select name="tip" id="tip" class="form-control">
                    <option value="Ulaz" selected>Ulaz</option>
                    <option value="Izlaz">Izlaz</option>
                    <option value="Kuciste">Kućište</option>
                    <option value="Komponenta">Komponenta</option>
                </select>
            </div> -->
            <div>
                <input type="text" id="ispravnost" class="form-control" placeholder="Ispravnost" required>
            </div>
            <div>
                <input type="text" id="testiran" class="form-control" placeholder="Testiran" required>
            </div>
            <div>
                <input type="text" id="rashodovan" class="form-control" placeholder="Rashodovan" required>
            </div>
            <button type="submit" id="add_row_btn" class="elab">Dodaj</button>
        </form>

        <a class="close" id="close_btn" href="#close"></a>
	</div>

</div>