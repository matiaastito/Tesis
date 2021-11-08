<?php

namespace DAO;


use \Exception as Exception;
use DAO\ISessionDAO as ISessionDAO;
use DAO\Connection as Connection;

class SessionDAO implements ISessionDAO
{

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