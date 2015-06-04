$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#add_lab').DataTable();

    $('#tbal').click( function() {
        var mark = table.$('#mark').serialize();
        var location = table.$('#location').serialize();
        var numwp = table.$('#numwp').serialize();

        if ( (!mark.substring(5,120)) || (!numwp.substring(6,120)) ) { 
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
            base_url = base_url + "/ci/index.php/labs/add_row";

            $.ajax({
                type: "POST",
                url: base_url,
                data: mark + '&' + location + '&' + numwp,
                success: function(data){ 
                    $('.ajax').removeClass('ajax');
                    if (data == "success") {
                        swal({
                            title: "",
                            text: "Uspešno ste dodali laboratorijsku salu!",
                            type: "success",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                window.location.reload(true);
                                //$('#labs').DataTable().row.add( [ mark.substring(5,120), location.substring(9,120), numwp.substring(6,120) ] ).draw();
                            }
                        );     
                    };
                    if (data == "empty") {
                        swal({
                            title: "",
                            text: "Tražena polja ne smeju biti prazna!",
                            type: "error",
                            confirmButtonText: "OK"
                            }
                        );
                    };
                    if (data == "format") {
                        swal({
                            title: "",
                            text: "Uneti podaci ne odgovaraju traženom formatu!",
                            type: "error",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                window.location.reload(true); 
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