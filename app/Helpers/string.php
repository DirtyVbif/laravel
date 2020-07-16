<?php

function title(string $title, bool $use_mask = true)
{
  $title_mask = '%s | Geekbrains Laravel';

  $title = $use_mask ? sprintf($title_mask, $title) : $title;

  return $title;
}

/**
 * generates random string of specified length from random symbols `[a-zA-Z0-9]` and `[@#$%_-*&?]` as additional symbols
 * 
 * @param int $length specified length of random string. 16 chars by default
 * @param boolean $clear means if string will be clear of additional symbols `[@#$%_-*&?]` or not. String contains additional symbols by default.
 * @return string resulted random string of specified length
 */
function randomStr(int $length = 16, bool $clear = FALSE) {
  $result = "";
  $i = 0;
  $chars = [
    'lc' => str_split('abcdefghijklmnopqrstuvwxyz'),
    'uc' => str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),
    'str' => str_split('aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ'),
    'num' => str_split('0123456789-_'),
    'signs' => str_split('0@1#2$3%4_5-6*7&8?9')
  ];
  
  if($clear) {
    unset($chars['signs'], $chars['str']);
  }

  do {
    $x = array_rand($chars);
    $y = array_rand($chars[$x]);
    $result .= $chars[$x][$y];
    $i++;
  } while($i < $length);

  return $result;
}

function strTrim(string $string, int $limit, string $ending = '...')
{
  $l = (int)mb_strlen($ending);
  return mb_strlen($string) > $limit ? mb_substr($string, 0, $limit - $l) . $ending : $string;
}