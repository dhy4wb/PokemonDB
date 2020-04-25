<?php
require("inc/connectdb.php");
include_once("inc/navbar.php");
$result = $db->query("SELECT * FROM Pokemon");
if(!$result){
  die("Execute query error, because: ". print_r($db->errorInfo(),true) );
}
echo '
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Pokemon name</th>
        <th scope="col">Type</th>
        <th scope="col">Ability 1</th>
        <th scope="col">Ability 2</th>
        <th scope="col">Ability 3</th>
      </tr>
    </thead>
    <tbody>';

while($row = $result->fetch()) {

  $stmt = $db->prepare('SELECT * FROM has NATURAL JOIN ability WHERE pid = ?');
  $stmt->execute([$row['pid']]);
  $t = $db->prepare('SELECT * FROM is_type WHERE pid = ?');
  $t->execute([$row['pid']]);
  $type = $t->fetch();
  $ability = array();
  while($a = $stmt->fetch()){
    array_push($ability, $a);
  }
  echo '
      <tr>
        <th scope="row">',$row['pid'],'</th>
        <td> ',$row['name'],' </td>
        <td>', '<a href="type/name='.$type['type_name'].'"">'.$type['type_name'].'</a>','</td>
        <td>', '<a href="ability/id='.$ability[0]['aid'].'"">'.$ability[0]['name'].'</a>','</td>
        <td>', '<a href="ability/id='.$ability[1]['aid'].'"">'.$ability[1]['name'].'</a>','</td>
        <td>', '<a href="ability/id='.$ability[2]['aid'].'"">'.$ability[2]['name'].'</a>','</td>

      </tr>
      ';
}
echo'
    </tbody>
  </table>
    ';
?>

<html>

    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

	</head>
	<body>
		<p>index page is here boi</p>
	</body>
</html>
