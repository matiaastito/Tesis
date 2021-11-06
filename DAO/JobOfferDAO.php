<?php

namespace DAO;


use \Exception as Exception;
use DAO\IJobOffferDAO as IJobOfferDAO;
use Classes\Enterprise\JobOffer as JobOffer;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO
{
    private $jobOfferList = array();
    
    private $tableName = "jobOffer";


    public function Add(JobOffer $jobOffer)
    { 
        try {
            $query = "INSERT INTO " . $this->tableName . " (company_Id, job_Position_Id, student_id, salary, hours, turn, experience, language, preference_language, gender) 
            VALUES (:company_Id, :job_Position_Id, :student_id, :salary, :hours, :turn, :experience, :language, :preference_language, :gender);";

            $parameters["company_Id"] = $jobOffer->getCompanyId();
            $parameters["job_Position_Id"] = $jobOffer->getJobPositionId();
            $parameters["student_Id"] = $jobOffer->getStudentId();
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

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $jobOffer = new JobOffer();
                $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                $jobOffer->setCompanyId($row["company_Id"]);
                $jobOffer->setJobPositionId($row["job_Position_Id"]);
                $jobOffer->setStudentId($row["student_Id"]);
                $jobOffer->setSalary($row["salary"]);
                $jobOffer->setHours($row["hours"]);
                $jobOffer->setTurn($row["turn"]);
                $jobOffer->setExp($row["exp"]);
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



    public function Remove($id)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE id = $id";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
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
