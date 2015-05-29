$(document).ready(function(){

    // Autor: Miloš Pivić
                        
    $.getJSON('http://localhost:8000/ci/index.php/admin/json_table', function(data) {
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
