    <?php
      // session_start();
      require("inc/connectdb.php");
      require("inc/database_functions.php");
      require("inc/navbar.php");
      $username = $_POST['username'];
      $pid = $_POST['pid'];
      // error_log(print_r("---------------------------------------------------", TRUE));

      // error_log(print_r($username, TRUE));
      // error_log(print_r($pid, TRUE));

      $sql = "INSERT INTO likes (username, pid) VALUES (?, ?)";
      $stmt= $db->prepare($sql);
      $stmt->execute([$username, $pid]);

    ?>
