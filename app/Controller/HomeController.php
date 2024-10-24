<?php

namespace App\Controller;

use App\Model\ContactoModel;
use App\Model\HomeModel;
use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;

class HomeController{

  public static function index(){
    view('Home');
  }

  public static function detallesView(Request $request){
    //obtengo el contactoId
    $datos['contactoId'] = $request->params->id;
    //creo la instancia para llamar el metodo del modelo
    $homeModel = new HomeModel();
    $contactoModel = new ContactoModel();
    //obtengo un array asociativo de telefonos del contacto
    $datos['telefonos'] = $homeModel->obtenerTelefonos($request->params->id);
    $datos['emails'] = $homeModel->obtenerEmails($request->params->id);
    $datos['contacto'] = $contactoModel->obtenerContacto($request->params->id);

    view('detalles',$datos);
  }

  public static function eliminarTelefono(Request $request, Response $response){

    // action que me permite eliminar un telefono de acuerdo al data-id
    //Obtengo el id del telefono que deseo eliminar
    $telefonoId = $request->params->id;
    $homeModel = new HomeModel();

    ($homeModel->eliminarTelefono($telefonoId)) ? $response->status(200)->send(['data' => 'Contacto eliminado correctamente']):$response->status(400)->send(['data' => 'Hubo un fallo al intentar eliminar el contacto']);


  }

  public static function eliminarEmail(Request $request, Response $response){

    // action que me permite eliminar un email de acuerdo al data-id
    //Obtengo el id del email que deseo eliminar
    $emailId = $request->params->id;
    $homeModel = new HomeModel();

    ($homeModel->eliminarEmail($emailId)) ? $response->status(200)->send(['data' => 'Contacto eliminado correctamente']):$response->status(400)->send(['data' => 'Hubo un fallo al intentar eliminar el contacto']);


  }
}
?>