<?php

namespace App\config;

use \PDO;

class Database
{

  private ?PDO $PDOInstance = null;
  private static ?self $instance = null;
  private string $type = "mysql";
  private string $host = "localhost";
  private string $dbName = "api-php";
  private string $user = "root";
  private string $password = "";


  /**
   * __construct
   *
   * @return void
   */
  private function __construct()
  {
    $string = $this->type . ":host=" . $this->host . ";dbname=" . $this->dbName;
    $this->PDOInstance  = new PDO($string, $this->user, $this->password, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
  }


  /**
   * getInstance
   *
   * @return self
   */
  public static function getInstance(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }


  /**
   * read
   * read on the DB
   * @param  string $query
   * @param  array $data
   * @return array|bool
   */
  public function read(string $query, array $data = array()): array|bool
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      $data = $statement->fetchAll(PDO::FETCH_OBJ);

      if (is_array($data) && count($data) > 0) {
        return $data;
      }
    }
    return false;
  }


  /**
   * readOneRow
   * read one row on the DB
   * @param  string $query
   * @param  array $data
   * @return object|bool
   */
  public function readOneRow(string $query, array $data = array()): object|bool
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      $data = $statement->fetch(PDO::FETCH_OBJ);
      if (is_object($data)) {
        return $data;
      }
    }
    return false;
  }


  /**
   * write
   *
   * @param  string $query
   * @param  array $data
   * @return bool
   */
  public function write(string $query, array $data = array()): bool
  {
    $statement = $this->PDOInstance->prepare($query);
    $result = $statement->execute($data);

    if ($result) {
      return true;
    }

    return false;
  }
}
