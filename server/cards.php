<?php
  include_once 'db-utils.php';

  $items = getDataByLeftJoin('odo_cards', 'odo_companies', 'companyId', 'id', ['name', 'sub', 'logo', 'logoAlt']);
  foreach ($items as &$item) {
    $item['stack'] = explode(';', $item['stack']);
    $item['company'] = [
      'name' => $item['t2.name'],
      'sub' => $item['t2.sub'],
      'logo' => $item['t2.logo'],
      'logoAlt' => $item['t2.logoAlt']
    ];
    unset($item['t2.name']);
    unset($item['t2.sub']);
    unset($item['t2.logo']);
    unset($item['t2.logoAlt']);
  }

  $result = [
    'success' => true,
    'data' => $items,
    'message' => 'OK'
  ];

  // header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
