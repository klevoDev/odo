<?php
  include_once 'config.php';
  // include_once 'data.php';

  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if($mysqli->connect_errno) {
    printf("Connect failed: %s<br />", $mysqli->connect_error);
    exit();
  }

  $cards = [];
  $tableName = 'odo_cards';
  $res = $mysqli->query('SELECT * FROM `' . $tableName . '`');
  while ($row = $res->fetch_row()) {
    $cards[] = $row;
  }

  $res->free_result();
  $mysqli->close();

  $result = [
    'success' => true,
    'data' => $cards,
    'message' => 'OK'
  ];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
