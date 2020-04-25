<?php
	session_start();
	require("inc/connectdb.php");
	require("inc/database_functions.php");
	session_unset();
	session_destroy();
	header("Location: https://cs4750pokemon.uk.r.appspot.com/");

?>
