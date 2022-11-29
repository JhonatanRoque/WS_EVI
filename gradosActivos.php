<?php
include("escuelaCRUD.php");

$escuelaID = $_POST['escuelaID'];

    $resultado = escuela::getGradosInt($escuelaID);
    if($resultado){
        echo $resultado;
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("grados" => $resultado));
        echo $json_string;
    }else{
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0,"mensaje" => "No se encontraron datos que mostrar"));
        echo $json_string;
    }
   


?>