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
      'completed' => 8, // count($completedCards),
      'fastHireCompanies' => 5,
      'oftenHiredCompanies' => [$sber1, $yandex1, $vk1],
      'completedMonths' => $completedMonths,
      'completedYears' => $completedYears
    ],
    'message' => 'OK'
  ];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
