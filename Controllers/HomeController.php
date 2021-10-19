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

    public function ShowAdminView()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "admin-home.php");
    }


    public function ShowStudentView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "student-home.php");
    }

    public function Login($email)
    {


        $user = $this->UserDAO->GetByEmail($email);

        // usar try catch + alert para evitar que el controller haga una tarea que no le compete
        if (($user != null)) {
            $_SESSION["loggedUser"] = $user;
            if ($user->getUserType() == "admin") {
                $this->ShowAdminView();
            } else {
                $this->ShowStudentView();
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

        $this->Index("");
    }
}
