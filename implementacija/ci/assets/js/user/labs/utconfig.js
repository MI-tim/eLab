$(document).ready( function () {

	// Autor: Miloš Pivić

	$('#labs').DataTable( {
		"language": {
			"emptyTable":     "Ne postoje laboratorijske sale u sistemu",
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

			if ( parseInt(data[2]) == parseInt(data[3]) ) {
				$('td', row).eq(3).addClass('zeleno');
			}
			else if ( parseInt(data[2]) > parseInt(data[3]) ) {
				$('td', row).eq(3).addClass('crveno');
			}
		}

	} );

} ); 