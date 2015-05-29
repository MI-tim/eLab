$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#users').DataTable();

    $('#users tbody').on( 'click', '#reset_pass', function () {
        var d = table.row( $(this).parents('tr') ).data();
        console.log(d[2]);

        $.ajax({
            type: "POST",
            url: "http://localhost:8000/ci/index.php/admin/reset_pass",
            data: "email=" + d[2],
            success: function(data){
                 alert("Uspešno ste resetovali šifru korisnika.");
                 $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                alert(thrownError);
            }
        });
    } );

} );