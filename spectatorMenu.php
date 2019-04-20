<?php
echo '
<button id="create" onClick = "findEvents()">Find Event</button>
<button id="personal" onClick = "findPlayer()">Find Player</button>
<button id="personal" onClick = "myTickets()">My Tickets</button>'
?>

<script>

function findEvents(){
	var request = $.ajax({
		url: 'allEvents.php',
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
 
function myTickets(){
	var request = $.ajax({
		url: 'getTickets.php',
		type: 'post',
		dataType: 'html'
	});

	request.done( function ( data ) {
		$('#main-window').html( data );
	});

	request.fail( function ( jqXHR, textStatus) {
		console.log( 'Sorry: ' + textStatus );
	});

}

function findPlayer(){
	var request = $.ajax({
		url: 'allEvents.php',
		type: 'post',
		dataType: 'html'
	});

	request.done( function ( data ) {
		$('#main-window').html( data );
	});

	request.fail( function ( jqXHR, textStatus) {
		console.log( 'Sorry: ' + textStatus );
	});

}

</script>