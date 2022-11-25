<?php
    include("escuelaCRUD.php");
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES);

    if(($nombre != "")){
    
        $resultado = escuela::getCorreoEscuela($nombre);
            
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 1, "mensaje" => $resultado));
        echo $json_string;
        
            
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0, "mensaje" => "Hay datos que no se han suministrado $correo"));
        echo $json_string;
    }

?>