<?php
//Incluimos nuestro archivo crud
include("escuelaCRUD.php");
//Leemos todos los datos que nos envia la APP
$nombre = $_POST["nombre"];
$direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES);
$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES);
$correo = htmlspecialchars($_POST['correo'], ENT_QUOTES);
$contrasena = htmlspecialchars($_POST['contrasena'], ENT_QUOTES);
$codigoSeguridad = htmlspecialchars($_POST['codigoS'], ENT_QUOTES);

if(($nombre != "")){
  echo $nombre;
}else {
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("estado" => 0,"mensaje" => "Faltan datos para procesar la solicitud $nombre"));
    echo $json_string;
}

?>