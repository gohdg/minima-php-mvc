<?php

class Controller
{
  protected function view($view)
  {
    // control view page
    if (file_exists("../app/views/" . $view . ".php")) {
      include "../app/views/" . $view . ".php";
    } else {
      include "../app/views/404.php";
    }
  }

  //   load class
  protected function loadModel($model)
  {
    // control view page
    if (file_exists("../app/models/" . $model . ".php")) {
      include "../app/models/" . $model . ".php";
      return $model = new $model();
    }
    return false;
  }
}
