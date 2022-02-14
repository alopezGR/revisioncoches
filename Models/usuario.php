<?php

/**
 * 
 * Clase que gestiona la entidad operación para registrar las operaciones que se hagan en la aplicación.
 * 
 * @author Alfonso López <alopez@gruporuiz.com>
 *  
 */
class Usuario
{

    public static function checkLogin($usuario, $password)
    {
        //Comprobar si las credenciales introducidas son correctas o no
        $logged = false;
        $db = DBInterna::getConector();
        $sql = $db->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
        $sql->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $sql->execute();
        $usuarioDb = $sql->fetch(PDO::FETCH_ASSOC);
        $autenticado = password_verify($password, $usuarioDb['password']);
        if ($autenticado) {
            $_SESSION['logged'] = "true";
            $_SESSION['user'] = $usuarioDb['usuario'];
            if($usuarioDb['admin'] == 1){
                $_SESSION['admin'] = true;
            }
            $logged = true;
            if ($usuarioDb['cambiada'] == 0) {
                $_SESSION['cambioPassword'] = true;
            }
        }
        return $logged;
    }

    public static function registroLogin($usuario, $accion)
    {
        $conn = DBInterna::getConector();
        $query = "INSERT INTO logins (usuario, accion) VALUE (:usuario, :accion)";

        $st = $conn->prepare($query);

        $st->bindValue(":usuario", $usuario);
        $st->bindValue(":accion", $accion);

        $st->execute();

        if ($st) {
            return true;
        } else {
            return false;
        }
    }

    public static function cambioPassword($usuario, $pass)
    {
        $conn = DBInterna::getConector();
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE usuarios SET password = :pass, cambiada = 1 WHERE usuario = :usuario";

        $st = $conn->prepare($query);

        $st->bindValue(":usuario", $usuario);
        $st->bindValue(":pass", $pass);

        $st->execute();

        if ($st) {
            return true;
        } else {
            return false;
        }
    }
}
