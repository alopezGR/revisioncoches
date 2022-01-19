<?php

/**
 * Descripción: Controlador para la entidad usuario
 * @author Alfonso López <alopez@gruporuiz.com>
 * 
 */
class UsuarioController
{

    /**
     * Constructor de la clase
     * 
     * @access public
     * 
     */
    public function __construct()
    {
    }

    /**
     * Método para cargar la página de autenticación de usuarios
     * 
     */
    public function login()
    {

        if (isset($_SESSION['logged']) && $_SESSION['logged'] == "true") { //Si el usuario esta registrado se carga la página de inicio
            header('Location: index.php');
        } else // Sino se carga la página de autenticación
            require_once 'Views/Usuario/login.php';
    }

    public function checkLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $logged = Usuario::checkLogin($email, $password); // Obtiene la repuesta de la BD si el usuario existe o no y lo guarda en la variable $logged
        if (!$logged) { // Si las credenciales no son correctas, muestra un error y direcciona de nuevo a la página de login
            header('Location: index.php?controller=usuario&action=login');
        } else { // sino redirecciona a la página de inicio
            Usuario::registroLogin($email, 'login');
            if ($_SESSION['cambioPassword'] == true) {
                header('Location: index.php?controller=usuario&action=formularioCambioPassword');
            } else {
                header('Location: index.php');
            }
        }
    }

    public function formularioCambioPassword()
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == "true") { //Si el usuario esta registrado se carga la página de inicio
            require_once 'Views/Usuario/password.php';
        } else // Sino se carga la página de autenticación
            require_once 'Views/Usuario/login.php';
    }

    public function cambiarPassword()
    {
        $pass = $_POST['password'];
        $user = $_POST['usuario'];
        $cambio = Usuario::cambioPassword($user, $pass);

        if($cambio){
            unset($_SESSION['cambioPassword']);
            $_SESSION['passwordCambiada'] = true;
            header('Location: index.php');
        }

    }

    /**
     * 
     * Método para cerrar la sesión de usuario
     * 
     * @access public
     * 
     */
    public function salir()
    {
        unset($_SESSION['logged']); // borra el registro logged de la variable $_SESSION
        unset($_SESSION['user']); // borra el registro user de la variable $_SESSION
        unset($_SESSION['admin']); // borra el registro admin de la variable $_SESSION
        require_once 'Views/Usuario/logout.php'; // Carga la página de logout que redirigirá al usuario a la página de inicio
    }
}
