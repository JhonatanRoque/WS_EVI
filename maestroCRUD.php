<?php

//Clase con las funciones para los maestros
class maestro{
    //Método para iniciar sesión
    public static function getLogin($correo, $contrasena){
    include("connection.php");
        // Consulta de la tabla maestros para verificar si existe un maestro registrado con dichos datos.
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
          $mensaje = array("mensaje" =>"Correo o contraseña incorrectos, puede que no exista un registro con dichas credenciales");
          return $mensaje;

        } catch (PDOException $e) {
            return -1;
        }
    }

     //Metodo para registrar un maestro
     public static function regmaestro($nombre, $apellido, $correo, $direccion, $telefono, $escuelaID, $facebook, $whatsapp, $contrasena){
        include("connection.php"); //Incluimos nuestra conexion a la BD
        $query = "INSERT INTO tbMaestros (nombre, apellido, correo, direccion, telefono, escuelaID, facebook, whatsapp, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; //Consulta que realizara la BD
        try{
            $checkPhone = maestro::checkPhone($telefono);
            if($checkPhone > 0){
                $mensaje = "Npúmero de telefono no diponible, escoja otro.";
                return $mensaje;
            }
            $CheckEmail = maestro::checkCorreo($correo);
            if($CheckEmail == 1){
                $mensaje = "Correo de maestro no diponible, escoja otro .";
                return $mensaje;
            }
            
            $link = conexion();
            $comando = $link->prepare($query);
            $comando->execute(array($nombre, $apellido, $correo, $direccion, $telefono, $escuelaID, $facebook, $whatsapp, $contrasena));
            $row = $comando->rowCount();
            if($row > 0){
                return $row;
            }else{
                return $row;
            }
        }catch (PDOException $e){
            return $e;
        }
       

    }

     //Metodo para comprobar si ya existe un cuenta con dicho nombre
     public static function checkPhone($telefono){
        $query = "SELECT nombre FROM tbMaestros WHERE telefono = ?";
        try{
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($telefono));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro un maestroa que ya tiene ese telefono
                //No permite crear cuenta si esto sucede
                return 1;
            }else{
                //No encontro ninguna escuela con dicho nombre 
                //puede continuar con el registro 
                return 0;
            }
        }catch(PDOException $e){
            return $e;
        }
    }

    public static function checkCorreo($correo){
        $query = "SELECT correo FROM tbMaestros WHERE correo = ?";
        try{
        
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($correo));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro una maestro que ya tiene ese correo
                //No permite crear registro si esto sucede
                return 1;
            }else{
                //No encontro ningun maestro con dicho correo
                //puede continuar con el registro 
                return 0;
            }
        }catch(PDOException $e){
            return $e;
        }
    }

    public static function getMaestroIndividual($id){
        include("connection.php");
            // Consulta de la tabla maestros para verificar si existe un maestro registrado con dichos datos.
        $query = "SELECT * FROM tbMaestros WHERE  id = ?"; //Sentencia SQL para consultar datos en la tabla
        try {    
              $link=conexion();    
              $comando = $link->prepare($query);
              $comando->execute(array($id));
              $row = $comando->fetch(PDO::FETCH_ASSOC);
              $filasAfectadas = $comando->rowCount();
              if( $filasAfectadas > 0){
                return $row;
              }
              $mensaje = array("mensaje" =>"Correo o contraseña incorrectos, puede que no exista un registro con dichas credenciales");
              return $mensaje;
    
            } catch (PDOException $e) {
                return -1;
            }
        }

        //Metodo para actualizar datos de maestro 
        public static function actualizarmaestro($id, $nombre, $apellido, $correo, $direccion, $telefono, $escuelaID, $facebook, $whatsapp, $contrasena){
            include("connection.php"); //Incluimos nuestra conexion a la BD
            $query = "UPDATE tbMaestros  SET nombre = ?, apellido = ?, correo = ?, direccion = ?, telefono = ?, escuelaID = ?, facebook = ?, whatsapp = ?, contrasena = ? WHERE id = ?"; //Consulta que realizara la BD
            try{
              
                $link = conexion();
                $comando = $link->prepare($query);
                $comando->execute(array($nombre, $apellido, $correo, $direccion, $telefono, $escuelaID, $facebook, $whatsapp, $contrasena, $id));
                $row = $comando->rowCount();
                if($row > 0){
                    return $row;
                }else{
                    return $row;
                }
            }catch (PDOException $e){
                return $e;
            }
           
    
        }
}

?>