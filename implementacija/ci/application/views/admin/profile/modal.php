<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel">
    <table id="c_pass" class="display" cellspacing="0" width="98.5%" align="left">
        <thead>
            <tr>
                <th class="left">Promeni lozinku:</th>
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
            </tr>
        </tfoot>

        <tbody>
            <tr>
                <td><input id="old_p" name="old_p" type="text" placeholder="Stara lozinka" required></td>
                <td><input id="new_p" name="new_p" type="password" placeholder="Nova lozinka" required></td>
                <td><input id="rnew_p" name="rnew_p" type="password" placeholder="Ponovi novu lozinku" required></td>
                <td></td>
            </tr>
            </tbody>
    </table>
</div>