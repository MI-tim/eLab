$(document).ready( function () {

	// Autor: Miloš Pivić
	
	$('#add_lab').DataTable( { // serbian -- do tokija
			"columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button type='submit' id='tbal' class='tbal'></button>"
	    } ],

			"bFilter": false,
			"paging":   false,
	        "ordering": false,
	        "info":     false,
		
	    "aoColumns": [
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
		}

	} );

} ); 