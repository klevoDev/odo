<?php
  include_once 'data.php';

  // include_once 'db-utils.php';

  // $cols = ['name', 'sub', 'logo', 'logoAlt'];
  // $items = getDataByLeftJoin('odo_cards', 'odo_companies', 'companyId', 'id', $cols);

  // $completedCards = array_filter($items, function ($c) { return $c['status'] === 'completed'; });

  $completedMonths = [
    [ 'name' => 'Июль', 'monthIso' => '2022-07', 'link' => '#' ],
    [ 'name' => 'Август', 'monthIso' => '2022-08', 'link' => '#' ],
    [ 'name' => 'Сентябрь', 'monthIso' => '2022-09', 'link' => '#' ]
    // [ 'name' => 'Октябрь', 'monthIso' => '2022-10', 'link' => '#' ]
  ];

  $completedYears = [
    [ 'name' => '2022', 'link' => '#' ]
  ];

  $result = [
    'success' => true,
    'data' => [
      'completed' => 2, // count($completedCards),
      'fastHireCompanies' => 2,
      'oftenHiredCompanies' => [$sber1, $yandex1, $vk1],
      'completedMonths' => $completedMonths,
      'completedYears' => $completedYears
    ],
    'message' => 'OK'
  ];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
?>
