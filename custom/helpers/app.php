<?php

function title(string $title, bool $use_mask = true)
{
  $title_mask = '%s | Geekbrains Laravel';

  $title = $use_mask ? sprintf($title_mask, $title) : $title;

  return $title;
}

function getCategoriesList(string $category = null, int $id = null)
{
  $categories = [
    'cats' => [
      'name' => 'Котики',
      'container' => ['Котик ищет дом', 'Чёрные кошки', 'Не трожь моего пса', 'Жизнь кота по имени Збых']
    ],
    'dogs' => [
      'name' => 'Собаки',
      'container' => ['Не трожь моего пса', 'Пёс притащил О_О', 'Детектив Пикачу', 'Его зовут Бао-Бао и он уверен, что все хотят с ним дружить']
    ],
    'humor' => [
      'name' => 'Юмор',
      'container' => ['Смертельно полезная информация', 'Привилегия барабанщика', 'Дуркую на карантине', 'Из рассказов в общаге']
    ],
    'comics' => [
      'name' => 'Комиксы',
      'container' => ['Типичное бесплатное приложение', 'Привилегия барабанщика', 'Выпуск №636', 'Ярость, пламя и силовые лопатки']
    ],
    'nfws' => [
      'name' => 'Клубничка',
      'container' => ['Зима такая', 'Кактус настоящего пикабушника', 'Pornohub снял самое грязное видео', 'Утро в поле']
    ]
  ];

  if(is_null($category)) {
    return $categories;
  } elseif(is_null($id)) {
    return $categories[$category];
  }

  return $categories[$category]['container'][$id];
}
