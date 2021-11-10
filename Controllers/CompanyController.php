<?php

namespace Controllers;

use Classes\Alert;
use DAO\CompanyDAO as CompanyDAO;
use Classes\Enterprise\Company as Company;
use Exception;

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
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function ShowCompanyProfile($company_Id)
    {
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-profile.php");
    }

    public function ShowAddView(Alert $alert = null)
    {

        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-company.php");
    }

    public function Remove($CUIL)
    {
        $this->companyDAO->Remove($CUIL);
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function SearchByName($nombre)
    {
        $companyList = $this->companyDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function Modify($CUIL)
    {

        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/modify-company.php");
    }

    public function ModifyAttribute($cuil, $legalName, $address, $contactNumber, $email, $web_Page, $description)
    {

        $this->companyDAO->Modify();
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function Add($cuil, $legalName, $email, $contactNumber, $web_Page, $description, $province, $location, $address)
    {
        $alert = new Alert("","");
        try{

        
        $company = new Company();
        $company->setCUIL($cuil);
        $company->setLegalName($legalName);
        $company->setAddress($address);
        $company->setContactNumber($contactNumber);
        $company->setEmail($email);
        $company->setWeb($web_Page);
        $company->setProvince($province);
        $company->setLocation($location);
        $company->setDescription($description);

        $this->companyDAO->Add($company);
        $alert->setType("success");
        $alert->setMessage("Compañia agregada con exito");
    }
    catch(Exception $ex){
        $alert ->setType("danger");
        $alert->setMessage($ex->getMessage());
    }
    finally{

        $this->ShowListView($alert);
    }
    }
}
