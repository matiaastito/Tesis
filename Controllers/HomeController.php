<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\AdminDAO as AdminDAO;

class HomeController
{
    private $UserDAO;
    private $studentDAO;
    private $adminDAO;


    public function __construct()
    {
        $this->UserDAO = new UserDAO();
        $this->studentDAO = new StudentDAO();
        $this->adminDAO = new AdminDAO();
    }

    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "index.php");
    }

    public function ShowAdminView()
    {
        $adminList = $this->adminDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "admin-home.php");
    }


    public function ShowStudentView()
    {

        $studentList = $this->studentDAO->GetAll();
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

        echo "<script> if(confirm('Sesion terminada'));";
        echo "window.location = '../index.php';
		</script>";
    }
}
