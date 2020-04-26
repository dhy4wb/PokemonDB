<?php
	session_start();
	require("inc/connectdb.php");
	require("inc/database_functions.php");
	if (isset($_SESSION["username"])) {
		if (isset($_GET["fusername"])) {
			remove_friend($_SESSION["username"], $_GET["fusername"]);
		}
		//back to the friend page
		header("Location: https://cs4750pokemon.uk.r.appspot.com/friend?username=".$_GET["fusername"]);
	}
	else {
		header("Location: https://cs4750pokemon.uk.r.appspot.com/");
	}
?>
