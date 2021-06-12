<?php

class App
{
  private $controller = "home";
  private $method = "index";
  private $params = [];

  public function __construct()
  {
    //http://localhost/minima/public/home/index/6/7/8 , home->classname, index->method,function , parameters 6,7,8

    $url = $this->splitURL();
    // echo $url[0];

    // check class file exists
    if (file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
      $this->controller = strtolower($url[0]);
      unset($url[0]);
    }

    // echo $this->controller;

    require "../app/controllers/" . $this->controller . ".php";

    // create Instance(object)
    $this->controller = new $this->controller(); // $this->controller is an object from now on
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // run the class and method
    $this->params = array_values($url); // array_values 값들인 인자 0 부터 다시 배치
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function splitURL()
  {
    $url = isset($_GET["url"]) ? $_GET["url"] : "home";
    return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL)); // explode return array, trim get rid of specifled char from the position of start and end of string given
  }
}
