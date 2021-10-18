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

        require_once(VIEWS_PATH . "company-list.php");
    }

    public function Add($id, $CUIL, $legalName, $address, $contactNumber, $email)
    {
        $company = new Company();
        $company->setId($id);
        $company->setCUIL($CUIL);
        $company->setLegalName($legalName);
        $company->setAddress($address);
        $company->setContactNumber($contactNumber);
        $company->setEmail($email);

        $this->companyDAO->Add($company);

        $this->ShowListView();
    }
}
