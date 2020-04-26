<?php
	session_start();
	include_once("inc/navbar.php");
	require("inc/connectdb.php");
	require("inc/database_functions.php");
?>
<h1>Suggested Results for <?php echo $_GET["search_term"]?></h1>
<?php
	if(isset($_GET["search_term"])) {
		echo "<h2> Pokemon </h2>";
		echo "<table class = 'table'>";
		$results = get_search_pokemon($_GET["search_term"]);		
		foreach($results as $pokemon) {
			echo "<tr>";
			echo "<th>". $pokemon["name"] . "</th>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<h2> Users </h2>";
		$friend_results = search_users($_GET["search_term"]);
		echo "<table class = 'table'>";
		foreach($friend_results as $friend) {
			echo "<tr>";
			if(isset($_SESSION["username"])){
				if($friend["username"] == $_SESSION["username"]) {
					echo "<th><a href='/profile'>" . $friend["username"] . "</a></th>";
				}
				else {
					echo "<th><a href='/friend?username=". $friend["username"] ."'>" . $friend["username"] . "</a></th>";
				}
			}
			else {
				echo "<th><a href='/friend?username=". $friend["username"] ."'>" . $friend["username"] . "</a></th>";

			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>
