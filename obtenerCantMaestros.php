<?php
include("escuelaCRUD.php");

$escuelaID = $_POST['escuelaID'];

    $resultado = escuela::getMaestrosInt($escuelaID);
    if($resultado){
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("maestros" => $resultado));
        echo $json_string;
    }else{
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0,"mensaje" => "No se encontraron datos que mostrar"));
        echo $json_string;
    }
   


?>