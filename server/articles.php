<?php
  include_once 'data.php';

  $result = [
    'success' => true,
    'data' => $articles,
    'message' => 'OK'
  ];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
