<?php
  include_once 'data.php';

  $result = [
    'success' => true,
    'data' => $cards,
    'message' => 'OK'
  ];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
