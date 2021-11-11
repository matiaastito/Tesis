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

    public function MatchByStudId($id)
    {
        try {
            $query = "SELECT student.first_name, student.last_name FROM $this->tableName JOIN student WHERE student.id = $id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach($resultSet as $row)
                $name = $row['first_name'] . ' '. $row['last_name'];
                }
        
            return $name;
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

    public function End($jobApplicationId)
    {
        try {

            $query = "SELECT student.email as email 
             FROM $this->tableName 
             JOIN student ON jobApplication.student_Id = student.id
             WHERE jobApplication.job_Application_Id = $jobApplicationId";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            if($resultSet !=null){
            foreach ($resultSet as $row) {
                mail($row['email'],"Postulacion","Su postulacion ha sido declinada", "From: maticapo27@gmail.com");
                $this->Remove($jobApplicationId);
                }
        }
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}
