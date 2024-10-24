<?php

namespace App\Controller;

use App\Model\ContactoModel;
use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;

class ContactoController{

  public static function index(){
    // creo una instancia del modelo para poder realizar un llamado a la función que lista los contactos
    $contactos = new ContactoModel();
    $datos['contactos'] = $contactos->listarContactos();
    include 'app/View/home.php';
    // view('Home',$datos['contactos']);
    // retorno una vista con los datos en forma de arreglo
  }

  public static function crear(){
    // action que me permite mostrar la vista del formulario de inserción
    view('crear');
  }

  public static function guardar(Request $request, Response $response){
    // funcion para guardar el contacto
    $cliente = (array)$request->body;

    $contactoModel = new ContactoModel();
    ($contactoModel->insertarContacto($cliente)) ? $response->status(200)->send(['data' => 'Datos insertados correctamente']):$response->status(400)->send(['data' => 'Hubo un fallo al intentar insertar los datos']);


  }

  public static function eliminar(Request $request, Response $response){
    // action que me permite eliminar un contacto de acuerdo al data-id
    //Obtengo el id del contacto que deseo eliminar
    $contactoId = $request->params->id;
    var_dump($contactoId);
    $contactoModel = new ContactoModel();

    return ($contactoModel->eliminarContacto($contactoId)) ? $response->status(200)->send(['data' => 'Contacto eliminado correctamente']):$response->status(400)->send(['data' => 'Hubo un fallo al intentar eliminar el contacto']);

  }

  public static function editarView(Request $request){
    //action que me permite obtener los datos de un contacto de acuerdo al id que se le envia en la ruta para luego editar
    //Obtengo el id del contact que deseo editar
    $datos['contactoId'] = $request->params->id;
    //Creo la instancia para invocar el metodo del modelo que me permitira editar
    $contactoModel = new ContactoModel();
    $datos['contacto'] = $contactoModel->obtenerContacto($request->params->id);
    var_dump($datos['contactoId']);
    // var_dump($datos['contacto']);
    // include 'app/View/editar.php';
    view('editar',$datos);

  }

  public static function editar(Request $request, Response $response){
    // var_dump($request->params->id);
    // var_dump((array)$request->body);

    $contactoId = $request->params->id;
    $contacto = (array)$request->body;
    $contactoModel = new ContactoModel();

    ($contactoModel->editarContacto($contacto,$contactoId))?$response->status(200)->send(['data' => 'Datos editados correctamente']):$response->status(400)->send(['data' => 'Hubo un fallo al intentar editar el contacto']);

  }
}
?>