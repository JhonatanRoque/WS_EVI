<?php
include("escuelaCRUD.php");

$destinatario = "franciscoabarca7392@gmail.com";
$asunto = "Codigo para registrar empresa";
$codigo = escuela::getCodigoV();
$CC = "familiamenendezreyes@gmail.com";
$cuerpo = 'El código de registro es: '. $codigo . '\n \n\n Este correo ha sido enviado desde el servidor de EVI \n Sporte tecnico: Gustavo Alfonso Menendez | ' . $CC ; 

//para el envío en formato HTML 
$headers = 'MIME-Version: 1.0' . "\r\n"; 
$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$headers = "From: Proyecto EVI <franciscoabarca@transportfast.xyz>" . "\r\n";
$headers = "Cc: " . $CC . "\r\n";
if (!mail($destinatario, $asunto, $cuerpo, $headers)){
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode(array("mensaje" => "Ocurrio un error al enviar el email"));
    echo $json_string;
}

?>