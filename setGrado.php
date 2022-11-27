<?php
//Incluimos nuestro archivo crud
include("escuelaCRUD.php");
//Leemos todos los datos que nos envia la APP
$nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES);

if($nombre != ""){
    $resultado = escuela::setGrado($nombre); //Realizamos la ejecución de nuestra funcion para registrar escuela, pasandole los datos que recibimos anteriormente
    if ($resultado==1) { //Comprobamos que recibimos un 1 como señal de que se registro el grado
        header('Content-type: application/json; charset=utf-8'); //Encabezado para indicar al navegador, que debe mostrar la pagina en formato application/json
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Grado registrado correctamente.")); //Preparamos el mensaje a enviar como respuesta
        echo $json_string; //Imprimimos el mensaje en pantalla
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se pudo registrar el grado, verifique los datos"));
		echo $json_string;
    }
}else {
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("estado" => 0,"mensaje" => "Faltan datos para procesar la solicitud $nombre"));
    echo $json_string;
}

?>