<?php
// connecting to GCP cloud SQL instance

//$username = 'root';
//$password = 'admin123';

//$dbname = 'pokemon_database';

//if PHP is on GCP standard App Engine, use instance name to connect
//$host = 'cs4750pokemon:us-east4:pokemon-db2';

// if PHP is hosted somewhere else (non-GCP), use public IP address to connect
// $host = "public-IP-address-to-cloud-instance";

$dsn = getenv('MYSQL_DSN');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$db = "";

/** connect to the database **/
//echo "in the connection";

try 
{
   $db = new PDO($dsn, $username, $password);   
   //echo "<p>You are connected to the database</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // Call a method from any object, 
   // use the object's name followed by -> and then method's name
   // All exception objects provide a getMessage() method that returns the error message 
   $error_message = $e->getMessage();        
   //echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   //echo "<p>Error message: $error_message </p>";
}







?>
