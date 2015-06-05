$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#labs').DataTable();

    $('#labs tbody').on( 'click', '#remove_lab', function () {
        var d = table.row( $(this).parents('tr') ).data();

        var row = $(this).closest('tr'); 
        var nRow = row[0];
        $('#labs').dataTable().fnDeleteRow(nRow);

        $.ajax({
            type: "POST",
            url: "http://localhost/eLab/index.php/labs/remove_row",
            data: "mark=" + d[0],
            success: function(data){
                 alert("Uspešno ste obrisali salu.");
                 $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                alert(thrownError);
            }
        });
    } );

} );