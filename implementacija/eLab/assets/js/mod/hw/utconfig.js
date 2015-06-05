$(document).ready( function () {

	// Autor: Miloš Pivić

	$('#hw').DataTable( {
		"columnDefs": [ {
            "orderable": false,
            "targets": -1,
            "data": null,
            "defaultContent": "<button id='remove_lab'>D</button>"
	    } ],
	    "aoColumns": [
	    	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": null },
        	{ "sWidth": "15%"}
        ],
		"language": {
			"emptyTable":     "Ne postoje uredjaji u sistemu",
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

	} );

} ); 