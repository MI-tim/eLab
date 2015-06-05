$(document).ready(function() {

    // Autor: Miloš Pivić

    $("#reset_pass_btn").click(function(event) {
        event.preventDefault();
        var old_pass = $("input#old_pass").val();
        var new_pass = $("input#new_pass").val();
        var rn_pass = $("input#rn_pass").val();

        $.ajax({
            type: "POST",
            url: "http://localhost/eLab/index.php/profile/reset_pass",
            data: {old_pass: old_pass, new_pass: new_pass, rn_pass: rn_pass},
            success: function(data) {
                // alert on controller
                $('.ajax').removeClass('ajax');
            },
            error:function (xhr, ajaxOptions, thrownError){
                // error, alert
                alert(thrownError);
            }
        });
    } );
} );