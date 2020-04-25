<?php
	//echo "required!";
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
		/*
		if(count($results) == 0){
			//no username and password exists
			return False;
		}
		else {
			return True;
		}
		*/
		return $results;
	}

	function get_users($username) {
		global $db;
		$query = "SELECT * FROM user WHERE username = :username";
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $username);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	}

	function create_user($username, $email, $password) {
		global $db;
		$query = "INSERT INTO user VALUES (:username, :password, :email, NULL)";
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $username);
		$statement->bindValue(":email", $email);
		$statement->bindValue(":password", $password);
		$success = $statement->execute();
		$statement->closeCursor();
		return $success;
	}

	function update_bio($username, $new_bio) {
		global $db;
		$query = "UPDATE user SET biography = :bio WHERE username = :username";
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $username);
		$statement->bindValue(":bio", $new_bio);
		$statement->execute();
		$statement->closeCursor();
	}
?>
