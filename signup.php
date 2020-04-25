<?php
	session_start();
	require("inc/connectdb.php");
	require("inc/database_functions.php");
	
	if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
		$users = get_users($_POST["username"]);
		if (trim($_POST["username"]) == "" || trim($_POST["email"]) == "" || trim($_POST["password"]) == "") {
			echo '<script language="javascript">';
			echo 'alert("Please fill out all fields")';
			echo '</script>';

		}
		else if(count($users) > 0){
			//username already exists
			echo '<script language="javascript">';
			echo 'alert("Username alredy exists. Please try again")';
			echo '</script>';
		}
		else {
			//create new account
			$succesful = create_user($_POST["username"], $_POST["email"], md5($_POST["password"]));
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["biography"] = NULL;
			header("Location: https://cs4750pokemon.uk.r.appspot.com/profile");
			//echo '<script language="javascript">';
			//echo 'alert("Account creation failed. Please double check email format")';
			//echo '</script>';
		}
	}
	else{
		//echo '<script language="javascript">';
		//echo 'alert("Please fill out all fields")';
		//echo '</script>';
	}
//check that username does not exist first
//create account and go to profile page if the account was successful
?>

<html>
	<head>
		<title>PokemonFinder Signup</title>
	</head>
	<body>
		<h1>Sign Up</h1>
		<form action="" method="post">
			<h2>Create Username</h2>
			<input type="text" name="username" placeholder="Insert Username Here">
			<h2>Email</h2>
			<input type="text" name="email" placeholder="Insert Email Here">
			<h2>Create Password</h2>
			<input type="password" name="password" placeholder="Insert Password Here"></br>
			<button type="submit" name="create_user"> Submit </button>
		</form>
	</body>

</html>
