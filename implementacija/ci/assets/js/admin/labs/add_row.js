$(document).ready(function() {

    // Autor: Miloš Pivić

    $("#add_row_btn").click(function(event) {
        event.preventDefault();
        var mark = $("input#mark").val();
        var location = $("input#location").val();
        var nwork = $("input#nwork").val();

        $('#labs').DataTable().row.add( [ mark, location, nwork ] ).draw();

        $.ajax({
            type: "POST",
            url: "http://localhost:8000/ci/index.php/labs/add_row",
            data: {mark: mark, location: location, nwork: nwork},
            success: function(data) {
                alert("Uspešno ste dodali laboratorijsku salu.");
                
                // TODO - autoclose popup

                $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                // error, alert
                alert(thrownError);
            }
        });
    } );
} );