$(document).ready(function() {

	// Autor: Miloš Pivić
	
	var table = $('#users').DataTable();
 
	$('#users tbody').on( 'click', 'td', function () {
    	var cell = table.cell( this );
    	cell.data().draw();
    	// note - call draw() to update the table's draw state with the new data
} );

} );