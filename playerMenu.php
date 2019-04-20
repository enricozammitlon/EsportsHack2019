<?php
echo '
<button id="create" onClick = "findEvents()">Find Event</button>
<button id="organiser" onClick = "findPlayer()">Find Organiser</button>
<button id="personalPlay" onClick = "myTickets2()">My Tickets</button>'
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
 
function myTickets2(){
	var request = $.ajax({
		url: 'getTickets.php',
		type: 'post',
		dataType: 'html',
		data: { 
        "type": "Player",
    	}
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