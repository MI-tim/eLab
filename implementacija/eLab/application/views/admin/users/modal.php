<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel">
		<a href="#add_row" id="add_row_pop">Dodaj korisnika</a>
</div>

<div>

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

        <a class="close" id="close_btn" href="#close"></a>
	</div>

</div>