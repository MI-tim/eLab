<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel">
    <table id="autb" class="display" cellspacing="0" width="98.5%" align="left">
        <thead>
            <tr>
                <th class="left">Dodaj korisnika:</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>

        <tbody>
            <tr>
                <td><input id="name" name="name" type="text" placeholder="Ime" required pattern="^[a-zA-ZđĐšŠćĆŽž]*$"/></td>
                <td><input id="surname" name="surname" type="text" placeholder="Prezime" required pattern="^[a-zA-ZđĐšŠćĆŽž]*$"/></td>
                <td><input id="email" name="email" type="email" placeholder="eMail" required pattern="^.*@(student\.)?etf\.(rs|bg\.ac\.rs)$"/></td>
                <td>
                    <select name="privilege" id="privilege">
                        <option value="Korisnik" selected>Korisnik</option>
                        <option value="Moderator">Moderator</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                </td>
                <td></td>

            </tr>
        </tbody>
    </table>
</div>