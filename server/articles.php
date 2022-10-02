<?php
  include_once 'db-utils.php';

  $items = getData('odo_articles');
  foreach ($items as &$item) {
    $item['tags'] = explode(';', $item['tags']);
  }

  $result = [
    'success' => true,
    'data' => $items,
    'message' => 'OK'
  ];

  // header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
