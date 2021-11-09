<?php

namespace DAO;


use \Exception as Exception;
use DAO\ISessionDAO as ISessionDAO;
use DAO\Connection as Connection;

class SessionDAO implements ISessionDAO
{

    public function ValidateAdmin(){
        if ($_SESSION["loggedUser"]->getUserType() == "admin"){
            return;
        }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function ValidateStudent(){
        if ($_SESSION["loggedUser"]->getUserType() == "student"){
            return;
        }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function ValidateCompany(){
        if ($_SESSION["loggedUser"]->getUserType() == "company"){
            return;
        }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }
    
    public function Login($user){
        if (($user != null)) {
            $_SESSION["loggedUser"] = $user;
            if ($user->getUserType() == "admin") {
                return "admin";
            } else {
                return "student";
            }
        } else {
            echo "<script> if(confirm('Verifique que los datos ingresados sean correctos'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function Logout()
    {
        session_destroy();

        echo "<script> if(confirm('Sesion terminada'));";
        echo "window.location = '../index.php';
		</script>";
    }




}