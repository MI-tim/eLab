$(document).ready(function(){

	// Autor: Miloš Pivić
                        
    $.getJSON('http://localhost/eLab/index.php/labs/json_table', function(data) {
        $.each(data, function(key, val) {
            $('#labs').DataTable().row.add( [
                val.oznaka,
                val.lokacija,
                val.brm
            ] ).draw();
        });
    });
    
});
