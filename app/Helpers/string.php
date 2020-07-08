<?php

function title(string $title, bool $use_mask = true)
{
  $title_mask = '%s | Geekbrains Laravel';

  $title = $use_mask ? sprintf($title_mask, $title) : $title;

  return $title;
}
