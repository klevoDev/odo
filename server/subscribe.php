<?php
  include_once 'config.php';

  if ($_POST['email'] && $_POST['topic']) {
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if($mysqli->connect_errno) {
      printf("Connect failed: %s<br />", $mysqli->connect_error);
      exit();
    }

    $email = trim($_POST['email']);
    $res = $mysqli->query('SELECT COUNT(*) FROM `' . $tableName . '` WHERE `email` = \'' . $email . '\'');
    $row = $res->fetch_row();
    if ($row[0] == 0) {
      $insQuery = "INSERT INTO `" . $tableName . "` (`email`, `status`, `topics`)" .
        " VALUES ('" . $_POST['email'] . "', 'active', '" . implode(';', $_POST['topic']) . "')";

      if ($mysqli->query($insQuery)) {
        $id = $mysqli->insert_id;
        $res = $mysqli->query('SELECT * FROM `' . $tableName . '` WHERE `id` = ' . $id);
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
    } else {
      $result = [
        'success' => false,
        'data' => $email,
        'message' => 'Already subscribed'
      ];
    }

    $mysqli->close();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);
  }
?>