<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel">
    <table id="add_lab" class="display" cellspacing="0" width="98.5%" align="left">
        <thead>
            <tr>
                <th class="left">Dodaj laboratorijsku salu:</th>
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
                <td><input id="mark" name="mark" type="text" placeholder="Oznaka sale" required></td>
                <!--<td><input id="location" name="location" type="text" placeholder="Lokacija sale" required pattern="^[a-zA-Z ]*$"></td>-->
                <td>
                    <select name="location" id="location">
                        <option value="Paviljon Rašović" selected>Paviljon Rašović</option>
                        <option value="Računski centar">Računski centar</option>
                        <option value="Elektrotehnički fakultet">Elektrotehnički fakultet</option>
                    </select>
                </td>
                <td><input id="numwp" name="numwp" type="number" placeholder="Broj radnih mesta" min="1"  max="150" required pattern="^[0-9]*$"></td>
                <td></td>
            </tr>
            </tbody>
    </table>
</div>