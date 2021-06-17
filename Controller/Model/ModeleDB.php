<?php
class DB
{
  public $error = "";
  private $pdo = null;
  private $stmt = null;
  function __construct()
  {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASSWORD,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  function __destruct()
  {
    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  function insert($sql)
  {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute();
      return $this->stmt;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

  function select($sql)
  {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute();
      return $this->stmt;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

  function delete($sql)
  {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $result = $this->pdo->exec($sql);
      return $result;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'R4');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
