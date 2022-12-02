<?php
    include("maestroCRUD.php");
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);


    if(($id != "")){
    
        $resultado = maestro::getMaestroIndividual($id);
            
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode($resultado);
        echo $json_string;
        
            
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 0, "mensaje" => "Hay datos que no se han suministrado $correo + $contrasena"));
        echo $json_string;
    }

?>