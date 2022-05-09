<?php

namespace App\config;

use \PDO;

class Database
{

  private $PDOInstance = null;
  private static $instance = null;
  private $type = "mysql";
  private $host = "localhost";
  private $dbName = "api-php";
  private $user = "root";
  private $password = "";

  private function __construct()
  {
    $string = $this->type . ":host=" . $this->host . ";dbname=" . $this->dbName;
    $this->PDOInstance  = new PDO($string, $this->user, $this->password, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
  }


  /**
   * get the pdo instance
   */
  public static function getInstance()
  {
    if (is_null(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public static function getNewInstance()
  {
    return new Database();
  }

  /**
   * read on the BDD
   */
  public function read($query, $data = array(), $method = PDO::FETCH_ASSOC)
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      $data = $statement->fetchAll($method);
      if (is_array($data) && count($data) > 0) {
        return $data;
      }
    }
    return false;
  }

  /**
   * write on the BDD
   */
  public function write($query, $data = array())
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);
    if ($result) {
      return true;
    }
    return false;
  }

  /**
   * return the last id inserted
   */
  public function getLastInsertId()
  {
    return $this->PDOInstance->lastInsertId();
  }
}
