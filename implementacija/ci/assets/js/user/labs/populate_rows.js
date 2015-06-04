$(document).ready(function(){

	// Autor: Miloš Pivić
    
    var base_url = window.location.origin;
    base_url = base_url + "/ci/index.php/user/json_table";

    $.getJSON(base_url, function(data) {
        $.each(data, function(key, val) {
            $('#labs').DataTable().row.add( [
                val.oznaka,
                val.lokacija,
                val.brm,
                val.irm
            ] ).draw();
        });
    });
    
});
