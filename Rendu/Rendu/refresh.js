function load_php () {
	$('#top').load( "/html_top.php");
	setTimeout(function() {$('#top').empty();}, 29900);
}

//setInterval(function () {load_php ()}, 1000);
