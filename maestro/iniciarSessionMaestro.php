<?php
    include("maestroCRUD.php");
    $correo = htmlspecialchars($_POST['correo'], ENT_QUOTES);
    $contrasena = htmlspecialchars($_POST['contrasena'], ENT_QUOTES);

    if(($correo != "") and ($contrasena != "")){
    
        $resultado = maestro::getLogin($correo, $contrasena);
            
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode($resultado);
        echo $json_string;
        
            
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0, "mensaje" => "Hay datos que no se han suministrado $correo + $contrasena"));
        echo $json_string;
    }

?>