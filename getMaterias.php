<?php
include("escuelaCRUD.php");

    $resultado == escuela::getMateria();
    if($resultado > 0){
        echo $resultado;
    }else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se encontraron grados relacionados a su institución, si es administrador agregue los grados respectivos."));
        echo $json_string;
    }


?>