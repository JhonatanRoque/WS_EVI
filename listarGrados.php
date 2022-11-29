<?php
include("escuelaCRUD.php");

$escuelaID = htmlspecialchars($_POST['escuelaID'], ENT_QUOTES);

if($escuelaID != ""){
    $resultado = escuela::getGrados($escuelaID);
    if($resultado > 0){
        echo $resultado;
    }else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se encontraron grados relacionados a su institución, si es administrador agregue los grados respectivos."));
        echo $json_string;
    }
}else {
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("estado" => 0,"mensaje" => "Faltan datos para procesar la solicitud ".$escuelaID));
    echo $json_string;
}

?>