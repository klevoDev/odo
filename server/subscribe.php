<?php
  include_once 'config.php';

  if ($_POST['email']) {
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if($mysqli->connect_errno) {
      printf("Connect failed: %s<br />", $mysqli->connect_error);
      exit();
    }

    // date('Y-m-d H:i:s')
    $insQuery = "INSERT INTO `subscriptions` (`email`, `status`)" .
      " VALUES ('" .$_POST['email'] . "', 'active')";

    if ($mysqli->query($insQuery)) {
      $id = $mysqli->insert_id;
      $res = $mysqli->query("SELECT * FROM `subscriptions` WHERE `id` = " . $id);
      $row = $res->fetch_row();
      $result = [
        'success' => true,
        'data' => $row,
        'message' => 'OK'
      ];
      $res->free_result();
    } else if ($mysql->errno) {
      $result = [
        'success' => false,
        'message' => $mysqli->error
      ];
    }

    $mysqli->close();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);
  }
?>