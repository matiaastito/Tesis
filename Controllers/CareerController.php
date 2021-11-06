<?php

namespace Controllers;

use DAO\CareerDAO as CareerDAO;
use Classes\Career as Career;

class CareerController
{
    private $careerDAO;

    public function __construct()
    {
        $this->careerDAO = new CareerDAO();
    }

    public function SearchByName($nombre)
    {
        $careerList = $this->careerDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "career-list.php");
    }

    public function Add($id, $description, $active)
    {
        $career = new Career();
        $career->setCareerId($id);
        $career->setDescription($description);
        $career->setActive($active);
        $this->careerDAO->Add($career);

       // $this->ShowListView();
    }

/*
    public function ShowListView()
    {
        $careerList = $this->careerDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "career-list.php");
    }

    public function ShowAddView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "add-career.php");
    }

    public function Remove($CUIL)
    {
        $this->careerDAO->Remove($CUIL);
        $careerList = $this->careerDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "career-list.php");
    }

    

    public function Modify($CUIL)
    {

        $careerList = $this->careerDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "modify-career.php");
    }

    public function ModifyAttribute($legalName, $address, $contactNumber, $email, $cuil)
    {

        $this->careerDAO->Modify();
        $careerList = $this->careerDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "career-list.php");
    }

    public function Add($CUIL, $legalName, $address, $contactNumber, $email)
    {
        $career = new career();
        $career->setCUIL($CUIL);
        $career->setLegalName($legalName);
        $career->setAddress($address);
        $career->setContactNumber($contactNumber);
        $career->setEmail($email);

        $this->careerDAO->Add($career);

        $this->ShowListView();
    }
    */
}
