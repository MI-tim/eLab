$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#hw').DataTable();

    $('#hw tbody').on( 'click', '#remove_lab', function () {
        var d = table.row( $(this).parents('tr') ).data();

        var row = $(this).closest('tr'); 
        var nRow = row[0];
        $('#hw').dataTable().fnDeleteRow(nRow);

        $.ajax({
            type: "POST",
            url: "http://localhost/eLab/index.php/mod/remove_row",
            data: "mark=" + d[0],
            success: function(data){
                 alert("Uspešno ste obrisali uredjaj.");
                 $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                alert(thrownError);
            }
        });
    } );

} );