<?php

class Dbh
{
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $dbName = "mcqExam";

  private $port;

  public function setDbInfo($host, $user, $pass, $db)
  {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->dbName = $db;
  }

  public function setPort(int $port)
  {
    $this->port = $port;
  }

  protected function connect()
  {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
      $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
      $mysqli->set_charset("utf8mb4");

      return $mysqli;
    } catch (Exception $e) {
      print "ERROR!: " . $e->getMessage() . "<BR>";
      die();
    }
  }

  protected function connect_pdo()
  {
    try {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
      $pdo = new PDO($dsn, $this->user, $this->pass);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      return $pdo;
    } catch (PDOException $e) {
      print "ERROR!: " . $e->getMessage() . "<BR>";
      die();
    }
  }
}
