<?php
require("inc/connectdb.php");
include_once("inc/navbar.php");
echo "hello";
$aid = (isset($_GET['id']) ? $_GET['id'] : 0);
$stmt = $db->prepare("SELECT * FROM ability WHERE aid = ?");
$stmt->execute([$aid]);
$result = $stmt->fetch();
echo "<h1>" . $result['name'] . "</h1>\n";
echo "<h3>Generation: >". $result['generation']."</h3>\n";
echo "<h3>Effect: >".$result['effect']."</h3>\n";
?>
