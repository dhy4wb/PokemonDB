<?php
	require("inc/connectdb.php");
	require("inc/database_functions.php");
?>
<?php
	//echo md5("password");
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		//echo $_POST["username"] . "</br>";
		//echo md5($_POST["password"])."</br>";
		$results = verify_user($_POST["username"], md5($_POST["password"]));
		if (count($results) > 0) {
			//echo "this account exists!";
			session_start();
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["email"] = $results[0]["email"];
			$_SESSION["biography"] = $results[0]["biography"];
			//echo $_SESSION["username"];
			header("Location: https://cs4750pokemon.uk.r.appspot.com/profile");
			exit;
		}
		else {
			echo '<script language="javascript">';
			echo 'alert("Username and/or password invalid")';
			echo '</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PokemonFinder Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<h1>Login</h1>
	<form action="" method="post">
		<h2>Username</h2>
		<input type="text" name="username" placeholder="Username"></br>
		<h2>Password</h2>
		<input type="password" name="password" placeholder="Password"></br>
		<a href="/signup">Don't have an account?</a></br>
		<button type="submit" name="login"> Login </button>
	</form>
</body>
</html>



