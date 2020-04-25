<?php 
	session_start();
	require("inc/navbar.php");
	require("inc/connectdb.php");
	require("inc/database_functions.php");
	if(isset($_POST["bio"])){
		update_bio($_SESSION["username"] ,$_POST["bio"]);
		$_SESSION["biography"] = $_POST["bio"];
	}
?>
<html>
	<head>
		<title> <?php echo $_SESSION["username"]; ?>'s Profile </title>
	<style>
		.item1 { grid-area: header; }
		.item2 { grid-area: menu; }
		.item3 { grid-area: main; }
		.item4 { grid-area: right; }
		.item5 { grid-area: footer; }
		
		.grid-container {
		  display: grid;
		  grid-template-areas:
		    'menu main main main right right'
		    'menu main main main right right'
		    'menu footer footer footer right right';
		  grid-gap: 10px;
			height: 100vh;
		  background-color: #2196F3;
		  padding: 10px;
		}
		
		.grid-container > div {
		  background-color: rgba(255, 255, 255, 0.8);
		  text-align: center;
		  padding: 20px 0;
		  font-size: 30px;
		}
		</style>	
	</head>
	<body>
		<h1>My Profile</h1>
		<div class="grid-container">	
			<div class="item2">
				<h1><?php echo $_SESSION["username"]?></h2>
				<p><?php echo $_SESSION["email"]?></p>
			</div>
			<div class="item3">
				<h1>About Me</h1>
				<textarea name="bio" form="bio-form"><?php echo $_SESSION["biography"] ?></textarea>
				<form action="" method="post" id="bio-form"><input type="submit" value="Save"></form>

			</div>
			<div class="item5">
				<h1>Favorite Pokemon</h1>
			</div>
			<div class="item4">
				<h1>Friends</h1>
			</div>
		</div>
		
	</body>
</html>
