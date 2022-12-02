<?php
//Incluimos nuestro archivo crud
include("maestroCRUD.php");
//Leemos todos los datos que nos envia la APP
$id = $_POST['id'];
$nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES);
$apellido = htmlspecialchars($_POST['apellido'], ENT_QUOTES);
$correo = htmlspecialchars($_POST['correo'], ENT_QUOTES);
$direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES);
$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES);
$escuelaID = htmlspecialchars($_POST['escuelaID'], ENT_QUOTES);
$facebook = htmlspecialchars($_POST['facebook'], ENT_QUOTES);
$whatsapp = htmlspecialchars($_POST['whatsapp'], ENT_QUOTES);
$contrasena = htmlspecialchars($_POST['contrasena'], ENT_QUOTES);

if(($id != "") && ($nombre != "") && ($apellido != "") && ($correo != "") && ($direccion != "") && ($telefono != "") && ($escuelaID != "") && ($facebook != "") && ($whatsapp != "") && ($contrasena != "")){
    $resultado = maestro::actualizarmaestro($id, $nombre, $apellido, $correo, $direccion, $telefono, $escuelaID, $facebook, $whatsapp, $contrasena); //Realizamos la ejecución de nuestra funcion para registrar escuela, pasandole los datos que recibimos anteriormente
    if ($resultado==1) { //Comprobamos que recibimos un 1 como señal de que se registro la escuela
        header('Content-type: application/json; charset=utf-8'); //Encabezado para indicar al navegador, que debe mostrar la pagina en formato application/json
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Maestro actualizado correctamente.")); //Preparamos el mensaje a enviar como respuesta
        echo $json_string; //Imprimimos el mensaje en pantalla
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 2,"mensaje" => $resultado));
		echo $json_string;
    }
}else {
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("estado" => 0,"mensaje" => "Faltan datos para procesar la solicitud $nombre"));
    echo $json_string;
}

?>