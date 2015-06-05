$(document).ready(function() {

    // Autor: Miloš Pivić

    $("#add_row_btn").click(function(event) {
        event.preventDefault();
        var proizvodjac = $("input#proizvodjac").val();
        var model = $("input#model").val();
        var oznaka = $("input#oznaka").val();
        var ispravnost = $("input#ispravnost").val();
        var testiran = $("input#testiran").val();
        var rashodovan = $("input#rashodovan").val();

        $('#hw').DataTable().row.add( [ proizvodjac, model, oznaka, ispravnost, testiran, rashodovan ] ).draw();

        $.ajax({
            type: "POST",
            url: "http://localhost/eLab/index.php/mod/add_row",
            data: {proizvodjac: proizvodjac, model: model, oznaka: oznaka, ispravnost: ispravnost, testiran: testiran, rashodovan:rashodovan},
            success: function(data) {
                alert("Uspešno ste dodali uredjaj.");
                
                // TODO - autoclose popup

                $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                // error, alert
                alert(thrownError);
            }
        });
    } );
} );