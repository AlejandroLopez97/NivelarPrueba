<?php

namespace App\Model;
use App\Database\Database;
use Exception;

class ContactoModel{

  private object $mdb;

  public function __construct()
  {
    $this->mdb = new Database();
  }

  public function insertarContacto(array $contacto): int {
    
    // Insertar el contacto en la tabla 'contacto'
    $query = $this->mdb->db()->prepare("INSERT INTO contacto (Nombre, Apellido) VALUES (?, ?)");
    $query->bindParam(1, $contacto['nombre'], $this->mdb->db()::PARAM_STR);
    $query->bindParam(2, $contacto['apellido'], $this->mdb->db()::PARAM_STR);
    $query->execute();

    // Obtener el ID del contacto recién insertado
    $contactoId = (int) $this->mdb->db()->lastInsertId();

    // Validar si el contactoId fue correctamente obtenido
    if (!$contactoId) {
        echo("Error al obtener el ID del contacto.");
    }

    // Retornar el ID del contacto insertado
    return $contactoId;
  }



  public function insertarTelefonoEmailDeContacto($contactoId){

  }

  public function listarContactos(){
    // funcion que me permite listar todos los contactos de la base de datos y retornarlo en un array asociativo
    $result = $this->mdb->db()->query("SELECT id, nombre, apellido FROM contacto");
    $result->execute();
    $datos = $result->fetchAll($this->mdb->db()::FETCH_ASSOC);
    // var_dump($datos);
    return $datos;
  }

  public function eliminarContacto($contactoId):bool{
    $query = $this->mdb->db()->prepare("DELETE FROM contacto WHERE Id = ?");
    $query->bindParam(1,$contactoId);

    return $query->execute();
  }

  public function obtenerContacto($contactoId){

    $query = $this->mdb->db()->prepare("SELECT Nombre, Apellido FROM contacto WHERE Id = ?");
    $query->bindParam(1,$contactoId);
    $query->execute();
    return $query->fetchAll($this->mdb->db()::FETCH_ASSOC);

  }

  public function editarContacto($contacto, $contactoId):bool{
    $query = $this->mdb->db()->prepare("UPDATE contacto set Nombre = ?, Apellido = ? WHERE Id = ?");
    $query->bindParam(1,$contacto['nombre']);
    $query->bindParam(2,$contacto['apellido']);
    $query->bindParam(3,$contactoId);

    return $query->execute();
  }

}
?>