<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;

class HomeController
{
    private $UserDAO;


    public function __construct()
    {
        $this->UserDAO = new UserDAO();
    }

    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "index.php");
    }


    public function ShowCompanyListView()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "company-list.php");
    }

    public function Login($email)
    {


        $user = $this->UserDAO->GetByEmail($email);


        if (($user != null)) {
            $_SESSION["loggedUser"] = $user;
            $this->ShowCompanyListView();
        } else {
            echo "<script> if(confirm('Verifique que los datos ingresados sean correctos'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function Logout()
    {
        session_destroy();

        $this->Index();
    }
}
