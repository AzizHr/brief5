<?php

namespace App\core;

class View
{
  public static function render($view, $data = [])
  {
    extract($data);

    if (file_exists('./app/views/' . $view . '.php')) {
      require './app/views/' . $view . '.php';
    } else {
      die('View does not exist');
    }
  }
}
