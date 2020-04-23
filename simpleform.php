<?php
include_once("inc/navbar.php")
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP example</title>
</head>

<body>
  <form action="simpleform.php" method="post">
    <input type="text" name="yourname" /> <br/>
    <input type="submit" value="Submit" />
  </form>
  
<?php
$str = "Hello world"; 
if (isset($_POST['yourname']))
   $str = "You've entered ". $_POST['yourname'];
echo $str;  
?>

</body>
</html>   
