<?php
include("escuelaCRUD.php");

$destinatario = "franciscoabarca7392@gmail.com";
$asunto = "Codigo para registrar empresa";
$codigo = escuela::getCodigoV();
$from = "franciscoabarca@transportfast.xyz";
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
$headers = "From:" . $from . "\r\n";
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers = "CC:" . $CC . "\r\n";
if (!mail($destinatario, $asunto, $cuerpo, $headers)){
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("mensaje" => "Ocurrio un error al enviar el email"));
    echo $json_string;
}

?>