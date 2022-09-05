<?php
  $companies = [
    [
      'id' => 'Sber1',
      'name' => 'Сбер',
      'sub' => '',
      'logo' => './img/sber.png',
      'logoAlt' => 'Сбер'
    ],
    [
      'id' => 'Yandex1',
      'name' => 'Яндекс',
      'sub' => 'Маркет, B2B',
      'logo' => './img/yandex.png',
      'logoAlt' => 'Яндекс'
    ],
    [
      'id' => 'Yandex2',
      'name' => 'Яндекс',
      'sub' => 'Буткемп',
      'logo' => './img/yandex.png',
      'logoAlt' => 'Яндекс'
    ],
    [
      'id' => 'VK1',
      'name' => 'VK',
      'sub' => 'VK Звонки',
      'logo' => './img/vk.png',
      'logoAlt' => 'VK Звонки'
    ],
    [
      'id' => 'Tinkoff1',
      'name' => 'Тинькофф',
      'sub' => '',
      'logo' => './img/tinkoff.png',
      'logoAlt' => 'Тинькофф'
    ],
  ];

  $sber1 = $companies[0];
  $yandex1 = $companies[1]; // array_filter($companies, function ($c) { return $c['id'] === 'Yandex1'; })[0];
  $yandex2 = $companies[2];
  $vk1 = $companies[3]; // array_filter($companies, function ($c) { return $c['id'] === 'VK1'; })[0];
  $tinkoff1 = $companies[4];

  $cards = [
    [
      'id' => 1,
      'name' => 'Java-разработчик',
      'description' => '',
      'company' => $vk1,
      'stack' => ['Java'],
      'status' => 'active',
      'start' => '10 и 11 сентября',
      'finish' => 'weekend offer',
      'finish2' => 'Заявки принимаются до 9.09.2022',
      'link' => 'https://team.vk.company/vacancy/27215/'
    ],
    [
      'id' => 2,
      'name' => 'Frontend',
      'company' => $yandex2,
      'stack' => ['Опыт от 3 лет', 'JavaScript', 'TypeScript'],
      'status' => 'active',
      'start' => '24 сентября с 10:00',
      // 'start1' => '25 и 26 августа с 10:00 до 19:00 по мск, онлайн',
      'finish' => '&nbsp;',
      'finish2' => 'Заявки принимаются до 20.09.2022',
      'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    ],
    [
      'id' => 3,
      'name' => 'QA-инженеры',
      'company' => $tinkoff1,
      'stack' => ['Опыт от 2 лет'],
      'status' => 'active',
      'start' => '17 сентября, суббота',
      'finish' => 'с 10:00 до 20:00 по мск онлайн',
      'finish2' => 'Заявки принимаются до 15.09.2022',
      'link' => 'https://one-day-offer.tinkoff.ru/qa/?internal_source=main_1do'
    ],
    // [
    //   'id' => 3,
    //   'name' => 'Frontend Mobile 01',
    //   'company' => $yandex1,
    //   'stack' => ['HTML', 'CSS', 'JS', 'React'],
    //   'status' => 'completed',
    //   'start' => '25 августа с 10:00',
    //   'finish' => '27 августа до 23:00',
    //   'finish2' => 'Заявки принимаются до 18.08',
    //   'link' => 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
    // ],
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
