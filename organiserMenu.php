<?php
echo '
<li><a href="#" id="create">Create Event</a></li>
<li><a href="#" id="personal">My Events</a></li>'
?>

<script>
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