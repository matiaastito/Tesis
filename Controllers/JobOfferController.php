<?php

namespace Controllers;

use DAO\JobOfferDAO as JobOfferDAO;
use Classes\Enterprise\JobOffer as JobOffer;

class JobOfferController
{
    private $jobOfferDAO;

    public function __construct()
    {
        $this->jobOfferDAO = new JobOfferDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobOffer.php");
        require_once(VIEWS_PATH . "/jobApplication-list.php");
    }

    public function Add($name, $puesto, $salary, $hours, $turn, $exp, $lang, $langP, $gender )
    {
        $jobOffer = new JobOffer();
        $jobOffer->setCompanyId($this->jobOfferDAO->MatchByName($name));
        $jobOffer->setJobPositionId($this->jobOfferDAO->MatchByJobPos($puesto));
        $jobOffer->setSalary($salary);
        $jobOffer->setHours($hours);
        $jobOffer->setTurn($turn);
        $jobOffer->setExp($exp);
        $jobOffer->setLang($lang);
        $jobOffer->setPrefLang($langP);
        $jobOffer->setGender($gender);
        $this->jobOfferDAO->Add($jobOffer);

       // $this->ShowListView();
    }

    public function ShowListView()
    {
        $jobOfferList = $this->jobOfferDAO->GetAll();
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }

    public function Modify($job_Offer_Id)
    {

        $jobOfferList = $this->jobOfferDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/modify-jobOffer.php");
    }

    public function ModifyAttribute($job_Offer_Id, $puesto, $salary, $hours, $turn, $exp, $lang, $pLang, $gender)
    {

        $this->jobOfferDAO->Modify();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }

    public function Remove($job_Offer_Id)
    {
        $this->jobOfferDAO->Remove($job_Offer_Id);
        $jobOfferList = $this->jobOfferDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }


}