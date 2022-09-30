<?php
  include_once 'db-utils.php';

  $cols = ['name', 'sub', 'logo', 'logoEnd', 'logoAlt'];
  $items = getDataByLeftJoin('odo_cards', 'odo_companies', 'companyId', 'id', $cols);
  foreach ($items as &$item) {
    $item['stack'] = explode(';', $item['stack']);
    $item['company'] = [];
    foreach ($cols as $c) {
      $item['company'][$c] = $item['t2.' . $c];
      unset($item['t2.' . $c]);
    }
  }

  $result = [
    'success' => true,
    'data' => $items,
    'message' => 'OK'
  ];

  // header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
