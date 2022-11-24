<?php
    include("escuelaCRUD.php");
    $correo = htmlspecialchars($_POST['correo'], ENT_QUOTES);

    if(($correo != "")){
    
        $resultado = escuela::getCorreo($correo);
            
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode($resultado);
        echo $json_string;
        
            
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0, "mensaje" => "Hay datos que no se han suministrado $correo"));
        echo $json_string;
    }

?>