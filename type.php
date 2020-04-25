<?php
  require("inc/connectdb.php");
  include_once("inc/navbar.php");
  $type_name = (isset($_GET['name']) ? $_GET['name'] : 0);
  $s = $db->prepare("SELECT * FROM type_strength WHERE type_name = ?");
  $s->execute([$type_name]);
  $w = $db->prepare("SELECT * FROM type_weakness WHERE type_name = ?");
  $w->execute([$type_name]);
  $type_strength = $s->fetch();
  $type_weakness = $w->fetch();
  echo "<h1>" . $type_name . "</h1>\n";
  echo "<h3>Strength: >". $type_strength['type_strength']."</h3>\n";
  echo "<h3>Weakness: >".$type_weakness['type_weakness']."</h3>\n";
?>
