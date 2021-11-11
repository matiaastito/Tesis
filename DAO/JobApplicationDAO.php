<?php

namespace DAO;


use \Exception as Exception;
use DAO\IJobApplicationDAO as IJobApplicationDAO;
use Classes\JobApplication as JobApplication;
use DAO\Connection as Connection;

class JobApplicationDAO implements IJobApplicationDAO
{
    private $jobApplicationList = array();
    
    private $tableName = "jobApplication";


    public function Add(JobApplication $JobApplication)
    { 
        try {
            $query = "INSERT INTO " . $this->tableName . "(job_Offer_Id, student_Id) VALUES (:job_Offer_Id, :student_Id);";

            
            $parameters["job_Offer_Id"] = $JobApplication->getJobOfferId();
            $parameters["student_Id"] = $JobApplication->getStudentId();
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $jobApplicationList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $jobApplication = new JobApplication();
                $jobApplication->setJobApplicationId($row["job_Application_Id"]);
                $jobApplication->setJobOfferId($row["job_Offer_Id"]);
                $jobApplication->setStudentId($row["student_Id"]);

                array_push($jobApplicationList, $jobApplication);
            }

            return $jobApplicationList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByName($name)
    {
        try {
            $query = "SELECT company.company_Id FROM company WHERE company.legal_name like '$name%'";
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

    public function MatchByCareerId($name)
    {
        try {
            $query = "SELECT career.id from career WHERE career.description like '$name%'";
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

    public function Remove($id)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE job_Application_Id = $id";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

   
    public function SearchByNombre($id)
    {

        $JobApplication = new JobApplication();
        try {
            $query = "SELECT * FROM $this->tableName WHERE job_Offer_Id like '$id%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $JobApplication = $resultSet;

                }
        
            return $JobApplication;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
/*
    public function SearchByParameters($puesto, $carrera)
    {

        $jobApplicationList = array();
        if($puesto!= "Puesto" AND $carrera!="Carrera"){
        try {

            $puesto = $this->MatchByJobPos($puesto);
            $carrera = $this->MatchByCareerId($carrera);

            $query= "SELECT * FROM $this->tableName 
            JOIN jobOffer ON jobOffer.job_Offer_Id = jobApplication.job_Offer_Id
             JOIN company ON jobOffer.company_Id = company.company_Id
             JOIN jobPosition ON jobOffer.job_Position_Id = jobPosition.job_Position_Id
             JOIN career ON jobOffer.career_Id = career.id WHERE jobOffer.job_Position_Id like '$puesto%' AND jobOffer.career_Id like '$carrera%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $jobApplication = new JobApplication();
                $jobApplication->setJobOfferId($row["job_Offer_Id"]);
                $jobApplication->setStudentId($row["legal_name"]);
                $jobApplication->setJobApplicationId($row["carDes"]);



                    array_push($jobApplicationList, $jobApplication);
                }
            }

            return $jobApplicationList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    else if($puesto !="Puesto"){
        return $this->SearchByPuesto($puesto);
    }
    else{
        return $this->SearchByCarrera($carrera);
    }
    }

    public function SearchByPuesto($puesto)
    {

        $jobOfferList = array();
        try {
            $puesto = $this->MatchByJobPos($puesto);
            $query= "SELECT jobOffer.job_Offer_Id, company.legal_name, career.description as carDes, jobOffer.career_Id, jobPosition.description as jobPos, jobOffer.salary, jobOffer.description, jobOffer.turn, jobOffer.experience,
             jobOffer.language, jobOffer.preference_language, jobOffer.place FROM $this->tableName 
             JOIN company ON jobOffer.company_Id = company.company_Id
             JOIN jobPosition ON jobOffer.job_Position_Id = jobPosition.job_Position_Id
             JOIN career ON jobOffer.career_Id = career.id WHERE jobOffer.job_Position_Id like '$puesto%'";

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $jobOffer = new JobOffer();
                $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                $jobOffer->setCompanyId($row["legal_name"]);
                $jobOffer->setCareerId($row["carDes"]);
                $jobOffer->setJobPositionId($row["jobPos"]);
                $jobOffer->setSalary($row["salary"]);
                $jobOffer->setDescription($row["description"]);
                $jobOffer->setTurn($row["turn"]);
                $jobOffer->setExp($row["experience"]);
                $jobOffer->setLang($row["language"]);
                $jobOffer->setPrefLang($row["preference_language"]);
                $jobOffer->setPlace($row["place"]);


                    array_push($jobOfferList, $jobOffer);
                }
            }

            return $jobOfferList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function SearchByCarrera($carrera)
    {

        $jobOfferList = array();
        try {
            $carrera = $this->MatchByCareerId($carrera);
            $query= "SELECT jobOffer.job_Offer_Id, company.legal_name, career.description as carDes, jobOffer.career_Id, jobPosition.description as jobPos, jobOffer.salary, jobOffer.description, jobOffer.turn, jobOffer.experience,
             jobOffer.language, jobOffer.preference_language, jobOffer.place FROM $this->tableName 
             JOIN company ON jobOffer.company_Id = company.company_Id
             JOIN jobPosition ON jobOffer.job_Position_Id = jobPosition.job_Position_Id
             JOIN career ON jobOffer.career_Id = career.id WHERE jobOffer.career_Id like '$carrera%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $jobOffer = new JobOffer();
                $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                $jobOffer->setCompanyId($row["legal_name"]);
                $jobOffer->setCareerId($row["carDes"]);
                $jobOffer->setJobPositionId($row["jobPos"]);
                $jobOffer->setSalary($row["salary"]);
                $jobOffer->setDescription($row["description"]);
                $jobOffer->setTurn($row["turn"]);
                $jobOffer->setExp($row["experience"]);
                $jobOffer->setLang($row["language"]);
                $jobOffer->setPrefLang($row["preference_language"]);
                $jobOffer->setPlace($row["place"]);


                    array_push($jobOfferList, $jobOffer);
                }
            }

            return $jobOfferList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
*/

}
