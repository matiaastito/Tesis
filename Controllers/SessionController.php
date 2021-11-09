<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\AdminDAO as AdminDAO;
use DAO\SessionDAO as SessionDAO;

class SessionController
{
    private $UserDAO;
    private $studentDAO;
    private $adminDAO;
    private $sessionDAO;


    public function __construct()
    {
        $this->UserDAO = new UserDAO();
        $this->studentDAO = new StudentDAO();
        $this->adminDAO = new AdminDAO();
        $this->sessionDAO = new SessionDAO();
    }

    public function ValidateAdmin(){
        $this->sessionDAO ->ValidateAdmin();
    }

    public function ValidateStudent(){
        $this->sessionDAO ->ValidateStudent();
    }

    public function ValidateCompany(){
        $this->sessionDAO ->ValidateCompany;
    }


    public function Login($email)
    {
        $user = $this->UserDAO->GetByEmail($email);
        $logged = $this->sessionDAO->Login($user);
        // usar try catch + alert para evitar que el controller haga una tarea que no le compete
        if ($logged == "admin") {
            FRONT_ROOT . "/Session/ValidateAdmin.php";
            require_once(VIEWS_PATH . "/admin-home.php");
            } else {
                require_once(VIEWS_PATH . "/validate-session.php"); 
                require_once(VIEWS_PATH . "/student-home.php");
            }  
    }

    public function Logout()
    {

        $this->sessionDAO->Logout();
    }
}