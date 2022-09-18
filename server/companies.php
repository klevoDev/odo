<?php
  include_once 'db-utils.php';

  $result = [
    'success' => true,
    'data' => getData('odo_companies'),
    'message' => 'OK'
  ];

  // header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
