$(document).ready(function() {

    // Autor: Miloš Pivić

    $("#add_row_btn").click(function(event) {
        event.preventDefault();
        var name = $("input#name").val();
        var surname = $("input#surname").val();
        var email = $("input#email").val();
        var privilege = $('#privilege option:selected').val();

        $('#users').DataTable().row.add( [ name, surname, email, privilege ] ).draw();

        $.ajax({
            type: "POST",
            url: "http://localhost/eLab/index.php/admin/add_row",
            data: {name: name, surname: surname, email: email, privilege: privilege},
            success: function(data) {
                alert("Uspešno ste dodali korisnika.");
                
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