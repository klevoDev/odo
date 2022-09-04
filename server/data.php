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
      'id' => 1,
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
      'id' => 2,
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
      'id' => 3,
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
      'id' => 4,
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
      'id' => 5,
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

  $articles = [
    [
      'id' => 1,
      'name' => '1. Заголовок длинный в 2 строки',
      'description' => 'Подзаголовок Подзаголовок Подзаголовок Подзаголовок Подзаголовок длинный описание в 3 строки',
      'tags' => ['#ключевик', '#ключевик', '#ключевик', '#ключевик'],
      'image' => './img/pic.jpg',
      'imageAlt' => 'Here is the actual description of the picture.'
    ],
    [
      'id' => 2,
      'name' => '2. Заголовок длинный в 2 строки',
      'description' => 'Подзаголовок Подзаголовок Подзаголовок Подзаголовок Подзаголовок длинный описание в 3 строки',
      'tags' => ['#ключевик', '#ключевик', '#ключевик', '#ключевик'],
      'image' => './img/pic.jpg',
      'imageAlt' => 'Here is the actual description of the picture.'
    ],
    [
      'id' => 3,
      'name' => '3. Заголовок длинный в 2 строки',
      'description' => 'Подзаголовок Подзаголовок Подзаголовок Подзаголовок Подзаголовок длинный описание в 3 строки',
      'tags' => ['#ключевик', '#ключевик', '#ключевик', '#ключевик'],
      'image' => './img/pic.jpg',
      'imageAlt' => 'Here is the actual description of the picture.'
    ]
  ]
?>
