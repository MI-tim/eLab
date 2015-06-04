$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#users').DataTable();

    $('#users tbody').on( 'click', '#remove_user', function () {
        var d = table.row( $(this).parents('tr') ).data();
        
        var row = $(this).closest('tr'); 
        var nRow = row[0];

        var base_url = window.location.origin;
        base_url = base_url + "/ci/index.php/admin/remove_row";

        swal({
          title: "Da li ste sigurni?",
          text: "Nećete biti u mogućnosti da vratite podatke o korisniku.",
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
            // delete user
            $('#users').dataTable().fnDeleteRow(nRow);

            $.ajax({
                type: "POST",
                url: base_url, // "http://localhost:8000/ci/index.php/admin/remove_row",
                data: "email=" + d[2],
                success: function(data){
                    $('.ajax').removeClass('ajax');
                    if (data == "success") {
                      swal("Izbrisan!", "Korisnik je uspešno izbrisan", "success");
                    };
                },
                error:function (xhr, ajaxOptions, thrownError){
                    // error, alert user
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
                swal("Nije izbrisan!", "Korisnik je siguran, za sada :)", "error");
          }
        });

    } );

} );