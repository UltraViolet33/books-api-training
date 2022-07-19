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
   * getNewInstance
   *
   * @return self
   */
  public static function getNewInstance(): self
  {
    return new Database();
  }


  /**
   * read
   *
   * @param  string $query
   * @param  array $data
   * @param  int $method
   * @return bool|array
   */
  public function read(string $query,  array $data = array(), int $method = PDO::FETCH_ASSOC): bool|array
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


  /**
   * getLastInsertId
   *
   * @return int
   */
  public function getLastInsertId(): int
  {
    return $this->PDOInstance->lastInsertId();
  }
}
