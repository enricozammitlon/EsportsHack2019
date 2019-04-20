<?php require_once 'header.php' ?>
							<div id="main-window">

								<?php require_once 'allEvents.php' ?>
								
							</div>
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Welcome back <?php echo $_SESSION['uName']?></h2>
									</header>
									<ul id="menu-list">
									</ul>
								</nav>
						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util2.js"></script>
			<script src="assets/js/main2.js"></script>

	</body>
</html>

<script>
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

$('#query').keyup(delay(function (e) {
  var request = $.ajax({
   		url: 'search.php',
   		type: 'post',
   		data: { 
        "term": this.value,
    	}
 	});
 
	request.done( function ( data ) {
 		$('#search-results').html( data );
 	});
 
	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});
}, 500));

function updateMenu(theID){
  	var request = $.ajax({
   		url: theID+'Menu.php',
   		type: 'get',
   		dataType: 'html'
 	});
 
	request.done( function ( data ) {
 		$('#menu-list').html( data );
 	});
 
	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});
 
}
 
function buyTicket(theID){
  	var request = $.ajax({
   		url: 'buytickets.php',
   		type: 'get',
   		data: { 
        "eventID": theID
    	}
 	});
 
	request.done( function ( data ) {
 		$('#main-window').html( data );
 	});
 
	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});
 
}
</script>