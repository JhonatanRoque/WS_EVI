<?php
include("escuelaCRUD.php");

$destinatario = $_POST['correo'];
$asunto = "Codigo para recuperar contraseña";
$codigo = escuela::getPassword($destinatario);
$cuerpo = '<html><head></head><body> 
<h1>Código </h1> 
<p> 
<b>La contraseña para su cuenta de correo '.$destinatario.' es: '. $codigo. '</b>.
<br>
<p>Ingrese el codigo en la app, para continuar con el proceso.</p>
</p> 
</body> 
</html> '; 

//para el envío en formato HTML 
$headers = 'MIME-Version: 1.0' . "\r\n"; 
$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

if($destinatario != ""){
    if (!mail($destinatario, $asunto, $cuerpo, $headers)){
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("mensaje" => "Ocurrio un error al enviar el email"));
        echo $json_string;
    }else{
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 1, "mensaje" => "Se envio el correo satisfactoriamente"));
        echo $json_string;
    }
}else {
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("estado" => 0, "mensaje" => "Faltan datos para procesar la solicitud"));
    echo $json_string;
}
?>