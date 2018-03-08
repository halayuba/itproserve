<?php

  class Router
  {
    protected $routes = [];

    public function define($routes)
    {
      $this->routes = $routes;
    }

    public function direct($uri)
    {
      if(array_key_exists($uri, $this->routes))
      {
        return $this->routes[$uri];
      }

      try{
        throw new Exception('This page could not be found! Perhaps you misspelled the url or it has been removed');
      }catch(Exception $e){
        echo "";
      }

    }

  }
