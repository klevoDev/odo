<?php
  $companies = [
    [
      'id' => 'Yandex1',
      'name' => 'Яндекс',
      'sub' => 'Маркет, B2B',
      'logo' => './img/yandex.png',
      'logoAlt' => 'Company logo providing one day offer.'
    ]
  ];

  $yandex1 = array_filter($companies, function ($c) { return $c['id'] === 'Yandex1'; })[0];
  $cards = [
    [
      'name' => 'Frontend Mobile 1',
      'company' => $yandex1,
      'stack' => ['HTML', 'CSS', 'JS', 'React'],
      'status' => 'active',
      'start' => '25 августа с 10:00',
      'finish' => '27 августа до 23:00',
      'finish2' => 'Заявки принимаются до 18.08',
      'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    ],
    [
      'name' => 'Frontend Mobile 2',
      'company' => $yandex1,
      'stack' => ['HTML', 'CSS', 'JS', 'React'],
      'status' => 'active',
      'start' => '25 августа с 10:00',
      'finish' => '27 августа до 23:00',
      'finish2' => 'Заявки принимаются до 18.08',
      'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    ],
    [
      'name' => 'Frontend Mobile 3',
      'company' => $yandex1,
      'stack' => ['HTML', 'CSS', 'JS', 'React'],
      'status' => 'active',
      'start' => '25 августа с 10:00',
      'finish' => '27 августа до 23:00',
      'finish2' => 'Заявки принимаются до 18.08',
      'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    ],
    [
      'name' => 'Frontend Mobile 01',
      'company' => $yandex1,
      'stack' => ['HTML', 'CSS', 'JS', 'React'],
      'status' => 'completed',
      'start' => '25 августа с 10:00',
      'finish' => '27 августа до 23:00',
      'finish2' => 'Заявки принимаются до 18.08',
      'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    ],
    [
      'name' => 'Frontend Mobile 02',
      'company' => $yandex1,
      'stack' => ['HTML', 'CSS', 'JS', 'React'],
      'status' => 'dismissed',
      'start' => '25 августа с 10:00',
      'finish' => '27 августа до 23:00',
      'finish2' => 'Заявки принимаются до 18.08',
      'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    ]
  ];
?>
