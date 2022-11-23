<?php
//Iniciamos la clase que contendra todas las funciones para interactuar con nuestra BD
class escuela{
    //Metodo para registrar una escuela
    public static function regEscuela($nombre, $direccion, $telefono, $correo, $contrasena, $codigoSeguridad){
        include("connection.php"); //Incluimos nuestra conexion a la BD
        $query = "INSERT INTO tbEscuelas (nombre, direccion, telefono, correo, contrasena, codigoSeguridad) VALUES (?, ?, ?, ?, ?, ?)"; //Consulta que realizara la BD
        try{
            $checkName = escuela::checkName($nombre);
            if($checkName > 0){
                $mensaje = "Nombre de Escuela no diponible, escoja otro.";
                return $mensaje;
            }
            $CheckEmail = escuela::checkCorreo($correo);
            if($CheckEmail == 1){
                $mensaje = "Correo de Escuela no diponible, escoja otro.";
                return $mensaje;
            }
            
            $link = conexion();
            $comando = $link->prepare($query);
            $comando->execute(array($nombre, $direccion, $telefono, $correo, $contrasena, $codigoSeguridad));
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
    public static function checkName($nombre){
        $query = "SELECT nombre FROM tbEscuelas WHERE nombre = ?";
        try{
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($nombre));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro una escuela que ya tiene ese nombre 
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
        $query = "SELECT correo FROM tbEscuelas WHERE correo = ?";
        try{
        
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($correo));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro una escuela que ya tiene ese correo
                //No permite crear registro si esto sucede
                return 1;
            }else{
                //No encontro ninguna escuela con dicho correo
                //puede continuar con el registro 
                return 0;
            }
        }catch(PDOException $e){
            return $e;
        }
    }

    //Método para validar codigo de registro
    public static function checkCodigoRegistro($codigo){
        include('connection.php');
        $query = "SELECT codigo FROM tbCodigos WHERE nombre = 'registro' AND codigo = ?";
        try{
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($codigo));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro un registro que coincide
                return 1;
            }else{
                //No encontro el codigo
                return 0;
            }
        }catch(PDOException $e){
            return $e;
        }
    }


        //Metodo para generar el codigo de verificación de la base de datos
        private static function setCodigoV(){
            try{
                $codigo = rand(100000, 999999);
                $query = "UPDATE tbCodigos SET codigo = $codigo WHERE nombre = 'registro'";
                $link = conexion();
                $comando = $link->prepare($query);
                $comando->execute();
                $row = $comando->fetch(PDO::FETCH_ASSOC);
                $filasAfectadas = $comando->rowCount();
                return $filasAfectadas;
               
            }catch(PDOException $e){
                return $e;
            }

        }
        //Metodo para obtener el codigo de verificación de la base de datos
        public static function getCodigoV(){
            include("connection.php");
            try{
                $bandera = escuela::setCodigoV();
                if(!$bandera > 0 ){
                    return array("mensaje" => "No se modifico el codigo");
                }
                $query = "SELECT codigo as codigo FROM tbCodigos WHERE nombre = 'registro'";
                $link = conexion();
                $comando = $link->prepare($query);
                $comando->execute();
                $row = $comando->fetch(PDO::FETCH_ASSOC);
                $filasAfectadas = $comando->rowCount();
                if( $filasAfectadas > 0){
                    $resultado = $row['codigo'];
                    return $resultado;
                }else{
                    //No se encontro ningun codigo para enviar
                    return 0;
                }
            }catch(PDOException $e){
                return $e;
            }

        }
    

}

?>