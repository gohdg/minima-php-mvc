<?php

class Database
{
  public function db_connect()
  {
    try {
      $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
      return $db = new PDO($string, DB_USER, DB_PASS);
      showLog($db);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function read($query, $data = [])
  {
  }

  public function write($query, $data = [])
  {
  }
}
