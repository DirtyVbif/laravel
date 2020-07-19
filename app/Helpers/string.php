<?php

use Illuminate\Support\Facades\App;

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

/**
 * Translate string function to app language
 * 
 * Given string will be translated into specified language from.
 * If given string and app has same localization then no translation need.
 *
 * @param string|array $string string or array with strings to translate to app language.
 * 
 * @param string $locale localization of given string. `en` by default
 * 
 * @return string translated string 
 */
function t($string, string $locale = 'en')
{
  // if given value is array then translace recursively
  if(is_array($string)) {
    foreach($string as &$s) {
      $s = t($s, $locale);
    }
    return $string;
  }
  // if given value is not string return given value without translation
  if(!is_string($string)) {
    return $string;
  }
  // get app localization
  $lang = App::getLocale();
  // if given locale equals to app localization
  // return original string
  if($lang === $locale) {
    return $string;
  }
  // check for translations and return original string if no translations
  $content_file = __DIR__ . "/../../resources/lang/{$lang}/content.php";
  if(!file_exists($content_file)) {
    return $string;
  }
  // get class name where translator was called
  $class = null;
  foreach(debug_backtrace() as $d) {
    if(!isset($d['class'])) { continue; }
    $class = explode('\\', $d['class']);
    $i = count($class) - 1;
    $class = $class[$i];
    break;
  }
  // get lang resources
  $content = include $content_file;
  // check for translations
  if($class && isset($content[$class][$string])) {
    // translate string for priority source
    $string = $content[$class][$string];
  } elseif(isset($content['default'][$string])) {
    // translate string for default source
    $string = $content['default'][$string];
  } else {
    $string = __($string);
  }
  // return translation result
  return $string;
}