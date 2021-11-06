<?php

namespace Controllers;

use DAO\AdminDAO as AdminDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\StudentDAO as StudentDAO;
use Classes\Users\Admin as Admin;
use Classes\Company as Company;

class AdminController
{
    private $adminDAO;
    private $companyDAO;
    private $studentDAO;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->companyDAO = new CompanyDAO();
        $this->studentDAO = new StudentDAO();
    }

    public function ShowCompanyListView()
    {
        $companyList = $this->companyDAO->GetAll();

        require_once(VIEWS_PATH . "company-list.php");
    }

    public function ShowStudentListView()
    {
        $studentList = $this->studentDAO->GetAll();
        require_once(VIEWS_PATH . "student-list.php");
    }

    public function ShowAdminListView()
    {
        $adminList = $this->adminDAO->GetAll();
        require_once(VIEWS_PATH . "admin-list.php");
    }

    public function Add($firstName, $lastName, $dni, $gender, $birhtDate, $email, $phoneNumber, $userType)
    {
        $admin = new Admin();
        $admin->setName($firstName);
        $admin->setLastName($lastName);
        $admin->setDni($dni);
        $admin->setGender($gender);
        $admin->setBirthDate($birhtDate);
        $admin->setEmail($email);
        $admin->setPhoneNumber($phoneNumber);
        $admin->setUserType($userType);


        $this->adminDAO->Add($admin);

        $this->ShowCompanyListView();
    }

    public function Remove($id)
    {
        $this->adminDAO->Remove($id);

        $this->ShowAdminListView();
    }
}
