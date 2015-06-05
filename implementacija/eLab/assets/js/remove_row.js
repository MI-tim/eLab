$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#users').DataTable();

    $('#users tbody').on( 'click', '#remove_user', function () {
        var d = table.row( $(this).parents('tr') ).data();
        //console.log(data[2]);

        var row = $(this).closest('tr'); 
        var nRow = row[0];
        $('#users').dataTable().fnDeleteRow(nRow);

        $.ajax({
            type: "POST",
            url: "http://localhost/eLab/index.php/admin/remove_row",
            data: "email=" + d[2],
            success: function(data){
                 alert("Uspešno ste obrisali korisnika.");
                 $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                alert(thrownError);
            }
        });
    } );

} );