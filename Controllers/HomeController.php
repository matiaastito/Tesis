<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\User as User;

class HomeController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "home.php");
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "add-company.php");
        require_once(VIEWS_PATH . "add-laboralOffer.php");
    }

    public function Login($email)
    {
        $user = $this->userDAO->GetByEmail($email);

        if ($user != null) {
            $_SESSION["loggedUser"] = $user;
            $this->ShowAddView();
        } else
            $this->Index("Email incorrecto");
    }

    public function Logout()
    {
        session_destroy();

        $this->Index();
    }
}
