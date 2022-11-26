<?php

//Clase con las funciones para los alumnos
class alumnos{
    //Método para iniciar sesión
    public static function getLogin($correo, $contrasena){
    include("connection.php");
        // Consulta de la tabla alumnos para verificar si existe un alumno registrado con dichos datos.
    $query = "SELECT * FROM tbMaestros WHERE  correo = ? and contrasena = ?"; //Sentencia SQL para consultar datos en la tabla
    try {    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($correo,$contrasena));
          $row = $comando->fetch(PDO::FETCH_ASSOC);
          $filasAfectadas = $comando->rowCount();
          if( $filasAfectadas > 0){
            return $row;
          }
          $mensaje = array("mensaje" =>"Correo o contraseña incorrectos, puede que no exista un registro con dichas credenciales, consulte a su maestro guía para mas información.");
          return $mensaje;

        } catch (PDOException $e) {
            return -1;
        }
    }
}

?>