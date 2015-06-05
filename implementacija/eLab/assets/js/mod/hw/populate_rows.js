$(document).ready(function(){

	// Autor: Miloš Pivić
                        
    $.getJSON('http://localhost/eLab/index.php/mod/json_table', function(data) {
        $.each(data, function(key, val) {
            $('#hw').DataTable().row.add( [
                val.proizvodjac,
                val.model,
                val.oznaka,
                val.ispravnost,
                val.testiran,
                val.rashodovan,
            ] ).draw();
        });
    });
    
});
