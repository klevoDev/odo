<?php
  include_once 'config.php';

  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if($mysqli->connect_errno) {
    printf("Connect failed: %s<br />", $mysqli->connect_error);
    exit();
  }

  echo '<h1>Подписчики</h1>';
  $res = $mysqli->query('SELECT * FROM `' . $tableName);
  echo '<table border="1">';
  while ($row = $res->fetch_row()) {
    echo '<tr>' . '<td>' . $row[0] . '</td><td>' . $row[1] . '</td><td>' . $row[2] .
      '</td><td>' . $row[3] . '</td></tr>'; 
  }
  echo '</table>';

  $mysqli->close();
  // header('Content-Type: application/json; charset=utf-8');
  // echo json_encode($result);
?>