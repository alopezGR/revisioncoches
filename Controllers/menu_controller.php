<?php

class MenuController{

    public function index(){
        if(isset($_SESSION['logged'])){
            require_once 'Views/Menu/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }

    }

}