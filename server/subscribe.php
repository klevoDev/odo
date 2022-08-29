<?php
if ($_POST['email']) {
  $dbhost = '';
  $dbuser = '';
  $dbpass = '';
  $dbname = '';
  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if($mysqli->connect_errno) {
    printf("Connect failed: %s<br />", $mysqli->connect_error);
    exit();
  }

  $query = "INSERT INTO `subscriptions` (`email`, `date`) VALUES ('" . $_POST['email'] . "', '" . date('Y-m-d H:i:s') . "')";
  if ($mysqli->query($query)) {
    $result = [
      'success' => true,
      'data' => [],
      'message' => 'OK'
    ];
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