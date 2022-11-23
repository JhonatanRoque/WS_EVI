<?php
include("escuelaCRUD.php");

$destinatario = "franciscoabarca7392@gmail.com";
$from = "franciscoabarca@transportfast.xyz";
$asunto = "Codigo para registrar empresa";
$codigo = escuela::getCodigoV();
$CC = "familiamenendezreyes@gmail.com";
$cuerpo = ' 
<html> 
<head> 
   <title>Codigo de verificacion</title> 
</head> 
<body> 
<h1>Código </h1> 
<p> 
<b>El código de verificación es: '.$codigo.'</b>.
</p> 
</body> 
</html> 
'; 

//para el envío en formato HTML 
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
if (!mail($destinatario, $asunto, $cuerpo, $headers)){
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("mensaje" => "Ocurrio un error al enviar el email"));
    echo $json_string;
}

?>