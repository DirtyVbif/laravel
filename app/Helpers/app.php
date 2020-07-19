<?php

use Illuminate\Support\Facades\Request;

function isFrontPage()
{
  return Request::route()->getName() === 'home';
}