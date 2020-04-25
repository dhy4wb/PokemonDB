<?php
	session_start();
	require("inc/connectdb.php");
	require("inc/database_functions.php");
	delete_user($_SESSION["username"]);
	session_unset();
	session_destroy();
	header("Location: https://cs4750pokemon.uk.r.appspot.com/");

?>
