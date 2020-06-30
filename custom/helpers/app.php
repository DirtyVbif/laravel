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

function getNewsList(int $count = null)
{
  $news = [];
  foreach(getCategoriesList() as $category => $data) {
    foreach($data['container'] as $id => $article) {
      array_push($news, [
        'id' => $id,
        'title' => $article,
        'summary' => getArticleContent($category, $id),
        'category' => $category,
        'category_name' => $data['name']
      ]);
    }
  }
  if(!$count) {
    return $news;
  }
  $slice = [];
  do {
    $x = rand(1, count($news)) - 1;
    if(isset($slice[$x])) { continue; }
    $slice[$x] = $news[$x];
  } while($count > count($slice));
  return $slice;
}

function getArticleContent(string $category, int $id)
{
  $name = md5("article-$category-$id");
  $dir = __DIR__."/../cache";
  $file = "$dir/$name";
  if(!file_exists($dir)) {
    mkdir($dir);
  }
  if(!file_exists($file)) {
    $handle = fopen($file, 'w');
    fwrite($handle, file_get_contents('https://loripsum.net/api/1/short'));
    fclose($handle);
  }
  $summary = file_get_contents($file);
  $summary = strlen($summary) > 200 ? substr($summary, 0, 197) . ' ...' : $summary;
  return $summary;
}
