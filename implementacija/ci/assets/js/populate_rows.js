$(document).ready(function(){

    // Autor: Miloš Pivić

    var base_url = window.location.origin;
    base_url = base_url + "/ci/index.php/admin/json_table";

    $.getJSON(base_url, function(data) {
        $.each(data, function(key, val) {
            $('#users').DataTable().row.add( [
                val.ime,
                val.prezime,
                val.email,
                val.privilegija
            ] ).draw();
        });
    });
    
});
