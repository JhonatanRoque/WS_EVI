<?php
function conexion(){
	$conn = null;
	$host = "localhost";
	$db = "u701462728_db_evi"; //Aqui ira el nombre de nuestra DB
	$user = "u701462728_admin"; //Aqui ira el nombre de nuestro usuario de BD
	$pwd = "Jona1.than6"; //Contraseña de BD

	try{
		$conn = new PDO('mysql:host='.$host.'; dbname='.$db, $user,$pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		//echo "connexion hecha";
	}catch(PDOException $e){
		echo "<center><h2 style='color:green'>Error al tratar de conectar a la DB. ";
		echo " consulte al soporte Técnico </h2></center>";

		exit();
	}
	return $conn;
}

//Probar conexion
//conexion();

/*ha";
	by: Tec. Francisco Abarca
	Modificado por: Tec. Francisco Abarca
	Fecha modificación: 21/11/2022
*/


?>
