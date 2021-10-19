<?php

namespace Controllers;

use DAO\CompanyDAO as CompanyDAO;
use Classes\Company as Company;

class CompanyController
{
    private $companyDAO;

    public function __construct()
    {
        $this->companyDAO = new CompanyDAO();
    }

    public function ShowListView()
    {
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "company-list.php");
    }

    public function ShowAddView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "add-company.php");
    }

    public function Remove($CUIL)
    {
        $this->companyDAO->Remove($CUIL);
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "company-list.php");
    }

    public function SearchByName($nombre)
    {
        $companyList = $this->companyDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "company-list.php");
    }

    public function Modify($CUIL)
    {
        //agregar funcion para modificar
    }

    public function Add($CUIL, $legalName, $address, $contactNumber, $email)
    {
        $company = new Company();
        $company->setCUIL($CUIL);
        $company->setLegalName($legalName);
        $company->setAddress($address);
        $company->setContactNumber($contactNumber);
        $company->setEmail($email);

        $this->companyDAO->Add($company);

        $this->ShowListView();
    }
}
