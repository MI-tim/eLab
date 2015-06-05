$(document).ready( function () {

	// Autor: Miloš Pivić
	
	$('#users').DataTable( { // serbian -- do tokija
		"columnDefs": [ {
            "orderable": false,
            "targets": -1,
            "data": null,
            "defaultContent": "<button id='remove_user'>D</button> <button id='reset_pass'>R</button>"
	    } ],
	    "aoColumns": [
	    	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": "15%"}
        ],
		"language": {
			"emptyTable":     "Ne postoje korisnici sistema",
			"info":           "_START_ - _END_ od ukupno _TOTAL_ unosa",
		    "infoEmpty":      "",
		    "infoFiltered":   "(pretraženo _MAX_ unosa)",
		    "infoPostFix":    "",
		    "thousands":      ",",
		    "lengthMenu":     "Prikaži _MENU_ unosa",
		    "loadingRecords": "Učitavanje...",
		    "processing":     "Obrada...",
		    "search":         "Pretraži:",
		    "zeroRecords":    "Nije pronađen unos koji odgovara zadatom kriterijumu",
		    "paginate": {
		    	"first":      "Prva",
		        "last":       "Poslednja",
		        "next":       "Naredna",
		        "previous":   "Prethodna"
		    },
		    "aria": {
		        "sortAscending":  ": sortiraj kolonu rastuće",
		        "sortDescending": ": sortiraj kolonu opadajuće"
		    }
		},
		
		"createdRow": function ( row, data, index ) {
			if ( data[3] == "Korisnik" ) {
				$('td', row).eq(3).addClass('korisnik');
			}
			else if ( data[3] == "Moderator" ) {
				$('td', row).eq(3).addClass('moderator');
			}
			else if ( data[3] == "Administrator" ) {
				$('td', row).eq(3).addClass('admin');
			}
		}

	} );

} ); 