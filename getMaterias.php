<?php
include("escuelaCRUD.php");

    $resultado = escuela::getMateria();
    if($resultado){
        echo $resultado;
    }else{
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0,"mensaje" => "No se encontraron datos que mostrar"));
        echo $json_string;
    }
   


?>