<?php

namespace App\Database;
use PDO;

class Database{
  private string $serverName = '127.0.0.1';
  private string $userName = 'root';
  private string $password = '';
  private string $db = 'nivelar_prueba';

  public function db(): PDO{
    return new PDO("mysql:host=$this->serverName;dbname=$this->db", $this->userName, $this->password);
  }
}
?>