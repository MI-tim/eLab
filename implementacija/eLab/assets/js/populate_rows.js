$(document).ready(function(){

    // Autor: Miloš Pivić
                        
    $.getJSON('http://localhost/eLab/index.php/admin/json_table', function(data) {
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
