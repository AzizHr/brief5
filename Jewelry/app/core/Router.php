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
    $found = false;

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    foreach($this->routes as $route)
    {
      if($url === $route['url'] && $requestMethod === $route['method'])
      {
        $found = true;

        if(is_array($route['callback']))
        {
          [$controller, $method] = $route['callback'];

          $controller = new $controller();

          call_user_func_array($controller->$method(), []);
        } else {
                  call_user_func($route['callback']);
        }

        break;
      }
    }

    if(!$found)
      echo 'Page Not Found';
  }
}
