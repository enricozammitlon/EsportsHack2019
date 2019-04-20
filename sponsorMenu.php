<?php
echo '
<button id="create" onClick = "findEvents()">Find Event</button>
<button id="organiser" onClick = "findOrganiser()">Find Organiser</button>
<button id="personal" onClick = "mySponsorships()">My Sponsorships</button>'
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
 
function mySponsorships(){
	var request = $.ajax({
		url: 'getSponsorships.php',
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