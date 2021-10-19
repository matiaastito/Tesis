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

    public function Add($recordId, $firstName, $lastName)
    {
        $company = new Company();
        $company->setCUIL($recordId);
        $company->setLegalName($firstName);
        $company->setContactNumber($lastName);
        $company->setEmail($lastName);
        $company->setEmail($lastName);

        $this->companyDAO->Add($company);

        $this->ShowCompanyListView();
    }

    public function Remove($cuil)
    {
        $this->companyDAO->Remove($cuil);

        $this->ShowCompanyListView();
    }
}
