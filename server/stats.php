<?php
  include_once 'data.php';

  $completedCards = array_filter($cards, function ($c) { return $c['status'] === 'completed'; });

  $completedMonths = [
    [ 'name' => 'Август', 'link' => '#' ],
    [ 'name' => 'Сентябрь', 'link' => '#' ],
    [ 'name' => 'Октябрь', 'link' => '#' ]
  ];

  $completedYears = [
    [ 'name' => '2022', 'link' => '#' ]
  ];

  $result = [
    'success' => true,
    'data' => [
      'completed' => count($completedCards),
      'fastHireCompanies' => 4,
      'oftenHiredCompanies' => array_fill(0, 3, $yandex1),
      'completedMonths' => $completedMonths,
      'completedYears' => $completedYears
    ],
    'message' => 'OK'
  ];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
