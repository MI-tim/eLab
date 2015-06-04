$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#users').DataTable();

    $('#users tbody').on( 'click', '#reset_pass', function () {
        var d = table.row( $(this).parents('tr') ).data();

        var base_url = window.location.origin;
        base_url = base_url + "/ci/index.php/admin/reset_pass";

        swal({
            title: "Da li ste sigurni?",
            text: "Nećete biti u mogućnosti da vratite staru lozinku korisnika.",
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
                $.ajax({
                    type: "POST",
                    url: base_url,
                    data: "email=" + d[2],
                    success: function(data){
                        $('.ajax').removeClass('ajax');
                        if (data == "success") {
                            swal("Šifra je resetovana!", "Korisniku je poslata nova šifra na adresu njegove elektronske pošte.", "success");
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
                swal("Šifra nije resetovana!", "Korisnik će moći da koristi eLab, bar još neko vreme :)", "error");
            }
        });

    } );

} );