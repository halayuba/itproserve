<?php

  require 'core/bootstrap.php';

  $router = new Router;
  require 'routes.php';

  $uri = trim($_SERVER['REQUEST_URI'], '/');

  if(!empty($router->direct($uri)))
  {
    require $router->direct($uri);
  }
  else {
      require $router->direct('page_not_found');
  } 
