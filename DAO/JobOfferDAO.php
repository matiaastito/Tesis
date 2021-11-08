<?php

namespace DAO;


use \Exception as Exception;
use DAO\IJobOfferDAO as IJobOfferDAO;
use Classes\Enterprise\JobOffer as JobOffer;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO
{
    private $jobOfferList = array();
    
    private $tableName = "jobOffer";


    public function Add(JobOffer $jobOffer)
    { 
        try {
            $query = "INSERT INTO " . $this->tableName . "(company_Id, job_Position_Id, salary, hours, turn, experience, language, preference_language, gender) VALUES (:company_Id, :job_Position_Id, :salary, :hours, :turn, :experience, :language, :preference_language, :gender);";

            
            $parameters["company_Id"] = $jobOffer->getCompanyId();
            $parameters["job_Position_Id"] = $jobOffer->getJobPositionId();
            $parameters["salary"] = $jobOffer->getSalary();
            $parameters["hours"] = $jobOffer->getHours();
            $parameters["turn"] = $jobOffer->getTurn();
            $parameters["experience"] = $jobOffer->getExp();
            $parameters["language"] = $jobOffer->getLang();
            $parameters["preference_language"] = $jobOffer->getPrefLang();
            $parameters["gender"] = $jobOffer->getGender();
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $jobOfferList = array();
        try {

            $query = "SELECT jobOffer.job_Offer_Id, company.legal_name, jobPosition.description, jobOffer.salary, jobOffer.hours, jobOffer.turn, jobOffer.experience,
             jobOffer.language, jobOffer.preference_language, jobOffer.gender FROM $this->tableName 
             JOIN company ON jobOffer.company_Id = company.id 
             JOIN jobPosition ON jobOffer.job_Position_Id = jobPosition.job_Position_Id";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $jobOffer = new JobOffer();
                $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                $jobOffer->setCompanyId($row["legal_name"]);
                $jobOffer->setJobPositionId($row["description"]);
                $jobOffer->setSalary($row["salary"]);
                $jobOffer->setHours($row["hours"]);
                $jobOffer->setTurn($row["turn"]);
                $jobOffer->setExp($row["experience"]);
                $jobOffer->setLang($row["language"]);
                $jobOffer->setPrefLang($row["preference_language"]);
                $jobOffer->setGender($row["gender"]);

                array_push($jobOfferList, $jobOffer);
            }

            return $jobOfferList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByName($name)
    {
        try {
            $query = "SELECT company.id FROM company WHERE company.legal_name like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $row){
                
               $id=$row['id'];

            }
            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByJobPos($name)
    {
        try {
            $query = "SELECT jobPosition.job_Position_Id from jobPosition WHERE jobPosition.description like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $row){
                $id=$row['job_Position_Id'];
             }
        
            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByStud($name)
    {
        try {
            $query = "SELECT jobPosition. FROM $this->tableName JOIN jobPosition WHERE jobPosition.description like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $id = $resultSet;
                }
        
            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Remove($job_Offer_Id)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE job_Offer_Id = $job_Offer_Id";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Modify()
    {

        try {
            if ($_POST['puesto']) {
                $query = "UPDATE $this->tableName SET job_Position_Id = MatchByJobPost('$_POST[puesto]') WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['salary']) {
                $query = "UPDATE $this->tableName SET salary='$_POST[salary]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['hours']) {
                $query = "UPDATE $this->tableName SET hours='$_POST[hours]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['turn']) {
                $query = "UPDATE $this->tableName SET turn='$_POST[turn]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['exp']) {
                $query = "UPDATE $this->tableName SET experience='$_POST[exp]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['lang']) {
                $query = "UPDATE $this->tableName SET language='$_POST[lang]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['pLang']) {
                $query = "UPDATE $this->tableName SET preference_language='$_POST[pLang]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['gender']) {
                $query = "UPDATE $this->tableName SET gender='$_POST[gender]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

   
    public function SearchByNombre($id)
    {

        $jobOffer = new jobOffer();
        try {
            $query = "SELECT * FROM $this->tableName WHERE job_Offer_Id like '$id%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $jobOffer = $resultSet;

                }
        
            return $jobOffer;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}
