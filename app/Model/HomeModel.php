<?php

namespace App\Model;
use App\Database\Database;

class HomeModel{

  private object $mdb;

  public function __construct()
  {
    $this->mdb = new Database();
  }

  public function obtenerTelefonos($contactoId){

    $query = $this->mdb->db()->prepare("SELECT Id,Telefono FROM telefono WHERE ContactoId = ?");
    $query->bindParam(1,$contactoId);
    $query->execute();
    return $query->fetchAll($this->mdb->db()::FETCH_ASSOC);

  }

  public function eliminarTelefono($telefonoId):bool{
    $query = $this->mdb->db()->prepare("DELETE FROM telefono WHERE Id = ?");
    $query->bindParam(1,$telefonoId);

    return $query->execute();
  }

  public function obtenerEmails($contactoId){

    $query = $this->mdb->db()->prepare("SELECT Id,Email FROM email WHERE ContactoId = ?");
    $query->bindParam(1,$contactoId);
    $query->execute();
    return $query->fetchAll($this->mdb->db()::FETCH_ASSOC);
  }

  public function eliminarEmail($emailId):bool{
    $query = $this->mdb->db()->prepare("DELETE FROM email WHERE Id = ?");
    $query->bindParam(1,$emailId);

    return $query->execute();
  }
}
?>