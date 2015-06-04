$(document).ready(function() {

    // Autor: Miloš Pivić

     var table = $('#c_pass').DataTable();
 
    $('#cbp').click( function() {
        var oldp = table.$('#old_p').serialize();
        var newp = table.$('#new_p').serialize();
        var rnewp = table.$('#rnew_p').serialize();

        if ( (!oldp.substring(6,120)) || ((!newp.substring(6,120)) || (!rnewp.substring(6,120))) ) { 
            swal({
                title: "",
                text: "Tražena polja ne smeju biti prazna!",
                type: "error",
                confirmButtonText: "OK"
                }
            );
        }
        else {
            var base_url = window.location.origin;
            base_url = base_url + "/ci/index.php/profile/reset_pass";

            $.ajax({
                type: "POST",
                url: base_url,
                data: oldp + '&' + newp + '&' + rnewp,
                success: function(data){ 
                    $('.ajax').removeClass('ajax');
                    if (data == "success") {
                        swal({
                            title: "",
                            text: "Uspešno ste promenili lozinku!",
                            type: "success",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                location.reload(true); 
                            }
                        );     
                    };
                    if (data == "mismatch") {
                        swal({
                            title: "",
                            text: "Nove lozinke se ne poklapaju!",
                            type: "error",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                location.reload(true); 
                            }
                        );
                    };
                    if (data == "oldmismatch") {
                        swal({
                            title: "",
                            text: "Trenutna lozinka ne odgovara unetoj!",
                            type: "error",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                location.reload(true); 
                            }
                        );
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
            return false;
        }

        
    } );



} );