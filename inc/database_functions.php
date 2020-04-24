<?php
	echo "required!";
	function verify_user($username, $password){
		global $db;
	  //$pass_hash = md5($password)
		$query = "SELECT * FROM user WHERE password = :password and username = :username";
		//echo $username . "</br>";
		//echo $password . "</br>";
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $username);
		$statement->bindValue(":password", $password);
		$statement->execute();
		$results = $statement->fetchAll(); 
		$statement->closeCursor();
		
		if(count($results) == 0){
			//no username and password exists
			return False;
		}
		else {
			return True;
		}
	}
?>
