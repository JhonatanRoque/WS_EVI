<?php 
include("escuelaCRUD.php");
$correo = htmlspecialchars($_POST['correo']);
$codigo = $_POST['codigo'];

if ($codigo != ""){
    $resultado = escuela::checkCodigoRecContrasena($correo, $codigo);

    if($resultado > 0){
        header('Content-type: application/json; charset=utf-8'); //Encabezado para indicar al navegador, que debe mostrar la pagina en formato application/json
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Codigo aceptado, puede continuar con el proceso.")); //Preparamos el mensaje a enviar como respuesta
        echo $json_string; //Imprimimos el mensaje en pantalla
    }else {
        header('Content-type: application/json; charset=utf-8'); //Encabezado para indicar al navegador, que debe mostrar la pagina en formato application/json
        $json_string = json_encode(array("estado" => 2,"mensaje" => "Codigo ingresado, no es valido.")); //Preparamos el mensaje a enviar como respuesta
        echo $json_string; //Imprimimos el mensaje en pantalla
    }
}else {
    header('Content-type: application/json; charset=utf-8'); //Encabezado para indicar al navegador, que debe mostrar la pagina en formato application/json
    $json_string = json_encode(array("estado" => 0,"mensaje" => "Faltan datos para procesar la solicitud.")); //Preparamos el mensaje a enviar como respuesta
    echo $json_string; //Imprimimos el mensaje en pantalla
}

?>