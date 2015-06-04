$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#labs').DataTable();

    $('#labs tbody').on( 'click', '#remove_lab', function () {
        var d = table.row( $(this).parents('tr') ).data();

        var row = $(this).closest('tr'); 
        var nRow = row[0];

        var base_url = window.location.origin;
        base_url = base_url + "/ci/index.php/labs/remove_row";

        swal({
            title: "Da li ste sigurni?",
            text: "Nećete biti u mogućnosti da vratite podatke o laboratorijskoj sali.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#A50000",
            confirmButtonText: "Da",
            cancelButtonText: "Ne",
            closeOnConfirm: false,
            closeOnCancel: false
        },

        function(isConfirm){
            if (isConfirm) {
                $('#labs').dataTable().fnDeleteRow(nRow);

                $.ajax({
                    type: "POST",
                    url: base_url, // "http://localhost:8000/ci/index.php/labs/remove_row",
                    data: "mark=" + d[0],
                    success: function(data){
                        $('.ajax').removeClass('ajax');
                        if (data == "success") {
                            swal("Izbrisan!", "Laboratorijska sala je uspešno izbrisana", "success");
                        };
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        swal({
                          title: "Greška!",
                          text: "Došlo je do greške prilikom komunikacije\r\n" + thrownError,
                          type: "error",
                          confirmButtonText: "OK",
                        });
                    }
                });
            }
            else {
                swal("Nije izbrisana!", "Sala je sigurana, za sada :)", "error");
            }
          });
    });
});