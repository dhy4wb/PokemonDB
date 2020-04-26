<?php
	//session_start();
	require("inc/navbar.php");
	require("inc/connectdb.php");
	require("inc/database_functions.php");
	$username = "ERROR";
	$already_friends = False;
	if (isset($_GET['username'])) {
		if (isset($_SESSION['username'])) {
			$already_friends = check_friend($_GET['username'], $_SESSION['username']);
		}
		$username = $_GET["username"];
	}
	//$username = (isset($_GET['username'])) ? $_GET['username'] : $_SESSION['username'];
	$userinfo = get_users($username);
	$email = $userinfo[0]["email"];
  $bio = $userinfo[0]["biography"];
?>
<html>
	<head>
		<title><?php echo $username?>'s Profile </title>
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
		<h1><?php echo $username?>'s Profile</h1>

		<div class="grid-container">

			<div class="item2">
				<h1><?php echo $username?></h2>
				<p><?php echo $email?></p>
				<?php
				if ($already_friends) {	
					echo '<button onclick="removeFriend()" class="btn btn-danger">Remove Friend</button>';
				}
				else {	
					echo '<button onclick="friendFunction()" class="btn btn-dark">Add Friend</button>';
				}
				?>
				<script>
					function friendFunction() {
						location.replace("https://cs4750pokemon.uk.r.appspot.com/add_friend?fusername=".concat(<?php echo"'". $username ."'"?>));
						//add_friends($_SESSION["username"], $username);
					}
					function removeFriend() {
						if (confirm("Are you sure you want to remove this friend?")) {
						location.replace("https://cs4750pokemon.uk.r.appspot.com/remove_friend?fusername=".concat(<?php echo"'". $username ."'"?>));
						}
					}
				</script>
			</div>
			<div class="item3">
				<h1>About Me</h1>
				<?php echo $bio?>
			</div>
			<div class="item5">
				<h1>Favorite Pokemon</h1>
        <?php
          $pokemons = get_pokemons($username);
          foreach($pokemons as $pokemon){
            echo $pokemon['name']."</br>";
          }
        ?>
			</div>
			<div class="item4">
				<h1>Friends</h1>
				<?php
					$friends = get_friends($username);
					foreach($friends as $friend){
						echo $friend[0]."</br>";
					}
				?>
			</div>
		</div>

	</body>
</html>
