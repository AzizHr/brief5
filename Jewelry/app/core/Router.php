<?php

namespace App\core;

class Router
{
  protected array $routes = [];

  public function get($url, $callback)
  {
    $this->assign($url, $callback, 'GET');
  }

  public function post($url, $callback)
  {
    $this->assign($url, $callback, 'POST');
  }

  protected function assign($url, $callback, $method)
  {
    $this->routes[] = [
      'url' => $url,
      'callback' => $callback,
      'method' => $method
    ];
  }

  public function route()
  {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $method = strtoupper($_SERVER['REQUEST_METHOD']);

    foreach($this->routes as $route)
    {
      if($route['url'] === $url && $route['method'] === $method)
      {
        call_user_func($route['callback']);
        return;
      }

      echo 'Page not found';
    }
  }
}
