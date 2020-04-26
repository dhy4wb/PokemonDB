<?php
  session_start();

  require("inc/connectdb.php");
  include_once("inc/navbar.php");
  $columns = array('name','type','pid');
  $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
  $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
  // echo 'aaaaa',$sort_order;
  $sql = 'SELECT * FROM Pokemon ORDER BY ' . $column.' '. $sort_order;
  $result = $db->query($sql);
  // $result->execute([$order]);
  $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
  $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
  $add_class = ' class="highlight"';
  if(!$result){
    die("Execute query error, because: ". print_r($db->errorInfo(),true) );
  }
  $arrow_pid = $column == 'pid' ? '-'.$up_or_down : '';
  $arrow_name = $column == 'name' ? '-'.$up_or_down : '';
  // echo $_SESSION['username'];
  echo '
      <head>
        <title>Pokemon Database</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      </head>
      <body>';
  echo '
    <table class="table">
      <thead>
        <tr>
          <th scope="col">', '<a href="?column=pid&order='.$asc_or_desc.'">'.'#<i class="fas fa-sort'.$arrow_pid.'"></i></a>'.'</th>
          <th scope="col">', '<a href="?column=name&order='.$asc_or_desc.'">'.'Pokemon Name<i class="fas fa-sort'.$arrow_name.'"></i></a>'.'</th>
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
          <th scope="row">',$row['pid'],'<a href="#" class="favorite" data-pid="' . $row['pid']. '" data-name="'.$_SESSION['username'].'">Add to favorite</a>','</th>
          <td> ',$row['name'],' </td>
          <td>', '<a href="type?name='.$type['type_name'].'"">'.$type['type_name'].'</a>','</td>
          <td>', '<a href="ability?id='.$ability[0]['aid'].'">'.$ability[0]['name'].'</a>','</td>
          <td>', '<a href="ability?id='.$ability[1]['aid'].'">'.$ability[1]['name'].'</a>','</td>
          <td>', '<a href="ability?id='.$ability[2]['aid'].'">'.$ability[2]['name'].'</a>','</td>

        </tr>
        ';
  }
  echo'
      </tbody>
    </table>
      ';
?>
<!DOCTYPE html>
<html>
<script>
    $(document).ready(function() {
    $('.favorite').on('click', null, function() {
    var _this = $(this);
    var id = _this.data('pid');
    var name = _this.data('name');
    $.ajax({
      type     : 'POST',
      url      : '/add_like',
      dataType : 'json',
      data     : {pid:id, username:name},
      complete : function(data) {
           if(_this.siblings('.favorite'))
           {
             _this.html('added!');
           }
           else
           {
             _this.html('failed');
           }
        }
        });
    });
});
</script>
</html>
