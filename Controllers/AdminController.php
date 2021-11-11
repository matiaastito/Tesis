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


    public function ShowStudentListView()
    {
        $studentList = $this->studentDAO->GetAll();
        require_once(VIEWS_PATH . "/student-list.php");
    }

    public function ShowAddView(){
        require_once(VIEWS_PATH . "/add-admin.php");
    }

    public function AddImg()
    {
        

}

    public function ShowAdminListView()
    {
        $adminList = $this->adminDAO->GetAll();
        require_once(VIEWS_PATH . "admin-list.php");
    }

    public function Add($firstName, $lastName, $dni, $gender, $birhtDate, $email, $phoneNumber)
    {
        $admin = new Admin();
        $admin->setName($firstName);
        $admin->setLastName($lastName);
        $admin->setDni($dni);
        $admin->setGender($gender);
        $admin->setBirthDate($birhtDate);
        $admin->setEmail($email);
        $admin->setPhoneNumber($phoneNumber);

        $this->adminDAO->Add($admin);

        echo FRONT_ROOT.'/Company/ShowListView';
    }

    public function Remove($id)
    {
        $this->adminDAO->Remove($id);

        $this->ShowAdminListView();
    }
}
