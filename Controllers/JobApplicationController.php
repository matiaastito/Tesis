<?php

namespace Controllers;

use DAO\JobApplicationDAO as JobApplicationDAO;
use Classes\JobApplication as JobApplication;

class JobApplicationController
{
    private $jobApplicationDAO;

    public function __construct()
    {
        $this->jobApplicationDAO = new JobApplicationDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobApplication.php");
    }

    public function Add($jobApplicationId, $studentId, $jobOfferId)
    {
        $jobApplication = new JobApplication();
        $jobApplication->setJobOfferId($jobOfferId);
        $jobApplication->setJobApplicationId($jobApplicationId);
        $jobApplication->setStudentId($studentId);
       
        $this->jobApplicationDAO->Add($jobApplication);
            
            
       // $this->ShowListView();
    }

   
/*
    public function ShowListView()
    {
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

     public function SearchByName($nombre)
    {
        $careerList = $this->careerDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

    public function ShowAddView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "add-jobPosition.php");
    }

    public function Remove($CUIL)
    {
        $this->jobPositionDAO->Remove($CUIL);
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

    

    public function Modify($CUIL)
    {

        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "modify-jobPosition.php");
    }

    public function ModifyAttribute($legalName, $address, $contactNumber, $email, $cuil)
    {

        $this->jobPositionDAO->Modify();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

    
    */
}