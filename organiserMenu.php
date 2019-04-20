<?php
//<li><a href="#" id="create">Create Event</a></li>

echo '
<button id="create" onClick = "callCreate()">Create Event</button>
<button id="personal" onClick = "callPersonal()">My Events</button>'
?>

<script>

function callCreate(){
	var request = $.ajax({
		url: 'createEvent.php',
		type: 'get',
		dataType: 'html'
	});

	request.done( function ( data ) {
		$('#main-window').html( data );
	});

	request.fail( function ( jqXHR, textStatus) {
		console.log( 'Sorry: ' + textStatus );
	});

}
 

$(document).ready(function() {
    $("#create a").click(function() {
    	$('#main-window').html("");
    	var request = $.ajax({
	   		url: 'createEvent.php',
	   		type: 'get'
	 	});
	 
		request.done( function ( data ) {
	 		$('#main-window').html( data );
	 	});
	 
		request.fail( function ( jqXHR, textStatus) {
	 		console.log( 'Sorry: ' + textStatus );
	 	});
	});

	$("#personal a").click(function() {
	    	$('#main-window').html("");
	    	var request = $.ajax({
		   		url: 'createEvent.php',
		   		type: 'get'
		 	});
		 
			request.done( function ( data ) {
		 		$('#main-window').html( data );
		 	});
		 
			request.fail( function ( jqXHR, textStatus) {
		 		console.log( 'Sorry: ' + textStatus );
		 	});
		});


});
</script>