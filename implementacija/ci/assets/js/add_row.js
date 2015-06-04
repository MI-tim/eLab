$(document).ready(function() {

    // Autor: Miloš Pivić

    var table = $('#autb').DataTable();

    $('#tbau').click( function() {
        var name = table.$('#name').serialize();
        var surname = table.$('#surname').serialize();
        var email = table.$('#email').serialize();
        var privilege = table.$('#privilege').serialize();

        if ( (!name.substring(5,120)) || ((!surname.substring(8,120)) || (!email.substring(6,120))) ) { 
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
            base_url = base_url + "/ci/index.php/admin/add_row";

            $.ajax({
                type: "POST",
                url: base_url,
                data: name + '&' + surname + '&' + email + '&' + privilege,
                success: function(data){ 
                    $('.ajax').removeClass('ajax');
                    if (data == "success") {
                        swal({
                            title: "",
                            text: "Uspešno ste dodali korisnika sistema!",
                            type: "success",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                window.location.reload(true);
                                //.draw()
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
                    if (data == "number") {
                        swal({
                            title: "",
                            text: "Ime/Prezime ne sadrži slova!",
                            type: "error",
                            confirmButtonText: "OK"
                            },
                            function(isConfirm) {
                                window.location.reload(true); 
                            }
                        );     
                    };
                    if (data == "email") {
                        swal({
                            title: "",
                            text: "Uneta adresa elektronske pošte ne odgovara fakultetskom formatu ( @[student.]etf.rs )!",
                            type: "error",
                            confirmButtonText: "OK"
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